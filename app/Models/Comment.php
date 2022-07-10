<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["user_id", "post_id", 'parent_id', "description"];
    protected $dates = ["deleted_at"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // الردود على الكومنت
    public function replies()
    {
        return $this->hasMany(Comment::class ,'parent_id');
    }
}
