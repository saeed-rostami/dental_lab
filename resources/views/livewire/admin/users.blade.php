{{--@extends('admin.layout')--}}

{{--@section('content')--}}
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="h3 mb-0 page-title">مدیریت کاربران</h2>
                </div>
                <div class="col-auto">
                    <input
                        wire:model.live.debounce.500ms="search"
                        placeholder="نام کاربری یا شماره موبایل"
                        class="form-control"
                        type="text">
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
            <div class="card shadow" wire:loading.remove>
                <div class="card-body">
                    <table class="table table-borderless table-hover">
                        <thead>
                        <tr>
                            <th>نام کاربری</th>
                            <th>شماره موبایل</th>
                            <th>تایید شماره موبایل</th>
                            <th>تاریخ عضویت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <p class="mb-0 text-muted"><strong>
                                            {{$user->username}}
                                        </strong></p>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted">
                                        <strong>{{$user->mobile}}</strong>
                                    </p>

                                </td>
                                <td>
                                        <span class="badge badge-{{$user->mobile_verified_at ? 'success' : 'danger'}}">
                                            {{$user->mobile_verified_at ? 'تایید شده' : 'تایید نشده'}}
                                        </span>
                                </td>
                                <td class="text-muted">{{verta($user->created_at)->format('%Y, %B %d')}}</td>
                                <td>
                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">ویرایش</a>
                                        <a class="dropdown-item" href="#">حذف</a>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- .col-12 -->
        {{$users->links()}}

    </div> <!-- .row -->

</div> <!-- .container-fluid -->
{{--@endsection--}}
