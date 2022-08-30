<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title','subTitle','content','type','main_image_path'];

    public function images(){
    return $this->hasMany(ProjectImages::class,'projectID');
    }
}
