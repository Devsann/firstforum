<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Question extends Model
{
  protected $fillable = [
      'title', 'queSlug', 'body','category_id','user_id'
  ];

    protected static function boot()
    {
      parent::boot();

      static::creating(function($question){
        $question->queSlug = str_slug($question->title);
      });
    }

  // protected $guarded=[ ];

    public function getRouteKeyName()
    {
      return 'queSlug';
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function replies()
    {
      return $this->hasMany(Reply::class);
    }

    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function getPathAttribute()
    {
      return "/question/$this->queSlug";
    }
}
