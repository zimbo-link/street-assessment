<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomeOwners extends Model
{
    use HasFactory;

    protected $table = 'homeowners';
    
    protected $fillable = [
        "title",
        "firstname",
        "initial",
        "lastname",
    ];
}