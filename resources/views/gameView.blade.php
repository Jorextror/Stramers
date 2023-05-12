@extends('layouts.game')

@section('content')




<script src="https://cdnjs.cloudflare.com/ajax/libs/phaser/3.60.0/phaser.js"></script>
<script type="module">

import GameHandler from "{{ asset('js/game/func/GameHandler.js') }}"
import DeckHandler from "{{ asset('js/game/func/DeckHandler.js') }}"
import InteractiveHandler from "{{ asset('js/game/func/InteractiveHandler.js') }}"
import SocketHandler from "{{ asset('js/game/func/SocketHandler.js') }}"
import UIHandler from "{{ asset('js/game/func/UIHandler.js') }}"

class Game extends Phaser.Scene{

    constructor(){
        super({
            key: 'Game'
        })

    }
    preload(){
        var progressBar = this.add.graphics();
            var width = this.cameras.main.width;
            var height = this.cameras.main.height;

            var loadingText = this.make.text({
                x: width / 2,
                y: height / 2 - 50,
                text: 'Loading...',
                style: {
                    font: '20px monospace',
                    fill: '#ffffff'
                }
            });
            loadingText.setOrigin(0.5, 0.5);

            var percentText = this.make.text({
                x: width / 2,
                y: height / 2 - 5,
                text: '0%',
                style: {
                    font: '18px monospace',
                    fill: '#ffffff'
                }
            });
            percentText.setOrigin(0.5, 0.5);

            var assetText = this.make.text({
                x: width / 2,
                y: height / 2 + 50,
                text: '',
                style: {
                    font: '18px monospace',
                    fill: '#ffffff'
                }
            });
            assetText.setOrigin(0.5, 0.5);

            this.load.on('progress', function (value) {
                percentText.setText(parseInt(value * 100) + '%');
                progressBar.clear();
                progressBar.fillStyle(0xffffff, 1);
                progressBar.fillRect(width, height, 300 * value, 30);
            });

            this.load.on('fileprogress', function (file) {
                assetText.setText('Loading asset: ' + file.key);
            });
            this.load.on('complete', function () {
                progressBar.destroy();
                loadingText.destroy();
                percentText.destroy();
                assetText.destroy();
            });
        /**
         * -------------------------------
         */

        this.load.bitmapFont('text', 'src/assets/atari-smooth.png', 'src/assets/atari-smooth.xml');

    }
    create(){
        this.matter.world.setBounds().disableGravity();
        this.circ = this.matter.add.image(200, 50, 'mana');

        // Le asignamos un cuerpo con un radio de 180 px
        this.circ.setBody({
            type: 'circle',
            radius: 180,
        });

        //Le asignamos velocidad, rebote y quitamos toda fricción

        this.circ.setVelocity(6, 3);
        this.circ.setAngularVelocity(0.01);
        this.circ.setBounce(1);
        this.circ.setFriction(0, 0, 0);

        var width = this.cameras.main.width;
        var height = this.cameras.main.height;

        this.buscant = this.add.bitmapText(width/2-250,height/2-50,"text","Buscando Partida...").setFontSize(24);
        this.InfoText = this.add.bitmapText(width/2-350,height/2-50,"text","").setFontSize(64)
        this.InfoText.setDepth(1)

        this.DeckHandler = new DeckHandler(this)
        this.GameHandler = new GameHandler(this)
        this.SocketHandler = new SocketHandler(this);
        this.UIHandler = new UIHandler(this);
    }
    update() {

    }

}


const config = {
    type: Phaser.AUTO,
    scale:{
        mode:Phaser.Scale.FIT,
        width:"160%",
        height:"160%"
    },
    physics: {
        default: 'matter',
        matter: {
            debug: false
        }
    },
    scene: [
        Game
    ]
};
const game = new Phaser.Game(config);

</script>
