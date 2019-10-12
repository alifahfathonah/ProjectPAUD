<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumModel extends Model
{
    protected $fillable = ['judul','slug','tanggal','status'];
}
