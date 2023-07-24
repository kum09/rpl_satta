@extends('layouts/admin/main')
@section('main-section')


<style>
    .last_month_history .table {
    border-bottom: none;
    border: #fff;
    min-width: 500px;
    overflow: scroll;
}
</style>


<div class="content"> 
                    <div class="container-fluid last_month_history">
                        <h2>Avertisement</h2>
                         
                        <table id="myTable" class="table table-responsive-md table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">S.N.</th>
                                    <th scope="col">Mobile Number</th>
                                    <th scope="col">Email</th> 
                                    <th class="float-lg-right" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <tr> 
                                    <form action="{{route('admin.advertisement.update')}}" method="POST">
                                        @csrf
                                        <td>1.</td>
                                        <td><input type="number" class="form-control" value="{{$advertisement_list->mobile_number}}" id="mobile_number" name="mobile_number" disabled></td>
                                        <td><input type="email" class="form-control" value="{{$advertisement_list->email}}" id="email_id" name="email_id" disabled></td> 
                                        <td class="float-lg-right" id="edit_btn_td">
                                         <input id="update_btn" class="btn btn-success" type="submit" value="Update" style="display:none"> 
                                         <input id="edit_btn" class="btn btn-success" type="button" value="Edit" onclick="makeAdsEditable()"> 
                                        </td>
                                        </form>
                                    </tr>
                               
                            </tbody>
                        </table>
                    </div>


                    
                </div>
@if(Session::has('ads_updated'))
<script>
    Swal.fire(
  'Success !',
  'Your advertisement detail has been updated',
  'success'
); 
</script>
@endif
@endsection