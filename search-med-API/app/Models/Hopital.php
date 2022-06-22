<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Hopital extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "hopitals";
    protected $guarded = [];
}
