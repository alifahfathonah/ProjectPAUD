<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkModel extends Model
{
    protected $fillable = ['title','link','status'];
}
