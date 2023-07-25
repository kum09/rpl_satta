@extends('layouts/frontend/main')
@section('main-section')
@php 
        $color= array();
        $page_url = Route::currentRouteName();
    

        if($page_url == 'frontend.rpl_satta_a'){
            $color = array('#cdcdcd', '#fff', '#ffd700');
            $bgimg = "public/assets/frontend/images/sattaBanner.jpg";
            $monthely_url = "monthly-result-a";
           
        }else if($page_url == 'frontend.rpl_satta_b'){
            $color = array('#bffef8', '#ffffff', '#fffbe4'); 
            $bgimg = "public/assets/frontend/images/index2ban.jpg";  
            $monthely_url = "monthly-result-b";
           
        }else if($page_url == 'frontend.rpl_satta_c'){
            $color = array('#bffef8', '#ffffff', '#fffbe4');
            $bgimg = "public/assets/frontend/images/index2ban.jpg"; 
            $monthely_url = "monthly-result-c";
          
        }else if($page_url == 'frontend.rpl_satta_d'){
            $color = array('#3ee4ff', '#cf0', '#ffb021'); 
            $bgimg = "public/assets/frontend/images/index2ban.jpg";
            $fontcolor_d = "#fff";  
            $monthely_url = "monthly-result-d";
            
        }else{
            $color = array('#cdcdcd', '#fff', '#ffd700'); 
            $bgimg = "public/assets/frontend/images/sattaBanner.jpg"; 
            $monthely_url = "monthly-result-a";
        } 
 
        @endphp 
    <section class="head_marquee home">
        <img class="ban_img" src="{{ $bgimg }}">
        <div class="container-fluid">
            <div class="heading">
                <h2 style="color: {{$page_url == 'frontend.rpl_satta_d' ? $fontcolor_d:''}}">
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
            <h3 id="demo"></h3> 
        </div>

    </section>
@php 
    $todays_date = Carbon\Carbon::now('Asia/Kolkata')->format('Y-m-d');
    $yesterdays_date = Carbon\Carbon::yesterday('Asia/Kolkata')->format('Y-m-d'); 
@endphp

    <div class="latest_result">
        <div>
            <h2>Today Latest Result</h2>
            <h3>RPL Lottry Satta</h3>
            <p>(Time: {{ date('h:i A', strtotime($last_result_time->result_declare_time)) ?? "" }})</p>  
            <p id="last_resutl_time" style="display:none;">{{$last_result_time->result_declare_time}}</p>
            <div class="d-flex justify-content-center">
                <div>
                <center><img src="{{url('public/assets/frontend/images/down.gif')}}"></center>
                    <div class="number_lottry align-items-center" style="font-size: 40px; font-weight: bold; background: red; color: #fff;"> 
                        @php
                        $todays_last_result = App\Models\admin\Result::whereDate('date', $todays_date)->where('result_time', $last_result_time->result_declare_time)->first();
                       
                        @endphp 
                        <span>{{$todays_last_result->result ?? 'XX'}}</span>
                    </div>
                    <center><img src="{{url('public/assets/frontend/images/new2.gif')}}" width="30%"></center>
                </div> 
            </div>  
            <!-- <p>Result out in <strong id="current-time"></strong></p> -->
        </div>
    </div>
 
        <div class="card-row" id="cardContainer">
        @php
           $colorPosition = 0;
        @endphp
        @foreach($time_list as $index => $time) 
        
       
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
            <p>(Time: {{ date('h:i A', strtotime($time->result_declare_time)) }})</p>  
            <div class="time">
                @php 
                $yesterdays_result = App\Models\admin\Result::whereDate('date', $yesterdays_date)->where('result_time', $time->result_declare_time)->first();
                @endphp 
                 <span id="yesterday">
                {{$yesterdays_result->result ?? 'XX'}}
                </span> 
                 <img src="{{ url('public/assets/frontend/images/new.gif') }}"> 
                @php 
                $todays_result = App\Models\admin\Result::whereDate('date', $todays_date)->where('result_time', $time->result_declare_time)->first();
                @endphp
                @if(Carbon\Carbon::now('Asia/Kolkata')->format('H:i:s')  >= $time->result_declare_time)
                <span id="today" class="new">
                {{$todays_result->result ?? 'XX'}}
                </span>
                @else
                <span id="today" class="new">
                XX
                </span>
                @endif 
            </div>
            <a href="{{url($monthely_url)}}?result_date={{$todays_date}}" class="view_chart">View Chart</a>
        </div>
    </div> 
    @php if($colorPosition >= 3){ $colorPosition = 0; } @endphp

    @endforeach
</div>
<section class="news_letter">
        <marquee>
            <div class="emai_wrap">
                <a href="https://api.whatsapp.com/send?phone=8607013464" class='whatsapp_icon' target="_blank"
                    rel="noopener noreferrer">
                    Contact Us : +91-{{$advertisement_list->mobile_number}} (Only Whatsaap)
                </a>
                <a href="#" target="_blank">
                    Email : {{$advertisement_list->email}}
                </a>
            </div>
        </marquee>

    </section>
@endsection