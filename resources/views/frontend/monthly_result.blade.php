@extends('layouts/frontend/main')
@section('main-section')
    @php
        $page_url = Route::currentRouteName();   
        if($page_url == 'frontend.monthly_result_a'){ 
            $monthely_url = "monthly-result-a";  
            $top_heading_bg_color = "#0f3562";
            $top_heading_text_color = "red";
            $hindi_text_color = "#24a699";
            $th_bg_color = "#0f3562";
            $th_text_color = "#fff";
            $td_bg_color = "red";
            $td_text_color = "#fff";
            $td_border_color = "#fff";
        }
        else if($page_url == 'frontend.monthly_result_b'){ 
            $monthely_url = "monthly-result-b"; 
            $top_heading_bg_color = "#036329";
            $top_heading_text_color = "#fff";
            $hindi_text_color = "#036329";
            $th_bg_color = "#036329";
            $th_text_color = "#fff";
            $td_bg_color = "#fff";
            $td_text_color = "red";
            $td_border_color = "red";
        }
        else if($page_url == 'frontend.monthly_result_c'){  
            $monthely_url = "monthly-result-c";  
            $top_heading_bg_color = "#f51c7e";
            $top_heading_text_color = "#fff";
            $hindi_text_color = "#0c4a25";
            $th_bg_color = "#f51c7e";
            $th_text_color = "#fff";
            $td_bg_color = "#fff";
            $td_text_color = "#f51c7e";
            $td_border_color = "#f51c7e";
        }
        else if($page_url == 'frontend.monthly_result_d'){  
            $monthely_url = "monthly-result-d"; 
            $top_heading_bg_color = "#8d0000";
            $top_heading_text_color = "#fff";
            $hindi_text_color = "#8d0000";
            $th_bg_color = "#8d0000";
            $th_text_color = "#fff";
            $td_bg_color = "#fff";
            $td_text_color = "#8d0000";
            $td_border_color = "#8d0000";
        }  
    @endphp

