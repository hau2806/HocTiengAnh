<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="View/Css/login_styles.css"/>
        <script src="View/Css/less.js" type="text/javascript"></script>
        <script type="text/javascript" src="View/Css/jquery-3.3.1.min.js"></script>
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script type="text/javascript" src="View/Css/Login.js"></script>
    </head>
    <body>
	<div class="header">
		<div class="header-main">
		       <h1>Login Form</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">
                        <form action="#" method="post">
                            <input type="text"  placeholder="User name" name="tdn" />
                            <input id="passw" type="Password"  placeholder="Password" name="mk"/>
                            <div class="forgot">
                                <h6>Bạn chưa có tài khoản?<a href="?action=register">Đăng ký</a></h6>
                            </div>
                            <div class="clear"></div>
                            <input type="submit" name="nutdangnhap" value="Login">
                        </form>	
                    </div>
				</div>
			  
			</div>
		</div>
	</div>
	<!--header end here-->
    <div class="copyright">
        Copyright © 2021 Kira. All rights reserved
     </div>

    <div class="tb">
        <?php if (isset($dem)): ?>
            <?php if ($dem==-1): ?>
                <p>Tên tài khoản hoặc mật khẩu không bỏ trống!</p>
            <?php endif ?>
            <?php if ($dem==0): ?>
                <p>Tên tài khoản hoặc mật khẩu không đúng!</p>
            <?php elseif($dem>0): ?>
                <?php header('location: http://localhost/hoctienganh/'); ?>
            <?php endif ?>
        <?php endif ?>
    </div>
    </body>
</html>
