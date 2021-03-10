<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workorder extends Model
{
    use HasFactory;

    protected $primaryKey = 'wop_id';

    protected $fillable = [
       'wop_id', 'wop_target'
    ];
}
