<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Article  extends Model

{
    protected $table="articles";

    protected $fillable=['title','content','category_id','user_id'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function images(){
        return $this->hasMany('App\Image');
    }
    public function users(){
        return $this->belongsTo('App\User');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function scopeSearch($query, $title){

        return $query->where('title','LIKE',"%$title%");
    }

    /**
     * Return the sluggable configuration array for this model.
     *
      @return array
     */

}
