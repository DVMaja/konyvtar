<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected  $primaryKey = 'book_id';

    protected $fillable = [
        'author',
        'title',
    ];
    //a példány felé sétálok
    public function copy() //ami felé mutat
    //Kapcsolat Pl hasMany
    //melyik osztály, ott hogy hívják
    {
        return $this->hasMany(Copy::class, 'book_id', 'book_id');
    }

     
}
