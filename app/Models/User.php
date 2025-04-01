<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;

class User extends Authenticatable implements FilamentUser, HasMedia
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasRoles;
    use HasSuperAdmin;
    use InteractsWithMedia;
    use Notifiable;
    use HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $translatable = [
'title','bio'    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'team_member' => 'boolean',
                        'experience' => 'json',
            'experience_area' => 'json',
            'languages' => 'json',

        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->team_member;
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public static function booted()
    {
        static::creating(function (self $model) {
            $model->password = $model->password ?: bcrypt(str()->random(32));
        });

        static::saving(function (self $user) {
            $user->slug = str()->slug($user->name);
            if (! $user->password) {
                $user->password = bcrypt(str()->random());
            }
        });

    }

    public function getWpUrlAttribute()
    {
        return 'https://api.whatsapp.com/send/?phone='.$this->whatsapp;
    }

    public function setExperienceAreaAttribute($value)
    {
        $this->attributes['experience_area'] = json_encode(explode(',', $value));
    }
    public function setExperienceAttribute($value)
    {
        $this->attributes['experience'] = json_encode(explode(',', $value));
    }

    public function setLanguagesAttribute($value)
    {
        $this->attributes['languages'] = json_encode(explode(',', $value));
    }

    public function getShareLinksAttribute()
    {
        return [
            'sms' => sprintf(config('keys.sms_share_link'), $this->title.' '.route('frontend.user.show', $this)),
            'email' => sprintf(config('keys.email_share_link'), $this->title.' '.route('frontend.user.show', $this)),
            'wp' => sprintf(config('keys.wp_share_link'), $this->title.' '.route('frontend.user.show', $this)),
            'x' => sprintf(config('keys.x_share_link'), route('frontend.user.show', $this)),
            'fb' => sprintf(config('keys.fb_share_link'), route('frontend.user.show', $this)),
        ];
    }
}
