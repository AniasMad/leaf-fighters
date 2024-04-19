import Phaser from "phaser";

class Example extends Phaser.Scene
    {
        preload ()
        {
            this.load.setBaseURL('localhost');
            this.load.image('bg', "{{ asset('js/game/assets/images/cat.jpg') }}");
            this.load.setBaseURL('https://labs.phaser.io');
        }

        create ()
        {
            // let test = { !!  !! };
            this.add.image(400, 300, 'bg');
        }
    }

    const config = {
        type: Phaser.AUTO,
        width: 800,
        height: 600,
        parent: 'gameCanvas', 
        scene: {
            preload: preload,
            create: create  
            }
    };

const game = new Phaser.Game(config);