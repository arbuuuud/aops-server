<?php
class MemberItem
{	
	public $member_id;
	public $username;
	public $name;
	public $tgllahir;
	public $tglaplikasi;
	public $sponsor_id;
	public $introducer_id;

	public static function find($id){
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
		return $member;

	}
	public static function getmemberAction($username, $userpass)
	{
		self::_checkIfUserExists($username, $userpass);
		//get the array version of this todo item
		// $member_array = $this->toArray();
		
		//save the serialized array version into a file

		// $servername = "localhost";
		// $username = "root";
		// $password = "";
		// $dbname = "servertest";
	
		// Create connection
		
		$db_server = "localhost";
		$db_user = "root";
		$db_password = "";
		$db_name = "aops-api";

		$conn = new mysqli($db_server, $db_user, $db_password, $db_name);// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		} 

		$sql	= "SELECT * FROM members";
		$result = $conn->query($sql);
		$members = array();

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$member = new MemberItem();
		    	$member->member_id = $row["member_id"];
				$member->username = $row["username"];
				$member->name = $row["name"];
				$member->tgllahir = $row["tgllahir"];
				$member->tglaplikasi = $row["tglaplikasi"];
				$member->sponsor_id = $row["sponsor_id"];
				$member->introducer_id = $row["introducer_id"];
				array_push($members,$member->toArray());
		    }
		} else {
		    echo "0 results";
		}

		$conn->close();
		return $members;
	}
	
	public function toArray()
	{
		//return an array version of the todo item
		return array(
			'member_id' => $this->member_id,
			'username' => $this->username,
			'name' => $this->name,
			'tgllahir' => $this->tgllahir,
			'tglaplikasi' => $this->tglaplikasi,
			'sponsor_id' => $this->sponsor_id,
			'introducer_id' => $this->introducer_id
		);
	}
	
    public function getchildshtml(){
    	return $this->generateList($this);
    }
    private function generateList($member){

    	$html = '';
    	$html .= '<ul class="tree">';
    	$html .= '<li id="member_'.$member->member_id.'">';
    	$html .= $member->name;
    	$members = $member->members();
    	if(count($members)>0){
    		foreach ($members as $childMember) {
    			$html .=$this->generateList($childMember);
    		}
    	}
    	$html .= '</li>';
    	$html .= '</ul>';
    	return $html;
    }
    public function members(){
    	$db_server = "localhost";
		$db_user = "root";
		$db_password = "";
		$db_name = "aops-api";

		$conn = new mysqli($db_server, $db_user, $db_password, $db_name);// Check connection
		// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		} 

		$sql	= "SELECT * FROM members WHERE introducer_id='".$this->member_id."'";
		$result = $conn->query($sql);
		$members = array();

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$member = new MemberItem();
		    	$member->member_id = $row["member_id"];
				$member->username = $row["username"];
				$member->name = $row["name"];
				$member->tgllahir = $row["tgllahir"];
				$member->tglaplikasi = $row["tglaplikasi"];
				$member->sponsor_id = $row["sponsor_id"];
				$member->introducer_id = $row["introducer_id"];
				array_push($members,$member);
		    }
		}

		$conn->close();
		return $members;
    }
	
	public function getMemberSelect($member){
		$memberArray = array();
		array_push($memberArray, array(
			'member_id' => $member->member_id,
			'name' => $member->name
		));
		$members = $member->members();
		if(count($members)){
			foreach ($members as $mem) {
				$tempMembers = $this->getMemberSelect($mem);
				$memberArray = array_merge($memberArray,$tempMembers);
			}
		}
		return $memberArray;
	}
	private static function _checkIfUserExists($username, $userpass)
	{
		error_log($username);
		error_log($userpass);
		if( $username=='aops' && $userpass=='password' ) {
			return true;
		}
		throw new Exception('Username  or Password is invalid');
	}
}