<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <style type="text/css" href="css/style.css"></style>


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: white;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }
            canvas {
                background: #023;
                display: block;
                position: absolute;
                opacity: 0.7;
                width: 100%;
                height: 100%;

            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <canvas class=" sketch" height="100%" width="100%"></canvas>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Indicators
                </div>

                <div class="links">

                </div>
            </div>
        </div>
        <div id="particles-js"></div>

    </body>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://rawgithub.com/soulwire/sketch.js/master/js/sketch.min.js"></script>
    <script type="text/coffeescript">
# General Variables
        sketch = Sketch.create()
        particles = []
        particleCount = 750
        sketch.mouse.x = sketch.width / 2
        sketch.mouse.y = sketch.height / 2
        sketch.strokeStyle = 'hsla(200, 50%, 50%, .4)'
        sketch.globalCompositeOperation = 'lighter'

# Particle Constructor
        Particle = ->
            this.x = random( sketch.width )
            this.y = random( sketch.height, sketch.height * 2 )
            this.vx = 0
            this.vy = -random( 1, 10 ) / 5
            this.radius = this.baseRadius = 1
            this.maxRadius = 50
            this.threshold = 150
            this.hue = random( 180, 240 )

# Particle Prototype
        Particle.prototype =
            update: ->
# Determine Distance From Mouse
                distx = this.x - sketch.mouse.x
                disty = this.y - sketch.mouse.y
                dist = sqrt( distx * distx + disty * disty )

                # Set Radius
                if dist < this.threshold
                    radius = this.baseRadius + ( ( this.threshold - dist ) / this.threshold ) * this.maxRadius
                    this.radius = if radius > this.maxRadius then this.maxRadius else radius
                else
                    this.radius = this.baseRadius

                # Adjust Velocity
                this.vx += ( random( 100 ) - 50 ) / 1000
                this.vy -= random( 1, 20 ) / 10000

                # Apply Velocity
                this.x += this.vx
                this.y += this.vy

                # Check Bounds
                if this.x < - this.maxRadius || this.x > sketch.width + this.maxRadius || this.y < - this.maxRadius
                    this.x = random( sketch.width )
                    this.y = random( sketch.height + this.maxRadius, sketch.height * 2 )
                    this.vx = 0
                    this.vy = -random( 1, 10 ) / 5
            render: ->
                sketch.beginPath()
                sketch.arc( this.x, this.y, this.radius, 0, TWO_PI )
                sketch.closePath()
                sketch.fillStyle = 'hsla(' + this.hue + ', 60%, 40%, .35)'
                sketch.fill()
                sketch.stroke()

# Create Particles
        z = particleCount
        while z--
            particles.push( new Particle() )

# Sketch Clear
        sketch.clear = ->
            sketch.clearRect( 0, 0, sketch.width, sketch.height )

# Sketch Update
        sketch.update = ->
            i = particles.length
            particles[ i ].update() while i--

# Sketch Draw
        sketch.draw = ->
            i = particles.length
            particles[ i ].render() while i--

    </script>
</html>
