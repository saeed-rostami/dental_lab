<?php

namespace App\Livewire\Admin;

use App\Models\Course;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Services extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public string $search = '';


    public function delete($service_id)
    {
        $service = Service::query()->find($service_id['id']);
        $service->delete();
        \notyf()
            ->position('x', 'right')
            ->position('y', 'bottom')
            ->duration(5000)
            ->success('خدمات با موفقیت حذف شد' )
        ;
    }


    public function render()
    {
        $services = Service::query()
            ->when($this->search !== '', fn(Builder $query) => $query->where('title', 'like', '%'. $this->search .'%'))
            ->latest()
            ->paginate(25);
        return view('livewire.admin.services',
        ['services' => $services])
            ->extends('admin.layout')
            ->section('content');
    }
}
