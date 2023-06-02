<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBooks extends Model
{
    use HasFactory;
    protected $table = "user_books";
    protected $fillable = [
        'usuario_id',
        'livro_id',
        'data_devolucao',
        'situacao',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'livro_id', 'id');
    }
}
