<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class KanjiName implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pattern = '/\A[\S]+　[\S]+\z/u';

        return (boolean) preg_match($pattern, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '氏名は「姓1文字以上＋全角スペース＋名1文字以上」で入力してください。';
    }
}
