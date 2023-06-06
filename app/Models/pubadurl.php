<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pubadurl extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_copy_link_pbl';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'cl_pasword', 'cl_win_url', 'cl_and_url', 'cl_mac_url', 'cl_win_10', 'cl_win_11', 'cl_date_time', 'pid'
    ];

    public function getUserMacFileAttribute()
    {
        return $this->cl_mac_url_file ? (new FileService)->path($this->cl_mac_url_file) : $this->cl_mac_url;
    }
    public function getUserAndFileAttribute()
    {
        return $this->cl_and_url_file ? (new FileService)->path($this->cl_and_url_file) : $this->cl_and_url;
    }
    public function getUserWindowElevenFileAttribute()
    {
        return $this->cl_win_11_file ? (new FileService)->path($this->cl_win_11_file) : $this->cl_win_11;
    }
    public function getUserWindowTenFileAttribute()
    {
        return $this->cl_win_10_file ? (new FileService)->path($this->cl_win_10_file) : $this->cl_win_10;
    }
    public function getUserWindowXpFileAttribute()
    {
        return $this->cl_win_url_file ? (new FileService)->path($this->cl_win_url_file) : $this->cl_win_url;
    }
}
