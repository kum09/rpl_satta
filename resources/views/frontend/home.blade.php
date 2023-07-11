@extends('layouts/frontend/main')
@section('main-section')
    <section class="head_marquee home">
        <img class="ban_img" src="{{('public/assets/frontend/images/sattaBanner.jpg')}}">
        <div class="container-fluid">
            <div class="heading">
                <h2>
                    WELCOME
                    <br>
                    TO
                    <br>
                    <strong>
                        RPL Lottry Satta
                    </strong>
                </h2>
            </div>
            <marquee onmouseover="this.stop();" onmouseout="this.start();">
                <h2>
                    आर.पी.एल रियल सट्टा में आपका स्वागत है
                </h2>
            </marquee>

        </div>

    </section>

    <div class="latest_result">
        <div>
            <h2>Today Latest Result</h2>
            <h3>RPL Lottry Satta</h3>
            <div class="d-flex justify-content-center">
                <div class="border_style">
                    <div class="number_lottry">
                        <span>X</span>
                        <span>X</span>
                    </div>
                </div>

            </div>

            <!-- <img src="./images/d.gif"> -->
            <p>Result out in <strong id="current-time"></strong></p>
        </div>
    </div>

    <div class="card-row" id="cardContainer"></div>
@endsection