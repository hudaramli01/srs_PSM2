<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $table = 'solution';
    protected $fillable = [
        'id',
        'solutionName',
        'solutionDesc',
    ];
}

