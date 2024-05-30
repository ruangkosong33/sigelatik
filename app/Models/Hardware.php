<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hardware extends Model
{
    use HasFactory, Sluggable;

    protected $table='hardwares';

    protected $fillable=['title', 'slug' , 'utilization', 'manage', 'location', 'application', 'specific'];

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
