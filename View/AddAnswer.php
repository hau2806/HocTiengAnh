<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question</title>
    <link rel="stylesheet/less" type="text/css" href="View/Css/addQuest_styles.less"/>
    <script src="View/Css/less.js" type="text/javascript"></script>
    <script type="text/javascript" src="View/Css/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script type="text/javascript" src="View/Css/Add.js"></script>
</head>
<body>
    <div class="content-main">
        <h2>ADD ANSWER</h2>
        <div class="direct">
            <ul>
                <li><a href="?action=blog">Blog</a></li>
                <li><a href="?action=manager">Manager</a></li>
            </ul>
        </div>
        <div class="main-stepOne" style="display: flex;">
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
                            <th>Category</th>
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
                            <th>Answer 1</th>
                            <td><input type="text" name="answer1" placeholder="Enter your answer"></td>
                        </tr>
                        <tr>
                            <th>Answer 2</th>
                            <td><input type="text" name="answer2" placeholder="Enter your answer"></td>
                        </tr>
                        <tr>
                            <th>Answer 3</th>
                            <td><input type="text" name="answer3" placeholder="Enter your answer"></td>
                        </tr>
                        <tr>
                            <th>Answer 4</th>
                            <td><input type="text" name="answer4" placeholder="Enter your answer"></td>
                        </tr>
                        <tr>
                            <th>Id Question</th>
                            <td><input type="text" name="id_question" placeholder="Enter your id question"></td>
                        </tr>
                        
                    </table>
                    <input type="submit" name="done" value="Done">

                </form>
            </div>
        </div>
    </div>
</body>
</html>