<?php
namespace App\Rules;

use App\Rules\Common\ImageRules;

class PostRules
{

    protected static function baseRules(): array
    {
        return [
            'title' => ['string', 'max:255'],
            'body' => ['nullable', 'string'],
            'image' => ImageRules::optionalImage(),
        ];
    }

    public static function create(): array
    {
        $rules = self::baseRules();
        $rules['title'] = array_merge(['required', 'unique:posts,title'], $rules['title']);
        return $rules;

    }
    public static function update(int $postId): array
    {
        $rules = self::baseRules();
        $rules['title'] = array_merge(['sometimes', 'required', "unique:posts,title,{$postId}"], $rules['title']);
        return $rules;
    }
}
