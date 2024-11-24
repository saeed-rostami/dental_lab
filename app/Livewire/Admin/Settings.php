<?php

namespace App\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class Settings extends Component
{
    public string $telegram;
    public string $whatsapp;
    public string $instagram;
    public string $phone;

    public string $mobile;

    public string $address;

    public string $about;

    public string $email;

    public string $logo;

//    public Setting $setting;

    public function mount()
    {
        $setting = Setting::query()
            ->first();

        if (!is_null($setting)) {
            $this->telegram = $setting?->telegram;
            $this->whatsapp = $setting?->whatsapp;
            $this->instagram = $setting?->instagram;
            $this->phone = $setting?->phone;
            $this->mobile = $setting?->mobile;
            $this->address = $setting?->address;
            $this->about = $setting?->about;
            $this->email = $setting?->email;
//        $this->logo = $setting->logo;
        }
    }

    public function update()
    {
        $this->validate([
            'telegram' => ['string' , 'max:32'],
            'whatsapp' => ['string' , 'max:32'],
            'instagram' => ['string' , 'max:32'],
            'phone' => ['string' , 'max:11'],
            'mobile' => ['string' , 'max:11'],
            'about' => ['string' , 'max:5000'],
            'address' => ['string' , 'max:500'],
            'email' => ['string' , 'email'],
        ]);

        $setting = Setting::query()
            ->first();

        if ($setting) {
            $setting
                ->update(
                    [
                        'telegram' => $this->telegram,
                        'whatsapp' => $this->whatsapp,
                        'instagram' => $this->instagram,
                        'phone' => $this->phone,
                        'mobile' => $this->mobile,
                        'about' => $this->about,
                        'address' => $this->address,
                        'email' => $this->email,
                    ]);
        }
        else {
            Setting::query()
                ->create(
                    [
                        'telegram' => $this->telegram,
                        'whatsapp' => $this->whatsapp,
                        'instagram' => $this->instagram,
                        'phone' => $this->phone,
                        'mobile' => $this->mobile,
                        'about' => $this->about,
                        'address' => $this->address,
                        'email' => $this->email,

                    ]);
        }

        \notyf()
            ->position('x', 'right')
            ->position('y', 'bottom')
            ->duration(5000)
            ->success('تنظیمات با موفقیت به روز شدند' )
        ;

    }

    public function render()
    {
//        $setting = Setting::query()
//            ->first();
        return view('livewire.admin.settings' ,
        ['setting' => $setting ?? []]
        )
            ->extends('admin.layout')
            ->section('content');
    }
}
