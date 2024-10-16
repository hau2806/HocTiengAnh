<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Question</title>
    <link rel="stylesheet/less" type="text/css" href="View/Css/addQuest_styles.less"/>
    <script src="View/Css/less.js" type="text/javascript"></script>
    <script type="text/javascript" src="View/Css/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script type="text/javascript" src="View/Css/Add.js"></script>
</head>
<body>
    <div class="content-main">
        <h2>UPDATE QUESTION</h2>
        <div class="direct">
            <ul>
                <li><a href="?action=blog">Blog</a></li>
                <li><a href="?action=manager">Manager</a></li>
            </ul>
        </div>
        <div class="main-stepOne">
            <div class="content">
                <form method="POST">
                    <table border="1px">
                        <tr>
                            <th>Lesson</th>
                            <td>
                                <select name="lesson">
                                <option></option>
                                    <?php foreach($dataDebai as $value): ?>
                                        <option value="<?php echo $value['id_de']?> ">
                                            <?php echo $value['tende']?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Sub Category</th>
                            <td>
                                <select name="sub-cate">
                                    <option></option>
                                    <?php foreach($dataPost as $value): ?>
                                        <option value="<?php echo $value['id_post']?> ">
                                            <?php echo $value['tenpost']?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Question</th>
                            <td><input type="text" name="quest" value="<?php echo $dataQuestID['tencau']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Audio/Img</th>
                            <td><input type="text" name="ai" value="<?php echo $dataQuestID['audio_img'] ?>"></td>
                        </tr>
                        
                    </table>
                    <input type="submit" name="stepOne" value="Next step" onclick="check1()">

                    <script>
                        $(document).ready(
                            function(){
                                $('.main-stepOne').addClass('disbl');
                                $('.main-stepTwo').addClass('disnone');
                                $('.main-stepThree').addClass('disnone');
                                check1();
                                check2();
                                check3();
                            }
                        );
                        function check1() {
                            var exist = document.getElementById("ok");
                            if(exist){
                                done = document.getElementById("ok").innerHTML;
                                if(done=="OK"){
                                    $('.main-stepOne').addClass('disnone');
                                    $('.main-stepOne').removeClass('disbl');
                                    $('.main-stepTwo').removeClass('disnone');
                                    $('.main-stepTwo').addClass('disbl');
                                }
                            }
                        }
                        function check2(){
                            var exist = document.getElementById("ok2");
                            if(exist){
                                done = document.getElementById("ok2").innerHTML;
                                if(done=="Everything is done!"){
                                    $('.main-stepOne').addClass('disnone');
                                    $('.main-stepOne').removeClass('disbl');
                                    $('.main-stepTwo').removeClass('disbl');
                                    $('.main-stepTwo').addClass('disnone');
                                    $('.main-stepThree').removeClass('disnone');
                                    $('.main-stepThree').addClass('disbl'); 
                                }
                            }
                        }
                        function check3(){
                            var exist = document.getElementById("rt");
                            if(exist){
                                done = document.getElementById("rt").innerHTML;
                                if(done=="Return Two"){
                                    $('.main-stepOne').addClass('disnone');
                                    $('.main-stepOne').removeClass('disbl');
                                    $('.main-stepTwo').removeClass('disnone');
                                    $('.main-stepTwo').addClass('disbl');
                                    $('.main-stepThree').removeClass('disbl');
                                    $('.main-stepThree').addClass('disnone'); 
                                }
                            }
                        }
                    </script>
                    <?php if($check == 0): ?>
                        <p>Please enter your question</p>
                    <?php endif; ?>
                    <?php if(isset($nextStepOne)): ?>
                        <?php if($nextStepOne == 1): ?>
                            <p id="ok">OK</p>
                        <?php endif; ?>
                    <?php endif;?>
                </form>
            </div>
        </div>
        <div class="main-stepTwo">      
            <div class="content">
                <form method="POST">
                    <table border="1px">
                        <tr>
                            <th>ID_Question</th>
                            <td><?php echo $idQuest; ?></td>     
                        </tr>
                        <tr>
                            <th>Answer 1</th>
                            <td><input type="text" name="answer1" value="<?php echo $dataAnswerID['dapan1'];?>"></td>
                        </tr>
                        <tr>
                            <th>Answer 2</th>
                            <td><input type="text" name="answer2" value="<?php echo $dataAnswerID['dapan2'];?>"></td>
                        </tr>
                        <tr>
                            <th>Answer 3</th>
                            <td><input type="text" name="answer3" value="<?php echo $dataAnswerID['dapan3'];?>"></td>
                        </tr>
                        <tr>
                            <th>Answer 4</th>
                            <td><input type="text" name="answer4" value="<?php echo $dataAnswerID['dapan4'];?>"></td>
                        </tr>
                    </table>
                    <input type="submit" name="stepTwo" value="Next step" onclick="check2()">
                    <?php if(isset($ok1)): ?>
                        <?php if($ok1==1):?>
                            <p id="ok2">Everything is done!</p>
                        <?php endif;?>
                    <?php endif; ?>
                </form> 
            </div>
        </div>
        <div class="main-stepThree">
            <div class="content">
                <form method="POST">
                    <table border="1px">
                        <tr>
                            <th>ID_Question</th>
                            <td><?php echo $idQuest; ?></td>  
                        </tr>
                        <tr>
                            <th>Correct Answer</th>
                            <td>
                                <select name="correctAnswer">
                                    <option>
                                        <?php echo $dataAnswerID['dapan1'];?>
                                    </option>
                                    <option>
                                        <?php echo $dataAnswerID['dapan2'];?>
                                    </option>
                                    <option>
                                        <?php echo $dataAnswerID['dapan3'];?>
                                    </option>
                                    <option>
                                        <?php echo $dataAnswerID['dapan4'];?>
                                    </option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" name="stepThree" value="Done" onclick="check3()">
                    <?php if(isset($returnTwo)): ?>
                        <?php if($returnTwo==1):?>
                            <p id="rt">Return Two</p>
                        <?php endif;?>
                    <?php endif; ?>
                </form> 
            </div>        
        </div>
    </div>
</body>
</html>