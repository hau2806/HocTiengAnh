<!DOCTYPE html>
<html>
    <head>
        <title>ENGLISH</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet/less" type="text/css" href="View/Css/tuvung_styles.less"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="View/Css/less.js" type="text/javascript"></script>
        <script type="text/javascript" src="View/Css/jquery-3.3.1.min.js"></script>
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script src="https://kit.fontawesome.com/45a3cadf75.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="View/Css/Tuvung.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>
    <body>
        <h2>WELCOME TO MY WEBSITE</h2>
            <div class="marq">
                <marquee width="650px" behavior="scroll">
                    Goodluck for you!!! 
                </marquee>
            </div>
        <div class="content">
            <form method="POST" action="">
                
                <div>
                    <?php $stt = 1; ?>
                    <?php $i=1;?>
                    <?php foreach($dataCauHoiTheoDe as $cauhoi): ?>
                        <div class="question">
                            
                            <h3 id="cau<?php echo $stt; ?>"><a href="#mark<?php echo $i; ?>"><i id="mark<?php echo $i; ?>" class="fas fa-flag mark"></i></a><?php echo "Question ". $stt. ": " .$cauhoi['tencau']; ?></h3>
                            <?php $img_cat = substr($cauhoi['audio_img'], -3); ?>

                            <?php if($cauhoi['audio_img']!=NULL && $cauhoi['audio_img'] != "0"): ?>
                                <?php if($img_cat == "jpg"||$img_cat == "png"): ?>
                                    <img style="width: 450px;" src="<?php echo $cauhoi['audio_img']; ?>" alt="">
                                <?php else: ?>
                                    <audio controls>
                                        <source src="<?php echo $cauhoi['audio_img']; ?>" type="audio/mpeg">
                                    </audio>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <?php foreach ($dataDapAnDe as $cautl): ?>
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
            <div class="clock">
                <img src="https://img.icons8.com/external-prettycons-lineal-prettycons/49/000000/external-alarm-clock-essentials-prettycons-lineal-prettycons.png" class="shake"/>
                <p id="clock"></p>
            </div>
            <div class="row">
                <?php for($v=1; $v<=count($dataCauHoiTheoDe); $v++): ?>
                    <div id="question_mark<?php echo $v; ?>" class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-4"><a href="#cau<?php echo $v; ?>"><?php echo $v; ?></a></div>
                <?php endfor;?>
            </div>     
    <?php                         
        // if(isset($_POST['kiemtra'])){
        //     $score = 0;
        //     if(!empty($_POST['cautlcheck'])){
        //         $count  = count($_POST['cautlcheck']);
        //             $m = 1;
        //             $selected = $_POST['cautlcheck'];
        //             $len = count($dataDapAnDungDeOk);
        //             for($l=1; $l<=$len; $l++){
        //                 if(isset($selected[$m])){
        //                     if($selected[$m] == $dataDapAnDungDeOk[$l]){
        //                         $score++;
        //                     }
        //                 }
        //                 $m++;
        //             }
        //     }
        
        // }
    ?>
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

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>