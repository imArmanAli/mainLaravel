<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PublisherWithdrawalDetail extends Model
{
    use HasFactory;
    protected $table = 'tbl_publisher_withdrawal_details';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [] ;

    protected $fillable = [
        'id', 'paymentid', 'paypal_email', 'payee_name', 'account_number', 'bank_name', 'address_line1', 'address_line2', 'city', 'state', 'country', 'swift_number', 'check_number', 'paypal_transaction_id', 'bank_transaction_id', 'comments', 'payoneer', 'btc', 'usdt' 
    ];

    public function withdrawalSummary()
    {
        return $this->belongsTo(PublisherWithdrawalSummary::class, 'paymentid');
    }

    
}
