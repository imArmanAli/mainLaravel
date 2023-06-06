<?php

namespace App\Models;

use App\Models\clients;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;
    protected $table = 'finance_log_tbl';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'publisher_id', 'payment_amount', 'payment_status'
    ];

    public function publisher(){
        return $this->hasOne(Clients::class,'id','publisher_id');

    }
}
