<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 18:30
 */

namespace App\Core\Utils;

use App\Models\Entities\Core\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtUtil
{
    public static function generateTokenFromUser(User $user): string
    {
        return JWTAuth::fromUser($user);
    }
}
