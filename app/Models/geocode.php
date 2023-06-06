<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class geocode extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_gecode';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id', 'cl_win_url', 'cl_win_url_pass', 'cl_win_url_rotation', 'cl_win_url_countries', 'cl_win_rotation_url', 'cl_win_url_rotation_pass', 'cl_win_url_ratio','cl_win_rotation_url_file', 'cl_win_url_file'];


    public function getWindowUrlFileAttribute()
    {
        return $this->cl_win_url_file ? (new FileService)->path($this->cl_win_url_file) : $this->cl_win_url;
    }
    public function getWindowRotationFileAttribute()
    {
        return $this->cl_win_rotation_url_file ? (new FileService)->path($this->cl_win_rotation_url_file) : $this->cl_win_rotation_url;
    }

}
