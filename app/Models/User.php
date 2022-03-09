<?php

namespace App\Models;

use App\Http\Constants\BaseConstants;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    #[ArrayShape(['name' => "string", 'email' => "string[]", 'bio' => "string", 'status' => "array"])] public static function getUpdateValidationRules(): array
    {
        return [
            'name' => 'required|string',
            'email' => [
                'required',
                'string',
                'email'
            ],
            'bio' => 'nullable|string',
            'status' => [
                Rule::in(BaseConstants::STATUS),
            ]
        ];
    }
}
