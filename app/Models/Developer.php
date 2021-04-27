<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Developer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $appends = ['dev_image'];

    public function getDevImageAttribute()
    {
        if ($this->image == null) return null;

        return asset(Storage::url($this->image));
    }
}
