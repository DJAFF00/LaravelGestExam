<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    protected $table = 'examens';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Codexam',
        'Libellexam',
    ];

    use HasFactory;
}