<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GamesNight</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');

        .relativefs-sm {
            font-size: 2.2vw;
        }

        .relativefs {
            font-size: 4.2vw;
        }

        .relativefs-lg {
            font-size: 5.2vw;
        }

        .relativefs-xl {
            font-size: 7.2vw;
        }

        #animate {
            margin: 0 auto;
            width: 20px;
            overflow: visible;
            position: relative;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100vh;
            background: #000;
            font-family: 'Roboto', sans-serif;
        }

        #text {
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        h2 {
            color: #fff;
            font-size: 47px;
            line-height: 40px;
        }

        #container {
            left: 0px;
            top: -100px;
            height: calc(100vh + 100px);
            overflow: hidden;
            position: relative;
        }

        #animate {
            margin: 0 auto;
            width: 30vh;
            overflow: visible;
            position: relative;
        }

        #all {
            overflow: hidden;
            height: 100vh;
            width: 100%;
            position: fixed;
        }
    </style>
</head>




<body class="bg-dark">
    <div id="all">
        <div id="container vw-100">
            <div class="w-100" id="animate">
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="container text-center text-white position-fixed vh-100 vw-100 overflow-hidden">
            <div class="row mt-5">
                <div class="col">
                    <span id="round" class="relativefs"></span>
                </div>
            </div>
            <div id="winwrapper" class="mt-5">
                <span class="relativefs-xl" id="winner"></span>
            </div>
            <div id="gamewrapper">
                <div class="row mt-5">
                    <div class="col border-end">
                        <span class="relativefs-lg text-info" id="teamname1">Team Blau</span>
                    </div>
                    <div class="col">
                        <span class="relativefs-lg text-danger" id="teamname2">Team Rot</span>
                    </div>
                </div>
                <div class="row d-flex align-items-center" style="height: 33vh;">
                    <div class="col">
                        <span class="relativefs" id="t1Count"></span>
                    </div>
                    <div class="col">
                        <span class="relativefs" id="t2Count"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" id="btn1" class="btn btn-secondary relativefs-sm bs-light">Team Blau</button>
                    </div>
                    <div class="col">
                        <button type="button" id="btnnext" class="btn btn-success relativefs-sm">Start</button>
                    </div>
                    <div class="col">
                        <button type="button" id="btn2" class="btn btn-secondary relativefs-sm bs-light">Team Rot</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="configmodal" tabindex="-1" data-bs-theme="dark">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="input-group my-3">
                        <input type="text" class="form-control" placeholder="Team 1" id="teamname1in">
                        <span class="input-group-text">-</span>
                        <input type="text" class="form-control" placeholder="Team 2" id="teamname2in">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="confirmbtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {
            let t1Count = 0;
            let t2Count = 0;
            let round = 0;

            let t1turn = true;
            let t2turn = true;

            $('#btn1').click(function() {

                if (round == 0) return;
                if (!t1turn) return;
                t1Count = t1Count + round;
                $('#t1Count').text(t1Count);
                t1turn = false;
            });
            $('#btn2').click(function() {
                if (round == 0) return;
                if (!t2turn) return;
                t2Count = t2Count + round;
                $('#t2Count').text(t2Count);
                t2turn = false;
            });
            $('#btnnext').click(function() {
                $('#btnnext').text("Nächste Runde");

                if (round == 10) {
                    $('#round').text("Resultat");
                    $('#gamewrapper').hide();
                    $('#winwrapper').show();
                    //emojirain();
                    //get the winner
                    if (t1Count > t2Count) {
                        $('#winner').text($('#teamname1').text() + ' hat gewonnen!');
                    } else if (t1Count < t2Count) {
                        $('#winner').text($('#teamname1').text() + 'hat gewonnen!');
                    } else {
                        $('#winner').text('Unentschieden!');
                    }
                    return;
                }
                t1turn = true;
                t2turn = true;
                round++;
                if (round == 10) {
                    $('#btnnext').text("Resultat");
                }
                $('#round').text("Runde: " + round);
            });
        });

        $(document).on('keydown', function(e) {
            if (e.key === 'Escape') {
                e.preventDefault();
                $('#configmodal').modal('show');
                $("#configmodal").show();
            }
        });

        $('#confirmbtn').click(function() {
            $('#configmodal').modal('hide');
            $("#configmodal").hide();
            $('#gamewrapper').show();
            $('#teamname1').text($('#teamname1in').val());
            $('#teamname2').text($('#teamname2in').val());
        });
        /*
                function emojirain() {
                    let container = $('#animate');
                    let emoji = ['👏', '🤝', '🥳', '🎉', '🍾', '🤝', '🥳'];
                    let circles = [];

                    for (let i = 0; i < 10; i++) {
                        addCircle(i * 250, Math.floor(Math.random() * 100), emoji[Math.floor(Math.random() * emoji.length)]);
                        addCircle(i * 250, Math.floor(Math.random() * 100), emoji[Math.floor(Math.random() * emoji.length)]);
                        addCircle(i * 250, Math.floor(Math.random() * 100), emoji[Math.floor(Math.random() * emoji.length)]);
                        addCircle(i * 250, Math.floor(Math.random() * 100), emoji[Math.floor(Math.random() * emoji.length)]);
                        addCircle(i * 250, Math.floor(Math.random() * 100), emoji[Math.floor(Math.random() * emoji.length)]);
                        addCircle(i * 250, Math.floor(Math.random() * 100), emoji[Math.floor(Math.random() * emoji.length)]);
                        addCircle(i * 250, Math.floor(Math.random() * 100), emoji[Math.floor(Math.random() * emoji.length)]);
                        addCircle(i * 250, Math.floor(Math.random() * 100), emoji[Math.floor(Math.random() * emoji.length)]);
                    }



                    function addCircle(delay, range, emoji) {
                        setTimeout(function() {
                            let c = new Circle(range, 80 + Math.random() * 4, emoji, {
                                x: -0.15 + Math.random() * 0.3,
                                y: 2 + Math.random() * 2
                            }, range);
                            circles.push(c);
                        }, delay);
                    }

                    function Circle(x, y, c, v, range) {
                        let _this = this;
                        this.x = x;
                        this.y = y;
                        this.v = v;
                        this.range = range;
                        this.element = document.createElement('span');
                        /*this.element.style.display = 'block';*/
        /*
                this.element.style.opacity = 0;
                this.element.style.position = 'absolute';
                this.element.style.fontSize = '2.2vw';
                this.element.innerHTML = c;
                container.appendChild(this.element);

                this.update = function() {
                    if (_this.y > 800) {
                        _this.y = 80 + Math.random() * 4;
                        _this.x = _this.range[0] + Math.random() * _this.range[1];
                    }
                    _this.y += _this.v.y;
                    _this.x += _this.v.x;
                    this.element.style.opacity = 1;
                    this.element.style.transform = 'translate3d(' + _this.x + 'px, ' + _this.y + 'px, 0px)';
                    this.element.style.webkitTransform = 'translate3d(' + _this.x + 'px, ' + _this.y + 'px, 0px)';
                    this.element.style.mozTransform = 'translate3d(' + _this.x + 'px, ' + _this.y + 'px, 0px)';
                };
            }

            function animate() {
                for (let i in circles) {
                    circles[i].update();
                }
                requestAnimationFrame(animate);
            }

            animate();
        }
        */
    </script>
</body>

</html>