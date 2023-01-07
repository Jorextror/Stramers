@extends('layouts.app')

@section('content')

<style>
/* The side navigation menu */
.sidenav {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0;
  left: 0;
  background-color: #111; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

/* The navigation menu links */
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover, .offcanvas a:focus {
  color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
  transition: margin-left 0.5s;
  padding: 20px;
  overflow: hidden;
  width: 100%;
}

body {
  overflow-x: hidden;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {
    padding-top: 15px;
  }
  .sidenav a {
    font-size: 18px;
  }
}
</style>

<a class="settings"><img style="width: 30px" src="{{ asset('img/settings.svg') }}"></a>
<a href="#" onclick="openNav()" class="amigos" ><img style="width: 30px" src="{{ asset('img/amigos.svg') }}"></a>
<a class="alertes"><img style="width: 30px" src="{{ asset('img/alerts.svg') }}"></a>

<div id="sideNavigation" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">{{ __('Amigos') }}</a>
    <a href="#">{{ __('Añadir amigo') }}</a>
</div>

<div class="container" id="main">
    <div class="mazos-elegir"></div>
    <div class="start-box">
        <div class="mazo_select"></div>
        <div>{{ __('Batalla') }}</div>

    </div>
</div>
@endsection

<script>
  function openNav() {
    document.getElementById("sideNavigation").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}
function closeNav() {
    document.getElementById("sideNavigation").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}


    </script>
