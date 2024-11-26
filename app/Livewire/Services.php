<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Service;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class Services extends Component
{

    public function render()
    {
        $services = Service::query()->take(10)->get();
        return view('livewire.services',
            ['services' => $services]);
    }
}