<section class="marquee_wrapper" style="background:{{$top_heading_bg_color}};">
        <div class="satta_banner_heading">
            <h2 style="color:{{$top_heading_text_color}};">
                RPL Real Satta
            </h2>
        </div>
    </section>
    @php 
        $current_date = Carbon\Carbon::now('Asia/Kolkata')->format('Y-m-d');
        $todays_date2 = $_GET['result_date'];
    @endphp
    <section class="phli_news">
        <div class="container">
            <p id="phliNewsTime">{{ date('D, d M Y', strtotime($todays_date2)) }}</p>
            <img src="{{url('public/assets/frontend/images/down.gif')}}">
            <p class="hindi_text" style="color:{{$hindi_text_color}};">!! हाँ  भाई यहीं  आती हे सबसे पहले खबर रूको और देखो !!</p>
            <h2>RPL SATTA</h2> 
            <form method="GET" action="{{url($monthely_url)}}?result_date={{$todays_date2}}">
            <input type="date" name="result_date" value="{{isset($_GET['result_date']) && $_GET['result_date'] ? $_GET['result_date'] : $current_date}}" max="{{$current_date}}">
            <input type="submit" value="Submit">
        </div>
    </section>
   
    <section class="octoberresultchart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>{{date('F', strtotime($todays_date2))}} Result Chart {{date('d F, Y', strtotime($todays_date2))}}</h1>
                </div>
            </div>
        </div>
    </section> 
   
    <section class="newtable">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="p-0">
                    <tr>
                        <th class="table_chart_section_01 forfirtcolor text-center" style="background:{{$th_bg_color}}; color:{{$th_text_color}};">
                            <strong class="fon">Date</strong>
                        </th>
                        <!-- Add the time headers here -->
                        @foreach ($all_result_time as $index => $time)
                        @if($index >9)
                        @break;
                        @endif
                            <th class="table_chart_section_01 forfirtcolor text-center" style="background:{{$th_bg_color}}; color:{{$th_text_color}};">
                                <strong class="fon">{{date('g:i A', strtotime($all_result_time[$index]->result_declare_time)) }}</strong>
                            </th> 
                        @endforeach
                    </tr>
                </thead>
                <tbody class="colorchange">
                    <tr> 
                        <td class="text-center forfirtcolor" style="background:{{$th_bg_color}};"> 
                        {{ date('d-m-Y', strtotime($todays_date2)) }}
                        </td> 
                        @foreach ($all_result_time as $index => $time)
                        @if($index >9)
                        @break;
                        @endif

                        @php 
                        $results = App\Models\admin\Result::where('date', $todays_date2)->where('result_time', $all_result_time[$index]->result_declare_time)->first();
                        @endphp 
                        <td class="text-center" style="background:{{$td_bg_color}}; color:{{$td_text_color}}; border:1px solid {{$td_border_color}};">
                            @if($results != '')
                            @if($todays_date2 == Carbon\Carbon::now('Asia/Kolkata')->format('Y-m-d'))
                            @if(Carbon\Carbon::now('Asia/Kolkata')->format('H:i:s')  >= $all_result_time[$index]->result_declare_time)
                            {{$results->result}} 
                            @else
                            XX
                            @endif
                            @else
                            {{$results->result}}
                            @endif
                            @else
                            XX
                            @endif
                            </td> 
                       @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </section>


    <section class="newtable">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="p-0">
                    <tr>
                        <th class="table_chart_section_01 forfirtcolor text-center" style="background:{{$th_bg_color}}; color:{{$th_text_color}};">
                            <strong class="fon">Date</strong>
                        </th>
                        <!-- Add the time headers here -->
                        @foreach ($all_result_time as $index => $time)
                        @if ($index >= 10 && $index <= 19)
                            <th class="table_chart_section_01 forfirtcolor text-center" style="background:{{$th_bg_color}}; color:{{$th_text_color}};">
                                <strong class="fon">{{date('g:i A', strtotime($all_result_time[$index]->result_declare_time)) }}</strong>
                            </th> 
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody class="colorchange">
                    <tr>
                    <td class="text-center forfirtcolor" style="background:{{$th_bg_color}}; color:{{$th_text_color}};">
                    {{ date('d-m-Y', strtotime($todays_date2)) }}
                        </td>
                        
                        @foreach ($all_result_time as $index => $time)
                        @if ($index >= 10 && $index <= 19) 
                        @php 
                        $results = App\Models\admin\Result::where('date', $todays_date2)->where('result_time', $all_result_time[$index]->result_declare_time)->first();
                        @endphp

                        <td class="text-center" style="background:{{$td_bg_color}}; color:{{$td_text_color}}; border:1px solid {{$td_border_color}};">
                        @if($results != '')
                            @if($todays_date2 == Carbon\Carbon::now('Asia/Kolkata')->format('Y-m-d'))
                            @if(Carbon\Carbon::now('Asia/Kolkata')->format('H:i:s')  >= $all_result_time[$index]->result_declare_time)
                            {{$results->result}} 
                            @else
                            XX
                            @endif
                            @else
                            {{$results->result}}
                            @endif
                            @else
                            XX
                            @endif
                            </td> 
                            @endif
                       @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </section>


    <section class="newtable">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="p-0">
                    <tr>
                        <th class="table_chart_section_01 forfirtcolor text-center" style="background:{{$th_bg_color}}; color:{{$th_text_color}};">
                            <strong class="fon">Date</strong>
                        </th>
                        <!-- Add the time headers here -->
                        @foreach ($all_result_time as $index => $time)
                        @if ($index >= 20 && $index <= 29)
                            <th class="table_chart_section_01 forfirtcolor text-center" style="background:{{$th_bg_color}}; color:{{$th_text_color}};">
                                <strong class="fon">{{date('g:i A', strtotime($all_result_time[$index]->result_declare_time)) }}</strong>
                            </th> 
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody class="colorchange">
                    <tr>
                    <td class="text-center forfirtcolor" style="background:{{$th_bg_color}}; color:{{$th_text_color}};">
                    {{ date('d-m-Y', strtotime($todays_date2)) }}
                        </td>
                        
                        @foreach ($all_result_time as $index => $time)
                        @if ($index >= 20 && $index <= 29) 
                        @php 
                        $results = App\Models\admin\Result::where('date', $todays_date2)->where('result_time', $all_result_time[$index]->result_declare_time)->first();
                        @endphp

                        <td class="text-center" style="background:{{$td_bg_color}}; color:{{$td_text_color}}; border:1px solid {{$td_border_color}};">
                        @if($results != '')
                            @if($todays_date2 == Carbon\Carbon::now('Asia/Kolkata')->format('Y-m-d'))
                            @if(Carbon\Carbon::now('Asia/Kolkata')->format('H:i:s')  >= $all_result_time[$index]->result_declare_time)
                            {{$results->result}} 
                            @else
                            XX
                            @endif
                            @else
                            {{$results->result}}
                            @endif
                            @else
                            XX
                            @endif
                            </td> 
                            @endif
                       @endforeach
                  
                    </tr>
                </tbody>
            </table>
        </div>
    </section>



    <section class="newtable">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="p-0">
                    <tr>
                        <th class="table_chart_section_01 forfirtcolor text-center" style="background:{{$th_bg_color}}; color:{{$th_text_color}};">
                            <strong class="fon">Date</strong>
                        </th>
                        <!-- Add the time headers here -->
                        @foreach ($all_result_time as $index => $time)
                        @if ($index >= 30 && $index <= 39)
                            <th class="table_chart_section_01 forfirtcolor text-center" style="background:{{$th_bg_color}}; color:{{$th_text_color}};">
                                <strong class="fon">{{date('g:i A', strtotime($all_result_time[$index]->result_declare_time)) }}</strong>
                            </th> 
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody class="colorchange">
                    <tr>
                    <td class="text-center forfirtcolor" style="background:{{$th_bg_color}}; color:{{$th_text_color}};">
                    {{ date('d-m-Y', strtotime($todays_date2)) }}
                        </td> 
                        
                        @foreach ($all_result_time as $index => $time)
                        @if ($index >= 30 && $index <= 39) 
                        @php 
                        $results = App\Models\admin\Result::where('date', $todays_date2)->where('result_time', $all_result_time[$index]->result_declare_time)->first();
                        @endphp

                        <td class="text-center" style="background:{{$td_bg_color}}; color:{{$td_text_color}}; border:1px solid {{$td_border_color}};">
                        @if($results != '')
                            @if($todays_date2 == Carbon\Carbon::now('Asia/Kolkata')->format('Y-m-d'))
                            @if(Carbon\Carbon::now('Asia/Kolkata')->format('H:i:s')  >= $all_result_time[$index]->result_declare_time)
                            {{$results->result}} 
                            @else
                            XX
                            @endif
                            @else
                            {{$results->result}}
                            @endif
                            @else
                            XX
                            @endif
                        </td> 
                            @endif
                       @endforeach
                  
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
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

   

 
  



 
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <script>
        const d = new Date();
        document.getElementById("phliNewsTime").innerHTML = d.toUTCString();
    </script> -->

@endsection