@extends('layouts.app')

@section('content')

<style>
    .invisible{
        display: none
    }
    .visible{
        display:inline-block
    }
</style>

<div class="lateral ">
    <input class="name_mazo" type="text" id="name" value="{{ __('Mazo nuevo') }}"> <span id="count">0</span> /20
    <ul id="lista" class="container-fluid list-group"></ul>
    <div class=""> <button class="guardar" onclick="guardar()" >{{ __('Guardar') }}</button></div>
    <div class=""> <a class="cancelar" href="{{ url('/mazo') }}" >{{ __('Cancelar') }}</a></div>
</div>

<div class="container">
    <div class="lista_cartas">
        @foreach($cartas as $key => $value)
            <div class="">
                <button class="btn {{ $value->name }}" onclick='addcard("{{ $value->name }}", "{{ $value->category }}", "{{ $value->id }}")'>
                    <x-carta
                    imagen='/storage/{{ $value->img }}'
                    nombre='{{ $value->name }}'
                    categoria='{{ $value->category }}'
                    vida='{{ $value->life }}'
                    dmg='{{ $value->dmg }}'
                    coste='{{ $value->cost }}'></x-carta>
                </button>
            </div>
        @endforeach
    </div>
</div>

<script>
    var lista=[];
    var count=0;

  function addcard(name, category, id){
    if (count<=19 && !lista.includes(id)){
      lista.push(id);
      count++;
      $('#count').text(count);
      $('#lista').append('<li onclick=delcard("'+id+'","'+name+'") id="'+ id +'" class="list-group-item ms-3 p-2 '+category +'">' +name+ '</li>');
      $('.'+name).addClass('invisible')
    }else{
        console.log("no duples");
    }
  }

  function delcard(id,name){
    count--;
    lista = lista.filter(name => name !== id);
    $('#count').text(count);
    $("li").remove('#'+id);
    $('.'+name).removeClass('invisible')
  }

  function guardar(){
    if (count==20){
        $.ajax({
            url: '{{ route("mazo.store") }}',
            type: 'POST',
            data: JSON.stringify({
                name: $('#name').val(),
                user_id: {{ Auth::user()->id }},
                cards: lista,
                '_token': '{{ csrf_token() }}'
            }),
            contentType: 'application/json',
            success: function(data) {
                console.log(data);
                window.location.href = '{{ route("mazo") }}';
            },
            error: function(error) {
                console.error(error);
            }

        })
    }else{
        const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                })
        Toast.fire({
                            icon: 'error',
                            title: '{{ __("Error el mazo ha de tener 20 cartas") }}'
                        })
    }
  }

</script>

@endsection
