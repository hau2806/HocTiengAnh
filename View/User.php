<!DOCTYPE html>
<html>

<head>
    <title>ENGLISH</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet/less" type="text/css" href="View/Css/user_styles.less" />
    <script src="View/Css/less.js" type="text/javascript"></script>
    <script type="text/javascript" src="View/Css/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <!-- <script type="text/javascript" src="View/Css/Login.js"></script> -->
</head>

<body>
    <div class="container">
        <div class="content">
            <h2>WELCOME TO MY WEBSITE</h2>
            <h3>Hi!
                <?php echo $_SESSION['taikhoan']; ?>
            </h3>
            <div class="con">
                <a href="?action=changepass">Change password</a>
                <a href="?action=logout">Log out</a>
            </div>
            <?php
            if (!isset($diemde)) {
                ?>
                <h2 style="text-align: center">You haven't done any homework</h2>
                <?php
            } else {
                ?>
                <div class="score-board">
                    <table border="1px">
                        <?php
                        $i = 0;
                        $sum_ch = 0;
                        $sum_diem = 0;
                        foreach ($dataDebai as $dtDeBai): ?>
                            <tr>
                                <td>
                                    <?php echo $dtDeBai['tende'] ?>:
                                </td>
                                <td>
                                    <?php echo $diemde[$i] . "/" . count($total[$i]); ?>
                                </td>
                                <?php $sum_diem = $sum_diem + $diemde[$i]; ?>
                                <?php $sum_ch = $sum_ch + count($total[$i]); ?>
                            </tr>
                            <?php
                            $i++;
                        endforeach; ?>
                        <tr>
                            <td>Total: </td>
                            <td>
                                <?php echo $sum_diem . '/' . $sum_ch; ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <?php
            }
            ?>
            <div class="home">
                <a href="?action=blog">
                    <div class="back-home">
                        <p>OK</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>