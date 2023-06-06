<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_balance';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'balnce_id', 'reg_id', 'balance_amount', 'is_debit', 'balance_date', 'balance_desc', 'daily_click'
    ];
}
