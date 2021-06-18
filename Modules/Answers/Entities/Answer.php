<?php

namespace Modules\Answers\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Questions\Entities\Question;
use App\Models\User;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_id',
        'body',
        'votes_count',
        'created_at',
        'updated_at'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Answers\Database\factories\AnswerFactory::new();
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }
}
