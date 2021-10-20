<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;

    protected $table = 'user_activity';

    protected $fillable = [
        'description',
        'user_id',
        'ip_address',
        'user_agent',
        'created_at',
        'updated_at',
    ];
}
