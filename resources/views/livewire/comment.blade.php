<div>
    <div class="comments-area">
        <h4>{{$course->usersCounts()}} نظر</h4>
        @foreach($comments as $comment)
            @if($comment->user->is_admin != 1)
            <div class="comment-list">
                <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                        <div class="thumb">
                            <img src="{{ asset('pics/user.jpg') }}" alt="">
                        </div>
                        <div class="desc">
                            <p class="comment">
                          {{$comment->comment}}
                            </p>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <h5>
                                        <a href="#">{{$comment->user->username}}</a>
                                    </h5>
                                    <p class="date">
                                        {{verta($comment->created_at)
->formatDifference()}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        @if($comment->reply)
                <div class="d-flex border border-dark mr-5 mb-5">
                   <div class="thumb">
                       <img src="{{asset('pics/admin.jpg')}}"  alt="">
                   </div>
                    <div class="flex-grow-1 ms-3">
                        <div class="mb-1"><a href="#" class="fw-bold link-body-emphasis pe-1">پاسخ ادمین</a> <span class="text-body-secondary text-nowrap">
                                 {{verta($comment->reply->created_at)->formatDifference()}}
                            </span></div>
                        <div class="mb-2 text-success font-weight-bold">
                            {{$comment->reply->comment}}
                        </div>

                    </div>
                </div>
        @endif


        @endforeach
    </div>
    <div class="comment-form">
        <h4>پیام بگذارید</h4>
        <form class="form-contact comment-form" wire:submit.prevent="save" id="commentForm">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <textarea
                            wire:model="comment"
                            class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="پیام ..."></textarea>
                    </div>
                </div>
            </div>
            @error('comment')
            <div>
                <span class="text-danger">{{$message}}</span>
            </div>

            @enderror
            <div class="form-group">
                <button type="submit" class="button button-contactForm">ارسال</button>
            </div>
        </form>
    </div>
</div>
