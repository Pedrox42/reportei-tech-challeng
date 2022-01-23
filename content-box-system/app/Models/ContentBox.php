<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentBox extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function owner(){
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function files(){
        return $this->hasMany(File::class, 'content_box_id', 'id');
    }
}
