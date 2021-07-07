<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts3';

    use HasFactory;

    public function getImagePath(){
        $path='/storage/images/';
        $imageFile = $this->image;
        return $path.$imageFile;
    }
}
