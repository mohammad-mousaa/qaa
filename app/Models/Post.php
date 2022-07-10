<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable=["title" ,"description"];
    protected $dates=["deleted_at"];


    public function comments()
    {
        // يعني جبلي كل الكومنتات اللي ابوهن نلل
        // يعني اللي ابوهن البوست نفسو
        return $this->hasMany(Comment::class)->whereNUll('parent_id');
    }


}
