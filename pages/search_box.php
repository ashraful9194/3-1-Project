<div class="topnav">
    <form action="./search_managment/search_result.php" method="POST">
        <input type="text" class="" id="search_string" name="search_string" placeholder="Search keywords or category...">
        <button type="submit" class="" id="submit_search" name="submit_search"><span class="material-icons-sharp">
                search
            </span></button>
        <script type="text/javascript">
            document.getElementById("review-submit_search").onclick = function() {
                location.href = "./search_managment/search_result.php";
            };
        </script>
    </form>
</div>