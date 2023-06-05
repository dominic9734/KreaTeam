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
            font-size: 1.25vw;
        }

        .relativefs {
            font-size: 2vw;
        }

        .relativefs-lg {
            font-size: 5.5vw;
        }

        .relativefs-xl {
            font-size: 8vw;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        .pin {
            width: 20px;
            height: 20px;
            transform: translate(-1vh, -2vh);
        }

        .pinred {
            fill: #dc3545 !important;
        }

        .pinblue {
            fill: #0dcaf0 !important;
        }

        .answerpin {
            fill: #ffc107 !important;
        }

        .transitions {
            transition: all 0.3s ease-in-out;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .svgicon {
            height: 4vh;
            width: 4vh;
        }

        .svgpin {
            height: 4vh;
            width: 4vh;
        }
    </style>
</head>

<body class="bg-dark overflow-hidden">
    <div class="vh-100 d-flex justify-content-center position-relative" id="mapcontainer">
        <div id="landingpage" class="position-absolute top-0 start-0 vw-100 vh-100 bg-dark d-flex justify-content-center align-items-center text-white transitions" style="z-index: 1110;">
            <div class="bg-dark w-50 my-auto relativefs h-50 text-center">
                <p>AeBo GamesNight</p>
                <p class="relativefs-lg">Wo ist...?</p>
                <button type="button" class="btn btn-success w-50 p-2 mt-5 relativefs" onclick="showSettings()">Einstellungen</button>
                <button type="button" class="btn btn-success w-50 p-2 mt-3 relativefs" onclick=" turnMade();">Starten</button>
            </div>
        </div>
        <div id="settings" class="overflow-scroll py-3 position-absolute top-0 start-0 vw-100 vh-100 bg-dark d-flex justify-content-center align-items-center text-white transitions" style="z-index: 1111; transform: translateX(100%);">
            <div class="position-absolute top-0 start-0 p-3">
                <svg class="cursor-pointer svgicon" xmlns="http://www.w3.org/2000/svg" fill="white" id="settingsbackbtn" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                </svg>
            </div>
            <div class="bg-dark w-50 relativefs h-100 text-center">
                <div class="row my-3" data-bs-theme="dark">
                    <div class="input-group my-3">
                        <input type="text" class="form-control" placeholder="Team 1" id="teamname1in">
                        <span class="input-group-text">-</span>
                        <input type="text" class="form-control" placeholder="Team 2" id="teamname2in">
                    </div>
                </div>
                <div class="row" data-bs-theme="dark">
                    <form action="" class="m-0 mt-3">
                        <div class="input-group">
                            <input type="text" aria-label="First name" class="form-control-none border-white">
                            <input type="text" aria-label="Last name" class="form-control-none border-white">
                            <input type="text" aria-label="Last name" class="form-control-none border-white">
                            <button type="submit" class="btn btn-outline-light" name="submit" id="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="svgpin" fill="white" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="container text-start relativefs-sm mt-3">
                    <?php

                    //print errors
                    ini_set('display_errors', 1);

                    // read the JSON content from the file
                    $json = file_get_contents('data.json');


                    // decode the JSON data to PHP data
                    $data = json_decode($json, true);

                    // loop through the data and write to CSV file
                    foreach ($data as $row) {
                    ?>
                        <div class="row border-bottom border-white py-2">
                            <div class="col-6">
                                <?php echo $row['Question']; ?>
                            </div>
                            <div class="col-3">
                                <?php echo $row['Xcoordinate']; ?>
                            </div>
                            <div class="col-3">
                                <?php echo $row['Ycoordinate']; ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="col d-flex justify-content-center ">
                    <a href="../KreaTeam/controller/map_export.php" id="csvexportbtn" type="button" class="btn btn-outline-light w-50 my-3">Download CSV</a>
                </div>
            </div>

        </div>
        <div id="titlewrapper" class="position-absolute top-0 start-0 vw-100 vh-100 bg-dark d-flex align-items-center text-white text-center transitions" style="z-index: 1100; opacity: 95%; transform: translateX(100%);">
            <div class="bg-dark w-100 my-auto relativefs-lg h-50">
                <p class="m-0">Wo ist...?</p>
                <div class="bg-dark w-100 my-auto relativefs-xl">
                    <span class="questionText"></span>
                </div>
                <p id="countdown" class="relativefs-lg d-none">3</p>
            </div>
        </div>
        <div id="teamnamewrapper" class="position-absolute top-0 start-0 vw-100 vh-100 bg-dark d-flex align-items-center text-white text-center transitions" style="z-index: 1100; opacity: 95%; transform: translateX(100%);">
            <div class="bg-dark w-100 my-auto relativefs-lg h-50">
                <div class="bg-dark w-100 my-auto relativefs-xl">
                    <span class="teamName"></span>
                </div>
            </div>
        </div>

        <div id="roundendwrapper" class="position-absolute top-0 start-0 vw-100 vh-100 bg-dark d-flex align-items-center text-white text-center transitions" style="z-index: 1100; opacity: 95%; transform: translateX(100%);">
            <div class="bg-dark w-100 my-auto relativefs-lg h-50">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <span class="relativefs">Team Blau</span>
                        </div>
                        <div class="col">
                            <span class="relativefs">Team Rot</span>
                        </div>
                        <div class="row">
                            <div class="col">
                                <span class="relativefs-lg" id="teamAdifferenceText"></span>
                            </div>
                            <div class="col">
                                <span class="relativefs-lg" id="teamBdifferenceText"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <span class="relativefs-lg" id="roundwinner"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="gamefinished" class="position-absolute top-0 start-0 vw-100 vh-100 bg-dark d-flex align-items-center text-white text-center transitions" style="z-index: 1100; transform: translateX(100%);">
            <div class="bg-dark w-100 my-auto relativefs-lg h-50">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <span class="relativefs">Team Blau</span>
                        </div>
                        <div class="col">
                            <span class="relativefs">Team Rot</span>
                        </div>
                        <div class="row">
                            <div class="col">
                                <span class="relativefs-lg" id="finalScoreA"></span>
                            </div>
                            <div class="col">
                                <span class="relativefs-lg" id="finalScoreB"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <span class="relativefs-lg" id="teamAscore"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="position-absolute top-0 start-0 text-white p- d-flex justify-content-between vw-100 p-3">
            <p class="relativefs">Runde: <span id="currentRound"></span></p>
            <p><span class="relativefs questionText"></span></p>
            <p><span class="relativefs teamName"></span></p>
        </div>

        <div class="position-absolute bottom-0 start-0 w-100 text-white pb-4 d-flex justify-content-center">
            <button type="button" id="confirmbtn" class="btn btn-success d-none" style="width: 15vw;">Bestätigen</button>
            <button type="button" id="continuebtn" class="btn btn-success d-none" style="width: 15vw;" onclick="turnMade()">Weiter</button>
        </div>

        <div class="progress vw-100 position-absolute bottom-0 start-0 rounded-0 bg-transparent" role="progressbar" aria-label="Success example" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" id="progress-bar" style="width: 100%; transition: all 20s linear;"></div>
        </div>



        <svg preserveAspectRatio="none" class="mh-100 p-0" version="1.1" id="Layer_1" fill="#198754" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 800 600" xml:space="preserve">
            <g id="Switzerland">
                <path id="mapsvg" class="m-0 position-relative" d="M767.9,289.4l-0.9,7.7l-0.6,2.2l-1,1.5l-3.6,4.3l0.3,3.6l1.2,3.5l0.4,3.3l-2,3l-2.8,1.8l-0.7,2.2l0.2,2.7
                    l-0.4,3.4l-1.6,2.8l-1.8,1.7l-0.8,2.3l1.4,4.6l3,3.5l7,0.8l3.4,2.9l1.2,4.6l-0.1,6.2l-1.3,5.9l-1,1.7l-1.3,2.1l-3,0.6l-11.7-3.1
                    l-5.7,0.5l-2.1-0.3l-1.8-0.9l-1-1.1L740,362l-1.3-1.1l-6.8-2.3l-0.7-2.6l0.9-4.9l-0.3-2.7l-2.6-2.1l-4.2,0l-15.5,4.5l-1.6,0.9
                    l-0.7,1.8l-2,7.8l-1.4,1.8l-3.5,3.5l-1.4,2.1l-0.2,1.7l0,5.2l-0.7,2.5l0.2,2.2l0.4,1.7l0.8,1.3l1.4,1l-2.9,4.9l2.6,3.2l4.8,1.9
                    l7.3,1.4l2.8,1.1l1.2,2.6l-1.2,5.2l-1.2,1.6l-3.4,3.1l-1.2,2.3l-0.8,3.2l-0.1,2.2l0.7,2l1.5,2.7l6.8,6.9l2.1,4.2l-2.2,4.5l-4.6,2.9
                    l-6.9,2.6l-5.4-0.1l-0.1-5.4l-1.7-4l-6.5-5.8l-2.4-3.3l-1.1-5.2l-0.1-4.7l-1.1-3.9l-4.1-2.7l-3.4-0.9l-3.2-0.2l-7.2,1.2l-10.9,5.6
                    l-3.4,1.1l-2.1-0.5l-4-2.4l-1.8,0l-1.8,2l-0.3,2.7l0.3,2.7l-0.1,1.9l-2.5,3.5l-3.1,1.3l-18.8-0.2l-3.8-1.4L614,422l-2.1-2.9
                    l-3.3-8.6l-1.5-1.2l-3.6-2l-1.2-1.2l-0.3-1.3l0.2-3.6l-1-22.8l-0.5-1.5l-1.3,0.3l-2.6,2l-1.1,1.5l-0.6,1.7l-0.8,1.4l-1.8,0.7
                    l-1.2-0.5l-4.2-4L587,377l-3.3-0.9l-8,1l-3.1,2.9l-2.8,5.7l-1.3,5.8l1.6,3.2l2.2,1.5l0.3,2.4l-0.4,3l0,3.4l2.2,8.4l0.2,3.1l-1,5.2
                    l-4.8,10.1l-2.4,8.5l-1.5,2.4l-1.9,1.8l-2,0.9l-1.8,1.3l-0.9,2.4l-0.8,2.7l-1.2,2.3l-0.1,0.2l-11.9,8.1l-3,4.6l-0.6,3.1l0.4,5.3
                    l-0.5,2.9l-1.3,2.2l-1.6,0.9l-3.6,1.1l-4.2,3.3l-0.7,2.7l2.9,8.2l-5.4,5l-0.4,0.6l-0.1,0.6l0.1,0.6l0.4,0.6l1.8,1.8l1.4,4.3
                    l1.5,2.2l1.6,0.9l3.6,0.7l1.5,1l1.9,3.9l-0.6,4l-4.1,8l-5.2,6.4l-4.9-0.9l-5.4-2.4l-6.5,2l0.6-3.6l1-2.8l0.7-2.9l-0.3-4.1l-0.9-3.1
                    l-1.4-3.1l-2.8-5.1l-1.6-3.8l-1.1-1.5l-1.1-0.9l-9.4-5.1l-2.5-0.9l-2.8-0.2l0.3-0.6l0.6-1.1l2.9-6.6l4.7-5.7l2.4-5.5l-4.2-5.5
                    l-2.5-0.9l-5,0.1l-2.6-0.4l-1.3-0.9l-1.2-2.2l-0.5-0.2l-0.8-0.3l-1,0.5l-2.5,2.3l-1.2,0.7l-2.9-0.1l-7.6-4.5l-3.2-1.1l-1.6-0.8
                    l-10.4-15.3l-4.7-4.8l-4.5-2.3l-4.3-1.7l-3-2.5l-1.8-3.8l-0.6-5.8l0.6-6.1l2.7-12.3l0.6-6.8l-0.1-7.2l-0.7-5.4l-2.3-3.3l-4.7-0.8
                    l-2.2,0.5l-7,1.5l-4.5,2.4l-3.5,3.7l-1.4,3l0.6,1l1.1,0.8l0.1,2.4l-1,2.2l-1.6,2l-1.9,1.4l-4.6,2.4l-8.1,10.7l-3.4,2.4l-7.1,1.6
                    l-3.5,1.6l-3.2,3.3l-1.6,2.3l-0.7,2l0.6,0.9l3.8,3.3l4.8,9.4l0.5,8.7l-3.6,7.7l-7.2,6.2l-1.8,0.6l-3.4,0.4l-1.6,1.3l-1.2,2.4
                    l-0.4,2.7l0,2.7l-0.9,6.7l-0.3,0.5l-1.6,3.5l-0.1,0.5l-2.1,2.7l-1.2,1l-1.6,0.5l-11.6,2.6l-2.4,1.9l-1.8,3.4l-0.4,4.5l-3.4,0.2
                    l-0.2,0.4l-0.5,2.4l0.1,1.2l-0.4,0.8l-2.1,1.1l-0.9,0l-2.9-0.9l-4.5,0.1l-7.9-2.9l-1.6,0.2l-1.2,0.6l-1.4,0.3l-2-0.7l-0.2-0.6
                    l-3.1-4.5l-2.5-2.3l-2.6-1.5l-16.7-4.2l-2.7,1.4l-1.6,2.7l-1.8,2.4l-3.4,0.4l-4.9,2.1L266,515l-5.3,1.9l-12.3-1.3l-2.2,0.7
                    l-4.6,2.9l-10.1,4.2l-4.9,0.9l-5.4,0.1l-5-1l-3.8-2.3l-7.4-8.3l-1.1-1.9l-0.9-2.4l-1.2-4.3l-1.9-4.9l-0.6-2.5l-0.8-0.5l-11.1-12.6
                    l-3.7-1.6l-1.4,0.6l-1.2,1.2l-1.3,1l-1.6-0.2l-1.4-1.1l-0.1-0.7l0.3-1l-0.1-1.8l0.2-0.2l-0.1-2.5l-0.3-2.3l-0.5,0.2l0.7-1.2
                    l1.3-1.6l1.2-1.8l0.2-1.8l-2.5-2.4l-13.1-2.9l-1.4-4l1.5-8.1l2.8-8.5l5.8-11.3l-3.7-6.4l-5.8-6.2l-3.1-5.4l0.9-2.7l4.3-5.1l1.2-4
                    l-0.2-2.3l-0.2-2.2l-1.5-2.4l-2.5-1.2l-24.4-6.3l-10.9-0.4l-10.5,2.1l-14,9.6l-5.3,1.4l-5.4,0.3l-5.1,1.6l-5.3,4.6l-4.7,6.2
                    l-3.5,4.7l-0.9,3.2l0.7,2.4l1.5,4l0.1,1l1.6,3.9l0.7,1l1.7,0.9l2.7-1.3l1.2,0.5l0.8,5.5l-4.2,4.5l-10.5,7l-8.4,9.8l-5.3,2.7
                    l-5.6-2.5l-7.5,0.3l-7.4,1.8l-4,2.4l2.2-5.1l1.3-2.4l0.5-2l-2.9-3.6l-1.7-3.2l0.6-2.9l4-2.5l9.8-4.8l0.3-0.1l0.3,0l0.3,0l1.3,0.4
                    l1,0.1l0.9-0.1l3.6-1.1l0.7-1.6l-0.2-2.2l0.1-2.6l1.2-6.7l0.5-1.9l2.4-5.4l2.9-6.6l-0.2-2.6l-2-3.6l-2.4-2.6l-8.1-5l-0.8-0.5
                    l1.9-1.8l0.3-1.6l-0.3-1.6v-1.8l-0.1-0.7l-0.4-1l-0.4-1.1v-1.2l0.6-1.5l1.9-2l5.7-9.8l5.8-7.3l-4-4.5l-0.5-3.1l2.2-2.9l22.1-20.2
                    l11.7-6.5l1.6-1.4l4.3-4.9l5.4-2.9l1.7-1.3l1.8-2.3l0.6-2l-0.1-4l-1.2-1.3l-0.9-1.2l-0.5-1.4l0.2-1.2l2.6-7.8l1.1-2.1l0.3-0.8
                    l0.6-1.5l0.3-3.3l-0.5-2.7l-2.2-4.2l-0.7-2.2l2.4-8.4l7.9-4.6l17.6-5.6l10.9-8.4l3.7-5.4l-2-4.5l2.2-3.8l1.5-1.5l4.1-1.5l0.6-1.5
                    l0.6-0.4l2.4-1.2l-0.2-4.1l4.9-1.7l10.4-9.6l0.4-0.3l3.1-5.2l4.8-4.9l11.1-8.2l-0.7-6l1.1-5l3.1-3.2l1.5-0.2l0.9-0.4l2.4-3.2l1.7-1
                    l1.7-0.5l1.5-1l1.3-2.7l-1.7-2.5l-2.5-2.2l-2.4-2l-3,1.5l-19.5,1.9l0.8-3.1l2-3.8l2.4-3.2l4.2-2.5l0.3-4.6l4.3-1l2.7-1.5l2.4-2.1
                    l1.2-2l-0.8-2.9l-1.7-3.4l-0.4-2.7l3.1-0.9l1.5-1.1l1.5-0.4l1.5,0.4l1.5,1.1l4.3,0.6l8.2-1.4l3.9,0.8l2.1,1.2l0.3,0l1.9,0.3
                    l4.5-0.5l-3,6.9l0.9,4l3.6,2.1l4.8,1.5l0.7,0.5l0.5,0.9l0.7,0.9l1.3,0.5l1.1-0.2l6.2-2.7l4.3-0.9l4.6,0.2l6.8,0.3l1.6-0.6l3-1.2
                    l2.3-3.1l0.9-1.2l0.5-2.3l-0.3-1.4l-0.8-1.1l-0.5-0.6l-0.8-1.5l0-1.5l1.9-0.6l2.5,0.9l0.7,0.5l1.4,0.9l2.1,0.3l2.5-2.3l0.3-0.4
                    l0.2-0.7l0-0.6l0-0.1l-0.1-0.5l-1.2-1.6l-0.4-1l0.2-0.8l0.9-0.5l1.7,0.4l1.3-0.4l0.7-1.4l-0.1-2.4l-0.6,0l-2.7-2.1l-0.4-0.2
                    l6.3-5.1l0.9-0.7l3.9-2.2l5.8-2.2l0.1,0l8.4-2.5l3.7-0.4l-2.2,6.1l-1.7,1.7l-3.9,0l-0.4,0l6.1,3.2l2.4,1.3l3.6,0.5l7.2-1.5l6.5-1.3
                    l3.1-1.8l2.6-3.1l3-4.7l2.3,1.2l10.6,0.6l1,1l0.5,2.3l0.3,2.3l0.4,1h21.3l7.4-1.7l1.6-1.1l0.7-1.1l0.7-1.2l1.4-1.6l1.3-1l3.6-1.9
                    l3-0.9l1.1-1.2l0.8-1.2l0.8-0.6l8.8-1.5l3,0l4.3,1.3l1.9,0.2l0.9,1.1l0.9,2.3l1.2,2.3l1.6,1.1l6.2,1.7l10.5,0.1l0.5-0.1l4.6-0.8
                    l0.2-1.2l1.9-4.2l5-3.3l4.9-0.5l2.5,2.4l1.9,3.3l0.3,0.4l1.5,1.8l2.2-0.7l0.4-0.6l0.7-1.3l0.2-1.8l-0.1-1.7l0.2-1.7l-0.1-0.8
                    l-0.4-0.9l-0.3-1.1l0.4-1.3l0.6-0.5l0.9-0.3l0.7,0l0.2,0.4l0.1,1.5l1.1,0.5L465,98l-1.5-0.1l-0.8-0.3l-1.9-0.8l-2.3-0.4l-8,1.4
                    l-2.5,1.2l-2.3,1.6l-2.4,1.3l-2.9,0.1l-3.4-1.9l-4.2-3.2l-0.8-0.1l-2.6-0.9l1.1-2.6l-0.4-2.1l-0.7-1.8l0.2-1.8l1.6-1.8l4.2-2.3
                    l1.7-1.6l1.2-4.9l0.8-1.8l2.2-3.3l1.3-0.8l1.8,0.1l8.8-1.8l2.5-1.3l-1.5-3.8l2.6-1.5l4.1,0.2l3,1.4l0.3,1.8l0.2,3.2l0.6,3l1.6,1.2
                    l2-1.3l0.8-5.3l1.5-1.6l2.1,0.7l1.6,2.4l1.3,2.8l1.2,1.9l1.7,0.4l1.8-0.4l1.6,0.3l1.1,2.5l-0.4,0.9l-2.2,3.3l-0.5,1.6l0.7,2
                    l1.3,1.6l0.4,1.9l0.3,1.6l8.7-0.1l-1.3-1.5l1.5-4.8l4.4,0.2l5.4,3.1l4.2,4l-3,0.7l0,1.7l2.3,2.3l0.1,0.1L510,98l4,1.1l6.4-0.6
                    l6-1.9l2.6-2.8l3.1-1.2l18.3,2.1h9.1l2.2,3.5l6.1,0l6.4,1.5l45,28.1l0.9,4.3l0.3,1.5l4.8,7.3l6.1,2.8l4.7,4.1l-0.1,10.3l-1.6,3.7
                    l-6.4,8.1l-0.8,2.2l-0.8,4.3l-0.6,1.7l-5.6,6.8l-5.3,9l-2.7,4.6l-2.8,8.1l-0.4,8.1l1.3,4l1.8,3.5l1.4,3.9l0.1,5.1l-1.6,3.2
                    l-2.5,2.6l-1.9,2.6l0.2,2.2l3.7,1.1l10,1.7l3.4-1.1l3.1,0.8l8.6-1.1l2.7,0.4l31,9.8l-0.3,2.7l0.7,0.6l1-0.1l0.6,0.7v1.4l-0.7,2.3
                    l-0.4,5.6l-0.5,2.6l0.3,2.3l2.1,3l4.1,3.1l17.5,5.7l6.3,6l3.7,2.1l7.1,2.3l2.3,0.1l1.1,0l4.2-1.2l7.2-3.6l1.7-2.4l0.4-1.8l0.1-2
                    l0.8-3l2.5-4.2l2.7-0.5l3.2,0.8l4.1-0.2l0.1-4.5l2.9-5.5l4.1-4.8l4.8-2.7l0.9-0.2l0.9,0.2l0.9,0.6h0v0l1.7,1.8l3.4,5.5l5.6,4.4
                    l1.5,1.8l0.9,4.1l-2,8.2L767.9,289.4z" />
            </g>
        </svg>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>


    <script>
        const svgmap = $("#mapsvg");
        const mapcontainer = $("#mapcontainer");
        const confirmbtn = $("#confirmbtn");
        const continuebtn = $("#continuebtn");
        const titlewrapper = $("#titlewrapper");
        const teamnamewrapper = $("#teamnamewrapper");
        const progressbar = $("#progress-bar");
        const roundendwrapper = $("#roundendwrapper");
        //coordinates CH: 
        //furthest west left 5.95590 
        //furthest east right  10.49219 
        //furthest north top  47.80845 
        //furthest south bottom  45.81796 

        const furthestNorth = 47.80845;
        const furthestWest = 5.95590;

        let questiondata = []

        $(document).ready(function() {
            getData().then((data) => {
                questiondata = data;
                // code that uses questionText, questionX, and questionY goes here
            }).catch((error) => {

            });

        });
        const getData = () => {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: "controller/map_getquestions.php",
                    type: "POST",
                    dataType: "json",
                    success: function(data) {
                        resolve(data);
                    },
                    error: function(xhr, status, error) {
                        reject(error);
                    }
                });
            });
        };

        let currentround = 0;
        let questionText
        let questionX
        let questionY
        let teamA = "Team Blau";
        let teamB = "Team Rot";
        let teamAplayed = false;
        let teamBplayed = false;
        let totalTurns = 0;
        let distanceM = 0;
        let teamAscore = 0;
        let teamBscore = 0;
        let clickingallowed = true;
        // initialize current team to teamA
        let currentTeam = 'teamB';

        function showSettings() {
            $("#landingpage").css("transform", "translateX(-100%)");
            $("#settings").css("transform", "translateX(0%)");
        }

        //doc ready function
        $("#settingsbackbtn").on("click", function() {
            $("#landingpage").css("transform", "translateX(0%)");
            $("#settings").css("transform", "translateX(100%)");
        });

        function switchTeam(currentround) {
            if (totalTurns % 2 == 0) {
                if (currentTeam === 'teamA') {
                    currentTeam = 'teamB';
                } else {
                    currentTeam = 'teamA';
                }
            }
            if (currentTeam === 'teamA') {
                currentTeam = 'teamB';
                teamBplayed = true;
            } else {
                currentTeam = 'teamA';
                teamAplayed = true;
            }
            console.log(currentTeam);
            console.log(teamAplayed);
            console.log(teamBplayed);

            totalTurns++;
        }

        function turnMade() {
            clickingallowed = true;
            //reset the progressbar
            progressbar.css("transform", "translateX(0%)");
            progressbar.css("transform", "none");
            if (teamAplayed == false && teamBplayed == false) {
                console.log("no team played");
                showTitle();
                setTimeout(function() {
                    showTeamName();
                }, 4000);
                switchTeam(currentround);
                roundController(0, currentTeam);
                return;
            } else if (teamAplayed && teamBplayed) {
                console.log("both teams played");
                currentround++;
                teamAplayed = false;
                teamBplayed = false;
                switchTeam(currentround);
                roundOver();
                setTimeout(function() {
                    showTitle();
                    setTimeout(function() {
                        showTeamName();
                    }, 4000);
                }, 5000);
                return;
            } else if (teamAplayed && !teamBplayed) {
                showTeamName();
                switchTeam(currentround);
                roundController(currentround, currentTeam);
                return;
            } else if (!teamAplayed && teamBplayed) {
                showTeamName();
                switchTeam(currentround);
                roundController(currentround, currentTeam);
                return;
            } else {
                return;
            }

        }

        function showTitle() {
            titlewrapper.addClass("transitions");
            titlewrapper.css("transform", "translateX(0%)");
            hideTitle();
        }

        function hideTitle() {
            let count = 3;
            let countdown = setInterval(function() {
                $("#countdown").removeClass("d-none");
                $("#countdown").text(count);
                count--;
                if (count < 0) {
                    $("#countdown").addClass("d-none");
                    clearInterval(countdown);
                    titlewrapper.css("transform", "translateX(-100%)");
                    setTimeout(function() {
                        titlewrapper.removeClass("transitions");
                        titlewrapper.css("transform", "translateX(100%)");
                    }, 500);
                }
            }, 1000);
        }

        function showTeamName() {
            teamnamewrapper.addClass("transitions");
            teamnamewrapper.css("transform", "translateX(0%)");
            setTimeout(function() {
                hideTeamName();
                progressbar.css("transform", "translateX(-100%)");
            }, 1500);

        }

        function hideTeamName() {
            teamnamewrapper.css("transform", "translateX(-100%)");
            setTimeout(function() {
                teamnamewrapper.removeClass("transitions");
                teamnamewrapper.css("transform", "translateX(100%)");
            }, 500);
        }


        function roundOver() {
            //remove all pins
            $(".pin").remove();
            roundendwrapper.addClass("transitions");
            roundendwrapper.css("transform", "translateX(0%)");

            const teamADifference = $('#teamAdifferenceText').text();
            const teamBDifference = $('#teamBdifferenceText').text();

            if (teamBDifference === "- KM") {
                $("#roundwinner").text("Team Blau gewinnt diese Runde!");
                teamBscore++;
            } else if (teamADifference === "- KM") {
                $("#roundwinner").text("Team Rot gewinnt diese Runde!");
                teamAscore++;
            } else {
                const teamANumericPart = parseFloat(teamADifference.match(/[\d.]+/)[0]);
                const teamBNumericPart = parseFloat(teamBDifference.match(/[\d.]+/)[0]);

                if (teamANumericPart < teamBNumericPart) {
                    $("#roundwinner").text("Team Rot gewinnt diese Runde!");
                    teamAscore++;
                } else if (teamBNumericPart < teamANumericPart) {
                    $("#roundwinner").text("Team Blau gewinnt diese Runde!");
                    teamBscore++;
                }
            }




            setTimeout(function() {
                roundendwrapper.css("transform", "translateX(-100%)");
                setTimeout(function() {
                    roundendwrapper.removeClass("transitions");
                    roundendwrapper.css("transform", "translateX(100%)");

                }, 500);
                if (currentround == 10) {
                    gameFinished();
                    return;
                }
                roundController(currentround, currentTeam);
            }, 5000);
        }

        function setScore(value, team) {
            $('#team' + team + 'differenceText').text(value);
            $('#team' + team + 'differenceText').text(value);
        }

        function gameFinished() {
            $("#gamefinished").css("transform", "translateX(0%)");
            $("#finalScoreA").text(teamAscore);
            $("#finalScoreB").text(teamBscore);
            if ($('#finalScoreA').text() < $('#finalScoreB').text()) {
                $("#gameWinner").text("Team Blau hat gewonnen!");
            } else {
                $("#gameWinner").text("Team Rot hat gewonnen!");
            }
        }

        function roundController(currentround, currentTeam) {

            simulateClick();

            currentround = currentround
            questionText = questiondata[currentround].Question
            questionX = questiondata[currentround].Xcoordinate
            questionY = questiondata[currentround].Ycoordinate

            if (currentTeam == 'teamA') {
                $(".teamName").text("Team Rot");
                $(".teamName").removeClass("text-info");
                $(".teamName").addClass("text-danger");

            } else {
                $(".teamName").text("Team Blau");
                $(".teamName").removeClass("text-danger");
                $(".teamName").addClass("text-info");
            }

            //remove all pins
            $("pinremove").remove();
            $("#landingpage").css("transform", "translateX(-100%)");
            $(".questionText").text(questionText);
            $("#currentRound").text(currentround + 1);
            continuebtn.addClass("d-none");
        }

        function simulateClick() {
            const svg = svgmap
            const svgElement = svg.get(0);
            const svgRect = svgElement.getBoundingClientRect();
            const centerX = svgRect.left + svgRect.width / 2;
            const centerY = svgRect.top + svgRect.height / 2;

            const clickEvent = new MouseEvent("click", {
                view: window,
                bubbles: true,
                cancelable: true,
                clientX: centerX,
                clientY: centerY
            });

            svgElement.dispatchEvent(clickEvent);
        }



        //on click, get mouse position relative to svgmap
        svgmap.on("click", function(e) {
            if (clickingallowed == false) return
            let offset = $(this).offset();
            let relativeX = (e.pageX - offset.left);
            let relativeY = (e.pageY - offset.top);

            const CordXdiff = 4.53629
            const CordYdiff = 1.99049
            confirmbtn.removeClass("d-none");

            //get the width and height of the svgmap
            const pathElement = document.getElementById('mapsvg');
            const svgRectSizing = pathElement.getBoundingClientRect();
            const svgmapWidth = svgRectSizing.width
            const svgmapHeight = svgRectSizing.height


            const Xmultiplier = CordXdiff / svgmapWidth;
            const Ymultiplier = CordYdiff / svgmapHeight;

            //onclick get the relative position of the mouse relative to the svgmap

            const mouseX = e.clientX - svgRectSizing.left;
            const mouseY = e.clientY - svgRectSizing.top;

            let toCoordinateX = mouseX * Xmultiplier;
            let toCoordinateY = mouseY * Ymultiplier;

            /*
                        let AbsoluteX = 1000000;
            let AbsoluteY = 1000000;

            AbsoluteX = toCoordinateX + furthestWest;
            AbsoluteY = ((toCoordinateY - furthestNorth) * -1);
            */



            let AbsoluteX = toCoordinateX + furthestWest;
            let AbsoluteY = ((toCoordinateY - furthestNorth) * -1);

            //remove all answerpin
            $(".answerpin").remove();
            //remove the pin if it exists
            $(".pinremove").remove();
            let pincolor;
            if (currentTeam == "teamB") {
                pincolor = "pinblue";
            } else {
                pincolor = "pinred";
            }

            //remove the pin if it exists
            $(".pinremove").remove();

            const pin = '<div class="d-flex justify-content-center align-items-center position-absolute pin pinremove ' + pincolor + '" style=" top: ' + e.pageY + 'px; left: ' + e.pageX + 'px;"><svg xmlns="http: //www.w3.org/2000/svg" class="svgpin" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 192c0 87.4-117 243-168.3 307.2c-12.3 15.3-35.1 15.3-47.4 0C117 435 0 279.4 0 192C0 86 86 0 192 0S384 86 384 192z"/></svg></div>'

            let userMouseInputX = e.pageX
            let userMouseInputY = e.pageY

            mapcontainer.append(pin);

            //get the difference between the mouse position and the question position
            let diffX = questionX - AbsoluteX;
            let diffY = questionY - AbsoluteY;

            let questionXconverted = ((questionX - furthestWest) / Xmultiplier) + svgRectSizing.left;
            let questionYconverted = (((questionY - furthestNorth) * -1) / Ymultiplier) + svgRectSizing.top;

            confirmbtn.on("click", function(e) {
                const valid = true;
                turnEnded(valid, questionXconverted, questionYconverted, questionX, questionY, AbsoluteX, AbsoluteY, questionX, questionY, AbsoluteX, AbsoluteY);
            });
            progressbar.on("transitionend", function(event) {
                console.log("transition ended");
                const valid = false;
                turnEnded(valid, questionXconverted, questionYconverted, questionX, questionY, AbsoluteX, AbsoluteY, questionX, questionY, AbsoluteX, AbsoluteY);
            });
        });

        function turnEnded(valid, questionXconverted, questionYconverted, questionX, questionY, AbsoluteX, AbsoluteY, questionX, questionY, AbsoluteX, AbsoluteY) {
            clickingallowed = false;
            if (currentTeam == "teamA") {
                if (valid == false) {
                    console.log("invalid");
                    setScore("- KM", "A");
                } else {
                    let distanceMeters = getDistanceFromLatLonInM(questionX, questionY, AbsoluteX, AbsoluteY);
                    distanceMeters = distanceMeters / 1000;
                    setScore(distanceMeters.toFixed(2) + " KM", "A");
                }
            }
            if (currentTeam == "teamB") {
                if (valid == false) {
                    console.log("invalid");
                    setScore("- KM", "A");
                } else {
                    let distanceMeters = getDistanceFromLatLonInM(questionX, questionY, AbsoluteX, AbsoluteY);
                    distanceKM = distanceMeters / 1000;
                    setScore(distanceKM.toFixed(2) + " KM", "B");
                }
            }

            $(".pin").removeClass("pinremove");
            //remove all answerpin
            $(".answerpin").remove();
            if (teamBplayed == true && teamAplayed == true) {
                const answerpin = '<div class="d-flex justify-content-center align-items-center position-absolute pin answerpin" style=" top: ' + questionYconverted + 'px; left: ' + questionXconverted + 'px;"><svg xmlns="http: //www.w3.org/2000/svg" class="svgpin" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 192c0 87.4-117 243-168.3 307.2c-12.3 15.3-35.1 15.3-47.4 0C117 435 0 279.4 0 192C0 86 86 0 192 0S384 86 384 192z"/></svg></div>';
                mapcontainer.append(answerpin);
            }
            confirmbtn.addClass("d-none");
            continuebtn.removeClass("d-none");
            // get the progressbar current position
            progressbar.css("transform", progressbar.css("transform"));
        }

        function getDistanceFromLatLonInM(lat1, lon1, lat2, lon2) {
            let R = 6371; // Radius of the earth in km
            let dLat = deg2rad(lat2 - lat1); // deg2rad below
            let dLon = deg2rad(lon2 - lon1);
            let a =
                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
            let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            let distanceM = R * c * 1000; // Distance in M
            return distanceM;
        }

        function deg2rad(deg) {
            return deg * (Math.PI / 180)
        }
    </script>

</body>

</html>