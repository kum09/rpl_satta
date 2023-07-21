@extends('layouts/admin/main')

@section('main-section')
 
                <div class="content">
                    <div class="container-fluid">
                        <div class="row profile_card">
                            <div class="col-lg-12 px-0">
                                <div class="heading">
                                    <h2>
                                        Profile Details
                                    </h2>
                                    <button class="btn" type="button" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </button>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 text-center">
                                        <img src="./images/profiledumimg.png" class="img-fluid" />
                                    </div>
                                    <div class="col-md-9">
                                        <div class="profile_details">
                                            <div class="row">
                                                <div class="col-sm-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="firstname" class="form-label">
                                                            First Name*
                                                        </label>
                                                        <input type="text" value="Rahul" class="form-control" disabled
                                                            id="firstname">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="lastname" class="form-label">
                                                            Last Name*
                                                        </label>
                                                        <input type="text" value="Yadav" class="form-control" disabled
                                                            id="lastname">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <label for="dob" class="form-label">
                                                        Date & Place of Birth *
                                                    </label>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <input type="text" value="04-june-1998, Gurgoan"
                                                                    class="form-control" disabled id="dob">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                              

                                                <div class="col-sm-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="email" class="form-label">
                                                            Email *
                                                        </label>
                                                        <input type="text" value="rahul@gmail.com" class="form-control"
                                                            disabled id="email">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="phone_no" class="form-label">
                                                            Phone *
                                                        </label>
                                                        <input type="text" value="905XXXXX12" class="form-control"
                                                            disabled id="phone_no">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="address" class="form-label">Address *</label>
                                                        <input class="form-control" type="text" disabled id="address"
                                                            value="Sushant-lok, New-delhi, 122002"></input>
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