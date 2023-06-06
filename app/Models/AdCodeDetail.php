<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AdCodeDetail extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'admin';
    protected $table = 'tbl_adcode_detail';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pub_id','site_id','adcode_id','adcode_link','link_code','link_type','tmp_type','banner_type','banner_image','template_code','interval_time','isUnique','custom_banner','banner_width','banner_height','banner_text','isCaptcha'
    ];

}
