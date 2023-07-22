
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">


<style>
    .main_wrapper{
        height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    color: #fff;
}

    .main_wrapper .forget_card{
        min-height: 250px;
    padding: 2rem;
    background-color: rgb(13, 53, 98);
    padding: 15px;
    box-shadow: 0px 5px 10px 0px rgb(0, 0, 0, 0.4);
    border-radius: 12px;
    width: 400px;
    max-width: 400px;
}

.main_wrapper .forget_card h2{
   margin-top:25px;
   font-family: 'Poppins', sans-serif;

   
}
.email_form_style{
    width: 95%;
    height: 30px ;
   border-radius: 5px;
    border:none;
    padding:2px 10px;
    font-weight:700; 
    letter-spacing: 0.6px;  
    cursor: pointer; 
    font-family: "Roboto", sans-serif;

    
}
.forget_pass_btn button{
    margin:5px 0px;
    width:100%;
    height:30px;
    border-radius: 5px;
    border:none;
    color:rgb(13, 53, 98);;
    font-family: "Roboto", sans-serif;
    font-weight:bold;
    letter-spacing: 0.6px;
    cursor: pointer;
    margin:25px 0px;
}
.forget_icon {
    border: 1px solid white;
    width: 20px;
    height: 20px;
    text-align: center;
    padding: 5px;
    border-radius: 20px;
    margin:25px auto;
}

</style>
<body>

<div class="main_wrapper">
    <div class="forget_card">
        <div class="d-flex justify-content-center align-item-center forget_icon">
        <i class="fa fa-user-o" aria-hidden="true"></i>
</div>


  <h2>Forget Password</h2>

  <div class="forget_form"> 
  <form method="POST ">

   <input type="email" id="email" required class="form-control email_form_style" placeholder="Enter email" >

      <div class="forget_pass_btn">
    <button class="btn btn-info" type="submit">Send Otp</button>
    </div>

        </form>
      </div>
    </div>
  </div>

</body>
</html>
