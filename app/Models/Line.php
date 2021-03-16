<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    use HasFactory;

    protected $table = 'mch_lines';


    public function opt_line(){
        return $this->belongsTo(Operator::class, 'opt_id', 'opt_id');
    }

    public function mch_line(){
        return $this->hasOne(Machine::class, 'mch_id', 'mch_id');
    }

    public function wop_line(){
        return $this->belongsTo(Workorder::class, 'wop_id', 'wop_id');
    }

    public function sts_line(){
        return $this->belongsTo(Status::class, 'sts_id', 'sts_id');
    }

    public function dwn_line(){
        return $this->hasMany(Downtime::class, 'id_line', 'id_line');
    }
}
