<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'fullname',
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

    public static function createUser($data)
    {
        if (self::diffUserWithEmailExists($data['email'])) {
            return redirect()->back()->withErrors([
                'email' => __('user.form_error.email_exists')
            ]);
        }
        $user = new self;
        $user->fullname = $data['fullname'];
        $user->email = $data['email'];

        $user->save();

        return redirect()->route('user.index');
    }

    public static function updateUser($data)
    {
        $user = self::findOrFail($data['id']);

        if (self::diffUserWithEmailExists($data['email'], $user->id)) {
            return redirect()->back()->withErrors([
                'email' => __('user.form_error.email_exists')
            ]);
        }
        $user->fullname = $data['fullname'];
        $user->email = $data['email'];
        $user->save();

        return redirect()->route('user.index');
    }

    private static function diffUserWithEmailExists(string $email, int $id = null)
    {
        $user = self::where('email', $email)->get()->first();
        return $id ? $user && $user->id !== $id : !is_null($user);
    }

    public static function getUserByEmail($email)
    {
        return self::where('email', $email)->first();
    }
}
