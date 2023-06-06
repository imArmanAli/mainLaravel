<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PublisherWithdrawalSummary extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_publisher_withdrawal_summary';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [] ;

    protected $fillable = [
        'id', 'uid', 'payment_mode', 'amount', 'request_time', 'process_time', 'status', 'withdrawal_type', 'fee', 'tax', 'req_amount', 'tax_details'
    ];

    public function register()
    {
        return $this->belongsTo(Register::class, 'uid');
    }

    public function withdrawalDetails()
    {
        return $this->hasMany(PublisherWithdrawalDetail::class, 'paymentid');
    }
}
