<?php

$msg = '';
$msgClass ='';

if(filter_has_var(INPUT_POST, 'submit')) {
  // Get Form Data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    // Check required Fields
    if( !empty($email) && !empty($name) && !empty($message)){
      //Passed, Check Email
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
          $msg = 'Please enter a valid email address';
          $msgClass = 'alert-danger';
        }else {
          // Recipient Email
          $toEmail = 'info@orionconsulting.rs';
          $subject = 'Contact Request From '.$name;
          $body = '<h2>Contact Request</h2>
              <h4>Name</h4><p>'.$name.'</p> 
              <h4>Email</h4><p>'.$email.'</p> 
              <h4>Message</h4><p>'.$message.'</p> 
              ';

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .="Content-Type:text/html:charset=UTF-8" . "\r\n";

            $headers .= "From: " .$name. "<".$email.">". "\r\n";

            if(mail($toEmail, $subject, $body, $headers)) {
              $msg = 'Your email has been sent!';
              $msgClass = 'alert-success';
            } else {
              $msg = 'Your email was not send!';
              $msgClass = 'alert-danger';
            }

        }
    } else {
        $msg = 'Please enter data in all fields';
        $msgClass = 'alert-danger';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Orion Consulting Group Serbia. Increase business efficiency. Work with us towards success">
    <meta name="description" content="Orion Consulting Group offers seminars, executive coaching and tranining programs in management and communicatio consulting...We have office in 5 European countries with HQ in Belgrade; ">
    <meta name="keywords" content="Consulting, Bussiness improvement, Management, Coaching, Management seminars, communication skills, increased income, CEO, team work">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">
    <title>Orion Consulting Group | Contact</title>
</head>
<body>
    
<div id="page-container">
    <div id="content-wrap">

      <div class="orion-load">
        <img src="img/loading.gif">
      </div>

    <!-- <div id="header-upper">
       <div class="header-container">
          <div class="column-header">
            <a href="contact.html"><p class="fa fa-envelope"> info@orionconsulting.rs</p></a>
          </div>
          <div class="column-header2">
             <a href="contact.html"><p class="fa fa-phone"> +381 11 382 87 87</p></a>
             <a href="contact.html"><p class="fa fa-map-marker"> Kneza Miloša 16</p></a>
          </div>
       </div>
    </div> -->
    <header>
           <div class="logo1">
            <a href="index.html">
              <div id="logo">
                <img src="img/logo.png">
            </div>
            </a>
           </div>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="projects.html">Projects</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <a href="projects.html"><img class="eng" src="img/srb.png"></a>
                </ul>
            </nav>
            <div class="mob-menu" onclick="mobMode()"></div>
    </header>

    <div class="mob-dropdown">
      <ul class="mob-ul">
        <li class="mob-li"><a href="index.html">Home</a></li>
        <li class="mob-li"><a href="about.html">About</a></li>
        <li class="mob-li"><a href="services.html">Services</a></li>
        <li class="mob-li"><a href="projects.html">Projects</a></li>
        <li class="mob-li"><a href="contact.html">Contact</a></li>
        <a href="projects.html"><img class="eng" src="img/srb.png"></a>
      </ul>
    </div>

    <section id="showcase" class="showcase-image4">
        <div class="container">
            <h3 class="h3-contact">Contact us</h3>
        </div>
    </section>

    <div class="container-intro-about">
      <h4 class="h4-intro-contact">Be free to contact us via telephone, video call, social media or see us in person. We are here to answer all your question and form partnership.</h4>
    </div>

   
   <div class="contact-page">
       <div class="contact-form">

           <?php if($msg != ''): ?>
                <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?> </div>
           <?php endif; ?>

            <div class="form-container">
                <form method="post" action="contactform.php">
                    <div class="form-group">
                        <label>Ime</label>
                        <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?> ">
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Poruka</label>
                        <textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
                    </div>
                    <br>
                    <button type="submit" name="submit" class="btn-values">Send</button>
                </form>
            </div>
       </div> <!-- contact-form end -->

       <div class="contact-info">
          
       </div> <!-- contact-info end-->
   </div> 


    </div> <!-- content wrap end-->
    <footer id="footer">
      <div class="footer">
        <div class="column-footer">
          <a href="index.html"><div class="logo-footer"></div></a>
        <p>Orion Consulting Group is strategic firm and consultant which is there to help you in decision making, increasing profits, developing strategies and to grow your business.</p>  
        </div>
    
    
        <div class="column-footer">
          <h2>Follow us</h2>
          <ul class="ul-footer">
            <li><a href="facebook.html">Facebook</a></li>
            <li><a href="twitter.html">Twitter</a></li>
            <li><a href="instagram.html">Instagram</a></li>
            <li><a href="youtube.html">Youtube</a></li>
          </ul>
        </div>
    
        <div class="column-footer">
          <h2>Navigate</h2>
          <ul class="ul-footer">
            <li><a href="index.html">Orion</a></li>
            <li><a href="about.html">About us</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="projects.html">Projects</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </div>
    
        <div class="column-footer contact">
          <h2>Contact us</h2>
          <ul class="ul-footer contact">
            <li><b>PHONE</b> (+381 11) 382 87 87 </li>
            <li><b>FAX</b> (+381 11) 382 86 86 </li>
            <li><b>E-MAIL</b> info@orionconsulting.rs</li>
            <li><b>ADDRESS</b> Kneza Miloša 16</li>
          </ul>
          <br>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.6227727700734!2d20.46202615149488!3d44.80887587899622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aaf5542bb55%3A0x45a4c10baf47bb13!2z0JrQvdC10LfQsCDQnNC40LvQvtGI0LAgMTYsINCR0LXQvtCz0YDQsNC0IDExMDAw!5e0!3m2!1ssr!2srs!4v1602243113157!5m2!1ssr!2srs" width="250" height="160" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
      </div>
    </footer> <!-- footer wrap end-->
    </div> <!-- page container end-->
    <script src="js/m-mode.js"></script>
    <script src="js/orion-l.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
          AOS.init({
              offset: 400,
              duration: 1000
          });
        </script>
    </body>
    </html>