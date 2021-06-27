<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Source extends Model
{

    use SoftDeletes;

    public function webcomic()
    {
        return $this->belongsTo(Webcomic::class);
    }

    public function strips()
    {
        return $this->hasMany(Strip::class);
    }

}
