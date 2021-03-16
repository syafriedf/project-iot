<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\OperatorController;

class Operator extends Model
{
    use HasFactory;

    protected $primaryKey = 'opt_id';

    protected $fillable = [
        'opt_name','division', 'username','password','roles'
    ];

    public function mch_lines()
    {
        return $this->hasMany(Line::class, 'opt_id', 'opt_id');
    }
    
}
