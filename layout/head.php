<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMR - Zi.Care</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon-idn.ico" type="image/x-icon">
    <link rel="stylesheet" href="path/to/your/css/file.css"> <!-- Optional: Add your CSS file for styling -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <!-- jQuery library -->
    <script>
        $(document).ready(function(){
            $('#search').keyup(function(){
                var query = $(this).val();

                if(query.length > 0){
                    $.ajax({
                        url: 'search.php', // PHP file to handle AJAX request
                        method: 'POST', // Method used for AJAX request
                        data: {query: query},
                        success: function(data){
                            $('#search-results').html(data); // Show results in this element
                        }
                    });
                } else {
                    $('#search-results').html(''); // Clear results if search query is empty
                }
            });
        });
    </script>
</head>
<?php
    require "include/connection.php";
    session_start();
    if ($_SESSION['status'] != 'login') {
        header('location:./login.php');
    }
?>