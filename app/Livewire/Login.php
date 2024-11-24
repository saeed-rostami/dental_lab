<?php

namespace App\Livewire;

use App\Livewire\Forms\OTPRequestForm;
use App\Traits\OTPTrait;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    use OTPTrait;

    #[Layout('layout')]
    public OTPRequestForm $form;

    public function render()
    {
        return view('livewire.login');
    }


    public function otpRequest()
    {

        $this->validate();

        $otp = $this->handleOTPRequest($this->form->mobile);

        $this->redirectRoute('otp',
            ['mobile' => $this->form->mobile]
            , true,
            true
        );
    }
}
