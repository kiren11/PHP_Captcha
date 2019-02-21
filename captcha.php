<?php

    session.start();

    //generate a random captcha from 6 values of strings and numbers
    $captcha_num = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
    $captcha_num = substr(str_shuffle($captcha_num), 0, 6);

    $_SESSION['code'] = $captcha_num;

    //define the measurements of the captcha image
    $font_size: 30;
    $image_height: 45;
    $image_length: 70;

    //defines the type of content as image
    header('Content-type: image/jpeg');

    //create an image based on the dimension
    //makes background
    $image = imagecreate($image_height, $image_length);
    imagecolorallocate($image, 255, 255, 255);

    //set text color
    $text_color = imagecolorallocate($image, 0, 0, 0);

    //combine all of the elements
    //print
    $imagettftext($image, $font_size, 0, 15, 30, $text_color, 'font.tff', $captcha_num);

    $imagejpeg($image);

  ?>
