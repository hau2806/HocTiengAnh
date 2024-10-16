<?php 
    require_once "Model/DbModel.php";
    session_start(); 

    class Controller extends Model{
        public function MainControl(){

            $dataDebai = $this->DeBai();
            $dataCauHoi = $this->CauHoi();
            $dataUser = $this->GetDataUser();
            $dataDapAnDe = $this->DapAnDe();
            $dataDiem= $this->Diem();
            $dataDapAnDung = $this->DapAnDung();
            $dataCauHoiTheoDe = array();
            $dataPost = $this->Post();
            $test = $this->Test();
            $level = $this->Level();
            
            if(isset($_POST['save'])){

                $checkbox = $_POST['check'];
                for($i=0;$i<count($checkbox);$i++){
                    $del_id = $checkbox[$i]; 
                    $this->DeleteQuestion($del_id);
                    $this->DeleteAnswer($del_id);
                    $this->DeleteCorrectAnswer($del_id);
                }
                header('location: http://localhost/HOCTIENGANH/?action=manager');
            }
            if(isset($_POST['delete_correctanswer'])){

                $checkbox = $_POST['checkCorrect'];
                for($i=0;$i<count($checkbox);$i++){
                    $del_correctid = $checkbox[$i]; 
                    $this->DeleteCorrectAnswerID($del_correctid);
                }
                // header('location: http://localhost/HOCTIENGANH/?action=manager');
            }
            if(isset($_POST['delete_answer'])){

                $checkbox = $_POST['checkAnswer'];
                for($i=0;$i<count($checkbox);$i++){
                    $del_answerid = $checkbox[$i]; 
                    $this->DeleteAnswerID($del_answerid);
                }
                // header('location: http://localhost/HOCTIENGANH/?action=manager');
            }
            
            if(isset($_GET['action'])){
                $action = $_GET['action'];

                // if($action == 'update_mark'){
                    // $check = 0;
                    // $deso = 'diemde'.$debai['id_de'];
                    // if($dem==1){
                    //     if($this->UpdateDiemDe($id_u,$deso, $score)){
                    //         $tong_diem=0;
                    //         foreach($dataDiem as $diem){
                    //             if($id_u == $diem['id_user']){
                    //                 $k = 0;
                    //                 foreach($dataDebai as $dbdiem){
                    //                     $diemde[$k] = $diem['diemde'.$dbdiem['id_de']];
                    //                     $tong_diem = $tong_diem + $diemde[$k];
                    //                     $k++;
                    //                 }
                    //                 break;
                    //             }
                                               
                    //         }
                    //         $this->UpdateTongDiem($id_u, $tong_diem);
                    //     }
                                        
                    // }else{
                    //     foreach ($dataDebai as $dbThem){
                    //         $dbdiem = 'diemde'.$dbThem['id_de'];
                    //         if($dbdiem == $deso){
                    //              $this->InsertDiemDe($id_u,$dbdiem, $score, $score);
                    //         }    
                    //     }
                    // }
                // }
                foreach($dataDebai as $debai){
                    $tende = 'de'.$debai['id_de'];

                    $dataDapAnDungDe = $this->DapAnDungDe($debai['id_de']);
                    $dataCauHoiTheoDe = $this->CauHoiTheoDe($debai['id_de']);
                    if($action == $tende){
                        
                        $user = $_SESSION['taikhoan'];
                        foreach($dataUser as $taikhoan){
                            if($user == $taikhoan['taikhoan']){
                                $id_u = $taikhoan['id_user'];
                                break;
                            }
                        }
                        $dem = 0;
                        foreach($dataDiem as $diem){ 
                            if($id_u == $diem['id_user']){
                                $dem=1;
                                break;
                            }
                        }
                        if(isset($_POST['kiemtra'])){
                            $score = 0;
                            if(!empty($_POST['cautlcheck'])){
                                $count  = count($_POST['cautlcheck']);
                                $i = 1;
                                $selected = $_POST['cautlcheck'];
    
                                foreach($dataDapAnDungDe as $cautld){
                                    if(isset($selected[$i])){
                                        if($selected[$i] == $cautld['tendapandung']){
                                            $score++;
                                        }
                                    }
                                    $i++;
                                }
                            }
                            $check = 0;
                            $deso = 'diemde'.$debai['id_de'];
                            if($dem==1){
                                if($this->UpdateDiemDe($id_u,$deso, $score)){
                                    $tong_diem=0;
                                    foreach($dataDiem as $diem){
                                        if($id_u == $diem['id_user']){
                                            $k = 0;
                                            foreach($dataDebai as $dbdiem){
                                                $diemde[$k] = $diem['diemde'.$dbdiem['id_de']];
                                                $tong_diem = $tong_diem + $diemde[$k];
                                                $k++;
                                            }
                                            break;
                                        }
                                                       
                                    }
                                    $this->UpdateTongDiem($id_u, $tong_diem);
                                }
                                
                            }else{
                                foreach ($dataDebai as $dbThem){
                                    $dbdiem = 'diemde'.$dbThem['id_de'];
                                    if($dbdiem == $deso){
                                         $this->InsertDiemDe($id_u,$dbdiem, $score, $score);
                                    }    
                                }
                            }
                        }

                        // if(isset($_POST['kiemtra'])){
                        //     $score = 0;
                        //     if(!empty($_POST['cautlcheck'])){
                        //         $count  = count($_POST['cautlcheck']);
                        //             $m = 1;
                        //             $selected = $_POST['cautlcheck'];
                        //             $len = count($dataDapAnDungDe);
                        //             for($l=1; $l<=$len; $l++){
                        //                 if(isset($selected[$m])){
                        //                     if($selected[$m] == $dataDapAnDungDe[$l]){
                        //                         $score++;
                        //                     }
                        //                 }
                        //                 $m++;
                        //             }
                        //     }
                        //     $check = 0;
                        //     $deso = 'diemde'.$debai['id_de'];
                        //     if($dem==1){
                                // if($this->UpdateDiemDe($id_u,$deso, $score)){
                                //     $tong_diem=0;
                                //     foreach($dataDiem as $diem){
                                //         if($id_u == $diem['id_user']){
                                //             $k = 0;
                                //             foreach($dataDebai as $dbdiem){
                                //                 $diemde[$k] = $diem['diemde'.$dbdiem['id_de']];
                                //                 $tong_diem = $tong_diem + $diemde[$k];
                                //                 $k++;
                                //             }
                                //             break;
                                //         }
                                                       
                                //     }
                                //     $this->UpdateTongDiem($id_u, $tong_diem);
                        //         }
                                                
                        //     }else{
                        //         foreach ($dataDebai as $dbThem){
                        //             $dbdiem = 'diemde'.$dbThem['id_de'];
                        //             if($dbdiem == $deso){
                        //                  $this->InsertDiemDe($id_u,$dbdiem, $score, $score);
                        //             }    
                        //         }
                        //     }
                        
                        // }
                        require_once('View/De.php');
                        break;
                    }
                }
                foreach($dataPost as $post){
                    $tenpost = $post['descrip'];
                    $title = $post['tenpost'];
                    $content = $post['content'];
                    if($action == $tenpost){
                        require_once('View/Grammar.php');
                    }
                }
                foreach($dataPost as $post){
                    $url_post = 'practice_'.$post['descrip'];

                    if($action == $url_post){
                        $tenpost = $post['tenpost'];
                        $dataCauHoiTheoPost = $this->CauHoiTheoPost($post['id_post']);
                        $dataDapAnTheoPost = $this->DapAnTheoPost($post['id_post']);
                        $dataDapAnDungTheoPost = $this->DapAnDungTheoPost($post['id_post']);
                        if(isset($_POST['kiemtra'])){
                            $score = 0;
                            if(!empty($_POST['cautlcheck'])){
                                $count  = count($_POST['cautlcheck']);
                                $i = 1;
                                $selected = $_POST['cautlcheck'];

                                foreach($dataDapAnDungTheoPost as $cautld){
                                    if(isset($selected[$i])){
                                        if($selected[$i] == $cautld['tendapandung']){
                                            $score++;
                                        }
                                    }
                                    $i++;
                                }
                            }
                        }
                        require_once('View/Practice.php');
                        break;
                    }
                }
                foreach($level as $lv){
                    $id_level = $lv['id_level'];
                    if(isset($_GET['action'])){
                        if($action == 'level'.$id_level){
                            $tenlv = $lv['tenlevel'];
                            require_once('View/Level.php');
                            break;
                        }
                    }

                }
                switch($action){
                    case 'blog':{
                        header('location: http://localhost/HOCTIENGANH/');
                        break;
                    }
                    case 'login': {
                        if(isset($_POST['nutdangnhap'])){
                            $dem=0;
                            $user = $_POST['tdn'];
                            $pass = $_POST['mk'];
                            if($user==NULL||$pass==NULL){
                                $dem=-1;
                            }else{
                                foreach ($dataUser as $value) {
                                    if($value['taikhoan']==$user&&$value['matkhau']==$pass){
                                        $_SESSION['taikhoan'] = $user;
                                        $dem++;
                                        break;
                                    }
                                }
                            }
                        }
                        require_once('View/Login.php');
                        break;
                    }
                    case 'register':{
                        if(isset($_POST['nutdangky'])){
                            $dem=0;
                            $user = $_POST['tdn'];
                            $pass = $_POST['mk'];
                            if($user==NULL||$pass==NULL){
                                $dem=-1;
                            }else{
                                foreach ($dataUser as $value) {
                                    if($value['taikhoan']==$user){
                                        $dem++;
                                        break;
                                    }
                                }
                            }
                            if($dem==0){
                                $this->RegisterUser($user, $pass);
                            }
                        }
                        require_once('View/Register.php');
                        break;
                    }
                    case 'user':{
                        $i = 0;
                        foreach($dataDebai as $dbDeBai){
                            $total[$i] = $this->CauHoiTheoDe($dbDeBai['id_de']);
                            $i++;
                        }

                        $user = $_SESSION['taikhoan'];
                        $check = 0;

                        foreach($dataUser as $taikhoan){
                            if($user == $taikhoan['taikhoan']){
                                $id_u = $taikhoan['id_user'];
                                break;
                            }
                        }
                        foreach($dataDiem as $diem){
                            if($id_u == $diem['id_user']){
                                $i = 0;
                                foreach($dataDebai as $dbdiem){
                                    $diemde[$i] = $diem['diemde'.$dbdiem['id_de']];
                                    $i++;
                                }
                                $check = 1;
                                break;
                            }
                           
                        }
                        if($check == 0){
                            $diem_tv = 0;
                            $diem_nghe = 0;
                            $diem_np = 0;
                            $tong_diem = 0;
                        }

                        require_once('View/User.php');
                        break;
                    }
                    case 'logout':{
                        unset($_SESSION['taikhoan']);
                        header('location: http://localhost/hoctienganh/');
                        break;
                    }
                    case 'changepass':{
                        $user = $_SESSION['taikhoan'];
                        if(isset($_POST['nutdoimatkhau'])){
                            $dem = 0;
                            $mkc = $_POST['mkc'];
                            $mkm = $_POST['mkm'];
                            $mkmm = $_POST['mkmm'];
                            $check = true;
                            foreach($dataUser as $taikhoan){
                                if($user == $taikhoan['taikhoan']){
                                    if($mkc==NULL||$mkm==NULL||$mkmm==NULL){
                                        $dem = -2;
                                        $check = false;
                                        break;
                                    }
                                    if($mkc != $taikhoan['matkhau']){
                                        $dem = 1;
                                        $check = false;
                                        break;
                                    }
                                    if($mkc == $mkm){
                                        $dem = 2;
                                        $check = false;
                                        break;  
                                    }
                                    if($mkm != $mkmm){
                                        $dem = -1;
                                        $check = false;
                                        break;
                                    }
                                }
                            }
                            if($check==true){
                                $this->ChangePass($user, $mkmm);
                            }
                        }
                        require_once('View/Change.php');
                        break;
                    }
                    case 'manager':{
                        if(isset($_SESSION['taikhoan'])){
                            if($_SESSION['taikhoan'] == 'admin'){
                                if(isset($_GET['page'])){
                                    $current_page = $_GET['page'];
                                    $test = 1;
                                }else{
                                    $current_page = 1;
                                }
                                $limit = 25; 
                                $total_records = count($dataCauHoi);
                                $total_page = ceil($total_records / $limit);
                                if ($current_page > $total_page){
                                    $current_page = $total_page;
                                }
                                else if ($current_page < 1){
                                    $current_page = 1;
                                }
                                $start = ($current_page - 1) * $limit;
                                $dataCauHoilimit = $this->Cauhoilimit($start,$limit);

                                $j = 1;
                                foreach ($dataDebai as $debai){
                                    $dataCauHoiTheoDe[$j] = $this->CauHoiTheoDe($j);
                                    $j++;
                                }
                    
                                require_once('View/Manager.php');
                                
                            }else{
                                exit();
                            }
                        }
                        break;
                    }
                    case 'addquestion':{
                        $check = 1;
                        $check_null=1;
                        if(isset($_POST['stepOne'])){
                            $lesson = $_POST['lesson'];
                            $sub_cate = $_POST['sub-cate'];
                            $quest = $_POST['quest'];
                            $ai = $_POST['ai'];
                            if($quest==NULL){
                                $check = 0;
                            }
                            if($lesson==NULL && $sub_cate==NULL){
                                $check_null = 0;
                            }
                            if($check!=0 && $check_null!=0){
                                if($this->AddQuestion($lesson,$quest, $ai, $sub_cate)){
                                    $dataQuest2 = $this->CauHoi();
                                }
                                $lastQuestion = array_pop($dataQuest2);
                                $lastID = $lastQuestion['id_cauhoi'];
                            }
                        }
                        $okCheck = 0;
                        if(isset($_POST['stepTwo'])){
                            $dataQuest2 = $this->CauHoi();
                            $lastQuestion = array_pop($dataQuest2);
                            $lastID = $lastQuestion['id_cauhoi'];
                            $lastid_de = $lastQuestion['id_de'];
                            $lastid_cate = $lastQuestion['id_post'];
                            $answer1 = $_POST['answer1'];
                            $answer2 = $_POST['answer2'];
                            $answer3 = $_POST['answer3'];
                            $answer4 = $_POST['answer4'];
                            if($this->AddAnswer($answer1, $answer2, $answer3, $answer4, $lastID, $lastid_de, $lastid_cate)){
                                $ok1 = 1;
                            }
                        }
                        

                        $dataAnswer2 = $this->DapAnDe();
                        $lastAnswer = array_pop($dataAnswer2);
                    
                        if(isset($_POST['stepThree'])){
                            $dataQuest2 = $this->CauHoi();
                            $lastQuestion = array_pop($dataQuest2);
                            $lastID = $lastQuestion['id_cauhoi'];
                            $lastid_de = $lastQuestion['id_de'];
                            $lastid_cate = $lastQuestion['id_post'];

                            $correctAnswer = $_POST['correctAnswer'];
                            if($this->AddCorrectAnswer($correctAnswer, $lastID, $lastid_de, $lastid_cate)){
                                header('location: http://localhost/HOCTIENGANH/?action=manager');
                            }
                        }
                        require_once('View/AddQuestion.php');
                        break;
                    }
                    case 'delete':{
                        if(isset($_GET['id'])){

                            $idQuest=$_GET['id'];
                            $this->DeleteQuestion($idQuest);
                            $this->DeleteAnswer($idQuest);
                            $this->DeleteCorrectAnswer($idQuest);
                            header('location: http://localhost/HOCTIENGANH/?action=manager');
                        }
                        break;
                    }
                    case 'deletecorrectanswer':{
                        if(isset($_GET['id'])){
                            $idcorrectAnswer=$_GET['id'];
                            $this->DeleteCorrectAnswerID($idcorrectAnswer);
                            header('location: http://localhost/HOCTIENGANH/?action=manager');
                        }
                        break;
                    }
                    case 'deleteanswer':{
                        if(isset($_GET['id'])){
                            $idAnswer=$_GET['id'];
                            $this->DeleteAnswerID($idAnswer);
                            header('location: http://localhost/HOCTIENGANH/?action=manager');
                        }
                        break;
                    }
                    case 'deletepost':{
                        if(isset($_GET['id'])){
                            $idPost=$_GET['id'];
                            $this->DeletePost($idPost);
                            header('location: http://localhost/HOCTIENGANH/?action=manager');
                        }
                        break;
                        
                    }
                    case 'update':{
                        if(isset($_GET['id'])){
                            
                            $idQuest = $_GET['id'];
                            $dataQuestID = $this->GetDataQuestionID($idQuest);

                            $check = 1;
                            $checkLis = 1;
                            if(isset($_POST['stepOne'])){
                                $cate = $_POST['sub-cate'];
                                $quest = $_POST['quest'];
                                $ai = $_POST['ai'];
                                $id_de = $_POST['lesson'];
                                $nextStepOne = 0;
                                $ok1 = 0;
                                if($check!=0){
                                    if($this->UpdateQuestion($idQuest, $quest, $ai, $id_de, $cate)){
                                        $nextStepOne = 1;
                                    }
                                }
                            }
                            if(isset($_POST['stepTwo'])){
                                $answer1 = $_POST['answer1'];
                                $answer2 = $_POST['answer2'];
                                $answer3 = $_POST['answer3'];
                                $answer4 = $_POST['answer4'];
                                $id_de = $dataQuestID['id_de'];
                                $idPost = $dataQuestID['id_post'];

                                if($this->UpdateAnswer($answer1, $answer2, $answer3, $answer4,$id_de ,$idQuest, $idPost)){
                                    $ok1 = 1;
                                }
                            }

                            $dataAnswerID = $this->GetDataAnswerID($idQuest);
                            if(isset($_POST['stepThree'])){
                                $id_de = $dataQuestID['id_de'];
                                $idPost = $dataQuestID['id_post'];
                                $correctAnswer = $_POST['correctAnswer'];
                                if($this->UpdateCorrectAnswer($correctAnswer, $idQuest, $id_de, $idPost)){
                                    header('location: http://localhost/HOCTIENGANH/?action=manager');
                                }
                            }
                        }
                        require_once('View/UpdateQuestion.php');
                        break;
                    }
                    case 'updateanswer':{
                        if(isset($_GET['id'])){
                            $idAnswer = $_GET['id'];
                            $dataAnswerID = $this->GetDataAnswerIDAnswer($idAnswer);
                            $idQuest = $dataAnswerID['id_cauhoi'];
                            if(isset($_POST['stepTwo'])){
                                $cate = $_POST['sub-cate'];
                                $id_de = $_POST['lesson'];
                                $answer1 = $_POST['answer1'];
                                $answer2 = $_POST['answer2'];
                                $answer3 = $_POST['answer3'];
                                $answer4 = $_POST['answer4'];
                                
                                if($this->UpdateAnswer($answer1, $answer2, $answer3, $answer4,$id_de ,$idQuest, $cate)){
                                    header('location: http://localhost/HOCTIENGANH/?action=manager');
                                }
                            }
                        }
                        require_once('View/UpdateAnswer.php');
                        break;
                    }
                    case 'updatecorrectanswer':{
                        if(isset($_GET['id'])){
                            $idCorrectAnswer = $_GET['id'];
                            $dataCorrectAnswerID = $this->GetDataCorrectAnswerID($idCorrectAnswer);
                            $idQuest = $dataCorrectAnswerID['id_cau'];
                            if(isset($_POST['stepThree'])){
                                $cate = $_POST['sub-cate'];
                                $id_de = $_POST['lesson'];
                                $correctAnswer = $_POST['correctAnswer'];
                                if($this->UpdateCorrectAnswer($correctAnswer, $idQuest, $id_de, $cate)){
                                    header('location: http://localhost/HOCTIENGANH/?action=manager');
                                }
                            }
                        }
                        require_once('View/UpdateCorrectAnswer.php');
                        break;
                    }
                    
                    case 'home':{
                        header('location: http://localhost/HOCTIENGANH/');
                        break;
                    }
                    case 'addquestionexcel':{
                        $check = 0;
                        if(isset($_POST['ok'])){
                            $uploadfile=$_FILES['uploadfile']['tmp_name'];
                        
                            require 'PHPExcel/Classes/PHPExcel.php';
                            require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
                            $objExcel=PHPExcel_IOFactory::load($uploadfile);
                            foreach($objExcel->getWorksheetIterator() as $worksheet)
                            {
                                $highestrow=$worksheet->getHighestRow();
                            
                                for($row=0;$row<=$highestrow;$row++)
                                {
                                    $tencau=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
                                    $ai=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
                                    $id_de=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
                                    $id_post=$worksheet->getCellByColumnAndRow(4,$row)->getValue();

                                    if($tencau!='')
                                    {
                                        if($this->InsertCauHoiTheoDe($tencau,$ai,$id_de,$id_post)){
                                            $check = 1;
                                        }
                                    }
                                }
                            }
                        }

                        require_once('View/AddQuestionLesson.php');
                        break;
                    }
                    case 'addlesson':{
                        $check = 0;
                        $ok = 0;
                        if(isset($_POST['done'])){
                            $lesson = $_POST['lesson'];
                            if($this->InsertDeBai($lesson)){
                                $check = 1;
                                
                            }
                            if($check == 1){
                                $lastDeBai = array();
                                $lastDeBai = array_pop($dataDebai);
                                $lastIDDeBai = $lastDeBai['id_de'];
                                if($this->InsertCotDiem('diemde'.$lastIDDeBai)){
                                    $ok = 1;
                                }
                            }
                        }
                        require_once('View/AddLesson.php');
                        break;
                    }
                    case 'addanswerexcel':{
                        $check = 0;
                        if(isset($_POST['ok'])){
                            $uploadfile=$_FILES['uploadfile']['tmp_name'];
                        
                            require 'PHPExcel/Classes/PHPExcel.php';
                            require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
                            $objExcel=PHPExcel_IOFactory::load($uploadfile);
                            foreach($objExcel->getWorksheetIterator() as $worksheet)
                            {
                                $highestrow=$worksheet->getHighestRow();
                            
                                for($row=0;$row<=$highestrow;$row++)
                                {
                                    $dapan1=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
                                    $dapan2=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
                                    $dapan3=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
                                    $dapan4=$worksheet->getCellByColumnAndRow(4,$row)->getValue();
                                    $id_cauhoi=$worksheet->getCellByColumnAndRow(5,$row)->getValue();
                                    $id_de=$worksheet->getCellByColumnAndRow(6,$row)->getValue();
                                    $id_post=$worksheet->getCellByColumnAndRow(7,$row)->getValue();

                                    if($dapan1!=''&&$dapan2!=''&&$dapan3!=''&&$dapan4!='')
                                    {
                                        if($this->InsertDapAnTheoDe($dapan1,$dapan2,$dapan3,$dapan4,$id_cauhoi,$id_de, $id_post)){
                                            $check = 1;
                                        }
                                    }
                                }
                            }
                        }
                        require_once('View/AddAnswerLesson.php');
                        break;
                    }
                    case 'addanswer':{
                        if(isset($_POST['done'])){
                            $lesson = $_POST['lesson'];
                            $cate = $_POST['sub-cate'];
                            $answer1 = $_POST['answer1'];
                            $answer2 = $_POST['answer2'];
                            $answer3 = $_POST['answer3'];
                            $answer4 = $_POST['answer4'];
                            $id_question = $_POST['id_question'];
                            if($this->AddAnswer($answer1, $answer2, $answer3, $answer4, $id_question, $lesson, $cate)){
                                header('location: http://localhost/HOCTIENGANH/?action=manager');
                            }
                        }
                        require_once('View/AddAnswer.php');
                        break;
                    }
                    case 'addcorrectanswerexcel':{
                        $check = 0;
                        if(isset($_POST['ok'])){
                            $uploadfile=$_FILES['uploadfile']['tmp_name'];
                        
                            require 'PHPExcel/Classes/PHPExcel.php';
                            require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
                            $objExcel=PHPExcel_IOFactory::load($uploadfile);
                            foreach($objExcel->getWorksheetIterator() as $worksheet)
                            {
                                $highestrow=$worksheet->getHighestRow();
                            
                                for($row=0;$row<=$highestrow;$row++)
                                {
                                    $tendapandung=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
                                    $id_cau=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
                                    $id_de=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
                                    $id_post=$worksheet->getCellByColumnAndRow(4,$row)->getValue();

                                    if($tendapandung!='')
                                    {
                                        if($this->InsertDapAnDungTheoDe($tendapandung,$id_cau, $id_de, $id_post)){
                                            $check = 1;
                                        }
                                    }
                                }
                            }
                        }
                        require_once('View/AddCorrectAnswerLesson.php');
                        break;
                    }
                    case 'addcorrectanswer':{
                        if(isset($_POST['done'])){
                            $lesson = $_POST['lesson'];
                            $cate = $_POST['sub-cate'];
                            $correctanswer = $_POST['cranswer'];
                            $id_question = $_POST['id_question'];
                            if($this->AddCorrectAnswer($correctanswer, $id_question, $lesson, $cate)){
                                header('location: http://localhost/HOCTIENGANH/?action=manager');
                            }
                        }
                        require_once('View/AddCorrectAnswer.php');
                        break;
                    }
                    case 'addpost':{
                        if(isset($_POST['add'])){

                            $name=$_POST["name"];
                            $description=$_POST['description'];
                            $content=$_POST['content'];
                            $level=$_POST['level'];
                            $image_link=$_FILES['thumbnail']['name'];
                            $image_link_tmp=$_FILES['thumbnail']['tmp_name'];
                            move_uploaded_file($image_link_tmp,'View/post/uploads/'.$image_link);
                            if($this->AddPost($name, $image_link, $description, $content,$level)){
                                header('location: http://localhost/HOCTIENGANH/?action=manager');
                            }
                        }
                        require_once('View/post/AddPost.php');
                        break;
                    }
                    case 'editpost':{
                        if(isset($_GET['id'])){
                            $id_post = $_GET['id'];
                            $dataPostId = $this->PostID($id_post);
                            if(isset($_POST['edit'])){

                                $name=$_POST["name"];
                                $description=$_POST['description'];
                                $content=$_POST['content'];
                                $image_link=$_FILES['thumbnail']['name'];
                                $image_link_tmp=$_FILES['thumbnail']['tmp_name'];
                                move_uploaded_file($image_link_tmp,'View/post/uploads/'.$image_link);
                                if($this->EditPost($id_post, $name, $image_link, $description, $content)){
                                    header('location: http://localhost/HOCTIENGANH/?action=manager');
                                }
                            }
                        }
                        require_once('View/post/EditPost.php');
                        break;
                    }
                    
                }
            }else{
                $dataUser = $this->GetDataUser();
                $dataScore = $this->Diem();
                $dataScoreAB = $this->DiemAB();
                require_once('View/Blog.php');
            }
        }
    }
?>