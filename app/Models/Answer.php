<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\User;
use App\VotableTrait;

class Answer extends Model
{
    use HasFactory, VotableTrait;
    protected $fillable = ['user_id','body'];

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

        static::deleted(function($answer){
            $question = $answer->question;
            $question->decrement('answers_count');

            if($answer->id == $question->best_answer_id){
                $question->best_answer_id = NULL;
                $question->save();
            }
        });
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute(){
        return $this->isBest() ? 'vote-accepted' : '';
    }

    public function getIsBestAttribute(){
        return $this->isBest();
    }

    public function isBest(){
        return $this->id == $this->question->best_answer_id;
    }

}
