<style>
    @import url("https://fonts.googleapis.com/css?family=Roboto");

    body {
        background-color: rgb(30, 30, 30);
    }

    .morty {
        position: absolute;
        top: 30px;
        left: 0;
        width: 0;
        height: 0;
    }

    .hair {
        position: absolute;
        left: 590px;
        top: 30px;
        width: 270px;
        height: 160px;
        background: #8a4d18;
        border-radius: 50% 50% 20% 20%;
        border: 3px solid;
    }

    .face {
        position: absolute;
        left: 600px;
        top: 70px;
        width: 250px;
        height: 250px;
        background: #ffd2a1;
        border-radius: 47%;
        border: 3px solid;
    }

    .ears {
        position: absolute;
        left: 576px;
        top: 170px;
        background: #ffd2a1;
        height: 35px;
        width: 30px;
        border-radius: 50% 10% 10% 50%;
        border: 2px solid;
    }

    .ears::after {
        content: "";
        position: absolute;
        left: 267px;
        top: 0px;
        background: #ffd2a1;
        height: 35px;
        width: 30px;
        border-radius: 10% 50% 50% 10%;
        border: 2px solid;
    }

    .eyes {
        position: absolute;
        top: 130px;
        left: 630px;
        width: 70px;
        height: 70px;
        background: white;
        border-radius: 50%;
        border: 2px solid;
    }

    .eyes::after {
        content: "";
        position: absolute;
        top: 0px;
        left: 120px;
        width: 70px;
        height: 70px;
        background: white;
        border-radius: 50%;
        border: 2px solid;
    }

    .eyes::before {
        content: "";
        position: absolute;
        top: 33px;
        left: 30px;
        width: 10px;
        height: 10px;
        background: black;
        border-radius: 50%;
        z-index: 50;
        box-shadow: 120px 0px;
        animation: anim2 2s infinite;
    }

    .mouth {
        position: absolute;
        top: 250px;
        left: 705px;
        height: 20px;
        width: 12px;
        border: 2px solid black;
        border-top: 0px;
        border-radius: 0px 0px 45px 45px;
        transform: rotatez(10deg);
    }

    .mouth::after {
        content: "";
        position: absolute;
        top: 7px;
        left: 11.5px;
        height: 20px;
        width: 12px;
        border: 2px solid black;
        border-top: 0px;
        border-radius: 0px 0px 45px 45px;
        animation: anim 0.5s infinite;
        transform-origin: -5% -10%;
    }

    .nose {
        position: absolute;
        top: 200px;
        left: 715px;
        height: 20px;
        width: 15px;
        border: 2px solid black;
        border-top: 0px;
        border-radius: 0px 0px 45px 45px;
        transform: rotatez(0deg);
    }

    .lines {
        position: absolute;
        top: 116px;
        left: 643px;
        height: 2px;
        width: 50px;
        border: 3.2px solid black;
        border-top: 0px;
        border-left: 0px;
        border-right: 0px;
        border-radius: 0px 0px 50% 50%;
        transform: rotatez(170deg);
    }

    .lines::before {
        content: "";
        position: absolute;
        top: -22px;
        right: 120px;
        height: 2px;
        width: 50px;
        border: 3.2px solid black;
        border-top: 0px;
        border-left: 0px;
        border-right: 0px;
        border-radius: 0px 0px 50% 50%;
        transform: rotatez(20deg);
    }

    h2 {
        position: absolute;
        top: -60px;
        left: 450px;
        marigin: 0px;
        color: white;
        font-size: 200px;
        font-family: "Roboto", sans-serif;
    }

    .four {
        position: absolute;
        top: -60px;
        left: 900px;
        marigin: 0px;
        color: white;
        font-size: 200px;
        font-family: "Roboto", sans-serif;
    }

    h1 {
        position: absolute;
        top: 300px;
        left: 580px;
        marigin: 0px;
        color: white;
        font-size: 100px;
        font-family: "Roboto", sans-serif;
    }

    @keyframes anim {
        0% {
            transform: rotatez(0deg);
        }

        50% {
            transform: rotatez(-10deg);
        }

        100% {
            transform: rotatez(0deg);
        }
    }

    @keyframes anim2 {
        0% {
            transform: translatex(-20px);
        }

        50% {
            transform: translatex(20px);
        }

        100% {
            transform: translatex(-20px);
        }
    }

    h3 {
        position: absolute;
        top: -50px;
        left: 560px;
        font-size: 50px;
        font-family: "Roboto", sans-serif;
        color: white;
        width: 400px;
    }
</style>

<body>
    <h3>OH JEEZ, IT'S A</h3>
    <h2>4</h2>
    <h2 class="four">4</h2>
    <div class="morty">
        <div class="hair"></div>
        <div class="ears"></div>
        <div class="face"></div>
        <div class="eyes"></div>
        <div class="nose"></div>
        <div class="mouth"></div>
        <div class="lines"></div>
    </div>
    <h1>ERRORS</h1>
</body>