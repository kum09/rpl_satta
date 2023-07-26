@extends('layouts/admin/main')
@section('main-section')

<style>
   
</style>

<div class="content"> 
                    <div class="container-fluid last_month_history">
                        <h2>Monthly Result</h2>
                        <!-- <form method="POST" >
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="selectGame" class="form-label">Date</label>
                                       <input class="form-control" type="date">
                                    </div>
                                </div>
                                
                                <div class="col-md-3 d-flex align-items-center">
                                    <button class="btn" type="button">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form> -->
                        <table id="myTable" class="table table-responsive-md table-hover">
                            <thead>
                                <tr> 
                                    <th scope="col">Time</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Number</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $startTime = strtotime('09:00:00');
                                    $endTime = strtotime('22:00:00');
                                    $interval = 20 * 60; // 20 minutes in seconds
                                    $current_date = Carbon\Carbon::now('Asia/Kolkata')->format('Y-m-d');
                                @endphp
                                
                                @for ($time = $startTime; $time <= $endTime; $time += $interval)
                                @php 
                                    $res = App\Models\admin\Result::select('result')->where('date', now()->format('Y-m-d'))->where('result_time', date('H:i:s', $time))->first();
                                 @endphp
                                    <tr style="background:{{ $res ? '#daffda' : '#fff3f3' }}" id="table_row_{{ date('H:i:s', $time) }}">
                                        <input type="hidden" id="date_{{ date('H:i:s', $time) }}" value="{{now()->format('Y-m-d')}}"> 
                                        <td>{{ date('h:i A', $time) }}</td>
                                        <td >{{now()->format('d-M')}}</td>
                                        <td>{{now()->format('Y')}}</td>
                                      
                                        <td id="{{ date('H:i:s', $time) }}">{{ $res ? $res['result'] : 'XX' }}</td>
                                        <td class="float-lg-right" id="add_result_btn_{{ date('H:i:s', $time) }}">
                                            @if($res != '')
                                            <button class="btn btn-success" type="button"  onclick="makeEditable('{{ date('H:i:s', $time) }}')">Edit</button>
                                            @else
                                            <button class="btn btn-success" type="button" onclick="makeEditable('{{ date('H:i:s', $time) }}')">Add Result</button>
                                            @endif
                                           

                                        </td>
                                        
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>


                    
                </div>

 @endsection