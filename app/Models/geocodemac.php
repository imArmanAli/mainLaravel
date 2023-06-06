<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class geocodemac extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_gecode_mac';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id', 'cl_mac_url', 'cl_mac_url_pass', 'cl_mac_url_ratio', 'cl_mac_rotation_url', 'cl_mac_url_rotation', 'cl_mac_url_rotation_pass', 'cl_mac_url_countries','cl_mac_url_file','cl_mac_rotation_url_file'];



    public function getMacUrlFileAttribute()
    {
        return $this->cl_mac_url_file ? (new FileService)->path($this->cl_mac_url_file) : $this->cl_mac_url;
    }
    public function getMacRotationFileAttribute()
    {
        return $this->cl_mac_rotation_url_file ? (new FileService)->path($this->cl_mac_rotation_url_file) : $this->cl_mac_rotation_url;
    }

}
