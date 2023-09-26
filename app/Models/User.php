<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function setPasswordAttribute($value){ 
        $this->attributes['password'] = bcrypt($value); 
    } 
    //RELACION  UNO A MUCHOS
    public function comentarios(){
        return $this->hasMany('App\Models\Comentarios');
    }
    public function recipes(){
        return $this->hasMany('App\Models\Recipe');
    }
    public function products(){
        return $this->hasMany('App\Models\Product');
    }

    //Para Adminlte
    public function adminlte_image(){
        return 'https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/media/image/2020/06/dragon-ball-super-nueva-sh-figuarts-jiren-full-power-1956939.jpg?tf=3840x';
    }
    public function adminlte_desc(){
        return "Administrador";
    }
    public function adminlte_profile_url(){
        return 'profile/username';
    }
}
