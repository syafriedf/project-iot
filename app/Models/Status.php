<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\StatusController;

class Status extends Model
{
    use HasFactory;

    protected $primaryKey = 'sts_id';

    protected $fillable = [
       'sts_id', 'sts_name','sts_desc'
    ];
}
