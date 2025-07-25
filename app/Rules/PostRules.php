<?php
namespace App\Rules;

use App\Rules\Common\ImageRules;

class PostRules
{
    public static function create(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['nullable', 'string'],
            'image' => ImageRules::optionalImage(),
        ];
    }
}
