<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add LESSON</title>
    <link rel="stylesheet/less" type="text/css" href="View/Css/addQuest_styles.less"/>
    <script src="View/Css/less.js" type="text/javascript"></script>
    <script type="text/javascript" src="View/Css/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script type="text/javascript" src="View/Css/Add.js"></script>
</head>
<body>
    <div class="content-main">
        <h2>ADD LESSON</h2>
        <div class="direct">
            <ul>
                <li><a href="?action=blog">Blog</a></li>
                <li><a href="?action=manager">Manager</a></li>
            </ul>
        </div>
        <div class="main-stepOne">
            <div class="content" style ="display: flex; justify-content: center;">
                <form method="POST">
                    <table border="1px" >
                        <tr>
                            <th>Name</th>
                            <td><input type="text" name="lesson" placeholder="Enter your lesson"></td>
                        </tr>
                    </table>
                    <input style="cursor: pointer;" type="submit" name="done" value="Done">
                </form> 
            </div>        
        </div>
        <?php if(isset($ok)): ?>
            <?php if($ok == 1): ?>
                <?php header('location: http://localhost/HOCTIENGANH/?action=manager'); ?>
            <?php endif;?>
        <?php endif;?>
    </div>
</body>
</html>