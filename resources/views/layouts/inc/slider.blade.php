<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/frontend/css/cover_img.css">
    <title>Document</title>
    <style>
        body {
            font-family: "Lato", sans-serif
        }

        .mySlides {
            display: none;
            text-align: center;
            background-color: #F9F5E7;
        }
    </style>
</head>

<body>
<!-- Page content -->
<div class="content" style="max-width:2000px;margin-top:62px">

    <!-- Automatic Slideshow Images -->
    <div class="mySlides display-container center">
        <img src="{{ asset('assets/images/bia1.png') }}" style="width:80%; height: 600px">
        <div class="display-bottommiddle container space hide-small">
        </div>
    </div>
    <div class="mySlides display-container center">
        <img src="{{ asset('assets/images/bia2.png') }}" style="width:80%; height: 600px">
        <div class="display-bottommiddle container space hide-small">
        </div>
    </div>
    <div class="mySlides display-container center">
        <img src="{{ asset('assets/images/bia3.png') }}" style="width:80%; height: 600px">
        <div class="display-bottommiddle container space hide-small">
        </div>
    </div>
</div>
<script>
    // Automatic Slideshow - change image every 4 seconds
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 4000);
    }
</script>
</body>

</html>
