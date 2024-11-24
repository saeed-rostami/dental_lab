<?php

namespace App\Rules;

use App\Models\OTP as OTPAuthModel;
use App\Traits\OTPTrait;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class OTPRule implements ValidationRule
{
    use OTPTrait;
    public function __construct(public $mobile)
    {

    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $otpModel = $this->getByMobile($this->mobile);

       $bool = $otpModel->otp == $value && $otpModel->otp_expire_at > date('Y-m-d H:i:s', strtotime("now"));
       if (!$bool) {
           $fail('کد صحیح نیست یا منقضی شده');
       }
    }
}
