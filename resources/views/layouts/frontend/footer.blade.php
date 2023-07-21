

    <section>
        <div class="container">
            <div class="row">
            <div class="col-md-3">
                <a href="{{route('frontend.rpl_satta_a')}}" target="_blank">RPL SATTA</a>
            </div>
            <div class="col-md-3">
            <a href="{{route('frontend.rpl_satta_b')}}" target="_blank">RPL SATTA</a>
            </div>
            <div class="col-md-3">
            <a href="{{route('frontend.rpl_satta_c')}}" target="_blank">RPL SATTA</a>
            </div>
            <div class="col-md-3">
            <a href="{{route('frontend.rpl_satta_d')}}" target="_blank">RPL SATTA</a>
            </div>
</div>
        </div>
    </section>

    <script>
        // Function to update the time
        function updateTime()
        {
            // Get the current time
            var currentTime = new Date();
            // Extract minutes and seconds
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();
            seconds = seconds < 10 ? "0" + seconds : seconds;
            // Update the HTML element with the formatted time
            var currentTimeElement = document.getElementById("current-time");
            currentTimeElement.textContent = seconds;
        }
        // Call the updateTime function initially
        updateTime();
        // Update the time every second
        setInterval(updateTime, 1000);
 



// -----------------------------------***********************-----------------------------
           // Get the start time in the format "05:00:00"
const startfrom = document.getElementById('last_resutl_time').textContent;
const startfromTime = new Date().getTime(startfrom);
 
// Calculate the end time
const countdownTime = 20 * 60 * 1000; // 20 minutes in milliseconds
const endTime = startfromTime + countdownTime;

// Update the countdown every second
const countdown = setInterval(() => {
  // Get the current time
  const currentTime = new Date().getTime();

  // Calculate the remaining time
  const remainingTime = endTime - currentTime;
  
  // Calculate minutes and seconds
//   const minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
//   const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

//   // Display the countdown in the console or update an HTML element with the countdown value
//   console.log(`${minutes} minutes ${seconds} seconds`);
//   document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";
  // document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s";

  // Check if the countdown is finished
  if (remainingTime <= 0) {
    clearInterval(countdown);
    console.log("Countdown finished!");
    // document.getElementById("demo").innerHTML = "Countdown Finished!";
    // Perform any actions needed when the countdown is finished
  }
  else {
      // Calculate minutes and seconds
      const minutes = Math.floor(remainingTime / (1000 * 60));
      const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

      // Display the countdown in the console or update an HTML element with the countdown value
    //   console.log(`${minutes} minutes ${seconds} seconds`);
    //   document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";
    }

}, 1000);

        
        </script>

  



</body>

</html>