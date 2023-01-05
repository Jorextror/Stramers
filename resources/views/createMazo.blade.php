@extends('layouts.app')

@section('content')

<div class="lateral ">
    <input class="name_mazo" type="text" id="name" value="Mazo Nuevo"> <span id="count">0</span> /20
    <ul id="lista" class="container-fluid list-group"></ul>
    <div class=""> <button class="guardar" onclick="guardar()" >Guardar</button></div>
    <div class=""> <a class="cancelar" href="{{ url('/mazo') }}" >Cancelar</a></div>
</div>

<div class="container">
    <div class="d-flex row m-1 justify-content-start">
        @foreach($cartas as $key => $value)
            <div class="col-3 m-2">
                <button class="btn" onclick='addcard("{{ $value->name }}", "{{ $value->category }}", "{{ $value->id }}")'>
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
    if (count<=19){
      lista.push(id);
      count++;
      $('#count').text(count);
      $('#lista').append('<li onclick=delcard("'+name+'") id="'+ name +'" class="list-group-item ms-3 p-2 '+category +'">' +name+ '</li>');
    }
  }

  function delcard(id){
    count--;
    lista = lista.filter(name => name !== id);
    $('#count').text(count);
    $("li").remove('#'+id)
  }

  function guardar(){
    if (count==20){
        $.ajax({
            url: '/AddMazo',
            type: 'POST',
            data: JSON.stringify({
                name: $('#name').val(),
                user_id: {{ Auth::user()->id }},
                cards: lista,
                '_token': '{{ csrf_token() }}'
            }),
            contentType: 'application/json',
            success: function(data) {
                console.log(data)
            },
            error: function(error) {
                console.error(error)
            }
            // window.location.href('{{ url('/mazo') }}')
            // $.redirect('{{ url('/mazo') }}');

        })
    }
  }

</script>

@endsection
