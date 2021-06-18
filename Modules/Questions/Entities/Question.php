<?php

namespace Modules\Questions\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Support\Str;
use Modules\Answers\Entities\Answer;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'views',
        'answers',
        'votes',
        'best_answer_id',
        'user_id',
        'image',
        'created_by',
        'updated_by',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
    //for slug automatically
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute()
    {
        return route("ask.show", $this->slug);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        if($this->answers > 0){
            if ($this->best_answer_id) {
                return "answered-accapted";
            }
            return "answered";
        }
        return "unanswered";
    }

    protected static function newFactory()
    {
        return \Modules\Questions\Database\factories\QuestionFactory::new();
    }

    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

    //for answer
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
