<?php

/*

PHP-TTS-Webhooks
CJ Trowbridge
2018-05-14

This is a completely free tool to allow services like IFTTT to produce speech output on devices running Linux and PHP, like a Raspberry Pi.

https://github.com/cjtrowbridge/PHP-TTS-Webhooks

*/

$User='Your Chosen Virtualhost Username';
$Pass='Your Chosen Virtualhost Password';

if(isset($_REQUEST['message'])){
  $Message = $_REQUEST['message'];
  $SafeMessage = escapeshellarg($_REQUEST['message']);
  $Command = '/usr/bin/say '.$SafeMessage.' &';
  exec($Command);
}

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Sayer</title>
  </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

    <div class="container">
      <div class="row">
       <div class="col-12">
         <h1><a href="https://github.com/cjtrowbridge/Sayer" target="_blank">Sayer</a></h1>
         <hr>
         <p>To have me say something, GET or POST to the variable "message" and I will say it.</p>
         <p>I can help you make a webhook. What would you like me to say?</p>
         <form class="form" action="say.php" method="post">
           <textarea name="message" class="form-control"><?php if(isset($_REQUEST['message'])){echo $_REQUEST['message'];} ?></textarea>
           <br>
           <input type="submit" class="form-control">
         </form>
         <?php if(isset($_REQUEST['message'])){echo 'Your Webhook: <a href="http://'.$User.':'.$Pass.'@'.$_SERVER['HTTP_HOST'].'/say/say.php?message='.urlencode($_REQUEST['message']).'">'.$_REQUEST['message'].'</a>';} ?>
       </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
