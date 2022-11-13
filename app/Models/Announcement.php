<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Announcement
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 * @property $created_by
 * @property $updated_by
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Announcement extends Model
{
    
    static $rules = [
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','created_by','updated_by'];



    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
  
    public function userUpdate()
    {
        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }

    public function announcementStatus()
    {
        return $this->hasMany('App\Models\AnnouncementStatus', 'id', 'announcement_id');
    }

}
