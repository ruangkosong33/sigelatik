<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Cviebrock\EloquentSluggable\Sluggable;

class Opd extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'name',
        'slug',
        'address',
        'nip',
        'phone',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

}
