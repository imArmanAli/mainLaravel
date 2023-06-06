<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class adurlamz extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_copy_link_amz';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cl_id', 'cl_pasword', 'cl_win_url', 'cl_date_time', 'cl_win_10', 'cl_win_11', 'percentage', 'country', 'other_percentage'
    ];

}
