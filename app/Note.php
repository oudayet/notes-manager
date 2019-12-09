<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public $table = 'note';
    protected $fillable = [
        'title', 'description', 'priority'
    ];
}
