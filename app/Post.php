<?php namespace App;

use illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['title', 'body', 'views'];

}