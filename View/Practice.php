<!DOCTYPE html>
<html>
    <head>
        <title>ENGLISH</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet/less" type="text/css" href="View/Css/tuvung_styles.less"/>
        <script src="View/Css/less.js" type="text/javascript"></script>
        <script type="text/javascript" src="View/Css/jquery-3.3.1.min.js"></script>
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script type="text/javascript" src="View/Css/Tuvung.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>
    <body>
        <h2>WELCOME TO MY WEBSITE</h2>
            <div class="marq">
                <marquee width="650px" behavior="scroll">
                    You are practicing with <?php echo $tenpost."!!!"; ?>
                </marquee>
            </div>        
        <div class="content">
            <form method="POST">
                <div>
                    <?php $stt = 1; ?>
                    <?php $i=1;?>
                    <?php foreach($dataCauHoiTheoPost as $cauhoi): ?>    
                        <div class="question">
                            <h3><?php echo "Question ". $stt. ": " .$cauhoi['tencau']; ?></h3>                    
                        </div>
                        <?php foreach ($dataDapAnTheoPost as $cautl): ?>
                            <?php if($cauhoi['id_cauhoi'] == $cautl['id_cauhoi']): ?>
                                <div class="answer">
                                    <?php
                                        $arr = array();
                                        for ($j = 1; $j <= 4; $j++) {
                                            $arr[$j] = $j;
                                        }
                                        shuffle($arr); 
                                        for ($j = 0; $j < 4; $j++) {?>
                                            <div class="answer<?php echo $arr[$j]; ?>">
                                                <input type="radio" name="cautlcheck[<?php echo $i; ?>]" value="<?php echo $cautl['dapan'.$arr[$j]]; ?>">
                                                <?php echo $cautl['dapan'.$arr[$j]]; ?>
                                            </div>
                                        <?php }
                                    ?>
                                </div>
                            <?php endif; ?>
                        
                        <?php endforeach; ?>

                        <?php $i++; ?>
                        <?php $stt++; ?>
                    <?php endforeach; ?>
                </div>
                <input id="submit" type="submit" name="kiemtra" value="submit">
            </form>
            <?php if(isset($score)): ?>
                <?php $i = $i-1; ?>
                <?php $sc = $score/$i; ?>
                <div class="scoreboard">
                    <h3>Congratulations!!!</h3>
                    <div class="img-congra">
                        <?php if($sc==0): ?>
                            <img src="View/Img_view/k.gif" alt="">
                        <?php elseif($sc==1): ?>
                            <img src="View/Img_view/phaohoa.gif" alt="">
                         <?php elseif($sc>0.7): ?>
                            <img src="View/Img_view/lonhon7.gif" alt="">
                        <?php elseif($sc>0.4): ?>
                            <img src="View/Img_view/lonhon4.gif" alt="">
                        <?php elseif($sc>0): ?>
                            <img src="View/Img_view/lonhon1.gif" alt="">
                        <?php elseif($sc==0): ?>
                            <img src="View/Img_view/lonhon1.gif" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="score">
                        <p><?php echo "Your score is ".$score. "/". $i; ?></p>
                    </div>
                    <div class="home">
                        <a href="?action=blog">
                            <div class="back-home">
                                OK
                            </div>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </body>
</html>