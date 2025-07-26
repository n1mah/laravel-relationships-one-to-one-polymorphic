<?php
namespace App\Rules;

use App\Rules\Common\ImageRules;

class UserRules
{
    protected static function baseRules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255'],
            'password' => ['string', 'min:8', 'confirmed'],
            'image' => ImageRules::optionalImage(),
        ];
    }
    public static function create(): array
    {
        $rules = self::baseRules();
        $rules['name'] = array_merge(['required'], $rules['name']);
        $rules['email'] = array_merge(['required', 'unique:users,email'], $rules['email']);
        $rules['password'] = array_merge(['required'], $rules['password']);
        return $rules;
    }
}
