<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Citizen extends Authenticatable
{
    use HasFactory;
    public $timestamps=false;
    public $table="citizens";
    protected $fillable = ['name','email','password','role'];
}
