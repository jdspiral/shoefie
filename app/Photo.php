<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $table = 'shoe_photos';

    protected $fillable = ['path'];

    public function shoe() {
        return $this->belongsTo('App\Shoe');
    }
}
