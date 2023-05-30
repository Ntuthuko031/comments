<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;


class Reply extends Model {

    use HasFactory, HasApiTokens;

    protected $fillable = [
        'id',
        'reply',
        'commentId',
        'verification',
        'userId'];

}
