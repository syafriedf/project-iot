<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Downtime extends Model
{
    use HasFactory;

    protected $primaryKey = 'dwn_id';
    public $timestamps = false;

    protected $fillable = [
        'sts_id','date_start','date_end'
    ];
}
