    <?php
    $sZipcode = $_POST['search'];
    echo $sZipcode;
    $jAllZipcodes = ['2400', '2700', '3100', '3200', '2100', '2200', '2300', '2800'];
    // echo json_encode($jAllZipcodes);
    foreach ($jAllZipcodes as $jZipcode) {
        if ($sZipcode == $jZipcode) {
            // header('location:search-result.php?zipcode=' . $sZipCode);
            header("location:search-results.php?zipcode=$sZipcode");
        }
    }
    ?>
    <header>

        <div><img src="images/logo.png"></div>

        <nav class="menu">
            <a href="login.php">Agent login</a>
            <a href="login-user.php">User login</a>

        </nav>
        <div class="form-container">
            <form id="frmSearch" method="POST">
                <input class="menu-search" name="search" id="txtSearch" type="text" placeholder="search">
                <button class="menu-search" id="serachBtn">Search</button>
            </form>
            <div id="results"></div>
        </div>
    </header>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        const txtSearch = document.querySelector('#txtSearch')
        const divResults = document.getElementById('results')
        txtSearch.addEventListener('input', function() {

            $.ajax({
                url: "api-search.php",
                data: $('#frmSearch').serialize(),
                dataType: "JSON"
            }).done(function(matches) {
                $('#results').empty()
                $(matches).each(function(index, zip) {
                    let divZip = `<div>${zip}</div>`
                    $('#results').append(divZip)
                })
            }).fail(function() {
                // console.log('Error')
            })



            if (txtSearch.value.length == 0) {
                divResults.style.display = 'none'
            } else {
                divResults.style.display = 'block'
            }
        })
    </script>


