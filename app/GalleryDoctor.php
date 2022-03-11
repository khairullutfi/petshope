<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class GalleryDoctor extends Model
{
    use softDeletes;

    protected $fillable = [
        'doctor_packages_id', 'image',

    ];

    protected $hidden = [

    ];
    public function doctor_package(){
        return $this->belongsTo(DoctorPackage::class, 'doctor_packages_id', 'id');
    }
   
}
