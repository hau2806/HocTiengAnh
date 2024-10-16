<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
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
		       <h1>Register Form</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">
					
					<div class="header-left-bottom agileinfo">
						
                        <form action="#" method="post">
                            <input type="text"  placeholder="User name" name="tdn"  />
                            <input id="passw" type="Password"  placeholder="Password" name="mk"/>
                            <div class="forgot">
                                <h6>Bạn đã có tài khoản?<a href="?action=login">Đăng nhập</a></h6>
                            </div>
                            <div class="clear"></div>
                            <input type="submit" name="nutdangky" value="Register">
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
            <?php if ($dem>0): ?>
                <p>Tài khoản đã tồn tại!</p>
            <?php elseif($dem==-1): ?>
                <p>Tài khoản hoặc mật khẩu không để trống!</p>
            <?php else: ?>
                <p>Đăng kí thành công!</p>
                <?php header('location: http://localhost/HOCTIENGANH/?action=login'); ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    </body>
</html>
