<div class="container_cards">
    @isset($cartas)
        @foreach($cartas as $key => $value)
            <div class="card">
                    <x-carta
                    imagen="/storage/{{ $value['img'] }}"
                    nombre="{{ $value['name'] }}"
                    categoria="{{  $value['category'] }}"
                    vida="{{  $value['life'] }}"
                    dmg="{{  $value['dmg'] }}"
                    coste="{{  $value['cost'] }}"></x-carta>
            </div>
        @endforeach
    @endisset
    <div class="btn-play">
        <a class="noselect text-decoration-none"   onclick="location.reload()">{{ __('Return to Shop') }}</a>
    </div>
</div>
<script>
    let user = '{{ Auth::user()->nick }}'
    let id = JSON.parse('{{ $id }}')
    let data = {
    'user': user,
    'data': id,
    '_token': '{{ csrf_token() }}'
}
$.post({
    async: true,
    data: data,
    url: "{{ route('user.card') }}",
    success: function(status){
        console.log(status)
    },
    error: function(data){
        console.log(data)
    }
});

</script>
