{{--@extends('admin.layout')--}}

{{--@section('content')--}}
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="h3 mb-0 page-title">مدیریت خدمات</h2>
                </div>

                <div class="col-auto">
                    <input
                        wire:model.live.debounce.500ms="search"
                        placeholder="نام خدمات.."
                        class="form-control"
                        type="text">
                </div>

                <div class="col-auto">
                    <a wire:navigate href="{{ route('admin.services.create') }}" type="button" class="btn btn-primary"><span class="fe fe-plus-circle fe-12 mr-2"></span>ایجاد خدمات جدید</a>
                </div>
            </div>

            <div class="card shadow" wire:loading>
                <div class="card-body text-center">
                    <strong>
                        در حال انجام...
                    </strong>
                </div>
            </div>

            <!-- table -->
            <div wire:loading.remove class="card shadow">
                <div class="card-body">
                    <table class="table table-borderless table-hover">
                        <thead>
                        <tr>
                            <th>نام</th>
                            <th>توضیحات</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>
                                    <p class="mb-0 text-muted">
                                        <strong>{{$service->title}}</strong>
                                    </p>

                                </td>

                                <td>
                                    <p class="mb-0 text-muted">
                                        {{$service->description}}
                                    </p>

                                </td>
                                <td class="text-muted">{{verta($service->created_at)->format('%Y, %B %d')}}</td>

                                <td>
                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a wire:navigate class="dropdown-item" href="{{ route('admin.services.edit', $service) }}">ویرایش</a>
                                        <button
                                            wire:click="delete({{ $service }})"
                                            wire:confirm="آیا مطمنی از پاک کردن؟"
                                            class="btn btn-sm dropdown-item" >حذف</button>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- .col-12 -->
        {{$services->links()}}

    </div> <!-- .row -->

</div> <!-- .container-fluid -->
{{--@endsection--}}
