<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\Question;
use App\Models\Answer;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function getUrlAttribute(){
        return '#';
    }

    public function getAvatarAttribute(){
        $email = $this->email;
        $size = 32;
        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?s=" . $size;
    }

    public function favorites(){
        return $this->belongsToMany(Question::class,'favorites')->withTimestamps();
    }

    public function voteQuestions(){
        return $this->morphedByMany(Question::class,'votable');
    }

    public function voteAnswers(){
        return $this->morphedByMany(Answer::class,'votable');
    }

    public function voteQuestion(Question $question, $vote){
        $voteQuestions = $this->voteQuestions();

        $this->_vote($voteQuestions,$question,$vote);
    }

    public function voteAnswer(Answer $answer, $vote){
        $voteAnswers = $this->voteAnswers();

        $this->_vote($voteAnswers,$answer,$vote);
    }

    private function _vote($relationship,$model,$vote){

        if($relationship->where('votable_id',$model->id)->exists()){
            $relationship->updateExistingPivot($model,['vote'=>$vote]);
        }
        else{
            $relationship->attach($model,['vote'=>$vote]);
        }

        $model->load('votes');

        $votesUp = (int) $model->upVotes()->sum('vote');
        $votesDown = (int) $model->downVotes()->sum('vote');

        $model->votes_count = $votesUp + $votesDown;
        $model->save();
    }
}
