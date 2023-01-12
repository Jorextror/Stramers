<style>
    .button-add {
        margin: 30px;
        outline: none;
        background-color: transparent; /* make the button transparent */
        background-repeat: no-repeat;  /* make the background image appear only once */
        background-position: 0px 0px;  /* equivalent to 'top left' */
        border: none;           /* assuming we don't want any borders */
        cursor: pointer;        /* make the cursor like hovering over an <a> element */
        padding: 16px;     /* make text start to the right of the image */
        vertical-align: middle; /* align the text vertically centered */
        color: rgba(255, 0, 0, 0);
}
</style>

<div>
    <button class="button-add"  onclick="sobre('normal')" ><img src="{{ asset('img/legendaria.png') }}" alt=""></button>

    <button class="button-add"  onclick="sobre('supersobre')" ><img src="{{ asset('img/legendaria.png') }}" alt=""></button>

    <button class="button-add"  onclick="sobre('megasobre')" ><img src="{{ asset('img/legendaria.png') }}" alt=""></button>
</form>
</div>

<script>
    function sobre(categoria) {
        var user = "{{ Auth::user()->nick }}"
        let datos = {
            'user': user,
            'data': categoria,
            '_token': '{{ csrf_token() }}'
        }

        $.post({
            url: "{{ route('tienda.sobre') }}",
            async: false,
            data: datos,
            success: function(datos){
                let data = {
                                'user': user,
                                'data': datos['id'],
                                '_token': '{{ csrf_token() }}'
                            }
                $.post({
                    async: false,
                    data: data,
                    url: "{{ route('user.card') }}",
                    success: function(status){
                        console.log(status)
                    }
                });
            }
        });
    }
</script>
