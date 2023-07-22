@extends('layouts/admin/main') 
@section('main-section')
            @php 
                $todays_date = Carbon\Carbon::now('Asia/Kolkata')->format('Y-m-d');
                $yesterdays_date = Carbon\Carbon::yesterday('Asia/Kolkata')->format('Y-m-d'); 
            @endphp

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="row"> 
                                @foreach($time_list as $index => $time) 
                                @php 
                                $todays_result = App\Models\admin\Result::whereDate('date', $todays_date)->where('result_time', $time->result_declare_time)->first();
                                @endphp
                                    <div class="col-lg-3 col-md-3 col-sm-4 mb-4">
                                        <div class="card">
                                            <div class="card_head">
                                                <h2>RPL</h2>
                                                @if(Carbon\Carbon::now('Asia/Kolkata')->format('H:i:s')  >= $time->result_declare_time)
                                                <p>
                                                {{$todays_result->result ?? 'XX'}}
                                                </p>
                                                @else
                                                <p>
                                                XX 
                                                </p>
                                                @endif

                                                 
                                            </div>
                                            <span>
                                                <i class="fa-solid fa-clock"></i> {{ date('h:i A', strtotime($time->result_declare_time)) }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                                    
                                   
                                </div>
                            </div>
                            <div class="col-lg-3 mb-3 px-0">
                                <div class="result_history">
                                    <h4>
                                        Recent History
                                    </h4>
                                    <form>
                                        <div class="form-group">
                                            <label for="selectGame" class="form-label">Game</label>
                                            <select class="form-control" id="selectGame" aria-label="selectGame">
                                                <option selected>RPL Satta King</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="selecttime" class="form-label">Date</label>
                                            <input class="form-control" type="date" name="filter_date_dashboard" id="filter_date_dashboard">
                                            
                                        </div>
                                    </form>
                                    <div class="result_list">
                                        <ul id="filter_result_time">
                                             
                                             
                                        </ul>
                                        <ul id="filter_result_result">
                                          
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection