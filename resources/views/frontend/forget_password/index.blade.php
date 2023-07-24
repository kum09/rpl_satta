<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <!-- Link to Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
        <form method="POST" id="forgotPasswordForm">
          <input type="email" id="email" required class="form-control email_form_style" placeholder="Enter email">
          <div class="forget_pass_btn">
            <button class="btn btn-info forget_pass_btn_col" id="nextStepBtn" type="button">Send OTP</button>
          </div>
        </form>
  
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
        <input type="password" id="newPassword" required class="form-control" placeholder="Enter new password">
        <input type="password" id="confirmPassword" required class="form-control" placeholder="Confirm new password">
        <div class="forget_pass_btn">
          <button class="btn btn-info forget_pass_btn_col" id="resetPasswordBtn" type="button">Reset Password</button>
        </div>
      </div>

      <!-- Step 4: Success Message (Hidden by default) -->
      <div id="step4" style="display: none;" class="text-center">
        <p>Password reset successfully!</p>
        <button class="btn btn-info forget_pass_btn_col" id="button" type="button">Go to Log In Page</button>
      </div>
      
      </div>
    </div>
  </div>
  

  <!-- Link to Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
  document.getElementById("nextStepBtn").addEventListener("click", function () {
    var email = document.getElementById("email").value;

    if (email.trim() === "") {
      alert("Please enter your email!");
      return;
    }

    // Hide Step 1 and show Step 2
    document.getElementById("forgotPasswordForm").style.display = "none";
    document.getElementById("step2").style.display = "block";
  });

  document.getElementById("verifyOtpBtn").addEventListener("click", function () {
    const enteredOTP = Array.from(otpInputs)
      .map((input) => input.value)
      .join("");

    // Assuming you have a function for OTP verification on the server-side
    // For demonstration, let's assume the OTP is "123456"
    if (enteredOTP !== "123456") {
      alert("Invalid OTP, please try again!");
      return;
    }

    // If the OTP is verified successfully, proceed to the next step
    document.getElementById("step2").style.display = "none";
    document.getElementById("step3").style.display = "block";
  });

  document.getElementById("resetPasswordBtn").addEventListener("click", function () {
    var newPassword = document.getElementById("newPassword").value;
    var confirmPassword = document.getElementById("confirmPassword").value;

    if (newPassword.trim() === "") {
      alert("Please enter a new password!");
      return;
    }

    if (confirmPassword.trim() === "") {
      alert("Please confirm your new password!");
      return;
    }

    if (newPassword !== confirmPassword) {
      alert("Passwords do not match!");
      return;
    }

    // Assuming you have a function for password reset on the server-side
    // For demonstration, let's assume the password reset is successful
    // You can handle the password update and verification on the server-side securely
    // and display an error message if anything goes wrong
    // For now, we'll just show a success message on the final step
    document.getElementById("step3").style.display = "none";
    document.getElementById("step4").style.display = "block";
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

  

</body>
</html>
