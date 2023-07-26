<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <!-- Link to Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
 </head>
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
   margin:25px 0px;
   font-family: "Roboto", sans-serif;
   font-size: 18px;
   font-weight: 600;
   text-align: center;
}
.email_form_style{
    font-family: "Roboto", sans-serif;
    font-weight: 700
}
    

.forget_pass_btn_col{
    margin:25px 0px;
    border-radius: 5px;
    border:none;
    color: #fff;
    display: flex;
    width: 100%;
    text-align: center;
    justify-content: center;
    font-family: "Roboto", sans-serif;
    font-weight:bold;
    letter-spacing: 0.6px;
    cursor: pointer;
    margin:25px 0px;
}
.forget_icon {
    border: 1px solid white;
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 5px;
    border-radius: 20px;
    margin:25px auto;
}
.otp_mail_font{
    font-family: "Roboto", sans-serif;
    font-weight: 700
}
.otp-input{
    display: flex;
    justify-content: space-between;
}
.otp-field{
    width: 36px;
    text-align: center;
    padding: 0px;
}
#newPassword {
    margin-bottom: 25px;
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
        <!-- Step 1: Email Input -->
        <div id="forgotPasswordForm">
          <input type="email" id="email" required class="form-control email_form_style" placeholder="Enter email">
          <div id="emailError" class="error-message" style="display: none; color: red;"></div> <!-- New error div -->
          <div id="loader" style="display: none;">Sending OTP Please Wait...</div>
          <div class="forget_pass_btn">
            <button class="btn btn-info forget_pass_btn_col" id="nextStepBtn" type="button">Send OTP</button>
          </div>
</div>
  
        <!-- Step 2: OTP Input (Hidden by default) -->
       
      <!-- Step 2: OTP Input (Hidden by default) -->
      <div id="step2" style="display: none;">
      <div class="otp-input d-flex">
        <input type="text" maxlength="1" class="form-control otp-field" required>
        <input type="text" maxlength="1" class="form-control otp-field" required>
        <input type="text" maxlength="1" class="form-control otp-field" required>
        <input type="text" maxlength="1" class="form-control otp-field" required>
        <input type="text" maxlength="1" class="form-control otp-field" required>
        <input type="text" maxlength="1" class="form-control otp-field" required>
      </div>

      <button class="btn btn-info forget_pass_btn_col" id="verifyOtpBtn" type="button">Reset Password</button>
      </div>

      <!-- Step 3: New Password Input (Hidden by default) -->
      <div id="step3" style="display: none;">
      <div id="otpVerifyed" class="otp-verifyed-message" style="display: none; color: green;"></div> <!-- New error div -->

        <input type="password" id="newPassword" required class="form-control" placeholder="Enter new password">
        <input type="password" id="confirmPassword" required class="form-control" placeholder="Confirm new password">
         
        <div class="forget_pass_btn">
          <button class="btn btn-info forget_pass_btn_col" id="resetPasswordBtn" type="button">Reset Password</button>
        </div>
      </div>

      <!-- Step 4: Success Message (Hidden by default) -->
      <div id="step4" style="display: none;" class="text-center">
        <p>Password reset successfully!</p>
        <a href="{{route('admin.login_view')}}" class="btn btn-info forget_pass_btn_col"  type="button">Go to Log In Page</a>
      </div>
      
      </div>
    </div>
  </div>
  

  <!-- Link to Bootstrap JS and jQuery -->
<<<<<<< Updated upstream

=======
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
>>>>>>> Stashed changes

  <script>
  document.getElementById("nextStepBtn").addEventListener("click", function () {
    var email = document.getElementById("email").value;

    if (email.trim() === "") {
      Swal.fire(
      'Oops....',
      'Please enter Email Id',
      'error'
    ); 
      return;
    }
  // Show the loader before making the AJAX request
  document.getElementById("loader").style.display = "block";
  document.getElementById("emailError").style.display = "none"; 

    $.ajax({
      url:'check_email',
      type:'GET',
      data:{email: email},
      success:function(response){
        if(response.email_status == 'email_not_exist'){
          // Show the error message
          document.getElementById("loader").style.display = "none";
        document.getElementById("emailError").innerHTML = "Email does not exist!";
        document.getElementById("emailError").style.display = "block"; 
        }else{
          localStorage.setItem('email', email);
          document.getElementById("emailError").style.display = "none"; 
           // Hide Step 1 and show Step 2
        document.getElementById("forgotPasswordForm").style.display = "none";
        document.getElementById("step2").style.display = "block";
        }
      },
    });

  });

  document.getElementById("verifyOtpBtn").addEventListener("click", function () {
    const enteredOTP = Array.from(otpInputs)
      .map((input) => input.value)
      .join("");
  
    var email = localStorage.getItem('email');
      $.ajax({
        url:'check_otp',
        type:'GET',
        data:{email: email},
        success(response){
          if(enteredOTP == response.otp){ 
            document.getElementById("otpVerifyed").innerHTML = "OTP verification success please enter new password";
            document.getElementById("otpVerifyed").style.display = "block"; 
            document.getElementById("step2").style.display = "none";
            document.getElementById("step3").style.display = "block";
          }else if (enteredOTP !== response.otp) {
            alert("Invalid OTP, please try again!");
            return;
        }
        },
      });
   
  });

  document.getElementById("resetPasswordBtn").addEventListener("click", function () {
    var newPassword = document.getElementById("newPassword").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var email = localStorage.getItem('email');
    if (newPassword.trim() === "") {
      alert("Please enter a new password!");
      return;
    }else if (confirmPassword.trim() === "") {
      alert("Please confirm your new password!");
      return;
    }else if (newPassword !== confirmPassword) {
      alert("Passwords do not match!");
      return;
    }else{
      $.ajax({
        url:'update_password',
        type:'GET',
        data:{password:newPassword, email:email},
        success:function(response){
          if(response.password_status == 'updated'){
        document.getElementById("step3").style.display = "none";
        document.getElementById("step4").style.display = "block";
          }
        },
      });
    }

 
  });
</script>

<script>
  const otpInputs = document.querySelectorAll(".otp-field");

  otpInputs.forEach((input, index) => {
    input.addEventListener("input", (e) => {
      const inputLength = e.target.value.length;
      const maxLength = parseInt(e.target.getAttribute("maxlength"));

      if (inputLength >= maxLength) {
        // Move to the next input if current input is filled
        if (index < otpInputs.length - 1) {
          otpInputs[index + 1].focus();
        }
      }
    });

    // Handle the Backspace key
    input.addEventListener("keydown", (e) => {
      if (e.key === "Backspace" && index > 0 && e.target.value.length === 0) {
        // Move to the previous input if Backspace is pressed and current input is empty
        otpInputs[index - 1].focus();
      }
    });
  });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  

</body>
</html>
