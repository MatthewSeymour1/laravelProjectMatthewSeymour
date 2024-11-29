<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'role', 'image', 'description'];

    // Role (being publisher or developer) can make many games.
    public function games() {
        return $this->belongsToMany(Game::class);
    }
}
