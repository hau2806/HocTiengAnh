<!DOCTYPE html>
<html>
    <head>
        <title>ENGLISH</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet/less" type="text/css" href="View/Css/login_styles.css"/>
        <script src="View/Css/less.js" type="text/javascript"></script>
        <script type="text/javascript" src="View/Css/jquery-3.3.1.min.js"></script>
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script type="text/javascript" src="View/Css/ChangePass.js"></script>
    </head>
    <body>
	<div class="header">
		<div class="header-main">
		       <h1>CHANGE PASSWORD</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">
					
					<div class="header-left-bottom agileinfo">
						
                        <form action="#" method="post">
                            <input type="Password" placeholder="Mật khẩu cũ" name="mkc" />
                            <input type="Password" placeholder="Mật khẩu mới" name="mkm"/>
                            <input type="Password" placeholder="Nhập lại mật khẩu mới" name="mkmm"/>
                            <input type="submit" name="nutdoimatkhau" value="OK">
                        </form>
                        <div class="tb">
                            <?php if (isset($dem)): ?>
                                <?php if ($dem==1): ?>
                                    <p>Mật khẩu cũ không khớp!</p>
                                <?php elseif($dem==-1): ?>
                                    <p>Hai mật khẩu mới không khớp!</p>
                                <?php elseif($dem==2): ?>
                                    <p>Mật khẩu mới không trùng mật khẩu cũ!</p>
                                <?php elseif($dem==-2): ?>
                                    <p>Không bỏ trống!</p>
                                <?php else: ?>
                                    <p>Đổi mật khẩu thành công!</p>
                                    <?php header('http://localhost/hoctienganh/?action=blog'); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
				</div>
			  
			</div>
		</div>
	</div>
    </body>
</html>