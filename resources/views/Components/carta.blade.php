<style>
    #img{
        position: relative;
    }
    img{
        background-image: url('{{ $imagen }}');
        box-shadow: rgba(0, 0, 0, 0.582) 1px 0 10px;
    }
    .nombre{
        position: absolute;
        top: 30px;
        left: 25px;
        font-size:35px;
        color:white;
        text-shadow: rgb(255, 255, 255) 1px 0 10px;
        text-align: center;
    }

    .vida{
        position: absolute;
        top: 280px;
        left: 35px;
        font-size:35px;
        color:rgb(255, 255, 255);
        text-shadow: rgb(255, 255, 255) 1px 0 10px;
    }

    .dmg{
        position: absolute;
        top: 280px;
        left: 205px;
        font-size:35px;
        color:rgb(255, 255, 255);
        text-shadow: rgb(255, 255, 255) 1px 0 10px;
    }

    .coste{
        position: absolute;
        top: 310px;
        left: 110px;
        font-size:50px;
        color:rgb(255, 255, 255);
        text-shadow: rgb(255, 255, 255) 1px 0 5px;
    }

    .dmg_{
        position: absolute;
        top: 280px;
        left: 215px;
        font-size:35px;
        color:rgb(255, 255, 255);
        text-shadow: rgb(255, 255, 255) 1px 0 10px;
    }
    .vida_{
        position: absolute;
        top: 280px;
        left: 45px;
        font-size:35px;
        color:rgb(255, 255, 255);
        text-shadow: rgb(255, 255, 255) 1px 0 10px;
    }
    .coste_{
        background-color:rgb(78, 78, 78);
        position: absolute;
        top: 310px;
        left: 115px;
        font-size:50px;
        color:rgb(255, 255, 255);
        text-shadow: rgb(255, 255, 255) 1px 0 5px;
    }
    </style>

    <div id="img">
        <img src="img/{{ $categoria }}.png" alt="">
        <span id="nombre" class="nombre">{{ $nombre }}</span>
        @if(intval($vida)<9)
            <span id="vida" class="vida_">{{ $vida }}</span>
        @else
            <span id="vida" class="vida">{{ $vida }}</span>

        @endif

        @if(intval($dmg)<9)
            <span id="dmg" class="dmg_">{{ $dmg }}</span>
        @else
            <span id="dmg" class="dmg">{{ $dmg }}</span>
        @endif

        @if(intval($coste)<9)
            <span id="coste" class="coste_">{{ $coste }}</span>
        @else
            <span id="coste" class="coste">{{ $coste }}</span>
        @endif

    </div>
