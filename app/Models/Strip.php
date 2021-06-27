<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Strip extends Model
{

    use SoftDeletes;

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function webcomic()
    {
        return $this->belongsTo(Webcomic::class);
    }

}
