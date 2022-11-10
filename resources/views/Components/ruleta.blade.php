<div>

    <style>
        body{
            background-color: black;
        }
        .container {
            /* top: 350px; */
            width: 210px;
            height: 140px;
            position: relative;
            margin: 0 auto 40px;
            perspective: 1100px;
            border-radius:100%;
        }

        #carousel {
        width: 100%;
        height: 100%;
        position: absolute;
                transform: translateZ( -288px );
                transform-style: preserve-3d;
                transition: transform 1s;
                animation: rotateInY 10s infinite linear;
        }

    #carousel figure {
      /* background-color: white; */
      display: block;
      position: absolute;
      width: 80%;
      height: 80%;
      left: 10px;
      top: -100px;
      /* border: 2px solid rgba(255, 255, 255, 0.8); */
      line-height: 116px;
      font-size: 80px;
      font-weight: bold;
      color: white;
      text-align: center;
      margin: 0;
    }

    #carousel figure:nth-child(1) {
              transform: rotateY( 0deg ) translateZ( 288px );
    }
        #carousel figure:nth-child(2) {
                transform: rotateY( 40deg ) translateZ( 288px );
        }
        #carousel figure:nth-child(3) {
                transform: rotateY( 80deg ) translateZ( 288px );
        }
        #carousel figure:nth-child(4) {
                transform: rotateY( 120deg ) translateZ( 288px );
        }
        #carousel figure:nth-child(5) {
                transform: rotateY( 160deg ) translateZ( 288px );
        }
        #carousel figure:nth-child(6) {
                transform: rotateY( 200deg ) translateZ( 288px );
        }
        #carousel figure:nth-child(7) {
                transform: rotateY( 240deg ) translateZ( 288px );
        }
        #carousel figure:nth-child(8) {
                transform: rotateY( 280deg ) translateZ( 288px );
        }
        #carousel figure:nth-child(9) {
                transform: rotateY( 320deg ) translateZ( 288px );
        }
    @keyframes rotateInY {
	0%   { transform: translateZ(-288px) rotateY(0deg);   }
	100% { transform: translateZ(-288px) rotateY(360deg);    }
    }
        img{
            width: 100%;
        }
    </style>
</head>
    <section class="">
        <div id="carousel" style="transform: translateZ(-288px) rotateY(-360deg);">
            <figure><img style="height: 115px;" src="https://i.blogs.es/0ca5da/ambulo_polar_wide/450_1000.jpg" alt=""></figure>
            <figure><img style="height: 115px;" src="https://i.pinimg.com/originals/a7/fc/aa/a7fcaa43650adc892c401956a08dc32a.jpg" alt=""></figure>
            <figure><img style="height: 115px;" src="https://images6.alphacoders.com/121/thumb-350-1217194.png" alt=""></figure>
            <figure><img style="height: 115px;" src="https://playerbros.com/wp-content/uploads/2019/01/Awaken-League-of-Legends-lol-wallpaper-lol-duvar-resimleri.jpg" alt=""></figure>
            <figure><img style="height: 115px;" src="https://i.pinimg.com/originals/0a/4d/cb/0a4dcb92fa2d3c601b58d72720d6bec4.jpg" alt=""></figure>
            <figure><img style="height: 115px;" src="https://wi.wallpapertip.com/wsimgs/1-15554_abstract-gaming-wallpaper-4k.jpg" alt=""></figure>
            <figure><img style="height: 115px;" src="https://wallpaper.dog/large/10795761.jpg" alt=""></figure>
            <figure><img style="height: 115px;" src="https://c4.wallpaperflare.com/wallpaper/108/140/869/digital-digital-art-artwork-fantasy-art-drawing-hd-wallpaper-thumb.jpg" alt=""></figure>
            <figure><img style="height: 115px;" src="https://p4.wallpaperbetter.com/wallpaper/39/346/426/sci-fi-city-hd-wallpaper-thumb.jpg" alt=""></figure>
           </div>
     </section>
</div>
