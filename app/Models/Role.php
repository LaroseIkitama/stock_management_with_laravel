<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The users that belong to the role
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
