
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="h3 mb-0 page-title">مدیریت نظر ها</h2>
                </div>
{{--                <div class="col-auto">--}}
{{--                    <input--}}
{{--                        wire:model.live.debounce.500ms="search"--}}
{{--                        placeholder="نام کاربر یا شماره مویایل.."--}}
{{--                        class="form-control"--}}
{{--                        type="text">--}}
{{--                </div>--}}

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
                            <th>دوره</th>
                            <th>تاریخ </th>
                            <th>پیام ها

                            </th>

                            {{--                                <th>عملیات</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)

                            <tr>
                                <td>
                                    <p class="mb-0 text-muted"><strong>
                                            {{$comment->user->username}}
                                        </strong></p>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted">
                                        <strong>{{$comment->user->mobile}}</strong>
                                    </p>

                                </td>

                                <td>
                                    <p class="mb-0 text-muted">
                                        <strong>{{\Illuminate\Support\Str::limit($comment->course->title, 25)}}</strong>
                                    </p>

                                </td>


                                <td class="text-muted">{{verta($comment->created_at)->format('%Y, %B %d')}}

                                </td>

                                <td class="text-muted">
                                    <button
                                        class="btn btn-sm"
                                    >
                                        <a wire:navigate href="{{ route('admin.comment.reply' , $comment) }}" class="text-{{$comment->reply ? 'success' : 'info'}}">


                                            @if($comment->reply)
                                                پاسخ ( پاسخ داده شده)
                                            @else
                                                پاسخ
                                            @endif


                                        </a>
                                    </button>

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
        {{$comments->links()}}

    </div> <!-- .row -->

</div> <!-- .container-fluid -->
