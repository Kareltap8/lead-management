<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['name', 'surname', 'phone', 'email', 'message', 'status_id'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
