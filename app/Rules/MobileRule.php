<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MobileRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $re = '/^(989|09|9|0989)[0-9]{9}$/';
        if (! preg_match( $re , $value , $matches , PREG_OFFSET_CAPTURE , 0 ) or !is_numeric( $value ) )
        {
            $fail('شماره همراه را صحیح وارد کنید');

        }
    }
}
