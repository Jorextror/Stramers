<style>
#nav-bar{
    margin: 20px;
    width: 270px;
    height: 75px;
    border-radius: 10px;
    bottom: 0px;
    background-color: {{ Auth::user()->backgrounds->where('id', Auth::user()->background_profile)->first()->color }};
}
</style>
<div>
    <nav id="nav-bar" class="nav-top">
        <div>
            <img class="img_profile" src="/storage/{{ Auth::user()->avatar }}" alt="" srcset="">
        </div>
        <div class="info nick">
            {{ Auth::user()->nick }}
        </div>

        <span id="lvl" class="progress-bar-text float-right">1</span>
        <div class="progress">
            <div class="progress-bar" style="width:15%; background-color:#9bfd71;"></div>
        </div>
    </nav>
    <div class="money_profile">
        <img class="money" src="{{ asset('img/money.png') }}" alt="" srcset=""> <span class="money-text">{{ Auth::user()->money }}</span>
    </div>
</div>
