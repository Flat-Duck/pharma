<div class="card">
    <div class="row g-0">
        @if($is_admin)
        <div class="col-12 col-lg-5 col-xl-3 border-end">
            <div class="card-header d-none d-md-block">
                <div class="input-icon">
                    <span class="input-icon-addon"> </span>
                    <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search" />
                </div>
            </div>
            
            <div class="card-body p-0 scrollable" style="max-height: 35rem">
                <div class="nav flex-column nav-pills" role="tablist">
                    @forelse($conversations as $conversation)
                        @if (auth()->id() != $conversation->sender->id)
                            <a wire:click.prevent="loadChat({{ $conversation->sender->id }})"
                                class="nav-link text-start mw-100 p-3
                                {{ $userId != 0 ? '' : ($userId == $conversation->sender->id ? 'active' : '') }} "
                                id="chat-1-tab">
                                <div class="row align-items-center flex-fill">
                                    <div class="col-auto">
                                        <span class="avatar"
                                            style="background-image: url(./static/avatars/000m.jpg)"></span>
                                    </div>
                                    <div class="col text-body">
                                        <div>{{ $conversation->sender->name }}</div>
                                        <div class="text-secondary text-truncate w-100">{{ $conversation->message }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
        @else
        <div class="col-12 col-lg-5 col-xl-3 border-end">
        </div>
        @endif
        <div class="col-12 col-lg-7 col-xl-9 d-flex flex-column">
            <div class="card-body scrollable" style="height: 35rem">
                <div class="chat">
                    <div class="chat-bubbles">
                        @if ($userId > 0)
                            @foreach ($chat as $message)
                            <livewire:message :message="$message" wire:key="{{$message->id}}"/>
                                {{-- @livewire('message', ['message' => $message, 'key' => $message->id]) --}}
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="input-group mb-2">
                    <button class="btn" type="button" wire:click="sendMessage()"><i class="ti ti-send"></i></button>
                    <input type="text" class="form-control" autocomplete="off" placeholder="Type message"
                        wire:model="messageText" />
                        <input type="file" id="rxfile" name="rxfile" style="display: none"  wire:model="rxfile" />
                    <button class="btn" type="button" id="OpenImgUpload"><i class="ti ti-paperclip"> </i></button>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('OpenImgUpload').addEventListener('click', function() {
      document.getElementById('rxfile').click();
    });
  </script>