<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjaman extends Model
{
    use HasFactory;
    protected $table = 'pinjaman';
    protected $guarded = ['id'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
