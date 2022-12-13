<style>
    input.button-add {
    background-image: url("{{ asset('img/legendaria.png') }}"); /* 16px x 16px */
    background-color: transparent; /* make the button transparent */
    background-repeat: no-repeat;  /* make the background image appear only once */
    background-position: 0px 0px;  /* equivalent to 'top left' */
    border: none;           /* assuming we don't want any borders */
    cursor: pointer;        /* make the cursor like hovering over an <a> element */
    padding: 16px;     /* make text start to the right of the image */
    vertical-align: middle; /* align the text vertically centered */
    color: rgba(255, 0, 0, 0);
    width: 25%;
    height: 390px;
    margin: 30px;
}
</style>


<div>
    <input type="button"  class="button-add"  onclick="sobre('normal')" >

    <input type="button"  class="button-add"  onclick="sobre('supersobre')" >

    <input type="button"  class="button-add"  onclick="sobre('megasobre')" >
</form>
</div>

<script>
    function sobre(categoria) {
        $.post({
            url: "{{ route('tienda.sobre') }}",
            async: false,
            data: categoria,
            success: function(datos){
                console.log(datos)
            }
        })
    }
</script>
