<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'user_id', 'book_id', 'tanggal_pinjam', 
        'tanggal_kembali', 'durasi_hari', 'denda', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Hitung denda otomatis
    public function hitungDenda($dendaPerHari = 1000)
    {
        if ($this->status !== 'dipinjam') return 0;

        $batasKembali = \Carbon\Carbon::parse($this->tanggal_pinjam)->addDays($this->durasi_hari);
        $hariTelat = now()->diffInDays($batasKembali, false);

        return max(0, $hariTelat) * $dendaPerHari;
    }
}