<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NameItem extends Model
{
    protected $appends = ['owner_name'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function getOwnerNameAttribute()
    {
        return  $this->user->name;
    }

    public function scopeHasOwner($query)
    {
        return $query->whereNotNull('owner_id');
    }
}
