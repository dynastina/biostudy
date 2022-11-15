<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
  static $rules = [
    'page' => 'required',
    'content_type' => 'required',
    'title' => 'required',
  ];

  protected $fillable = ['page', 'content_type', 'title', 'subtitle', 'url', 'body', 'file', 'file_dir', 'extra', 'created_by', 'updated_by'];

  public function contentFiles()
  {
    return $this->hasMany('App\Models\ContentFile', 'content_id', 'id');
  }

  public function user()
  {
      return $this->belongsTo('App\Models\User', 'created_by', 'id');
  }
  
  public function userUpdate()
  {
      return $this->belongsTo('App\Models\User', 'updated_by', 'id');
  }
}
