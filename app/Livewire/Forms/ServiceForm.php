<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ServiceForm extends Form
{
    #[Validate(['required', 'string'])]
    public string $title;
    #[Validate(['required', 'string'])]
    public string $description;
}
