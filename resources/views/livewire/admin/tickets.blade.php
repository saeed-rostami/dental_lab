
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">مدیریت پیام ها</h2>
                    </div>
                    <div class="col-auto">
                        <input
                            wire:model.live.debounce.500ms="search"
                            placeholder="نام کاربر یا شماره مویایل.."
                            class="form-control"
                            type="text">
                    </div>

                    <div class="card shadow" wire:loading>
                        <div class="card-body text-center">
                            <strong>
                                در حال انجام...
                            </strong>
                        </div>
                    </div>

                </div>
                <!-- table -->
                <div wire:loading.remove class="card shadow">
                    <div class="card-body">
                        <table class="table table-borderless table-hover">
                            <thead>
                            <tr>
                                <th>نام کاربری</th>
                                <th>شماره موبایل</th>
                                <th>تاریخ </th>
                                <th>پیام ها

                                </th>

                                {{--                                <th>عملیات</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($chats as $chat)

                                <tr>
                                    <td>
                                        <p class="mb-0 text-muted"><strong>
                                                {{$chat->user->username}}
                                            </strong></p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-muted">
                                            <strong>{{$chat->user->mobile}}</strong>
                                        </p>

                                    </td>


                                    <td class="text-muted">{{verta($chat->created_at)->format('%Y, %B %d')}}

                                    </td>

                                    <td class="text-muted">
                                        <button
                                            class="btn btn-sm"
                                        >
                                            <a wire:navigate href="{{ route('admin.ticket.messages' , $chat) }}" class="text-success-light">دیدن پیام ها </a>
                                        </button>

                                        @if($chat->HasUnReadMessage > 0)
                                            <span class="badge badge-danger circle">
                                    {{ $chat->HasUnReadMessage }}
                                </span>
                                        @endif

                                    </td>

                                    {{--                                    <td>--}}

                                    {{--                                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                    {{--                                            <span class="text-muted sr-only">Action</span>--}}
                                    {{--                                        </button>--}}
                                    {{--                                        <div class="dropdown-menu dropdown-menu-right">--}}

                                    {{--                                            <a class="dropdown-item" href="#">حذف</a>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </td>--}}
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- .col-12 -->
            {{$chats->links()}}

        </div> <!-- .row -->

    </div> <!-- .container-fluid -->
