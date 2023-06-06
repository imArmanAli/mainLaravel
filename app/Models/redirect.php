<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redirect extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_redirect_domain';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rd_id', 'rd_name', 'rd_url', 'rd_status', 'rd_date'
    ];
}
