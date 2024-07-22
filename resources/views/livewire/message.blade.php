<div class="chat-item">
    <div class="row align-items-end {{ $message->ismine? 'justify-content-end': '' }}">
        @if(!$message->ismine)
            <div class="col-auto"><span class="avatar" style="background-image: url(./static/avatars/000m.jpg)"></span>
            </div>
        @endif
        <div class="col col-lg-6">
            <div class="chat-bubble chat-bubble-me">
                <div class="chat-bubble-title">
                    <div class="row">
                        <div class="col chat-bubble-author">{{$message->sender->name}}</div>
                        <div class="col-auto chat-bubble-date">{{$message->created_at->diffForHumans()}}</div>
                    </div>
                </div>
                <div class="chat-bubble-body">
                    <p>
                        {{$message->message}}
                    </p>
                    @if (strlen($message->file) > 5)
                        <div class="mt-2">
                        <img src=" /storage/{{$message->file}}" alt="" class="rounded img-fluid">
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @if($message->ismine)
            <div class="col-auto"><span class="avatar" style="background-image: url(./static/avatars/000m.jpg)"></span>
            </div>
        @endif
    </div>
</div>
