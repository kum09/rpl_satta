@extends('layouts/admin/main')
<style>
    @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap");
    @import url("/public/assets/frontend/css/profile.css");
* {
    padding: 0;
    margin: 0;
}
.profile_card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0px 5px 16px 0px rgb(0, 0, 0, 0.2);
}
.profile_card .heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 10px 10px 0px 0px;
    padding: 10px;
    background-color: rgb(13, 53, 98);
    margin-bottom: 2rem;
}
.profile_card .heading h2 {
    font-size: 18px;
    font-weight: 500;
    color: #fff;
    font-family: "Roboto";
}
.profile_card .heading .btn {
    background-color: rgb(84, 145, 215);
    color: #fff;
    font-size: 14px;
    padding: 5px 20px;
    font-family: Roboto;
}
.profile_card img {
    border-radius: 80px;
    height: auto;
}
.profile_card .profile_details {
    padding: 10px;
}

@media screen and (max-width: 991px) {
    .profile_card img {
        border-radius: 80px;
        width: 100px;
        height: auto;
    }
   
}

    </style>

@section('main-section')
 
                <div class="content">
                    <div class="container-fluid">
                        <div class="row profile_card">
                            <div class="col-lg-12 px-0">
                                <div class="heading">
                                    <h2>
                                        Profile Details
                                    </h2>
                                    <button class="btn" type="button" id="edit_button" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </button>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 text-center">
                                        <img src="{{url('public/assets/frontend/images')}}/profiledumimg.png" class="img-fluid" />
                                       
                                    </div>
                                    <div class="col-md-9">
                                        <div class="profile_details">
                                            <div class="row">
                                                <div class="col-sm-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="firstname" class="form-label">
                                                            Full Name*
                                                        </label>
                                                        <input type="text" value="{{Auth::user()->name}}" class="form-control" disabled
                                                            id="firstname">
                                                    </div>
                                                </div>
                                                
                                             
                                              

                                                <div class="col-sm-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="email" class="form-label">
                                                            Email *
                                                        </label>
                                                        <input type="text" value="{{Auth::user()->email}}" class="form-control"
                                                            disabled id="email">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="password" class="form-label">
                                                            Password *
                                                        </label>
                                                        <input type="text" value="********" class="form-control"
                                                            disabled id="password">
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
    const editButton = document.getElementById("edit_button");

    editButton.addEventListener("click", () => {
        const inputs = document.querySelectorAll(".form-control");
        inputs.forEach(input => {
            input.disabled = !input.disabled; // Toggle the "disabled" attribute
        });
    });
</script>
                
          
         
        @endsection