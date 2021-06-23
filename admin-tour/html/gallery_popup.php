<!-- Modal HTML -->
<?php 
    require_once('includes/conn.php');
    mysqli_query($conn, "SET NAMES 'utf8'");
    
    $sql = "SELECT ID,content_key,content_value FROM t_content  
				WHERE content_page = 'gallery' 
				ORDER BY ID DESC
			";
    // Check connection
    $result = mysqli_query($conn, $sql);

    if (empty($result)){
		die("Connection failed: ".$conn->error);
        echo "<script>";
            echo "alert(\"ข้อมูลไม่ถูกต้อง \");"; 
            echo "window.location.href = 'manage_web_pages.php'";
        echo "</script>";
	} else if ($result->num_rows > 0) {
        // output data of each row
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        $img_url = $rows[0]['content_value'];
        $discription = $rows[1]['content_value'];
    } 
?>

<div id="myModal_gallery" class="modal fade" style="z-index: 999999;">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">แก้ไขหน้า Gallery</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="db_update_gallery.php" method="post" enctype="multipart/form-data">
					<div class="form-row">
						<div class="form-group col-md-12">
							<label>รูปภาพ ที่ 1</label>
							<input type="file" class="form-control-file" name="img-1">		
						</div>
						<div class="form-group col-md-12">
							<label>รูปภาพ ที่ 2</label>
							<input type="file" class="form-control-file" name="img-2">		
						</div>
						<div class="form-group col-md-12">
							<label>รูปภาพ ที่ 3</label>
							<input type="file" class="form-control-file" name="img-3">		
						</div>
				
						<div class="form-group col-md-12">
							<label>รูปภาพที่อัปโหลดล่าสุด</label>
							<img src="../../<?php echo $img_url; ?>" width="100%">	
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-btn">แก้ไขข้อมูล</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>     

