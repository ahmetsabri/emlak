<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Post extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasTranslations;

    public $translatable = ['title', 'body'];

    public static function booted()
    {
        static::saving(function (self $post) {
            $post->slug = str()->slug($post->title);
        });
    }

    public function getShareLinksAttribute()
    {
        return [
            'sms' => sprintf(config('keys.sms_share_link'), $this->title.' '.route('frontend.post.show', $this)),
            'email' => sprintf(config('keys.email_share_link'), $this->title.' '.route('frontend.post.show', $this)),
            'wp' => sprintf(config('keys.wp_share_link'), $this->title.' '.route('frontend.post.show', $this)),
            'x' => sprintf(config('keys.x_share_link'), route('frontend.post.show', $this)),
            'fb' => sprintf(config('keys.fb_share_link'), route('frontend.post.show', $this)),
            'li' => sprintf(config('keys.li_share_link'), 'http://google.com'),
        ];
    }
}
