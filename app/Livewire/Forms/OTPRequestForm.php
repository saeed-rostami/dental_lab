<?php

namespace App\Livewire\Forms;

use App\Rules\MobileRule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class OTPRequestForm extends Form
{
    #[Validate(['required' , new MobileRule()])]
    public $mobile;
}
