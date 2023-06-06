<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CappingPopLink extends Model
{
    use HasFactory;
    protected $table = 'tbl_capping_poplink';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'pub_id',
        'site_id',
        'adcode_id',
        'country',
        'states',
        'os',
        'link1',
        'link2',
        'link3',
        'link4',
        'link5'
    ];
}
