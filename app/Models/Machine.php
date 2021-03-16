<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\MachineController;

class Machine extends Model
{
    use HasFactory;

    protected $primaryKey = 'mch_id';

    protected $fillable = [
        'mch_ip_address','mch_name','mch_desc'
    ];
}
