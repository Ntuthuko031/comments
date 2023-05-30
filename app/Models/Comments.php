<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Sanctum\HasApiTokens;


class Comments extends Model {

    use HasFactory, HasApiTokens;

    protected $fillable = [
        'id',
        'comment',
        'postId',
        'verification',
        'userId'];

    public function replys(){
        return $this->belongsToMany(Reply::class); 
    }

}
