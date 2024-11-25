@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    </div>
                    <div class="text-start pt-1">
                        <p class="text-sm mb-0 text-capitalize">تعداد کاربران</p>
                        <h4 class="mb-0">
                            {{$users_count}}
                        </h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
{{--                <div class="card-footer p-3">--}}
{{--                    <p class="mb-0 text-start"><span class="text-success text-sm font-weight-bolder ms-1">+55% </span>من الأسبوع الماضي</p>--}}
{{--                </div>--}}
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    </div>
                    <div class="text-start pt-1">
                        <p class="text-sm mb-0 text-capitalize"> تعداد دوره ها</p>
                        <h4 class="mb-0">
                            {{$courses_count}}
                        </h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
{{--                <div class="card-footer p-3">--}}
{{--                    <p class="mb-0 text-start"><span class="text-success text-sm font-weight-bolder ms-1">+33% </span>من الأسبوع الماضي</p>--}}
{{--                </div>--}}
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    </div>
                    <div class="text-start pt-1">
                        <p class="text-sm mb-0 text-capitalize"> تعداد خدمات ها</p>
                        <h4 class="mb-0">
                            {{$services_count}}
                        </h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
{{--                <div class="card-footer p-3">--}}
{{--                    <p class="mb-0 text-start"><span class="text-success text-sm font-weight-bolder ms-1">+33% </span>من الأسبوع الماضي</p>--}}
{{--                </div>--}}
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    </div>
                    <div class="text-start pt-1">
                        <p class="text-sm mb-0 text-capitalize">  پیام جدید</p>
                        <h4 class="mb-0">
                            {{$new_messages}}
                        </h4>
                        @if($new_messages > 0)

                        <span>
                            <a wire:navigate href="{{ route('admin.ticket.index' , ['new=1']) }}">
                                بینید
                            </a>
                        </span>
                        @endif

                    </div>
                </div>
                <hr class="dark horizontal my-0">
{{--                <div class="card-footer p-3">--}}
{{--                    <p class="mb-0 text-start"><span class="text-success text-sm font-weight-bolder ms-1">+33% </span>من الأسبوع الماضي</p>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
