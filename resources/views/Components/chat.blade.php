<div>
    <form action="{{ route('user.new.message') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="recipient_id" value="{{ $recipientId }}">
        <input class="form-control"  name="body"><button class="btn btn-success"><img src="{{ asset('img/right-arrow.png') }}" alt=""></button>
    </form>
</div>

<div>
    <form action="{{ route('user.new.friend') }}" method="POST">
        {{ csrf_field() }}
        {{-- <input type="hidden" name="recipient_id" value="{{ $recipientId }}"> --}}
        <input class="form-control"  name="nick"><button class="btn btn-success"><img src="{{ asset('img/right-arrow.png') }}" alt=""></button>
    </form>
</div>
