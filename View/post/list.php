
<table class="table table-striped" width="100%" border="1px">
			<tr>
				<th>id</th>
				<th>Bài viết</th>
				<th>Ảnh đại diện</th>
				<th>Chuyên mục</th>
				<th>action</th>
			</tr>
			<?php
			include_once("config.php");
			$dt=new database();
			$pag=isset($_GET["pag"])?$_GET["pag"]:"";
						if ($pag<1 || $pag==1) {
							$pag=0;
						}else{
							$pag=$pag*10-10;
						}
			$stt=0;
			$dt->select("SELECT* FROM post ORDER BY id desc limit $pag,10 ");
			while ($row=$dt->fetch()) {
				?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><a href="?view=post&action=edit&id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></td>
					<td><img style="width: 100px;height: 100px;" src="uploads/<?php echo $row['thumbnail'] ?>"></td>
					<td><?php echo $row['category'] ?></td>
					<td>
						<a href="action.php?id=<?php echo $row['id'] ?>" class="navbar-link">Test</a>
					</td>
				</tr>
				<?php
			}
			?>
	
	</table>