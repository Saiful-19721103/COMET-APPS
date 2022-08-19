<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Get role Users
    public function users()
    {
        return $this->hasmany(Admin::class, 'role_id', 'id');
    }
}