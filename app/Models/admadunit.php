<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admadunit extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'xyz_adm_adunit';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'pubid', 'blockid', 'name', 'at_color', 'ad_color', 'au_color', 'ab_color', 'ac_color', 'abr_color', 'abr_type', 'status', 'credittext', 'display_type', 'aid', 'notified', 'language', 'player_size', 'linear', 'non_linear_text', 'non_linear_banner', 'video_type', 'default_text_ads', 'default_banner_ads', 'default_textimage_ads', 'default_interstitial_ads', 'default_skin_ads', 'default_pop_ads', 'default_cpv_ads', 'default_html_ads', 'default_ad_display_time', 'pop_up_support', 'pop_under_support', 'pop_tab_support', 'sid', 'sticky_support', 'sticky_position', 'sticky_close_position', 'button_label', 'button_font_weight', 'button_font_size', 'button_font_color', 'button_color', 'adcode_type', 'default_link_ads', 'platform'
    ];
}
