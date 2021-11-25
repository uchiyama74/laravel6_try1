<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NameItem extends Model
{
    public function scopeHasOwner($query)
    {
        return $query->whereNotNull('owner_id');
    }
}
