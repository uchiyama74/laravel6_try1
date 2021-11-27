<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $dispatchesEvents = [
        'created' => 'App\Events\MyEvent1'
    ];

    protected $fillable = ['title', 'body'];

    protected $dateFormat = 'Y-m-d H:i:s';
}
