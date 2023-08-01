<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couple extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function State() {
        return $this->belongsTo(State::class);
    }

    public function User() {
        return $this->belongsTo(User::class);
    }
}
