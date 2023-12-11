<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publiccase extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table="publiccases";
    protected $fillable = ['title','date','short_description','description','image','status'];
}
