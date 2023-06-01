<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "books";
    protected $fillable = [
        'nome',
        'autor',
        'genero_id',
        'situacao',
        'numero_registro',
    ];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::created(function ($model){
            $model->numero_registro = intval(date('Y').$model->id);
            $model->save();
        });
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genero_id', 'id');
    }


}
