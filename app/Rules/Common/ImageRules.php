<?php
namespace App\Rules\Common;

class ImageRules
{
    public static function optionalImage(): array
    {
        return ['nullable', 'image', 'max:2048'];
    }

    public static function requiredImage(): array
    {
        return ['required', 'image', 'max:2048'];
    }
}
