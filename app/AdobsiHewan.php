<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class AdobsiHewan extends Model
{
    use softDeletes;

    protected $fillable = [
        'nama', 'email', 'alamat', 'deskripsi', 'jenis', 'image'

    ];

    protected $hidden = [

    ];
   

   
}
