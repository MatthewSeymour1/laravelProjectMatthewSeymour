<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    // $fillable specifies which attributes are mass assignable. Meaning attributes that are not in $fillable
    // will not be able to be created or updated by the user.
    protected $fillable = [
        'title',
        'genre',
        'description',
        'release_year',
        'image',
        'created_at',
        'updated_at',
    ];

    // Games can have many reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Games can be made by many 'roles' (being developers or publishers)
    public function companies() {
        return $this->belongsToMany(Company::class);
    }

    public function publishers() {
        return $this->belongsToMany(Company::class)->where('companies.role', 'publisher');
    }

    public function developers() {
        return $this->belongsToMany(Company::class)->where('companies.role', 'developer');
    }
}
