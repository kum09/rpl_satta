<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script>
        $(".card").click(function ()
        {
            $(this).toggleClass("selected");
        });
        function openSideNav()
        {
            document.getElementById("sidebar").style.width = "200px";
            document.getElementById("closeBtn").style.display = "block"
        }

        /* Set the width of the side navigation to 0 */
        function closeNav()
        {
            document.getElementById("sidebar").style.width = "57px";
            document.getElementById("closeBtn").style.display = "none"
        } 
    </script>

</body>

</html>