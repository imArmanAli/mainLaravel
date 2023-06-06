<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loginhistory extends Model
{
    use HasFactory;

    protected $table = 'tbl_login_history';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lh_id', 'reg_id', 'login_ip', 'login_time'
    ];
}
