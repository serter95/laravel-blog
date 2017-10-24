<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Article extends Model
{
    use Sluggable;

    protected $table="articles";
    protected $fillable=['title','content','category_id', 'user_id'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category(){
      return $this->belongsTo('App\Category');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function image(){
      return $this->hasMany('App\Image');
    }

    public function tag(){
      return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function scopeSearch($query, $title){
      return $query->where('title', 'LIKE', "%$title%");
    }
}
