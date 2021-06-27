<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Webcomic extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $withCount = ['sources'];

    public function sources()
    {
        return $this->hasMany(Source::class);
    }

    public function strips()
    {
        return $this->hasManyThrough(Strip::class, Source::class);
    }

}
