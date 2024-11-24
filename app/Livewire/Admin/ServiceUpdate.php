<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\ServiceForm;
use App\Models\Service;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ServiceUpdate extends Component
{
    public Service $service;
    public ServiceForm $form;
//    public $title;
//    public $description;
    public function mount(Service $service)
    {
        $this->service = $service;
        $this->form->title = $service->title;
        $this->form->description = $service->description;
    }

    public function update()
    {
        $this->validate();

        $this->service
            ->update([
                'title' => $this->form->title,
                'description' => $this->form->description,
            ]);

        \notyf()
            ->position('x', 'right')
            ->position('y', 'bottom')
            ->duration(5000)
            ->success('خدمات با بروزرسانی ایجاد شد' )
        ;

        $this->redirectRoute('admin.services.index', '', true, true);
    }
    public function render()
    {
        return view('livewire.admin.service-update' ,[
            'service' => $this->service
        ])
            ->extends('admin.layout')
            ->section('content');
    }
}
