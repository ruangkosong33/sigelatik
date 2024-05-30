<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Priority extends Model
{
    use HasFactory, Sluggable;

    protected $table='prioritys';

    protected $fillable=['title', 'slug'];

    protected $hidden=[];

     //SLUG
     public function sluggable(): array
     {
         return [
             'slug' => [
                 'source' => 'title',
             ]
         ];
     }

     //RELATION
     public function entrance()
     {
         return $this->hasMany(Entrance::class, 'priority_id', 'id');
     }
}
