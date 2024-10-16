<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet/less" type="text/css" href="View/Css/level_styles.less"/>
    <script src="View/Css/less.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/less@4.1.1" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title><?php echo $tenlv; ?></title>
</head>
<body>
  <header>
        <a href="?action=blog" class="logo">
            <h1><span>K</span>ira</h1>
        </a>
        <div class="topnav">
            <ul>
                <li><a href="?action=home" class="active">Home</a></li>
                <li>
                    <a href="#">Practice</a>
                        <?php if(isset($_SESSION['taikhoan'])):?>
                            <ul class="sub-menu">
                                <?php $i=0; ?>
                                <?php foreach($dataDebai as $value): ?>
                                    <?php $i++; ?>
                                    <li id="de<?php echo $i; ?>" class="de" ><a href="?action=de<?php echo $value['id_de']; ?>"><?php echo $value['tende']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else:?>
                            <ul class="sub-menu">
                            <?php $i=0; ?>
                                <?php foreach($dataDebai as $value): ?>
                                    <?php $i++; ?>
                                    <li id="de<?php echo $i; ?>" onclick="none_user()"><?php echo $value['tende']; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif;?>
                </li>
                
                <?php if(isset($_SESSION['taikhoan'])): ?>
                    <?php if(($_SESSION['taikhoan'])=='admin'): ?>
                        <li>
                            <a href="?action=manager">
                                Hi! <?php echo $_SESSION['taikhoan']; ?>
                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="?action=user">
                                Hi! <?php echo $_SESSION['taikhoan']; ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    <li>
                        <a href="?action=login">
                            Login
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <div id="nav-mobile-icon">
            <a href="javascript:void(0);" class="icon">
                <i class="fa fa-bars mobile-nav-icon"></i>
            </a>
        </div>
    </header>
    <div class="container">
        <div class="content">
            <h1><?php echo $tenlv; ?></h1>
            <ul>
            <?php foreach($dataPost as $post){ ?>
                    
                        <?php if($post['id_level']==$id_level){?>
                            <li><i class="fa fa-hand-o-right"></i><a href="?action=<?php echo $post['descrip']; ?>"><?php echo $post['tenpost']; ?></a></li>
                        <?php
                        }?>
                    
            <?php
                } ?>
            </ul>
        </div>
    </div>
    <div id="contact">
            <div class="contact-top">
                <h1>Contact <span>Info</span></h1>
                <p>Contact with me!!</p>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25729.794836433695!2d106.85068541549421!3d21.355487085373184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a95ad81a9d485%3A0xae23feb9ade2763d!2zU8ahbiDEkOG7mW5nLCBC4bqvYyBHaWFuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1642214341042!5m2!1svi!2s"  style="border:0; position:absolute;top: 0; width: 100%; height: 100%" allowfullscreen="" loading="lazy"></iframe>
            <div class="contact-row">
                <div class="contact-col">
                    <div class="icon">
                        <img src="https://img.icons8.com/bubbles/100/000000/phone.png" alt="">
                    </div>
                    <div class="contact-info">
                        <h1>Phone</h1>
                        <h2>(+84) 12345678</h2>
                    </div>
                </div>
                <div class="contact-col">
                    <div class="icon">
                        <img src="https://img.icons8.com/bubbles/100/000000/new-post.png" alt="">
                    </div>
                    <div class="contact-info">
                        <h1>Email</h1>
                        <h2>gianguno10508 @gmail.com</h2>
                    </div>
                </div>
                <div class="contact-col">
                    <div class="icon">
                        <img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" alt="">
                    </div>
                    <div class="contact-info">
                        <h1>Andress</h1>
                        <h2>Son Dong, Bac Giang</h2>
                    </div>
                </div>
            </div>
        </div>
    <div id="footer">
        <div class="footer-top">
            <h1><span>K</span>ira</h1>
            <p>Your Complete English Solution</p>
        </div>
        <div class="social-icons">
            <div class="social-item">
                <a href="https://www.facebook.com/GiangUno10508"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png" alt=""></a>
            </div>
            <div class="social-item">
                <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" alt=""></a>
            </div>
            <div class="social-item">
                <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/twitter.png" alt=""></a>
            </div>
            <div class="social-item">
                <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/behance.png" alt=""></a>
            </div>
        </div>
        <div class="copyright">
            Copyright © 2021 Kira. All rights reserved
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
        none_user = function(){
            window.location = " http://localhost/HOCTIENGANH/?action=login";
        }
    </script>
    <script src="View/Css/grammar.js"></script>
  </body>
</html>