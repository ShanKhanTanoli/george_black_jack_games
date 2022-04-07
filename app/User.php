<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Subscription;
use Laravel\Cashier\Billable;
use BeyondCode\Vouchers\Traits\CanRedeemVouchers;
use BeyondCode\Vouchers\Models\Voucher;
use BeyondCode\Vouchers\Traits\HasVouchers;

class User extends Authenticatable
{
    use SoftDeletes,Notifiable,Billable,CanRedeemVouchers,HasVouchers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname','email', 'organization', 'phone','address1',
        'address2','country','city','state','postalcode', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class)->withPivot('redeemed_at');
    }
}
