<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class geocodeand extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_gecode_and';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id', 'cl_and_url', 'cl_and_url_pass', 'cl_and_url_ratio', 'cl_and_rotation_url', 'cl_and_url_rotation', 'cl_and_url_rotation_pass', 'cl_and_url_countries','cl_and_url_file','cl_and_rotation_url_file'];

    public function getAndroidUrlFileAttribute()
    {
        return $this->cl_and_url_file ? (new FileService)->path($this->cl_and_url_file) : $this->cl_and_url;
    }
    public function getAndroidRotationFileAttribute()
    {
        return $this->cl_and_rotation_url_file ? (new FileService)->path($this->cl_and_rotation_url_file) : $this->cl_and_rotation_url;
    }

}
