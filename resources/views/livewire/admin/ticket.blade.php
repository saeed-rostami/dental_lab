
<div class="container">
    <div class="row clearfix">
                <h3>{{$chat->user->username}}</h3>
        <div class="col-lg-12">
            <div class="card chat-app">
                <div class="chat">
                    @if($chat->messages)
                        <div class="chat-history">
                            <ul class="m-b-0">
                                @foreach($chat->messages as $message)
                                    <li class="clearfix">
                                        <div

                                            @class([
$message->isAdmin() ? "text-left" : "text-right",
"message-data"
])
                                        >
                                            <span class="message-data-time text-info">{{ verta($message->created_at)->formatDifference() }}</span>

                                            <span>
                                                    {{ $message->isAdmin() ? "مدیریت" : "" }}
                                                </span>
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">

                                        </div>
                                        <div
                                            @class([
$message->isAdmin() ? "float-left admin_message_color" : "float-right other-message",
"message "

])
                                        >
                                            {{$message->message}}

                                        </div>
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
