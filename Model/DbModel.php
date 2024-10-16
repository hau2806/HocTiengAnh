<?php 
    require_once "Db.php";

    class Model extends Db{
        public function DeBai(){
            $sql = "SELECT * FROM debai";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);
            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function CauHoiTheoDe($de){
            $sql = "SELECT * FROM cauhoide  WHERE id_de = '$de'";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);
            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function CauHoi(){
            $sql = "SELECT * FROM cauhoide";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);
            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function DapAnDe(){
            $sql = "SELECT * FROM dapande";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);
            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function DapAnDung(){
            $sql = "SELECT * FROM dapandung";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);

            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function DapAnDungDe($id_de){
            $sql = "SELECT * FROM dapandung WHERE id_de = '$id_de'";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);

            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function AddQuestion($lesson, $quest, $ai, $cate){
            $sql = "INSERT INTO cauhoide(id_cauhoi, tencau, audio_img, id_de, id_post) VALUES(NULL,'$quest', '$ai','$lesson' ,'$cate')";
            $conn = $this->ketnoi();
            return $conn->query($sql);
        }

        public function AddAnswer($answer1, $answer2, $answer3, $answer4, $idQuestion, $id_de, $id_post){
            $sql = "INSERT INTO dapande(id_dapan, dapan1, dapan2, dapan3, dapan4, id_cauhoi, id_de, id_post) VALUES(NULL,'$answer1', '$answer2', '$answer3', '$answer4', '$idQuestion', '$id_de', '$id_post')";
            $conn = $this->ketnoi();
            return $conn->query($sql);
        }

        public function AddCorrectAnswer($correctAnswer, $lastID, $id_de, $id_post){
            $sql = "INSERT INTO dapandung(id_dapandung, tendapandung, id_cau, id_de, id_post) VALUES(NULL,'$correctAnswer', '$lastID', '$id_de', '$id_post')";
            $conn = $this->ketnoi();
            return $conn->query($sql);
        }

        public function DeleteQuestion($idQuest){
            $sql = "DELETE FROM cauhoide WHERE id_cauhoi = '$idQuest'";
            $conn = $this->ketnoi();
            return $conn->query($sql);
        }

        public function DeleteAnswer($idQuest){
            $sql = "DELETE FROM dapande WHERE id_cauhoi = '$idQuest'";
            $conn = $this->ketnoi();
            return $conn->query($sql);
        }
        public function DeleteAnswerID($idAnswer){
            $sql = "DELETE FROM dapande WHERE id_dapan = '$idAnswer'";
            $conn = $this->ketnoi();
            return $conn->query($sql);
        }

        public function DeleteCorrectAnswer($idQuest){
            $sql = "DELETE FROM dapandung WHERE id_cau = '$idQuest'";
            $conn = $this->ketnoi();
            return $conn->query($sql);
        }
        public function DeleteCorrectAnswerID($idcorrectanswer){
            $sql = "DELETE FROM dapandung WHERE id_dapandung = '$idcorrectanswer'";
            $conn = $this->ketnoi();
            return $conn->query($sql);
        }

        public function GetDataQuestionID($idQuest){
            $sql = "SELECT * FROM cauhoide WHERE id_cauhoi = $idQuest";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);

            if($ketqua->num_rows!=0){
                $data = mysqli_fetch_array($ketqua);
            }else{
                $data = 0;
            }
            return $data;

        }
        public function GetDataAnswerID($idQuest){
            $sql = "SELECT * FROM dapande WHERE id_cauhoi = $idQuest";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);

            if($ketqua->num_rows!=0){
                $data = mysqli_fetch_array($ketqua);
            }else{
                $data = 0;
            }
            return $data;

        }
        public function GetDataAnswerIDAnswer($idAnswer){
            $sql = "SELECT * FROM dapande WHERE id_dapan = $idAnswer";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);

            if($ketqua->num_rows!=0){
                $data = mysqli_fetch_array($ketqua);
            }else{
                $data = 0;
            }
            return $data;
        }
        public function GetDataCorrectAnswerID($idCorrectAnswer){
            $sql = "SELECT * FROM dapandung WHERE id_dapandung = $idCorrectAnswer";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);

            if($ketqua->num_rows!=0){
                $data = mysqli_fetch_array($ketqua);
            }else{
                $data = 0;
            }
            return $data;
        }
        

        public function UpdateQuestion($idQuest, $quest, $ai, $id_de ,$cate){
            $sql = "UPDATE cauhoide SET tencau='$quest', audio_img='$ai', id_de = '$id_de' ,id_post='$cate' WHERE id_cauhoi='$idQuest'";
            $conn = $this->ketnoi();
            return $conn->query($sql);
        }
        public function UpdateAnswer($answer1, $answer2, $answer3, $answer4, $id_de, $idQuest, $idPost){
            $sql = "UPDATE dapande SET dapan1='$answer1', dapan2='$answer2', dapan3='$answer3',dapan4='$answer4', id_de = '$id_de', id_post ='$idPost' WHERE id_cauhoi='$idQuest'";
            $conn = $this->ketnoi();
            return $conn->query($sql);
        }
        public function UpdateCorrectAnswer($correctAnswer, $idQuest, $id_de, $idPost){
            $sql = "UPDATE dapandung SET tendapandung='$correctAnswer', id_de = '$id_de', id_post='$idPost' WHERE id_cau='$idQuest'";
            $conn = $this->ketnoi();
            return $conn->query($sql);
        }

        public function GetDataUser(){
            $sql = "SELECT * FROM user";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);

            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function RegisterUser($user, $pass){
            $sql = "INSERT INTO user(id_user, taikhoan, matkhau) VALUES(NULL,'$user', '$pass')";
            $conn = $this->ketnoi();
            return $conn->query($sql);
        }

        public function ChangePass($user, $pass){
            $sql = "UPDATE user SET matkhau = '$pass' WHERE taikhoan = '$user'";
            $conn = $this->ketnoi();
            return $conn->query($sql);
        }

        public function Diem(){
            $sql = "SELECT * FROM diem";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);
            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function DiemAB(){
            $sql = "SELECT * FROM diem ORDER BY tong_diem DESC";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);
            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function InsertDiemDe($id_u,$dbdiem, $score, $total){
            $sql = "INSERT INTO diem(id_diem, $dbdiem,tong_diem, id_user) VALUES(NULL,'$score', '$total', '$id_u')";
            $conn = $this->ketnoi();
            return $conn->query($sql);
        }
        public function UpdateDiemDe($id_u, $deso, $score){
            $sql = "UPDATE diem SET $deso = '$score' WHERE id_user = '$id_u'";
            $conn = $this->ketnoi();
            return $conn->query($sql);
        }
        public function UpdateTongDiem($id_u, $tongdiem){
            $sql = "UPDATE diem SET tong_diem = '$tongdiem' WHERE id_user = '$id_u'";
            $conn = $this->ketnoi();
            return $conn->query($sql);            
        }

        public function TheLoai(){
            $sql = "SELECT * FROM theloai";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);
            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;            
        }
        public function InsertDe($tende){
            $sql = "INSERT INTO debai(id_de, tende) VALUES(NULL, '$tende')";
            $conn = $this->ketnoi();
            return $conn->query($sql);            
        }
        public function InsertCauHoiTheoDe($tencau,$ai,$id_de,$id_post){
            $sql = "INSERT INTO cauhoide(id_cauhoi, tencau, audio_img, id_de, id_post) VALUES(NULL, '$tencau', '$ai', '$id_de','$id_post')";
            $conn = $this->ketnoi();
            return $conn->query($sql);            
        }
        public function InsertDapAnTheoDe($dapan1,$dapan2,$dapan3,$dapan4,$id_cau, $id_de, $id_post){
            $sql = "INSERT INTO dapande(id_dapan, dapan1, dapan2, dapan3, dapan4, id_cauhoi,id_de,id_post) VALUES(NULL, '$dapan1', '$dapan2', '$dapan3','$dapan4', '$id_cau', '$id_de', '$id_post')";
            $conn = $this->ketnoi();
            return $conn->query($sql);            
        }
        public function InsertDapAnDungTheoDe($tendapandung,$id_cau, $id_de, $id_post){
            $sql = "INSERT INTO dapandung(id_dapandung, tendapandung, id_cau, id_de, id_post) VALUES(NULL, '$tendapandung', '$id_cau', '$id_de', '$id_post')";
            $conn = $this->ketnoi();
            return $conn->query($sql);            
        }

        public function InsertDeBai($lesson){
            $sql = "INSERT INTO debai(id_de, tende) VALUES(NULL, '$lesson')";
            $conn = $this->ketnoi();
            return $conn->query($sql); 
        }

        public function InsertCotDiem($tencot){
            $sql = "ALTER TABLE diem ADD $tencot text ";
            $conn = $this->ketnoi();
            return $conn->query($sql);             
        }

        public function Post(){
            $sql = "SELECT * FROM post";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);
            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;            
        }
        public function AddPost($name,$thumbnail,$descrip,$content, $level){
            $sql = "INSERT INTO post(id_post, tenpost, thumbnail, descrip,content, id_level) VALUES(NULL, '$name', '$thumbnail', '$descrip', '$content', '$level')";
            $conn = $this->ketnoi();
            return $conn->query($sql);            
        }
        public function PostID($idpost){
            $sql = "SELECT * FROM post WHERE id_post = $idpost";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);

            if($ketqua->num_rows!=0){
                $data = mysqli_fetch_array($ketqua);
            }else{
                $data = 0;
            }
            return $data;
        }
        public function EditPost($id_post, $name, $thumbnail, $descrip, $content, $level){
            $sql = "UPDATE post SET tenpost='$name', thumbnail='$thumbnail', descrip='$descrip', content='$content', id_level='$level' WHERE id_post = '$id_post'";
            $conn = $this->ketnoi();
            return $conn->query($sql);            
        }
        public function CauHoiTheoPost($id_post){
            $sql = "SELECT * FROM cauhoide WHERE id_post='$id_post'";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);
            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;            
        }
        public function DapAnTheoPost($id_post){
            $sql = "SELECT * FROM dapande WHERE id_post='$id_post'";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);
            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;            
        }
        public function DapAnDungTheoPost($id_post){
            $sql = "SELECT * FROM dapandung WHERE id_post='$id_post'";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);
            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;      
        }
        
        public function Test(){
            $sql = "SELECT * FROM cauhoide ORDER BY RAND() LIMIT 50";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);
            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;             
        }
        public function Level(){
            $sql = "SELECT * FROM levels";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);

            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function Cauhoilimit($start,$limit){
            $sql = "SELECT * FROM cauhoide LIMIT $start, $limit";
            $con = $this->ketnoi();
            $ketqua = $con->query($sql);

            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function DeletePost($idPost){
            $sql = "DELETE FROM post WHERE id_post = '$idPost'";
            $conn = $this->ketnoi();
            return $conn->query($sql);
        }
    }
?>