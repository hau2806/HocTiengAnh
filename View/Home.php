<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet/less" type="text/css" href="View/Css/home_styles.less"/>
        <link rel="stylesheet/less" type="text/css" href="View/Css/home_queries.less"/>
        <script src="View/Css/less.js" type="text/javascript"></script>
        <script type="text/javascript" src="View/Css/jquery-3.3.1.min.js"></script>
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBf0ggEW8rhNMpsgTnaq_ZpP4sZVkp5PhE&callback=myMap"></script>
        <script type="text/javascript" src="View/Css/Home.js"></script>
    </head>

    <body>
        <div class="menu-left">
            <ul class="nav-menu">
                <li class="avt"><img src="View/Img_view/avt.jpg" alt="photo"></li>
                <li class="hvt" >Đỗ Danh Hậu</li>
                <li id="re-home">
                    <a href="#home">
                        <ion-icon name="home-outline"></ion-icon>
                        <p>Home</p>
                    </a>
                </li>
                <!-- <?php if(isset($_SESSION['taikhoan'])): ?>
                    <?php if(($_SESSION['taikhoan'])=='admin'): ?>
                        <li>
                            <a href="?action=manager">
                                <ion-icon name="person-circle-outline"></ion-icon>
                                <p>Hi! <?php echo $_SESSION['taikhoan']; ?></p>
                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="?action=user">
                                <ion-icon name="person-circle-outline"></ion-icon>
                                <p>Hi! <?php echo $_SESSION['taikhoan']; ?></p>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    <li>
                        <a href="?action=login">
                            <ion-icon name="person-circle-outline"></ion-icon>
                            <p>Login</p>
                        </a>
                    </li>
                <?php endif; ?> -->
                <li class="practice">
                    <a href="?action=blog">
                        <ion-icon name="newspaper-outline"></ion-icon>
                        <p>Blog</p>
                    </a>
                    <!-- <?php if(isset($_SESSION['taikhoan'])):?>
                        <ul class="sub-menu">
                            <li id="nw" onclick="accept()">New word</li>
                            <li id="ls" onclick="accept1()">Listen</li>
                            <li id="gr" onclick="accept2()">Grammar</li>
                        </ul>
                    <?php else:?>
                        <ul class="sub-menu">
                            <li id="nw" onclick="none_user()">New word</li>
                            <li id="ls" onclick="none_user()">Listen</li>
                            <li id="gr" onclick="none_user()">Grammar</li>
                        </ul>
                    <?php endif;?> -->
                </li>
                <li id="go-contact">
                    <a href="#contact">
                        <ion-icon name="call-outline"></ion-icon>
                        <p>Contact</p>
                    </a>
                </li>
                <li id="go-high">
                    <a href="#highscore">
                        <ion-icon name="school-outline"></ion-icon>
                        <p>High Score</p>
                    </a>
                </li>
            </ul>
            <div class="bottom-nav-menu">
                <ul class="bottom-icon-menu">
                    <li><a href="https://www.facebook.com/GiangUno10508"><ion-icon name="logo-facebook"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="logo-google"></ion-icon></a></li>
                </ul>
                <div  class="donate">
                    <p>109003387605</p>
                    <p>VietinBank</p>
                    <p>Đỗ Danh Hậu</p>
                </div>
            </div>
        </div>
        <section id="home">
            <div class="main">
                <div class="intro">
                    <h4>Hi! My full name is</h4>
                    <h2>Đỗ Danh Hậu</h2>
                    <div class="run-intro">
                        <p>I am </p>
                        <strong><b><span class="danh_chu" data-thoiGianDoi="1500" data-chu='["Hau", "a trainee at AHT"]'></span></b></strong>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact">
            <div class="layout">
                <div class="content-layout">
                    <h2><ion-icon name="call-outline"></ion-icon></h2>
                    <h2>CONTACT</h2>
                    <ul class="logo-contact">
                        <li><a href="https://www.facebook.com/GiangUno10508"><ion-icon name="logo-facebook"></ion-icon></a></li>
                        <li><a href="#"><ion-icon name="logo-google"></ion-icon></a></li>
                        <li><a href="#"><ion-icon name="logo-whatsapp"></ion-icon></a></li>
                    </ul>
                    <div class="andress">
                        <div class="icon-ad">
                            <ion-icon name="location-outline"></ion-icon>
                        </div>
                        <h3>HAI PHONG, VIET NAM</h3>
                    </div>
                </div>
            </div>
            <div id="content-contact">
            </div>
        </section>
        <section id="highscore">
            <div class="content-highscore">
                <h2>HIGH SCORE</h2>
                <div class="user-n">
                    <?php $i = 1; ?>
                        <?php foreach($dataScoreAB as $scoreAB): ?>
                            <?php if($i<=50): ?>
                                <?php foreach($dataUser as $dtUser): ?>
                                    <?php if ($scoreAB['id_user'] == $dtUser['id_user']): ?>
                                        <div class="ok">
                                            <p><?php echo $i.".". $dtUser['taikhoan']." ". "(".$scoreAB['tong_diem']. ")"; ?></p>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif;?>
                            <?php $i++?>                      
                        <?php endforeach; ?>
                    </div>
            </div>
        </section>
    </body>
</html>
