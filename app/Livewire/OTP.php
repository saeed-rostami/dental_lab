<?php

namespace App\Livewire;

use App\Livewire\Forms\OTPForm;
use App\Rules\OTPRule;
use App\Traits\OTPTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class OTP extends Component
{
    use OTPTrait;

//    #[Validate(['required', 'exists:otps,otp'])]
//    #[Reactive]

    #[Validate(['required'])]
    public $num_1;
    #[Validate(['required'])]
    public $num_2;
    #[Validate(['required'])]
    public $num_3;
    #[Validate(['required'])]
    public $num_4;
//
    public $code = '';
    public $mobile;

    public function authenticate()
    {
        $num_1 = $this->num_4;
        $num_2 = $this->num_3;
        $num_3 = $this->num_2;
        $num_4 = $this->num_1;

        $code = $num_1 . $num_2 . $num_3 . $num_4;
        $this->code = $code;

        $validated = Validator::make(
        // Data to validate...
            ['code' => $this->code],

            // Validation rules to apply...
            ['code' => ['required', 'exists:otps,otp', new OTPRule($this->mobile)]],
        )->validate();
//        dd($validated);

//        $this->reset('code');
        $this->handleAuthenticate($this->mobile, $code);

        if (Auth::check()) {
            if (Auth::user()->username) {
                \notyf()
                    ->position('x', 'center')
                    ->position('y', 'bottom')
                    ->duration(5000)
                    ->success('خوش آمدید !' )
                ;
                $this->redirectRoute('home',
                    '',
                    true,
                    true,
                );
            } else {
                $this->redirectRoute('update.username',
                    '',
                    true,
                    true,
                );
            }
        }

    }

    public function resendOtp()
    {
        $otp = $this->handleOTPRequest($this->mobile);
        $this->redirectRoute('otp',
            ['mobile' => $this->mobile]
            , true,
            true
        );
//        $this->dispatch('resend-otp' , ['otp' => $otp]);
    }

    public function render()
    {
        $otp = $this->getByMobile($this->mobile);
        return view('livewire.o-t-p', ['otp' => $otp]);
    }
}
