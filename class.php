<?php
    session_start();
    ini_set('display_errors', 1);

    Class Action {
        private $db;
         
        public function __construct() {
            ob_start();
            include 'db_connect.php';

            $this->db = $conn;
        }

        function __destruct() {
            $this->db->close();
            ob_end_flush();
        }

        function save_user(){
            extract($_POST);
            $resp = 0;
            $current_pass = "";
            $new_pass = "";
            $data = "";

            foreach($_POST as $k => $v) {
                if(!in_array($k, array('id','cpassword')) && !is_numeric($k)){
                    if($k =='password')
                        $v = md5($v);
                    
                    // for update page
                    if($k == 'currpassword') {
                        $current_pass = $v;
                        continue;
                    }
                    if($k == 'npassword') {
                        $new_pass = $v;
                        continue;
                    }

                    if(empty($data)){
                        $data .= " $k='$v' ";
                    }else{
                        $data .= ", $k='$v' ";
                    }
                }
            }

            if(!empty($current_pass)){
                $checkPass = $this->db->query("SELECT * FROM users where id = '".$id."' and password = '".md5($current_pass)."' ");
                if($checkPass->num_rows > 0) {
                    if(empty($new_pass)){
                        $current_pass = md5($current_pass);
                        $data .= ", password='$current_pass' ";
                    }
                    else {
                        $new_pass = md5($new_pass);
                        $data .= ", password='$new_pass' ";
                    }
                }
                else {
                    $resp = 4;
                    return $resp;
                }
            }


            $check = $this->db->query("SELECT * FROM users WHERE email = '$email'" .(!empty($id) ? " and id != {$id} " : ''))->num_rows;
            if($check > 0){
                $resp = 2;
                return $resp;
                exit;
            }
            if(empty($id)){
                $save = $this->db->query("INSERT INTO users set $data");
                $resp = 1;
            }else{
                $save = $this->db->query("UPDATE users set $data where id = $id");

                foreach ($_SESSION as $key => $value) {
                    unset($_SESSION[$key]);
                }
                $reset_session_qry = $this->db->query("SELECT * FROM users WHERE id = '$id'");
                if($reset_session_qry->num_rows > 0){
                    foreach ($reset_session_qry->fetch_array() as $key => $value) {
                        if($key != 'password' && !is_numeric($key))
                            $_SESSION['login_'.$key] = $value;
                    }
                }
                $resp = 3;
            }
    
            if($save){
                return $resp;
            }
        }

        function save_user2() {

        }

        function login() {
            extract($_POST);
			$qry = $this->db->query("SELECT *,concat(firstname, ' ', lastname) as name FROM users where email = '".$email."' and password = '".md5($password)."' ");
            if($qry->num_rows > 0){
                foreach ($qry->fetch_array() as $key => $value) {
                    if($key != 'password' && !is_numeric($key))
                        $_SESSION['login_'.$key] = $value;
                }
                    return 1;
            }else{
			    return 3;
		    }  
        }

        function logout(){
            session_destroy();
            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }
            header("location:index.php");
        }

        function save_answer() {

            parse_str($_POST['frm_data'], $parsed_data);
            $answer_key = $_POST['ans_key'];
            $i = 0;

            //clearing this user previous answers on this survey/questionaire
            $check_existing_answer = $this->db->query("SELECT * FROM answers WHERE user_id = " .$_SESSION['login_id']. " and survey_id = " .$parsed_data['survey_id']);
            if($check_existing_answer->num_rows > 0)
                $this->db->query("DELETE FROM answers WHERE user_id = " .$_SESSION['login_id']);

            foreach($parsed_data['qid'] as $k => $v){
                $data = " survey_id='".$parsed_data['survey_id']."'";
                $data .= ", question_id='".$parsed_data['qid'][$k]."'";
                $data .= ", user_id='{$_SESSION['login_id']}' ";
                if($parsed_data['type'][$k] == 'check_opt'){
                    $data .= ", answer='[".implode("],[",$parsed_data['answer'][$k])."]' ";
                }else{
                    $data .= ", answer='$answer_key[$i]' "; //$answer["zjqrf"] = point
                }
                $i++;

                $save[] = $this->db->query("INSERT INTO answers set $data");
            }
            if(isset($save))
                return 1;
            else
                return 2;
        }

        function data_serialization() {
            // extract($_POST);
            // return $_POST;
            parse_str($_POST['frm_data'], $parsed_data);
            return $parsed_data["survey_id"];
        }
    }
?>