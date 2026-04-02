<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnonymousMessage extends Model
{
    protected $table = 'anonymous_messages';
    protected $fillable = ['user_id', 'message', 'is_anonymous'];
}
