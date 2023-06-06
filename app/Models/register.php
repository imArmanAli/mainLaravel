<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class register extends Model
{
    use HasFactory;
    protected $guard = 'users';
    protected $table = 'tbl_register';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;
    protected $guarded = [] ;

    protected $fillable = [
        'id', 'username', 'password', 'email', 'f_name', 'l_name', 'address', 'country', 'phone', 'reg_status', 'account_balance', 'regtime', 'pub_logintime', 'pub_loginip', 'domain', 'logo', 'skype_id', 'reg_ip', 'last_login_ip', 'last_login_time'
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function withdrawalSummaries()
    {
        return $this->hasMany(PublisherWithdrawalSummary::class, 'uid');
    }
}
