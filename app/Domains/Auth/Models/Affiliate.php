<?php

namespace App\Domains\Auth\Models;

// use App\Domains\Auth\Models\Traits\Attribute\UserAttribute;
// use App\Domains\Auth\Models\Traits\Method\UserMethod;
// use App\Domains\Auth\Models\Traits\Relationship\UserRelationship;

// use App\Domains\Auth\Notifications\Frontend\ResetPasswordNotification;
// use App\Domains\Auth\Notifications\Frontend\VerifyEmail;
// use DarkGhostHunter\Laraguard\Contracts\TwoFactorAuthenticatable;
// use DarkGhostHunter\Laraguard\TwoFactorAuthentication;
// use Database\Factories\UserFactory;
// use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Lab404\Impersonate\Models\Impersonate;
// use Laravel\Sanctum\HasApiTokens;
// use Spatie\Permission\Traits\HasRoles;
use App\Domains\Auth\Models\Traits\Scope\AffiliateScope;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Affilate.
 */
class Affiliate extends Model
{
    use AffiliateScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'affiliate_id',
        'name',
        'latitude',
        'longitude'
    ];

}
