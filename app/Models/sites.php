<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sites extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_sites';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'site_id', 'pid', 'catid', 'url', 'status', 'keywords', 'title', 'description', 'logo', 'time', 'alexa_rank', 'google_rank', 'twitter_url', 'twitter_count', 'facebook_url', 'facebook_count', 'protocol', 'thumbshot', 'marketplace_display'
    ];
}
