<?php 
include("database.php");
class Functions extends DataBase{
	function __construct(){
		parent::__construct();
		}
	
	function exec($sql){
		return $this->connection->query($sql);
		}
		
		
	function getPageinfo($id,$tbl){
		$sql="select*from $tbl where id='$id'";
		$result=$this->exec($sql);
		return $result->fetch_assoc();
		
		}

		
		//Get Resource
		
		function GetVehical($name){
		$sql="select*from tbl_vehical where v_name='$name'";
		$result=$this->exec($sql);
		return $result;
		
		}
			function Getinfo($id,$tbl){
		$sql="select*from $tbl where id='$id'";
		$result=$this->exec($sql);
		return $result->fetch_assoc();
		
		}
			
		//`b_name`, `author`, `desription`, `r_date`, `file`, `cover_img`)
		function resource($fname,$mname,$lname,$padd,$tadd,$mno,$vehicle,$pdate,$ddate){
			$sql="insert into tbl_rent (fname,mname,lname,padd,tadd,mno,vehicle,pdate,ddate) values('$fname','$mname','$lname','$padd','$tadd','$mno','$vehicle','$pdate','$ddate')";
			$result=$this->exec($sql);
		return $result;
		if($result){
							?>
                            <script type="text/javascript">
							alert(" Successful !!");
							window.location="index.php";
                            </script>
                            
                            <?php
							}
		}
	//Update Staff
	
	
			function getAlist($tbl){
		$sql="select*from $tbl order by cdate DESC";
		$result=$this->exec($sql);
		return $result;
		
		}
		
		
			function loginChk($user,$pass){
				$sql="select*from ".ADMIN." where email='$user' and password='$pass'";
				$result=$this->exec($sql);
				if($result && $result->num_rows==1){
					return 1;
					} else
					{
					return 0; 	
					}
				
				}
				
				function cngPassword($u,$p){
					$sql="update tbl_user SET password='$p' where user='$u'";
					$result=$this->exec($sql);
					if($result){
						$this->redirect("dashboard.php?pg=chgPass.php&smg=Password Change Successful");
						}
					}
						function cngProfile($n,$u,$e,$i){
					$sql="update tbl_user SET name='$n',user='$u',email='$e' where id='$i'";
					$result=$this->exec($sql);
					if($result){
						$this->redirect("dashboard.php?pg=editU.php&smg=ProfileChange Successful");
						}
					}
					
					
					function userData($u){
					$sql="select*from tbl_user where user='$u'";
					$result=$this->exec($sql);
					return $result->fetch_assoc();
					
					}
						
					//`name`, `email`, `password`, `r_date`
					function cuser($name,$email,$password,$add,$pno){
						$sql="insert into tbl_register(name,email,password,address,phone_no) values('$name','$email','$password','$add','$pno')";
						$exe=$this->exec($sql);
						if($exe){
							?>
                            <script type="text/javascript">
							alert("Register Successful !!");
							window.location="login.php";
                            </script>
                            
                            <?php
							}
						
						}
				function redirect($add){
					header('Location:'.$add);
					}
				function error($msg){
					?>
<script>
                    alret(<?php echo $msg; ?>);
                    </script>
<?php
					}
				
					// Count
						function Cimg($id,$ac){
					$sql="update ".ALBUMS." set ad='$ac' where id='$id'";
					$result=$this->exec($sql);
						}
					
				function del($id,$p,$t,$cid,$in,$dir){
					$sql="Delete from $t where id='$id'";
					$result=$this->exec($sql);
					if($result){
						if(!empty($in)){
						$del=unlink('../'.$dir.'/'.$in);
						if($del){
								$this->redirect('dashboard.php?pg='.$p.'&cid='.$cid.'');
							}
							}else{
					$this->redirect('dashboard.php?pg='.$p.'&cid='.$cid.'');
							}
					}else{
						$this->error("Error ");
						}
					}
	
			
		function UploadFile($i_name,$i_size,$i_type,$i_temp,$d){
			
		if($i_type=='application/pdf' || $i_type=='application/msword' || $i_type=='application/vnd.openxmlformats-officedocument.wordprocessingml.document'){

if($i_type<=8388608){
					$up=move_uploaded_file($i_temp,$d.'/'.$i_name);
					if($up){
						return 1;
						}
					}else{
						return "Image Size very Large !";
						}
					
			}else{
				return "Invalid Image Type";
					}
			
			
			}
			function UploadFilei($i_name,$i_size,$i_type,$i_temp,$d){
			
		if($i_type=='image/jpeg' || $i_type=='image/png' || $i_type=='image/gif'){

if($i_type<=8388608){
					$up=move_uploaded_file($i_temp,$d.'/'.$i_name);
					if($up){
						return 1;
						}
					}else{
						return "Image Size very Large !";
						}
					
			}else{
				return "Invalid Image Type";
					}
			
			
			}

	function SData($key){
					$sql="select * from tbl_vehical where v_name LIKE '%{$key}%'";
					return $result=$this->exec($sql);			
					
					}			
	
			
}


?>