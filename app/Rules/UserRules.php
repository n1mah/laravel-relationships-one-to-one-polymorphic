<?php
namespace App\Rules;

use App\Rules\Common\ImageRules;

class UserRules
{
    public static function create(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ImageRules::optionalImage(),
        ];
    }
}
