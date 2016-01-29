<?php
$db_server = "localhost";
		$db_user = "root";
		$db_password = "";
		$db_name = "aops-api";

		$conn = new mysqli($db_server, $db_user, $db_password, $db_name);
		// Check connection
		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}

		$sql	= "SELECT * FROM members WHERE member_id=".$id;
		$result = $conn->query($sql);
		$row = $result->fetch_object();
		$member = new MemberItem();
    	$member->member_id = $row->member_id;
		$member->username = $row->username;
		$member->name = $row->name;
		$member->tgllahir = $row->tgllahir;
		$member->tglaplikasi = $row->tglaplikasi;
		$member->sponsor_id = $row->sponsor_id;
		$member->introducer_id = $row->introducer_id;

		$conn->close();
		
		echo dd($member);
		?>