<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\OperatorController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Operator extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'opt_id';

    protected $fillable = [
        'opt_name','division', 'username','password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function mch_lines()
    {
        return $this->hasMany(Line::class, 'opt_id', 'opt_id');
    }
    
}
