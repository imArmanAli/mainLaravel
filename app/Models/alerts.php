<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alerts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_alert_msg';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'am_id', 'am_title', 'am_description', 'am_type', 'am_status', 'am_date'
    ];
}
