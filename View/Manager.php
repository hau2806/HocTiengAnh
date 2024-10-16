<!DOCTYPE html>
<html>
<head>
    <title>Manager</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet/less" type="text/css" href="View/Css/manager_styles.less"/>
	<link rel="stylesheet/less" type="text/css" href="View/Css/manager_queries.less"/>
    <script src="View/Css/less.js" type="text/javascript"></script>
    <script type="text/javascript" src="View/Css/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</head>
<body>
	<header>
        <a href="?action=home" class="logo">
            <h1><span>K</span>ira</h1>
        </a>
        <ul class="menu-list">
			<li>
               <h2> Hi! <?php echo $_SESSION['taikhoan']; ?></h2>
            </li>
			<li id="go-post"><a href="#post">Post</a></li>
            <li>
                <h2>Lessons</h2>
				<ul class="sub-menu">
					<?php foreach($dataDebai as $de): ?>
						<li>
							<h5 class="de"><a href="#<?php echo "de".$de['id_de'] ?>"><?php echo $de['tende']; ?></a></h5>
						</li>
					<?php endforeach;?>
				</ul>
            </li>
			<li>
				<h2>Categories</h2>
				<ul class="sub-menu">
					<?php 
						$i = 0;
						foreach($dataPost as $theloai): ?>
						<li>
							<h5 class="submenu"><a href="#theloai-<?php echo $theloai['id_post']; ?>"><?php echo $theloai['tenpost']; ?></a></h5>
						</li>
					<?php $i++; 
						endforeach;?>
				</ul>
			</li>
            <li id="go-questions"><a href="#questions">Quesions</a></li>
			<li id="go-answers"><a href="#answers">Answers</a></li>
			<li id="go-correctanswer"><a href="#correctanswer">Correct Anwser</a></li>
			<li id="go-user"><a href="#user">User</a></li>
			<li id="go-score"><a href="#score">Score</a></li>
			
        </ul>
		<div class="lo">
			<a href="?action=logout">Log out</a>
		</div>
    </header>
	<div class="container">
		<h1>MANAGER</h1>
		<div id="post" class="ok">
			<h3>All Post</h3>
			<a href="?action=addpost">Add Post</a>
			<div class="table-main">
				<table border="1px">
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên bài viết</th>
							<th>Ảnh đại diện</th>
							<th>Mô tả</th>
							<th>Level</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach ($dataPost as $post) : ?> 
								<tr>
									<td><?php echo $post['id_post']; ?></td>
									<td><a href="?action=editpost&id=<?php echo $post['id_post'] ?>"><?php echo $post['tenpost'] ?></a></td>
									<td><img style="width: 100px;height: 100px;" src="View/post/uploads/<?php echo $post['thumbnail'] ?>"></td>
									<td><?php echo $post['descrip']?></td>
									<td><?php echo $post['id_level']?></td>
									<td>
										<h5><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="?action=deletepost&id=<?php echo $post['id_post']?>">Delete</a></h5>
									</td>
								</tr>
						<?php 
							endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div id="questions" class="ok">
			<h3>All Questions</h3>
			<a href="?action=addquestion">Add Question</a>
			<a href="?action=addquestionexcel">Add Question From Import Excel File</a>
			<div class="table-main">
				<form method="POST">
					<table border="1px">
						<thead>
							<tr>
								<th>Number</th>
								<th><input type="checkbox" id="checkAl"> Select All</th>
								<th>Id question</th>
								<th>Question</th>
								<th>Audio/Img</th>
								<th>Id Lesson</th>
								<th>Id Category</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$count=1;
								foreach ($dataCauHoilimit as $value) : ?> 
									<tr>
										<td><?php echo $count; ?></td>
										<td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $value["id_cauhoi"]; ?>"></td>
										<td><?php echo $value['id_cauhoi']; ?></td>
										<td><?php echo $value['tencau']; ?></td>
										<td><?php echo $value['audio_img']?></td>
										<td><?php echo $value['id_de']?></td>
										<td><?php echo $value['id_post']; ?></td>
										<td>
											<a onclick="return confirm('Bạn có  chắc chắn muốn sửa?')" href="?action=update&id=<?php echo $value['id_cauhoi']?>">Update</a>
											<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="?action=delete&id=<?php echo $value['id_cauhoi']?>">Delete</a>
										</td>
									</tr>
							<?php 
								$count++;
								endforeach; ?>
						</tbody>
					</table>
					<p style="text-align: right; padding-right:10px; padding-top:10px;"><button style="height: 40px; width: 80px; border-radius: 10px;" type="submit" class="btn btn-success" name="save">DELETE</button></p>
				</form>
			</div>
			<div class="pagination">
				<?php 
					// PHẦN HIỂN THỊ PHÂN TRANG
					// BƯỚC 7: HIỂN THỊ PHÂN TRANG
		
					// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
					if ($current_page > 1 && $total_page > 1){?>
						<!-- echo '<a href="?action=manager?page='.($current_page-1).'">Prev</a> | '; -->
						<a href="?page=<?php echo ($current_page-1); ?>"></a>
					<?php }
		
					// Lặp khoảng giữa
					for ($i = 1; $i <= $total_page; $i++){
						// Nếu là trang hiện tại thì hiển thị thẻ span
						// ngược lại hiển thị thẻ a
						if ($i == $current_page){
							echo '<span>'.$i.'</span> ';
						}
						else{?>
							<!-- echo '<a href="?action=manager?page='.$i.'">'.$i.'</a> | '; -->
							<a href="?action=manager&page=<?php echo ($i); ?>"><?php echo $i; ?></a>
						<?php }
					}
		
					// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
					if ($current_page < $total_page && $total_page > 1){
						echo '<a href="?action=manager&page='.($current_page+1).'">Next</a>';
					}

				?>
			</div>
		</div>
		<div id="answers" class="ok">
			<h3>All Answers</h3>
			<a href="?action=addanswer">Add Answers</a>
			<a href="?action=addanswerexcel">Add Answers From Import Excel File</a>
			<div class="table-main">
				<form method="POST">
					<table border="1px">
						<thead>
							<tr>
								<th>Number</th>
								<th><input type="checkbox" id="checkAllAnswer"> Select All</th>
								<th>Id Answer</th>
								<th>Answer 1</th>
								<th>Answer 2</th>
								<th>Answer 3</th>
								<th>Answer 4</th>
								<th>Id Lesson</th>
								<th>Id Question</th>
								<th>Id Category</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$count=1;
								foreach ($dataDapAnDe as $value) : ?> 
									<tr>
										<td><?php echo $count; ?></td>
										<td><input type="checkbox" id="checkItem" name="checkAnswer[]" value="<?php echo $value["id_dapan"]; ?>"></td>
										<td><?php echo $value['id_dapan']; ?></td>
										<td><?php echo $value['dapan1']; ?></td>
										<td><?php echo $value['dapan2']?></td>
										<td><?php echo $value['dapan3']?></td>
										<td><?php echo $value['dapan4']?></td>
										<td><?php echo $value['id_de']; ?></td>
										<td><?php echo $value['id_cauhoi']; ?></td>
										<td><?php echo $value['id_post']; ?></td>
										<td>
											<a onclick="return confirm('Bạn có  chắc chắn muốn sửa?')" href="?action=updateanswer&id=<?php echo $value['id_dapan']?>">Update</a>
											<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="?action=deleteanswer&id=<?php echo $value['id_dapan']?>">Delete</a>
										</td>
									</tr>
							<?php 
								$count++;
								endforeach; ?>
						</tbody>
					</table>
					<p style="text-align: right; padding-right:10px; padding-top:10px;"><button style="height: 40px; width: 80px; border-radius: 10px;" type="submit" class="btn btn-success" name="delete_answer">DELETE</button></p>
				</form>
			</div>
		</div>
		<div id="correctanswer" class = "ok">
			<h3>All Correct Answers</h3>
			<a href="?action=addcorrectanswer">Add Correct Answers</a>
			<a href="?action=addcorrectanswerexcel">Add Correct Answers From Import Excel File</a>
			<div class="table-main">
				<form method="POST">
				<table border="1px">
					<thead>
						<tr>
							<th>Number</th>
							<th><input type="checkbox" id="checkCorrectAll"> Select All</th>
							<th>Id Correct Answer</th>
							<th>Correct Answer</th>
							<th>Id Question</th>
							<th>Id Lesson</th>
							<th>Id Category</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$count=1;
							foreach ($dataDapAnDung as $value) : ?> 
								<tr>
									<td><?php echo $count; ?></td>
									<td><input type="checkbox" id="checkCorrectItem" name="checkCorrect[]" value="<?php echo $value["id_dapandung"]; ?>"></td>
									<td><?php echo $value['id_dapandung']; ?></td>
									<td><?php echo $value['tendapandung']; ?></td>
									<td><?php echo $value['id_cau']?></td>
									<td><?php echo $value['id_de']?></td>
									<td><?php echo $value['id_post']?></td>
									<td>
										<a onclick="return confirm('Bạn có  chắc chắn muốn sửa?')" href="?action=updatecorrectanswer&id=<?php echo $value['id_dapandung']?>">Update</a>
										<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="?action=deletecorrectanswer&id=<?php echo $value['id_dapandung']?>">Delete</a>
									</td>
								</tr>
						<?php 
							$count++;
							endforeach; ?>
					</tbody>
				</table>
				<p style="text-align: right; padding-right:10px; padding-top:10px;"><button style="height: 40px; width: 80px; border-radius: 10px;" type="submit" class="btn btn-success" name="delete_correctanswer">DELETE</button></p>
				</form>
				
			</div>
		</div>
		<div id="user" class="ok">
			<h3>All Users</h3>
			<div class="table-main">
				<table border="1px">
					<thead>
						<tr>
							<th>Number</th>
							<th>Id User</th>
							<th>Username</th>
							<th>Password</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$count=1;
							foreach ($dataUser as $value) : ?> 
								<tr>
									<td><?php echo $count; ?></td>
									<td><?php echo $value['id_user']; ?></td>
									<td><?php echo $value['taikhoan']; ?></td>
									<td><?php echo $value['matkhau']?></td>
								</tr>
						<?php 
							$count++;
							endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div id="score" class="ok">
			<h3>All Score</h3>
			<div class="table-main">
				<table border="1px">
					<thead>
						<tr>
							<th>Id Score</th>
							<th>Lesson 1</th>
							<th>Lesson 2</th>
							<th>Lesson 3</th>
							<th>Total</th>
							<th>User</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($dataUser as $user): ?>
							<?php foreach ($dataDiem as $value) : ?> 
								<?php if($user['id_user']==$value['id_user']): ?>
									<tr>
										<td><?php echo $value['id_diem']; ?></td>
										<td><?php echo $value['diemde1']; ?></td>
										<td><?php echo $value['diemde2']; ?></td>
										<td><?php echo $value['diemde3']; ?></td>
										<td><?php echo $value['tong_diem']; ?></td>
										<td><?php echo $user['taikhoan']; ?></td>
									</tr>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<?php foreach($dataDebai as $de): ?>
			<div id="de<?php echo $de['id_de']; ?>" class="ok de">
				<h3><?php echo $de['tende']; ?></h3>
				<a href="?action=addlesson">Add Lesson</a>
				<div class="table-main">
					<form method="POST">
						<table border="1px">
							<thead>
								<tr>
									<th>Number</th>
									<th><input type="checkbox" id="checkAlLes"> Select All</th>
									<th>Id Question</th>
									<th>Question</th>
									<th>Audio/Img</th>
									<th>Id Lesson</th>
									<th>Id Category</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$count=1;
									foreach ($dataCauHoiTheoDe[$de['id_de']] as $value) : ?> 
									<tr>
										<td><?php echo $count; ?></td>
										<td><input type="checkbox" id="checkItemLes" name="check[]" value="<?php echo $value["id_cauhoi"]; ?>"></td>
										<td><?php echo $value['id_cauhoi']; ?></td>
										<td><?php echo $value['tencau']; ?></td>
										<td><?php echo $value['audio_img']?></td>
										<td><?php echo $value['id_de']?></td>
										<td><?php echo $value['id_post']; ?></td>
										<td>
											<a onclick="return confirm('Bạn có  chắc chắn muốn sửa?')" href="?action=update&id=<?php echo $value['id_cauhoi']?>">Update</a>
											<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="?action=delete&id=<?php echo $value['id_cauhoi']?>">Delete</a>
										</td>
									</tr>
								<?php
									$count++;
									endforeach; ?>
							</tbody>
						</table>
						<p style="text-align: right; padding-right:10px; padding-top:10px;"><button style="height: 40px; width: 80px; border-radius: 10px;" type="submit" class="btn btn-success" name="save">DELETE</button></p>
					</form>
				</div>
			</div>
		<?php endforeach;?>

		<?php foreach($dataPost as $theloai): ?>
			<div id="theloai-<?php echo $theloai['id_post']; ?>" class="ok theloai">
				<h3><?php echo $theloai['tenpost']; ?></h3>
				<div class="table-main">
					<form method="POST">
						<table border="1px">
							<thead>
								<tr>
									<th>Number</th>
									<th><input type="checkbox" id="checkAl"> Select All</th>
									<th>Id Question</th>
									<th>Question</th>
									<th>Audio/Img</th>
									<th>Id Lesson</th>
									<th>Id Category</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$count=1;
									foreach ($dataCauHoi as $value) : ?> 
									<?php if($value['id_post']==$theloai['id_post']): ?>
										<tr>
											<td><?php echo $count; ?></td>
											<td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $value["id_cauhoi"]; ?>"></td>
											<td><?php echo $value['id_cauhoi']; ?></td>
											<td><?php echo $value['tencau']; ?></td>
											<td><?php echo $value['audio_img']?></td>
											<td><?php echo $value['id_de']?></td>
											<td><?php echo $value['id_post']; ?></td>
											<td>
												<a onclick="return confirm('Bạn có  chắc chắn muốn sửa?')" href="?action=update&id=<?php echo $value['id_cauhoi']?>">Update</a>
												<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="?action=delete&id=<?php echo $value['id_cauhoi']?>">Delete</a>
											</td>
										</tr>
									<?php endif; ?>
								<?php
									$count++;
									endforeach; ?>
							</tbody>
						</table>
						<p style="text-align: right; padding-right:10px; padding-top:10px;"><button style="height: 40px; width: 80px; border-radius: 10px;" type="submit" class="btn btn-success" name="save">DELETE</button></p>
					</form>
				</div>
			</div>			
		<?php endforeach;?>

	</div>
	<script>

		$(document).ready(function () {
			let questions = document.getElementById('questions');
			let answers = document.getElementById('answers');
			let correctanswer = document.getElementById('correctanswer');
			let user = document.getElementById('user');
			let score = document.getElementById('score');
			let gode = document.getElementsByClassName('gode');

			for(var i=0; i<gode.length; i++){
				gode[i].classList.add('disnone');
			}
			questions.classList.add('active');
			answers.classList.add('disnone');
			correctanswer.classList.add('disnone');
			user.classList.add('disnone');
			score.classList.add('disnone');

			$('.menu-list a').click(function(e){
				e.preventDefault();
				var contentId = $(this).attr('href');

				if ($(contentId).hasClass('active')) {
					// $(contentId).removeClass('active');
				} else {
					$('.ok').removeClass('active');
					$(contentId).addClass('active');
					$(contentId).removeClass('disnone');
				}
			});
			$("#checkAl").click(function () {
				$('input:checkbox').not(this).prop('checked', this.checked);
			});
			$("#checkCorrectAll").click(function () {
				$('input:checkbox').not(this).prop('checked', this.checked);
			});
			$("#checkAllAnswer").click(function () {
				$('input:checkbox').not(this).prop('checked', this.checked);
			});
			$("#checkAlLes").click(function () {
				$('input:checkbox').not(this).prop('checked', this.checked);
			});
			
		});

	</script>
</body>
</html>