<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'title',
        'cover_image',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $attributes = array(
        'cover_image' => ''
      );
      


}
