<?php

namespace App\Models;

use App\Jobs\ResetPasswordJob;
use Laravel\Jetstream\HasTeams;
use App\Models\Products\Product;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword as ResetPasswordNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'provider',
        'provider_id',
'        provider_profile_pic',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'is_admin',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'bool',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * queue verify email and reset password email
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\EmailVerify);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }



    // user's bookmarked products
    public function bookmarks()
    {
        return $this->belongsToMany(Product::class, 'bookmarks','user_id','product_id')->withTimestamps(); //pivot table, that model id,
    }

    // user's favorites products
    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'favorites','user_id','product_id')->withTimestamps(); //pivot table, that model id,
    }

    // user's downloaded products
    public function downloads()
    {
        return $this->belongsToMany(Product::class, 'downloads','user_id','product_id')->withTimestamps(); //pivot table, that model id,
    }


}
