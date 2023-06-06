<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Statistics extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'admin';
    protected $table = 'tbl_statistics';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_ip', 'stat_date', 'pub_id', 'domain_id', 'stat_os', 'stat_status', 'site_id', 'browser', 'country'
    ];

    public function clients(){
        return $this->belongsTo(Clients::class);
    }

}
