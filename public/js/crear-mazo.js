var lista=[];
var count=0;

function addcard(name, category, id){
    if (count<=19 && !lista.includes(id)){
        lista.push(id);
        count++;
        $('#count').text(count);
        $('#lista').append('<li onclick=delcard("'+id+'") id="'+ id +'" class="list-group-item ms-3 p-2 '+category +'">' +name+ '</li>');
    }else{
        console.log("no duples");
    }
}

function delcard(id){
    count--;
    lista = lista.filter(name => name !== id);
    $('#count').text(count);
    $("li").remove('#'+id);
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
                console.log(data);
                window.location.href('{{ url('/mazo') }}');
            },
            error: function(error) {
                console.error(error);
            }

        })
    }else{
        console.log("{{  __('Necesitaas 20 cartas para guardar') }}");
    }
}
