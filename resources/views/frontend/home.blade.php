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
            <p>(Time: {{ date('h:i A', strtotime($yesterday_result->result_time)) }})</p>  
            <div class="d-flex justify-content-center">
                <div class="border_style">
                    <div class="number_lottry align-items-center">
                        <span>{{$yesterday_result->result}}</span>
                        <img src="{{ url('public/assets/frontend/images/new.gif') }}">
                        <span>{{$today_result->result}}</span>
                    </div>
                </div> 
            </div>  
            <p>Result out in <strong id="current-time"></strong></p>
        </div>
    </div>
 
        <div class="card-row" id="cardContainer">
        @php
           $colorPosition = 0;
        @endphp
        @foreach($yesterday_results_list as $index => $result) 
        @php 
        $color = array('#cdcdcd', '#fff', '#ffd700'); 
        @endphp 
        <div class="result_box_card"
        @for($i = $colorPosition; $i < 3;)
             style="background: {{$color[$colorPosition] }}"
            @break; 
        @endfor
        >
        @php
        $colorPosition++;
        @endphp
        <div>
            <h2>RPL SATTA</h2> 
            <p>(Time: {{ date('h:i A', strtotime($result->result_time)) }})</p>  
            <div class="time">
                <span id="yesterday">{{$result->result}}</span>
                <img src="{{ url('public/assets/frontend/images/new.gif') }}">
                @if(isset($today_results_list[$index]))
                @if(Carbon\Carbon::now('Asia/Kolkata')->format('H:i:s')  >= $result->result_time)
                <span id="today" class="new">{{$today_results_list[$index]->result}}</span>
                @else
                <span class="new">XX</span>
                @endif
                @else
                <span class="new">XX</span>
                @endif
            </div>
            <button class="view_chart">View Chart</button>
        </div>
    </div> 
    @php if($colorPosition >= 3){ $colorPosition = 0; } @endphp

    @endforeach
</div>

@endsection