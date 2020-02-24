<?php
/**
 * @author Team Timiza
 * @version 1.1.1
 * A class to handle services provided by City Mobile Car Washing Services
 */
include "db_config.php";
	class Person{
		protected $db;
		public function __construct(){
			$this->db = new DB_con();
			$this->db = $this->db->ret_obj();
        }

 /**for sanitizing data */
/**
 * @param $input
 * @method sanitizeData()
 *@return $data
 */
		public function sanitizeData($input) {
			$data = trim($input);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

/**For Volunteer */
/**
 * @param $fname,$lname,$email,$phone
 * @method volunteer()
 *@return true , false
 */
        public function volunteer($fname,$lname,$phone,$email){
            /*sanitizig the data*/
            $fname =  $this->sanitizeData($fname);
            $lname = $this->sanitizeData($lname);
            $phone = $this->sanitizeData($phone);
            $email = $this->sanitizeData($email);
            

            if($email!=""&&$phone!=""&&$fname!=""&&$lname!=""){
               
                /**Insert into Person */
                $insert_person  = "INSERT INTO person (Fname,Lname,phone,email) VALUES('$fname','$lname','$phone','$email')";
                $resultant = $this->db->query($insert_person) or die($this->db->error);

                /**insert volunteer*/
                $insert_volunteer  = "INSERT INTO volunteer (personID) VALUES((SELECT personID FROM person ORDER BY personID DESC LIMIT 1))";
                $result = $this->db->query($insert_volunteer) or die($this->db->error);
               
        }
        else{return false;}
    }
        /**Function for feedback */
        public function feedback($email, $feedback){
            /*sanitizig the data*/
            $email =  $this->sanitizeData($email);
            $feedback = $this->sanitizeData($feedback);   

            if($email!=""&&$feedback!=""){
           
                /**Insert into Feedback */
                $insert_fb  = "INSERT INTO feedback (email,feedback) VALUES('$email','$feedback')";
                $resultant = $this->db->query($insert_fb) or die($this->db->error);
           
        }
        else{return false;}
    }

    /**
 * @param $password,$email
 * @method check_login()
 *@return true , false
 */
		public function check_login($email, $password){
			/**Sanitize data */
			$email = $this->sanitizeData($email);
			$password = $this->sanitizeData($password);
			$password = md5($password);
			
			/**select admin from admin table */
            $query_person = "SELECT personID FROM admin WHERE email='$email' AND pass='$password'";
            $result = $this->db->query($query_person) or die($this->db->error);
            $user_data = $result->fetch_array(MYSQLI_ASSOC);
			$count_row = $result->num_rows;
	
			if ($count_row == 1) {
	            $_SESSION['login'] = true; // this login var will use for the session thing
	            $_SESSION['uid'] = $user_data['personID'];
	            return true;
	        }
			
			else{return false;}
		
            }
            
            		/*Change Password*/
		/**
 * @param $password,$confirmpassword
 * @method changepass()
 *@return true , false
 */
		public function changepass($password,$confirmpassword){
			/**sanitize data */
			$password = $this->sanitizeData($password);
			$confirmpassword = $this->sanitizeData($confirmpassword);
		   // $_SESSION['uid'] = $user_data['CustID'];
			
			if($password!=""&&$confirmpassword!=""&&$password==$confirmpassword){
				$password = md5($password);
				$sql = "UPDATE admin SET pass='$password' WHERE personID='".$_SESSION['uid']."'" ;
				$sql_query = $this->db->query($sql); //or die($this->db->error);
				if($sql_query){
					header("location:admin_login.php");

					return true;
				}
				else{return false;}
			}
			
		}


    }       
?>