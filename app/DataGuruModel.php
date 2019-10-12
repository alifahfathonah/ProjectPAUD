<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataGuruModel extends Model
{
    protected $fillable = ['nama','slug','tempat','tgllahir','alamat','nohp','foto','level'];
}
