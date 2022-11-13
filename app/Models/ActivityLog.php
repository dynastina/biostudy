<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ActivityLog
 *
 * @property $id
 * @property $name
 * @property $icon
 * @property $created_by
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ActivityLog extends Model
{
    
    static $rules = [
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','icon','created_by'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }


}
