<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class landing extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_ads';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ad_id', 'ad_name', 'ad_url', 'ad_status', 'ad_keyword', 'ad_created_date'
    ];
}
