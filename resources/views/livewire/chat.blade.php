
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/chat-styles.css')}}">
@endpush
<section class="section-padding priceTable-bg d-flex justify-content-center">
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app">
                    <div class="chat">

                        @if($messages)
                            <div class="chat-history">
                                <ul class="m-b-0">
                                    @foreach($messages as $message)
                                        <li class="clearfix">
                                            <div

                                                @class([
$message->isAdmin() ? "text-right" : "text-left",
"message-data"
])
                                            >
                                                <span class="message-data-time">{{ verta($message->created_at)->formatDifference() }}</span>

                                                <span>
                                                    {{ $message->isAdmin() ? "مدیریت" : "" }}
                                                </span>
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">

                                            </div>
                                            <div
                                                @class([
    $message->isAdmin() ? "float-right admin_message_color" : "float-left other-message",
    "message "

])
                                            >
                                                {{$message->message}}

                                            </div>
                                            <svg
                                                @class([
$message->isAdmin() ? "d-none " : "float-left ",
$message->is_read ? 'is_read' : 'not_read',
"mt-5",
])
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                                            </svg>

                                        </li>


                                    @endforeach
                                </ul>
                            </div>

                        @endif


                        <div class="chat-message clearfix">
                            <form wire:submit.prevent="sendMessage">
                                <div class="input-group mb-0">
                                    <div class="input-group-prepend">
                                        <button
                                            class="btn btn-sm btn-info"
                                            wire:loading.attr="disabled"
                                        >
                                            ارسال
                                        </button>
                                    </div>
                                    <input wire:model="message" type="text" class="form-control" placeholder="پیام شما ... ">
                                </div>
                            </form>

                            @error('message')
                            <div>
                                <span class="text-danger">{{$message}}</span>
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
