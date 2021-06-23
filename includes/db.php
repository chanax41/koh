<?php require_once('conn.php');

	mysqli_query($conn, "SET NAMES 'utf8'"); 

	$sql = 'DROP TABLE t_content, t_package, t_package_mate, t_package_meta, t_user, t_booking, t_user_meta;' ;
	mysqli_query($conn, $sql); 
	$sql = "CREATE TABLE t_user (
				ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				FirstName varchar(255),
				LastName varchar(255),
				Email varchar(30) NOT NULL UNIQUE,
				Password varchar(255),
				Create_date varchar(255),
				Status varchar(255) DEFAULT 'user'
			)";

    // Check connection
    if (!(mysqli_query($conn, $sql))){
		die("Connection failed: ".$conn->error);
	} else {
		echo 'Create Complet table user<br>';
	}

	$sql = "CREATE TABLE t_user_meta (
		ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Email varchar(255),
		meta_key varchar(255),
		meta_value varchar(255)
	)";

	// Check connection
	if (!(mysqli_query($conn, $sql))){
		die("Connection failed: ".$conn->error);
	} else {
		echo 'Create Complet table user_meta<br>';
	}

	$sql = "CREATE TABLE t_package (
		ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Name varchar(100) UNIQUE,
		Price int(6),
		Position varchar(50),
		Description varchar(255),
		Time varchar(50),
		Status varchar(30)
	)";

	// Check connection
	if (!(mysqli_query($conn, $sql))){
		die("Connection failed: ".$conn->error);
	} else {
		echo 'Create Complet table package<br>';
	}

	$sql = "CREATE TABLE t_package_meta (
		ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Name varchar(255),
		meta_key varchar(255),
		meta_value varchar(255)
	)";

	// Check connection
	if (!(mysqli_query($conn, $sql))){
		die("Connection failed: ".$conn->error);
	} else {
		echo 'Create Complet table packag_meta<br>';
	}
	$sql = "INSERT INTO t_package_meta (Name, meta_key, meta_value) VALUES 
				('เกาะพะลวยโฮมสเตย์ มาวันคู่กลับวันคี่', 'img_pack', 'img/product-1-720x480.jpg'),
				('เกาะพะลวยโฮมสเตย์ มาวันคู่กลับวันคี่', 'img_pack', 'img/product-2-720x480.jpg'),
				('เกาะพะลวยโฮมสเตย์ มาวันคู่กลับวันคี่', 'img_pack', 'img/product-3-720x480.jpg'),
				('เกาะพะลวยโฮมสเตย์ มาวันคู่กลับวันคี่', 'img_pack', 'img/product-4-720x480.jpg'),
				('เกาะพะลวยโฮมสเตย์ มาวันคู่กลับวันคี่', 'img_pack', 'img/product-5-720x480.jpg'),
				('เกาะพะลวยโฮมสเตย์ มาวันคู่กลับวันคี่', 'img_pack', 'img/product-6-720x480.jpg'),
				('โปรประหยัดสุดคุ้ม', 'img_pack', 'img/product-1-720x480.jpg'),
				('โปรประหยัดสุดคุ้ม', 'img_pack', 'img/product-2-720x480.jpg'),
				('โปรประหยัดสุดคุ้ม', 'img_pack', 'img/product-3-720x480.jpg'),
				('โปรประหยัดสุดคุ้ม', 'img_pack', 'img/product-4-720x480.jpg'),
				('โปรประหยัดสุดคุ้ม', 'img_pack', 'img/product-5-720x480.jpg'),
				('โปรประหยัดสุดคุ้ม', 'img_pack', 'img/product-6-720x480.jpg'),
				('โปร 700 อะไรก็ใหญ่ขึ้น', 'img_pack', 'img/product-1-720x480.jpg'),
				('โปร 700 อะไรก็ใหญ่ขึ้น', 'img_pack', 'img/product-2-720x480.jpg'),
				('โปร 700 อะไรก็ใหญ่ขึ้น', 'img_pack', 'img/product-3-720x480.jpg'),
				('โปร 700 อะไรก็ใหญ่ขึ้น', 'img_pack', 'img/product-4-720x480.jpg'),
				('โปร 700 อะไรก็ใหญ่ขึ้น', 'img_pack', 'img/product-5-720x480.jpg'),
				('โปร 700 อะไรก็ใหญ่ขึ้น', 'img_pack', 'img/product-6-720x480.jpg'),
				('บ้านปลายแหลมคาเฟ่ สำหรับสายชิลล์ขมดาว', 'img_pack', 'img/product-1-720x480.jpg'),
				('บ้านปลายแหลมคาเฟ่ สำหรับสายชิลล์ขมดาว', 'img_pack', 'img/product-2-720x480.jpg'),
				('บ้านปลายแหลมคาเฟ่ สำหรับสายชิลล์ขมดาว', 'img_pack', 'img/product-3-720x480.jpg'),
				('บ้านปลายแหลมคาเฟ่ สำหรับสายชิลล์ขมดาว', 'img_pack', 'img/product-4-720x480.jpg'),
				('บ้านปลายแหลมคาเฟ่ สำหรับสายชิลล์ขมดาว', 'img_pack', 'img/product-5-720x480.jpg'),
				('บ้านปลายแหลมคาเฟ่ สำหรับสายชิลล์ขมดาว', 'img_pack', 'img/product-6-720x480.jpg')
	";

	// Check connection
	if (!(mysqli_query($conn, $sql))){
		die("<br>Connection failed: ".$conn->error);
	} else {
		echo 'INSERT Complet table package_meta <br>';
	}
	

	$sql = "CREATE TABLE t_booking (
		ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Name_tour varchar(255),
		Email varchar(255),
		Address_user varchar(255),
		Amount INT(6),
		Booking_date varchar(255),
		Proof_of_payment varchar(255),
		Last_date_payment varchar(255),
		Status_payment varchar(255)
	)";

	// Check connection
	if (!(mysqli_query($conn, $sql))){
		die("Connection failed: ".$conn->error);
	} else {
		echo 'Create Complet table booking<br>';
	}

	$sql = "CREATE TABLE t_content (
		ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		content_page varchar(255),
		content_key varchar(255),
		content_value varchar(255)
	)";

	// Check connection
	if (!(mysqli_query($conn, $sql))){
		die("Connection failed: ".$conn->error);
	} else {
		echo 'Create Complet table content <br>';
	}

	$sql = 'INSERT INTO t_content VALUES 
						(0,"index", "about", "เกาะพะลวย อยู่ในหมู่ที่ 6 ของตำบลอ่างทอง อำเภอเกาะสมุย จังหวัดสุราษฎร์ธานี เป็นเกาะขนาดใหญ่เป็นอันดับที่สองรองจากเกาะวัวตาหลับซึ่งบางส่วนของเกาะอยู่ใน เขตอุทยานแห่งชาติหมู่เกาะอ่างทอง ประมาณครึ่งเกาะ เมื่อวันที่ 12 พฤศจิกายน พ.ศ. 2523 กรมอุทยาน ได้ประกาศหมู่เกาะอ่างทองเป็นอุทยานแห่งชาติ เป็นแห่งที่ 21 ของประเทศ ส่วนเหลือเป็นที่อยู่ในความดูแลของกรมธนารักษ์ กระทรวงการคลัง"),
						(0,"index", "vdo_url", "https://www.youtube.com/embed/a7G3y0FMIwk"),
						(0,"index", "img_url", "uploads/addon.jpg"),
						(0,"promote", "img_url", "img/blog-image-fullscren-1-1920x700.jpg"),
						(0,"promote", "description", "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"),
						(0,"promote", "img_url-booking", "img/promote.png"),
						(0,"aboutus", "img_url", "img/about.jpg"),
						(0,"aboutus", "detail", "ที่ จังหวัดสุราษฎร์ธานี ของเรานั้น ใครจะรู้บ้างว่า เรามี เกาะที่ได้ชื่อว่า เป็น Virgin Island หรือ เกาะพลังงานสะอาดต้นแบบของไทย นั่นก็คือ เกาะพะลวย เกาะที่แม้แต่คนสุราษฎร์แท้ๆ เองยังไม่รู้จักเลยค่ะ เราเลยจะพาทุกคนไปรู้จักกับที่เกาะนี้กันค่ะ ไปเลย โก โก ! จุดเด่นของเกาะที่เราเรียกว่า Virgin Island นั่นก็คือ เกาะแห่งพลังงานสะอาดต้นแบบของประเทศไทย นั่นเองค่ะ ที่นี่จะมีกังหันลมผลิตกระแสไฟฟ้า บนเกาะทั้งหมด 68 ตัว โดยไม่มีเครื่องกำเนิดไฟฟ้าที่สร้างมลพิษให้กับสิ่งแวดล้อมบนเกาะแห่งนี้เลย และยังมีโรงเรียนศูนย์เรียนรู้เรื่องพลังงานสะอาดโดยเฉพาะอีกด้วย เกาะนี้ใช้พลังงานทดแทนแบบ 100% เต็ม มาตั้งแต่ปีพ.ศ. 2554 แล้ว"),
						(0,"team", "img_url", "uploads/addon.jpg"),
						(0,"team", "detail", "teamteamteamteamteamteamteamteamteamteamteamteamteamteamteamteamteamteam"),
						(0,"contact", "img_url", "uploads/addon.jpg"),
						(0,"contact", "detail", "contactcontactcontactcontactcontactcontactcontactcontactcontactcontact"),
						(0,"gallery", "img_url", "img/popular_item_1.jpg"),
						(0,"gallery", "img_url", "img/popular_item_2.jpg"),
						(0,"gallery", "img_url", "img/popular_item_3.jpg"),
						(0,"gallery", "img_url", "img/popular_item_1.jpg"),
						(0,"gallery", "img_url", "img/popular_item_2.jpg"),
						(0,"gallery", "img_url", "img/popular_item_3.jpg"),
						(0,"payment", "img_url", "uploads/payment.jpg")
			';
	// Check connection
	if (!(mysqli_query($conn, $sql))){
		die("<br>Connection failed: ".$conn->error);
	} else {
		echo 'INSERT Complet table content <br>';
	}

	$sql = 'INSERT INTO t_user VALUES 
						(0,"ChanathipA", "Admin", "std5410203@gmail.com", MD5("asdf1234"), "2021-05-29", "admin"),
						(0,"ChanathipU", "User", "chanathip.sww@gmail.com", MD5("asdf1234"), "2021-05-29","user");';

	// Check connection
	if (!(mysqli_query($conn, $sql))){
		die("<br>Connection failed: ".$conn->error);
	} else {
		echo 'INSERT Complet table user <br>';
	}

	$sql = 'INSERT INTO t_user_meta VALUES 
						(0,"std5410203@gmail.com", "email_status", "ACTIVE"),
						(0,"chanathip.sww@gmail.com", "email_status","NON-ACTIVE");';

	// Check connection
	if (!(mysqli_query($conn, $sql))){
		die("<br>Connection failed: ".$conn->error);
	} else {
		echo 'INSERT Complet table user_meta <br>';
	}

	$sql = 'INSERT INTO t_package VALUES 
						(0,"เกาะพะลวยโฮมสเตย์ มาวันคู่กลับวันคี่", 
						"1890", 
						"เกาะพะลวย", 
						"มา 10 คนฟรี 1 กิจกรรมต่าง ๆ ทัวร์หมู่เกาะอ่างทอง จุดชมวิวผาจันทร์จรัส (เกาะวัวตาหลับ) ทะเลใน เกาะสามเส้า เกาะสองพี่น้อง ลอดถ้ำคอม้า ร่วมกิจกรรมปล่อยปูม้าสู่ทะเลชุมชน", 
						"2 วัน 1 คืน",
						"ACTIVE"),
						(0,"โปรประหยัดสุดคุ้ม", 
						"500", 
						"เกาะพะลวย", 
						"มีที่พัก อาหารพิ้นบ้านเย็น 1 มื้อ อาหารเช้า (กาแฟ)", 
						"1 คืน",
						"ACTIVE"),
						(0,"โปร 700 อะไรก็ใหญ่ขึ้น", 
						"700", 
						"เกาะพะลวย", 
						"อาหาร 2 มื้อ อาหารเย็น + อาหารเช้า ห้องพัก 1 คืน", 
						"1 คืน",
						"ACTIVE"),
						(0,"บ้านปลายแหลมคาเฟ่ สำหรับสายชิลล์ขมดาว", 
						"500", 
						"เกาะพะลวย", 
						"ด้อาหาร 2 มื้อ นอนเต้นท์ ห้องน้ำรวมที่สะอาด ริมทะเล", 
						"1 คืน",
						"ACTIVE")';

	// Check connection
	if (!(mysqli_query($conn, $sql))){
		die("<br>Connection failed: ".$conn->error);
	} else {
		echo 'INSERT Complet table package <br>';
	}

	$sql = "INSERT INTO `t_booking` (`ID`, `Name_tour`, `Email`, `Address_user`, `Amount`, `Booking_date`, `Proof_of_payment`, `Last_date_payment`, `Status_payment`) 
	VALUES
	(1, 'เกาะพะลวยโฮมสเตย์ มาวันคู่กลับวันคี่', 'chanathip.sww@gmail.com', '258', 1, '2021-07-01', ' ', '2021-06-13', '0'),
	(2, 'เกาะพะลวยโฮมสเตย์ มาวันคู่กลับวันคี่', 'chanathip.sww@gmail.com', '--', 2, '2021-06-18', ' ', '2021-06-13', ' 0')
	";
	
	// Check connection
	if (!(mysqli_query($conn, $sql))){
		die("<br>Connection failed: ".$conn->error);
	} else {
		echo 'INSERT Complet table booking <br>';
	}
?>