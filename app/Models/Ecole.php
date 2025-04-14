<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    protected $table = 'ecoles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Sigle',
        'Designation',
    ];

    use HasFactory;
}