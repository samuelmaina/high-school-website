<?php 
$page_title="Home : Kiambu High School";
include('./views/includes/upper-head.php') ;
?> 
    <link rel='stylesheet' href='./css/main.css'>
    <link rel="stylesheet" href="./css/slider.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel='stylesheet' href='./icons/css/all.min.css'>
</head>

<body>
    <header class="container">
        <div class='logo-container'>
            <img src="./images/logo.png" alt="">
            <p>
                Kiambu High School
            </p>
        </div>

        <nav>
            <ul>
                <li>
                    <a href="./index.php">Home</a>
                </li>
                <li>
                    <a href="./views/about.php">About</a>
                </li>
                <li> <a href="./views/academic.php">Academic</a></li>
                <li>
                    <a href="./views/sports.php">Sports</a>
                </li>
                <li>
                    <a href="./views/alumini-details.php">Alumni</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class='slideshow'>
        <img class="slides" src="./images/20130101_112933.jpg" alt="">
        <img class="slides" src="./images/20130101_113129.jpg" alt="">
    </div>
    <div class="remarks">
        <div class="remark">
            <img src="./images/20130101_112933.jpg" alt="">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Possimus sit delectus sequi quisquam, optio nesciunt, nobis,
            aperiam similique cupiditate consectet
            ur beatae qui. Beatae, consectetur similique delectus
            aspernatur voluptatibus esse molestiae.
        </div>
        <div class="remark">
            <img src="./images/20130101_113129.jpg" alt="">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Possimus sit delectus sequi quisquam, optio nesciunt, nobis,
            aperiam similique cupiditate consectet
            ur beatae qui. Beatae, consectetur similique delectus
            aspernatur voluptatibus esse molestiae.
        </div>
    </div>
    <footer class="container">
     <p>Give us your feedback.</p><br>
      <div id="footer-details">
           <div class="contact-info">
                <div class="contacts">
                    <i class="fa fa-user"></i>
                    <a href="tel:+254711516786"> Call us</a>
                </div>
                <div class="contacts">
                    <i class="fab fa-facebook-f"></i>
                    <a href="facebook"> Facebook</a>
                </div>
                <div class="contacts">
                    <i class="fab fa-instagram"></i>
                    <a href='instagram'> Instagram</a>
                </div>
                <div class="contacts">
                    <i class="fab fa-youtube"></i>
                    <a href="youtube"> Youtube</a>
                </div>
            </div>
      </div>
    </footer>
    <script src="./js/jQuery/slideShow.js"></script>
</body>

</html>