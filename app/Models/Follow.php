<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'follow_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function follow()
    {
        return $this->belongsTo(User::class, 'follow_id');
    }
}
