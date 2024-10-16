<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet/less" type="text/css" href="View/Css/grammar_styles.less"/>
    <script src="View/Css/less.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/less@4.1.1" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title><?php echo $title; ?></title>
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
        <h1><?php echo $title; ?></h1>
        <?php echo $content; ?>
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