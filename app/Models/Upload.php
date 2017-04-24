<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    public function author() {
        return $this->belongsTo(User::class);
    }
}
