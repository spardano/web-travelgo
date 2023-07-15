<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tiket View</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
</head>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Staatliches&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body,
    html {
        height: 100vh;
        display: grid;
        font-family: "Staatliches", cursive;
        background: #d83565;
        color: black;
        font-size: 14px;
        letter-spacing: 0.1em;
    }

    .ticket {
        margin: auto;
        display: flex;
        background: white;
        box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
    }

    .left {
        display: flex;
    }

    .image {

        height: 250px;
        opacity: 0.85;

    }

    .logotravel {
        background-image: url("../assets/img/logtiket.png");
        position: absolute;
        color: darkgray;
        height: 300px;
        width: 300px;
        display: flex;
        text-align: center;
        writing-mode: vertical-rl;
        transform: rotate(-180deg);
    }

    .admit-one {
        background-image: url("../assets/img/jmtlogo2.png");
        position: absolute;
        color: darkgray;
        height: 250px;
        width: 80px;
        padding: 0 10px;
        letter-spacing: 0.15em;
        display: flex;
        text-align: center;
        justify-content: space-around;
        writing-mode: vertical-rl;
        transform: rotate(-180deg);
        background-size: contain;
    }

    .admit-one span:nth-child(2) {
        color: white;
        font-weight: 700;
    }

    .left .ticket-number {
        height: 250px;
        width: 250px;
        display: flex;
        justify-content: flex-end;
        align-items: flex-end;
        padding: 5px;
    }

    .ticket-info {
        padding: 10px 30px;
        flex-direction: column;
        justify-content: space-between;
        margin-left: 80px;
    }

    .date {
        border-top: 1px solid gray;
        border-bottom: 1px solid gray;
        padding: 5px 0;
        font-weight: 500;
        display: flex;
        align-items: center;
        justify-content: space-around;
        text-align: center;
    }

    .date span {
        width: 100px;
    }

    .date span:first-child {
        text-align: left;
    }

    .date span:last-child {
        text-align: right;
    }


    .show-name {
        font-size: 20px;
        font-family: "Nanum Pen Script", cursive;
        color: gray;
        padding-top: 10px;
    }


    .show-name h1 {
        font-size: 48px;
        font-weight: 700;
        letter-spacing: 0.1em;
        color: #4a437e;
    }

    .time {
        color: #4a437e;
        text-align: center;
        display: flex;
        flex-direction: column;
        gap: 10px;
        font-weight: 700;
        padding-top: 5px;
    }

    .time span {
        font-weight: 400;
        color: gray;
    }

    .left .time {
        font-size: 16px;
    }


    .location {
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 100%;
        padding-top: 8px;
    }

    .location .separator {
        font-size: 20px;
    }

    .right {
        width: 180px;
        border-left: 1px dashed #404040;
        align-items: center;
    }


    .right .right-info-container {
        height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
    }

    .right .show-name h1 {
        font-size: 18px;
        align-items: center;
    }

    .barcode {
        height: 60px;
        align-items: center;
    }

    .barcode img {
        height: 100%;
    }

    .right .ticket-number {
        color: white;
    }
</style>

<body>
    <!-- partial:index.partial.html -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <div class="ticket">
        <div class="left">
            <p class="admit-one">
                {{-- <span>ADMIT ONE</span>
                    <span>ADMIT ONE</span>
                    <span>ADMIT ONE</span> --}}
            </p>
            <div class="ticket-info">
                <p class="date">
                    <span>Pekanbaru</span>
                    <span>Bukittinggi</span>
                    <span>Padang</span>
                </p>
                <div class="show-name">
                    <p style="border: 2px solid #222;">
                        <span style="font-family:'Courier New', Courier, monospace">Tanggal</span>:
                        <span style="font-family:'Courier New', Courier, monospace; color:red">29 Januari
                            2023</span>
                    </p>
                </div>
                <div class="show-name">
                    <Table>
                        <tr>
                            <td style="font-family:'Times New Roman', Times, serif;">Nama :</td>
                            <td style="font-family:'Times New Roman', Times, serif;">Aldian Willia</td>
                        </tr>
                        <tr>
                            <td style="font-family:'Times New Roman', Times, serif;">Kelas :</td>
                            <td style="font-family:'Times New Roman', Times, serif;">Esekutif</td>
                        </tr>
                        <tr>
                            <td style="font-family:'Times New Roman', Times, serif;">Tujuan :</td>
                            <td style="font-family:'Times New Roman', Times, serif;">Bukittinggi</td>
                        </tr>
                    </Table>
                </div>
                <div class="time" style="padding-top: 20px;">
                    <p style="padding-bottom: 10px;">Berangkat <span>@</span> 7:00 PM <span style="padding-left: 35px;">
                            status : </span> Lunas</p>
                </div>
                <div style="border: 2px solid #222;">
                    <p class="location" style="padding-top: 5px">
                        <span>www.Jasamulya..com</span>
                        <span class="separator"><i class="far fa-smile"></i></span>
                        <span>www.travelgo.com</span>
                    </p>
                    <p class="location">
                        <span>Mengutamakan Pelayanan Terbaik</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="right" style="background-color:darkorange">
            <div class="right-info-container">
                <div class="show-name">
                    <img height="30px" width="180px" src="{{ asset('assets/img/fixtravelgo.png') }}" alt="">
                </div>
                <div class="time">
                    <p>Inova <span>:</span> BM 1999 TL</p>
                    <p>N0 Bangku :</p>
                </div>
                <div class="barcode" style="background-color: aliceblue; border: 2px solid #222;">
                    <h1
                        style="color: dimgrey; font-family:Arial, Helvetica, sans-serif; font-size: 50px;  font-weight: 700; ">
                        A1
                    </h1>
                </div>
                <p class="ticket-number">
                    #20030220
                </p>
            </div>
        </div>
    </div>

</body>

</html>
