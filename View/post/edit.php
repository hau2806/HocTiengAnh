<style type="text/css">
  #cke_1_contents {
    height: 1000px !important;
  }
</style>
<?php
  include_once("config.php");
  $dt=new database();
  $id=isset($_GET["id"])?$_GET["id"]:"";
   $dt->select("SELECT * FROM post WHERE id='$id' ");
   $row2=$dt->fetch();
?>
<form action="action.php?id=<?php echo $row2['id'] ?>" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
       <?php
         if ($_GET['success']==1) {
            ?>
              <tr>
         <td colspan="2"><div class="alert alert-danger">
            Sửa thành công
         </div></td>
      </tr>
            <?php
         }
      ?>
    <tr>
        <td>Tiêu đề</td>
        <td><input type="text" name="name" value="<?php echo $row2['name']; ?>" class="form-control" ></td>
     </tr>
      <tr>
        <td>Ảnh đại diện</td>
        <td><input type="file" name="thumbnail" class="form-control" ></td>
     </tr>

     <tr>
        <td>Chuyên mục</td>
        <td>
            <select name="category" id=""  class="form-control">
                <?php
                    $dt->select('SELECT * FROM category');
                    while ($row=$dt->fetch()) {
                      ?>
                      <option><?php echo $row['name'] ?></option>
                      <?php
                    }
                  ?>
            </select>
        </td>
     </tr>
       <tr>
        <td>Mô tả ngắn</td>
        <td><textarea style="width: 100%;"  name="description" id="description"><?php echo $row2['description']; ?></textarea></td>
     </tr>
     <tr>
        <td>Nội dung</td>
        <td><textarea style="width: 100%;"  name="content" id="content"><?php echo $row2['content']; ?></textarea></td>
     </tr>
     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >EDIT</button></td>
     </tr>
  </table>
</form>
<script type="text/javascript">
    CKEDITOR.replace("content",{
               filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
               filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
               filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
               filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
               filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
               filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });
       
</script>
