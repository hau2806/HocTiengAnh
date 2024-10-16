<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="less.js" type="text/javascript"></script>
    <link rel="stylesheet" href="View/Css/blogstyles.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/less@4.1.1" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>Kira</title>
</head>
<body>
    <header>
        <a href="?action=home" class="logo">
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
                <li><a href="#highscore">High Score</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
        <div id="nav-mobile-icon">
            <a href="javascript:void(0);" class="icon">
                <i class="fa fa-bars mobile-nav-icon"></i>
            </a>
        </div>
    </header>
    <section>
        <img src="View/Img_view/Img_home_blog/stars.png" id="stars" alt="">
        <img src="View/Img_view/Img_home_blog/moon.png" id="moon" alt="">
        <img src="View/Img_view/Img_home_blog/mountains_behind.png" id="mountains_behind" alt="">
        <h2 id="text">Free English Courses</h2>
        <a href="#course" id="btn">Explore</a>
        <img src="View/Img_view/Img_home_blog/mountains_front.png" id="mountains_front" alt="">
    </section>
    <div class="container">
        <div id="course">
            <div class="course-top">
                <h1>cou<span>r</span>ses</h1>
                <p>Start studying with our free English materials</p>
            </div>
            <!-- <div class="row">
                <?php for($v=1; $v<=count($level); $v++): ?>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-4">
                        <img src="View/post/uploads/<?php echo $level[$v]['thumbnail']; ?>" alt="">
                    </div>
                <?php endfor;?>
            </div>           -->
            <!-- <?php 
                // $i = 1; 
                $total_col = count($dataPost);
                $int_total_col = $total_col/3;
                $du_cot = $total_col - $int_total_col*3;
                for($i=0; $i<$int_total_col; $i++){?>
                    <div class="row">
                        <?php for($j=1; $j<=3; $j++): ?>
                            <?php $total_col = $total_col - 1;?>      
                            <?php if($total_col>=0):?>
                                <div class="col">
                                    <a href="?action=<?php echo $dataPost[$total_col]['descrip'];?>">
                                    <img src="View/post/uploads/<?php echo $dataPost[$total_col]['thumbnail']; ?>" alt="">    
                                        <div class="blue"></div>
                                        <div class="text">
                                            <p><?php echo $dataPost[$total_col]['tenpost']; ?></p>
                                        </div>
                                    </a>
                                </div>   
                                                                 
                            <?php endif;?>
                                            
                        <?php endfor; ?>
                    </div>
                <?php 
                } 
                if($du_cot!=0){
                    if($du_cot==1){?>
                        <?php $total_col = count($dataPost); ?>
                        <div class="row">
                            <div class="col">
                                <a href="?action=<?php echo $dataPost[$total_col]['descrip'];?>">
                                <img src="View/post/uploads/<?php echo $dataPost[$total_col]['thumbnail']; ?>" alt="">    
                                    <div class="blue"></div>
                                    <div class="text">
                                        <p><?php echo $dataPost[$total_col]['tenpost']; ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php 
                    }
                    if($du_cot==2){?>
                        <?php $total_col = count($dataPost); ?>
                        <div class="row">
                            <?php for($j=1; $j<=2; $j++): ?>
                                    
                                <?php if($total_col>=($total_col-2)):?>
                                    <div class="col">
                                        <a href="?action=<?php echo $dataPost[$total_col]['descrip'];?>">
                                        <img src="View/post/uploads/<?php echo $dataPost[$total_col]['thumbnail']; ?>" alt="">    
                                            <div class="blue"></div>
                                            <div class="text">
                                                <p><?php echo $dataPost[$total_col]['tenpost']; ?></p>
                                            </div>
                                        </a>
                                    </div>   
                                <?php $total_col = $total_col - ($total_col-1);?>                                
                                <?php endif;?>
                                                
                            <?php endfor; ?>
                        </div>
                    <?php }
                }      ?>           -->
            <div class="row">
                <?php for($i=0; $i<3; $i++){ ?>
                        <div class="col">
                            <a href="?action=level<?php echo ($i+1); ?>">
                                <img src="View/post/uploads/<?php echo $level[$i]['thumbnail']; ?>" alt="">
                                <div class="blue"></div>
                                <div class="text">
                                    <p><?php echo $level[$i]['tenlevel'] ?></p>
                                </div>
                            </a>
                        </div>                        
                    <?php }
                ?>
            </div>
            <div class="row">
                <?php for($i=3; $i<6; $i++){ ?>
                        <div class="col">
                            <a href="?action=level<?php echo ($i+1); ?>">
                                <img src="View/post/uploads/<?php echo $level[$i]['thumbnail']; ?>" alt="">
                                <div class="blue"></div>
                                <div class="text">
                                    <p><?php echo $level[$i]['tenlevel'] ?></p>
                                </div>
                            </a>
                        </div>                        
                    <?php }
                ?>
            </div>

        </div>
        <div class="quote">
            <div class="quote-top">
                <h1><span>C</span>omment</h1>
                <p>Let's see how people comment on this blog</p>
            </div>
            <div class="slideshow-container">
                <div class="mySlides">
                    <div class="img-quote">
                        <img src="View/Img_view/Img_home_blog/quote1.jpg" alt="">
                    </div>
                    
                    <q class="q">This blog is very helpfull</q>
                    <p class="author">- John Keats</p>
                </div>
                
                <div class="mySlides">
                    <div class="img-quote">
                        <img src="View/Img_view/Img_home_blog/quote2.jpg" alt="">
                    </div>
                    <q class="q">This blog helps me to improve. Thank a lot</q>
                    <p class="author">- Ernest Hemingway</p>
                </div>
                
                <div class="mySlides">
                    <div class="img-quote">
                        <img src="View/Img_view/Img_home_blog/quote3.jpg" alt="">
                    </div>
                    <q class="q">I have not failed. I've just found 10,000 ways that won't work.</q>
                    <p class="author">- Thomas A. Edison</p>
                </div>
                
                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>
                
            </div>
                
            <div class="dot-container">
                <span class="dot" onclick="currentSlide(1)"></span> 
                <span class="dot" onclick="currentSlide(2)"></span> 
                <span class="dot" onclick="currentSlide(3)"></span> 
            </div>
        </div>
        <div id="highscore">
            <h1 class="title-highscore shake"><span>H</span>IGH <span>S</span>CORE</h1>
            <div class="content-highscore">
                <div class="intro">
                    <div class="run-intro">
                        <h4><span>Be</span>low <span>i</span>s</h4>
                        <strong><b><span class="danh_chu" data-thoiGianDoi="1500" data-chu='["high score members", "high-achieving members"]'></span></b></strong>
                    </div>
                </div>
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
        </div>
        <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    </div>
    <div id="contact">
            <div class="contact-top">
                <h1>Contact <span>Info</span></h1>
                <p>Contact with me!!</p>

            </div>
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25729.794836433695!2d106.85068541549421!3d21.355487085373184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a95ad81a9d485%3A0xae23feb9ade2763d!2zU8ahbiDEkOG7mW5nLCBC4bqvYyBHaWFuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1642214341042!5m2!1svi!2s"  style="border:0; position:absolute;top: 0; width: 100%; height: 100%" allowfullscreen="" loading="lazy"></iframe> -->
                <iframe src="https://www.google.com/maps/embed?pb=!3m1!4b1!4m6!3m5!1s0x314a7af39e3f1ad3:0xa5ffc85ff87a07e8!8m2!3d20.8449115!4d106.6880841!16zL20vMDJtYnRx"  style="border:0; position:absolute;top: 0; width: 100%; height: 100%" allowfullscreen="" loading="lazy"></iframe>
                <!-- <iframe src="https://www.google.com/maps/place/H%E1%BA%A3i+Ph%C3%B2ng,+Vi%E1%BB%87t+Nam/@20.8467333,106.6637271,13z/data=!3m1!4b1!4m6!3m5!1s0x314a7af39e3f1ad3:0xa5ffc85ff87a07e8!8m2!3d20.8449115!4d106.6880841!16zL20vMDJtYnRx?hl=vi&coh=164777&entry=tt"  style="border:0; position:absolute;top: 0; width: 100%; height: 100%" allowfullscreen="" loading="lazy"></iframe> -->
            <div class="contact-row">
                <div class="contact-col">
                    <div class="icon phonering">
                        <img src="https://img.icons8.com/bubbles/100/000000/phone.png" alt="">
                    </div>
                    <div class="contact-info">
                        <h1>Phone</h1>
                        <h2>(+84) 12345678</h2>
                    </div>
                </div>
                <div class="contact-col">
                    <div class="icon phonering">
                        <img src="https://img.icons8.com/bubbles/100/000000/new-post.png" alt="">
                    </div>
                    <div class="contact-info">
                        <h1>Email</h1>
                        <h2>dodanhhau@gmail.com</h2>
                    </div>
                </div>
                <div class="contact-col">
                    <div class="icon phonering">
                        <img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" alt="">
                    </div>
                    <div class="contact-info">
                        <h1>Andress</h1>
                        <h2>Hai Phong</h2>
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
    <script src="View/Css/blog.js"></script>
    <script>
        const hieu_ung_danh_chu = function (the_html_chua_chu, chu, thoiGianDoi) {
            this.the_html_chua_chu = the_html_chua_chu;
            this.chu = chu;
            this.tu = '';
            this.vi_tri_index_chu = 0;
            this.thoiGianDoi = parseInt(thoiGianDoi, 10);
            this.ham_danh_chu();
            this.dang_xoa_chu = false;
        }

        hieu_ung_danh_chu.prototype.ham_danh_chu = function() {
            
            // Vị Trí chỉ mục của từ hiện tại
            const index_chu_hien_tai = this.vi_tri_index_chu % this.chu.length;
            //Lấy tất cả cả từ của chữ hiện tại
            const chu_hien_tai = this.chu[index_chu_hien_tai]
            if(this.dang_xoa_chu) {
                this.tu = chu_hien_tai.substring(0, this.tu.length - 1)
            } else {
                this.tu = chu_hien_tai.substring(0, this.tu.length + 1)
            }

            
            this.the_html_chua_chu.innerHTML = `<span class="tu">${this.tu}</span>`


            let toc_do_danh_chu = 200;
            if(this.dang_xoa_chu) {
                toc_do_danh_chu = toc_do_danh_chu /2
            }


            if(!this.dang_xoa_chu && this.tu === chu_hien_tai) {
                toc_do_danh_chu = this.thoiGianDoi;
                console.log(this.thoiGianDoi)
                this.dang_xoa_chu = true;
            } else if (this.dang_xoa_chu && this.tu === ''){
                this.dang_xoa_chu = false;
                this.vi_tri_index_chu++;
                toc_do_danh_chu = 200
            }

            setTimeout(() => this.ham_danh_chu(), toc_do_danh_chu)
        }

        document.addEventListener('DOMContentLoaded', chay_ham);

        function chay_ham() {
            const the_html_chua_chu = document.querySelector('.danh_chu');
            const chu = JSON.parse(the_html_chua_chu.getAttribute('data-chu'));
            const thoiGianDoi = the_html_chua_chu.getAttribute('data-thoiGianDoi');

            //Thiết Lập hàm hieu_ung _danh_chu
            new hieu_ung_danh_chu(the_html_chua_chu, chu, thoiGianDoi)
        }

    </script>
    <script>
    function initMap() {
        var myOptions = {
            zoom: 15,
            center: new google.maps.LatLng(21.0477359,105.7495967),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('map'), myOptions);
        marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(21.0477359,105.7495967)
        });
        infowindow = new google.maps.InfoWindow({
            content: '<img src="<?php echo get_template_directory_uri() ?>/images/logo-vn4u.png" alt="" style="width:90px; "><div>Công ty Vn4U</div>'
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });
        infowindow.open(map, marker);
    }
    google.maps.event.addDomListener(window, 'load', initMap);
    
    
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM2L0TAkqgCFOrK1U7Fe1PO1_HxggHWcs&callback=initMap&language=en">
    </script>
</body>
</html>
