<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model{
    protected $fillable = ['name','email','address','profile_picture','contact_number'];

}
