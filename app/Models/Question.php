<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;
    protected $fillable=[
        'question',
        'explaination'
    ];

    public function answers(){
        return $this->hasMany(Answer::class,'questions_id','id');
    }
}
