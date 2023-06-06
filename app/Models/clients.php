<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Statistics;
use App\Models\StatisticsDownload;


class Clients extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;
    protected $table = 'tbl_register';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'status'
    ];

    public function stat_today(){
        return $this->hasMany(Statistics::class, 'pub_id','id')->whereDate('stat_date',date('Y-m-d',strtotime('-1 day')));
        //return $this->hasMany(Statistics::class, 'pub_id','id')->whereDate('stat_date','2022-10-13');
    }

    public function stat_today_download(){
        return $this->hasMany(StatisticsDownload::class, 'pub_id','id')->whereDate('stat_date',date('Y-m-d',strtotime('-1 day')));
        //return $this->hasMany(Statistics::class, 'pub_id','id')->whereDate('stat_date','2022-10-13');
    }
}
