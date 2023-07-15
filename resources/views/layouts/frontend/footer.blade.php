<section class="news_letter">
        <marquee>
            <div class="emai_wrap">
                <a href="https://api.whatsapp.com/send?phone=8607013464" class='whatsapp_icon' target="_blank"
                    rel="noopener noreferrer">
                    Contact Us : +91 XXXXXXXXX (Only Whatsaap)
                </a>
                <a href="#" target="_blank">
                    Email : xyz@gmail.com
                </a>
            </div>
        </marquee>

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
    </script>

    <!-- <script>
        var backgroundColors = ["#cdcdcd", "#fff", "#ffd700"];
        var cardsData = [];
        var startTime = 9;
        var intervalMinutes = 20;
        var totalCards = (13 * 60) / 20;

        for (var i = 0; i < totalCards; i++)
        {
            var hour = startTime + Math.floor((i * intervalMinutes) / 60);
            var minutes = (startTime * 60 + i * intervalMinutes) % 60;
            var ampm = hour >= 12 ? "PM" : "AM";

            var timeString = `${hour.toString().padStart(2, "0")}:${minutes
                .toString()
                .padStart(2, "0")}${ampm}`;

            var cardData = {
                title: "RPL SATTA",
                time: "(Time: " + timeString + ")",
                value: Math.floor(Math.random() * 100) + 1,
            };
            cardsData.push(cardData);
        }

        // Add one more card dynamically
        var additionalCard = {
            title: "Additional Card",
            time: "(Time: 12:00PM)",
            value: 50,
        };  
        cardsData.push(additionalCard);
        var cardContainer = document.getElementById("cardContainer");
        for (var i = 0; i < cardsData.length; i++)
        {
            var card = document.createElement("div");
            card.className = "result_box_card";
            card.style.backgroundColor = backgroundColors[i % backgroundColors.length];
            card.innerHTML = `
      <div>
        <h2>${cardsData[i].title}</h2>
        <p>${cardsData[i].time}</p>
        <div class="time">
          <span>${cardsData[i].value}</span>
          <img src="{{('public/assets/frontend/images/new.gif')}}">
          <span class="new">XX</span>
        </div>
        <button class="view_chart">View Chart</button>
      </div>
    `;
            cardContainer.appendChild(card);
        }
    </script> -->



</body>

</html>