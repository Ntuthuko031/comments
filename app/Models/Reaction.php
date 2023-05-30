<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Sanctum\HasApiTokens;


class Reaction extends Model {

    use HasFactory, HasApiTokens;

    protected $fillable = [
        'id',
        'reactionId',
        'isComment',
        'userId'];

    public function reactions(){
        return $this->belongsToMany(Reactions::class); 
    }

}
