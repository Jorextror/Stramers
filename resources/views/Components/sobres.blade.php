<style>
    .button-add {
        margin: 0px;
        outline: none;
        background-color: transparent; /* make the button transparent */
        background-repeat: no-repeat;  /* make the background image appear only once */
        background-position: 0px 0px;  /* equivalent to 'top left' */
        border: none;           /* assuming we don't want any borders */
        cursor: pointer;        /* make the cursor like hovering over an <a> element */
        padding: 16px;     /* make text start to the right of the image */
        vertical-align: middle; /* align the text vertically centered */
        color: rgba(255, 0, 0, 0);
        /* width: 30%; */
    }
    #canvas{
        position: absolute;
        z-index: -1;
        top: 0;
    }
</style>
</div>
<div id="principal" class="container">
        <button id="normal" class="button-add sobre"  onclick="sobre('normal')" ><img style="width:300px;" src="{{ asset('img/normal.png') }}" alt=""></button>
        <span class="precio"><img class="money" src="{{ asset('img/money.png') }}" alt="" srcset="">{{ $sobres['normal'] }}</span>

        <button id="supersobre" class="button-add sobre"  onclick="sobre('supersobre')" ><img style="width:300px;" src="{{ asset('img/super.png') }}" alt=""></button>
        <span class="precio"><img class="money" src="{{ asset('img/money.png') }}" alt="" srcset="">{{ $sobres['supersobre'] }}</span>

        <button id="megasobre" class="button-add sobre"  onclick="sobre('megasobre')" ><img style="width:300px;" src="{{ asset('img/mega.gif') }}" alt=""></button>
        <span class="precio"><img class="money" src="{{ asset('img/money.png') }}" alt="" srcset="">{{ $sobres['megasobre'] }}</span>
</div>

<canvas id="canvas"></canvas>

<script>
// Colors
var colorPalette = {
    bg: {r:255,g:255,b:255},
    matter: [
    {r:255,g:255,b:255} // darkPRPL
    ]
};

var config = {
  particleNumber: 2000,
  maxParticleSize: 5,
  maxSpeed: 40,
  colorVariation: 10
};


    function sobre(categoria) {

        if (categoria == 'normal') {
            colorPalette.matter = [{r:166,g:166,b:166},{r:80,g:80,b:80}]
        }
        if (categoria == 'supersobre') {
            colorPalette.matter = [{r:104,g:0,b:255},{r:178,g:0,b:255}]
        }
        if (categoria == 'megasobre') {
            colorPalette.matter = [{r:252,g:178,b:96},{r:253,g:238,b:152}]
        }

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
                console.log(datos)
                $('#principal').replaceWith(datos)
            },
            error: function(data){
                console.log(data)
            }
        });
    }


var canvas = document.querySelector("#canvas"),
ctx = canvas.getContext('2d');

// Set Canvas to be window size
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// Configuration, Play with these
// var config = {
//   particleNumber: 2000,
//   maxParticleSize: 5,
//   maxSpeed: 40,
//   colorVariation: 10
// };

// Some Variables hanging out
var particles = [],
    centerX = canvas.width / 2,
    centerY = canvas.height / 2,
    drawBg,

// Draws the background for the canvas, because space
drawBg = function (ctx, color) {
    ctx.fillStyle = "rgb(" + color.r + "," + color.g + "," + color.b + ")";
    ctx.fillRect(0,0,canvas.width,canvas.height);
};

// Particle Constructor
var Particle = function (x, y) {
    // X Coordinate
    this.x = x || Math.round(Math.random() * canvas.width);
    // Y Coordinate
    this.y = y || Math.round(Math.random() * canvas.height);
    // Radius of the space dust
    this.r = Math.ceil(Math.random() * config.maxParticleSize);
    // Color of the rock, given some randomness
    this.c = colorVariation(colorPalette.matter[Math.floor(Math.random() * colorPalette.matter.length)],true );
    // Speed of which the rock travels
    this.s = Math.pow(Math.ceil(Math.random() * config.maxSpeed), .7);
    // Direction the Rock flies
    this.d = Math.round(Math.random() * 360);
};

// Provides some nice color variation
// Accepts an rgba object
// returns a modified rgba object or a rgba string if true is passed in for argument 2
var colorVariation = function (color, returnString) {
    var r,g,b,a, variation;
    r = Math.round(((Math.random() * config.colorVariation) - (config.colorVariation/2)) + color.r);
    g = Math.round(((Math.random() * config.colorVariation) - (config.colorVariation/2)) + color.g);
    b = Math.round(((Math.random() * config.colorVariation) - (config.colorVariation/2)) + color.b);
    a = Math.random() + .5;
    if (returnString) {
        return "rgba(" + r + "," + g + "," + b + "," + a + ")";
    } else {
        return {r,g,b,a};
    }
};

// Used to find the rocks next point in space, accounting for speed and direction
var updateParticleModel = function (p) {
    var a = 180 - (p.d + 90); // find the 3rd angle
    p.d > 0 && p.d < 180 ? p.x += p.s * Math.sin(p.d) / Math.sin(p.s) : p.x -= p.s * Math.sin(p.d) / Math.sin(p.s);
    p.d > 90 && p.d < 270 ? p.y += p.s * Math.sin(a) / Math.sin(p.s) : p.y -= p.s * Math.sin(a) / Math.sin(p.s);
    return p;
};

// Just the function that physically draws the particles
// Physically? sure why not, physically.
var drawParticle = function (x, y, r, c) {
    ctx.beginPath();
    ctx.fillStyle = c;
    ctx.arc(x, y, r, 0, 2*Math.PI, false);
    ctx.fill();
    ctx.closePath();
};

// Remove particles that aren't on the canvas
var cleanUpArray = function () {
    particles = particles.filter((p) => {
      return (p.x > -100 && p.y > -100);
    });
};


var initParticles = function (numParticles, x, y) {
    for (let i = 0; i < numParticles; i++) {
        particles.push(new Particle(x, y));
    }
    particles.forEach((p) => {
        drawParticle(p.x, p.y, p.r, p.c);
    });
};

// That thing
window.requestAnimFrame = (function() {
  return window.requestAnimationFrame ||
     window.webkitRequestAnimationFrame ||
     window.mozRequestAnimationFrame ||
     function(callback) {
        window.setTimeout(callback, 1000 / 60);
     };
})();


// Our Frame function
var frame = function () {
  // Draw background first
  drawBg(ctx, colorPalette.bg);
  // Update Particle models to new position
  particles.map((p) => {
    return updateParticleModel(p);
  });
  // Draw em'
  particles.forEach((p) => {
      drawParticle(p.x, p.y, p.r, p.c);
  });
  // Play the same song? Ok!
  window.requestAnimFrame(frame);
};

// Click listener
document.body.addEventListener("click", function (event) {
    var x = event.clientX,
        y = event.clientY;
    cleanUpArray();
    initParticles(config.particleNumber, x, y);
    colorPalette.matter =[]
});

// First Frame
frame();

// First particle explosion
initParticles(config.particleNumber);
</script>
