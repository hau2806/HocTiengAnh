<!doctype html>
<html lang="en">
  <head>
    <title>Edit Post</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="View/post/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="View/post/ckfinder/ckfinder.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="header-add" style=" text-align: center; padding-top: 50px; padding-bottom: 30px;">
        <h1 style="font-size: 350%">Edit Post</h1>
        <a href="?action=blog" style="padding-right: 30px">BLOG</a>
        <a href="?action=manager" style="padding-left: 30px">MANAGER</a>
    </div>
    <form method="post" enctype="multipart/form-data">
        <table class="table table-striped">
            <tr>
                <td>Tiêu đề</td>
                <td><input type="text" name="name"  class="form-control" value="<?php echo $dataPostId['tenpost']; ?>"></td>
            </tr>
            <tr>
                <td>Ảnh đại diện</td>
                <td><input type="file" name="thumbnail" class="form-control"  ></td>
            </tr>
            <tr>
                <td>Mô tả ngắn</td>
                <td><textarea style="width: 100%;"  name="description" id="description"><?php echo $dataPostId['descrip']; ?></textarea></td>
            <tr>
                <td>Nội dung</td>
                <td><textarea style="width: 100%;"  name="content" id="content"><?php echo $dataPostId['content']; ?></textarea></td>
            </tr>
            <tr>
                <td>Level</td>
                <td><textarea style="width: 100%;"  name="level" id="level"><?php echo $dataPostId['id_level']; ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >EDIT</button></td>
            </tr>
        </table>
    </form>
    <script type="text/javascript">
        CKEDITOR.replace("content",{
            filebrowserBrowseUrl : 'View/post/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : 'View/post/ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl : 'View/post/ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl : 'View/post/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : 'View/post/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : 'View/post/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        });
            
     </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>