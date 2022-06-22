<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pharmacie extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "pharmacies";
    protected $guarded = [];
}
