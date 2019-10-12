<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    protected $fillable = ['title','link','imgbanner','status']; 
}
