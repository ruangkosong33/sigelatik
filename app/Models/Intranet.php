<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Intranet extends Model
{
    use HasFactory, Sluggable;

    protected $table='intranets';

    protected $fillable=['title', 'slug', 'instance', 'type', 'link', 'bandwith', 'download', 'upload', 'manage'];

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
