<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NameItem extends Model
{
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function scopeHasOwner($query)
    {
        return $query->whereNotNull('owner_id');
    }
}
