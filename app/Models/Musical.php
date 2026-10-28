<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Musical extends Model
{
    protected $fillable = ['musical_name', 'description'];

    public function artists(): HasMany
    {
        return $this->hasMany(Artist::class);
    }

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }

    public function songs(): hasMany
    {
        return $this->hasMany(Song::class);
    }
}
