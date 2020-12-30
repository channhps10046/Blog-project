<?php include "./includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;300;400;500;600;700&family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper">
        <div class="main-box">
            <header>
                <div class="group-social">
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></i></a>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></i></a>
                    <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                </div>

                <div class="form-search">
                    <form action="search.php" class="form-control" method="POST">
                        <input class="form-control__input" name="search" type="text" placeholder="Type Keyword to search">
                        <button type="submit" name="submit" class="form-control__btn">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </header>