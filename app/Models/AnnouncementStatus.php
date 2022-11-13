<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementStatus extends Model
{
    use HasFactory;

    protected $fillable = ['announcement_id','user_id','status'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function announcement()
    {
        return $this->belongsTo('App\Models\Announcement', 'announcement_id', 'id');
    }

}
