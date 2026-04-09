<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['user', 'book'])->latest()->paginate(15);
        return view('user.loan.index', compact('loans'));
    }

    public function create()
    {
        $users = User::where('role', 'user')->get();
        $books = Book::where('status', 'tersedia')->get();
        return view('user.loan.create', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'        => 'required|exists:users,id',
            'book_id'        => 'required|exists:books,id',
            'tanggal_pinjam' => 'required|date',
            'durasi_hari'    => 'required|integer|min:1|max:14',
        ]);

        $book = Book::findOrFail($request->book_id);

        if ($book->status !== 'tersedia') {
            return back()->with('error', 'Buku sedang tidak tersedia!');
        }

        Loan::create([
            'user_id'        => $request->user_id,
            'book_id'        => $request->book_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'durasi_hari'    => $request->durasi_hari,
            'status'         => 'dipinjam',
        ]);

        // Update status buku
        $book->update(['status' => 'dipinjam']);

        return redirect()->route('loans.index')
                         ->with('success', 'Peminjaman berhasil diproses!');
    }

    // Form Pengembalian Buku
    public function returnForm(Loan $loan)
    {
        return view('user.loan.return', compact('loan'));
    }

    // Proses Pengembalian
    public function returnBook(Request $request, Loan $loan)
    {
        if ($loan->status !== 'dipinjam') {
            return back()->with('error', 'Transaksi ini sudah selesai.');
        }

        $denda = $loan->hitungDenda(1000); // Rp 1.000 per hari telat

        $loan->update([
            'tanggal_kembali' => now()->toDateString(),
            'denda'            => $denda,
            'status'           => $denda > 0 ? 'terlambat' : 'dikembalikan'
        ]);

        // Kembalikan status buku menjadi tersedia
        $loan->book->update(['status' => 'tersedia']);

        $pesan = $denda > 0 
            ? "Buku dikembalikan dengan denda Rp " . number_format($denda, 0) 
            : "Buku berhasil dikembalikan tepat waktu!";

        return redirect()->route('loans.index')->with('success', $pesan);
    }

    public function indexAdmin()
    {
        $loans = Loan::with(['user', 'book'])
                     ->latest()
                     ->paginate(15);

        return view('admin.loan.index', compact('loans'));
    }
}