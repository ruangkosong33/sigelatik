<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vpr extends Model
{
    use HasFactory, Sluggable;

    protected $table='vprs';

    protected $fillable=['title', 'slug', 'needs', 'date', 'ip_public', 'ip_local', 'storage', 'core', 'ram', 'port', 'database'];

    protected $hidden=[];

    //SLUG
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
