@foreach ((array) session('flash_notification') as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="message {{ $message['level'] }}" data-component="message">
            {!! $message['message'] !!}
            <span class="close small"></span>
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
