<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{
    use HasFactory;

    //protected  $primaryKey = '';

    protected $fillable = [
        'user_id',
        'copy_id',
        'start',
    ];
    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('user_id', '=', $this->getAttribute('user_id'))
            ->where('copy_id', '=', $this->getAttribute('copy_id'))
            ->where('start', '=', $this->getAttribute('start'));


        return $query;
    }

    public function user() //ami felé mutat    
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    /* public function userHas() //ami felé mutat    
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    } */

    public function userMany()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');

    }

    
}
