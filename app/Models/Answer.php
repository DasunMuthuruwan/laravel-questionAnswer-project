<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\User;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['body'];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    //elouqent event
    public static function boot(){
        parent::boot();

        static::created(function($answer){
            $answer->question->increment('answers_count');
        });
    }

}
