<?php

namespace App\Livewire\Admin;

use App\Models\Service;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ServiceCreate extends Component
{
    #[Validate(['required', 'string'])]
    public $title;
    #[Validate(['required', 'string'])]
    public $description;


//    public function mount($service)
//    {
//        $this->service = $service;
//    }

    public function store()
    {
        $this->validate();

        Service::query()
            ->create([
                'title' => $this->title,
                'description' => $this->description,
            ]);

        \notyf()
            ->position('x', 'right')
            ->position('y', 'bottom')
            ->duration(5000)
            ->success('خدمات جدید با موفقیت ایجاد شد' )
        ;

        $this->redirectRoute('admin.services.index' , '' , true, true);
    }

    public function render()
    {
        return view('livewire.admin.service-create')
            ->extends('admin.layout')
            ->section('content');
    }
}
