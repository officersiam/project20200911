<?php
	session_start();
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    error_reporting(E_ALL ^ E_NOTICE);
	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'real_estate');
	//$db = mysqli_connect('localhost', 'hashlgbg_siam', 'Songjom426@', 'hashlgbg_wiki');

	// variable declaration
	$username = "";
	$errors   = array();// call the sitesetting() function if sitesetting is clicked

  if (isset($_POST['sitelogo'])) {
		sitelogo();
	}

    // site setting
    function sitelogo(){
        global $db, $errors;

        // receive all input values from the form
        $id         = 1;
        $sitelogo   = $_FILES['sitelogo']['name'];
        $target    = "img/".basename($sitelogo);

        // register user if there are no errors in the form
        if (count($errors) == 0) {


        $sql = "UPDATE sitesetting SET sitesetting.sitelogo='$sitelogo' WHERE sitesetting.id = '$id' ";
        $result = mysqli_query($db, $sql);

        if (move_uploaded_file($_FILES['sitelogo']['tmp_name'], $target)) {
            echo '<div style="width:50%;margin-top:20px;" class="fixed-top alert alert-success fade in alert-dismissible show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true" style="font-size:20px">×</span>
            </button><strong>Success!</strong> Uploaded Successfully.
          </div>';
        }else{
            echo '<div style="width:50%;margin-top:20px;" class="fixed-top alert alert-danger fade in alert-dismissible show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true" style="font-size:20px">×</span>
            </button><strong>Failed!</strong> to upload logo!
          </div>';
            }

        }

    }

  if (isset($_POST['sitesetting'])) {
		sitesetting();
	}

    // site setting
    function sitesetting(){
        global $db, $errors;

        // receive all input values from the form
        //$sitename   =  e($_POST['sitename']);
        $sitename = stripslashes($_REQUEST['sitename']);
        $sitename = mysqli_real_escape_string($db,$sitename);
        //$domain  =  e($_POST['domain']);
        $domain = stripslashes($_REQUEST['domain']);
        $domain = mysqli_real_escape_string($db,$domain);
        //$facebook   =  e($_POST['facebook']);
        $facebook = stripslashes($_REQUEST['facebook']);
        $facebook = mysqli_real_escape_string($db,$facebook);
        //$phone =  e($_POST['phone']);
        $phone = stripslashes($_REQUEST['phone']);
        $phone = mysqli_real_escape_string($db,$phone);
        //$email =  e($_POST['email']);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($db,$email);
        //$address =  e($_POST['address']);
        $address = stripslashes($_REQUEST['address']);
        $address = mysqli_real_escape_string($db,$address);


        $sql = "UPDATE sitesetting  SET `sitename`='$sitename', `domain`='$domain', `facebook`='$facebook', `phone`='$phone', `email`='$email', `address`='$address' ";
        $result = mysqli_query($db, $sql);

        if($result){
            echo '<div style="width:50%;margin-top:20px;" class="fixed-top alert alert-success fade in alert-dismissible show">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" style="font-size:20px">×</span>
                  </button><strong>Success!</strong> Site Settings Updated Successfully.
                </div>';
        }
        else{
            echo '<div style="width:50%;margin-top:20px;" class="fixed-top alert alert-danger fade in alert-dismissible show">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" style="font-size:20px">×</span>
                  </button><strong>Failed!</strong> There Must be any problem i think!
                </div>';
        }

    }

	// call the register() function if register is clicked
	if (isset($_POST['register'])) {
		register();
	}

    // REGISTER USER
    function register(){
        global $db, $errors;

        // receive all input values from the form
        //username
        //$username   =  e($_POST['username']);
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($db,$username);
        //password 1
        //$password =  e($_POST['password']);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($db,$password);
        $date = date('Y-m-d H:i:s');

        // register user if there are no errors in the form
        if (count($errors) == 0) {
            $pass = md5($password);//encrypt the password before saving in the database


                $query = "INSERT INTO `users` (`username`, `pass`, `rank`, `role`, `date`)
                          VALUES('$username', '$pass', 'Admin', '1', '$date')";
                $result = mysqli_query($db, $query);

                if($result){
                    echo '<div style="width:50%;margin-top:20px;" class="fixed-top alert alert-success fade in alert-dismissible show">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="font-size:20px">×</span>
                          </button><strong>Success!</strong> Your Account Created Successfully.
                        </div>';
                }
                else{
                    echo '<div style="width:50%;margin-top:20px;" class="fixed-top alert alert-danger fade in alert-dismissible show">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="font-size:20px">×</span>
                          </button><strong>Failed!</strong> There Must be any problem i think!
                        </div>';
                }

                // get id of the created user
                $logged_in_user_id = mysqli_insert_id($db);

                $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
                $_SESSION['success']  = '<div style="width:50%;margin-top:20px;" class="fixed-top alert alert-success fade in alert-dismissible show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true" style="font-size:20px">×</span>
                </button><strong>Success!</strong> You are logged in!
              </div>';

        }

    }

	// call the login() function if register_btn is clicked
	if (isset($_POST['login'])) {
		login();
	}

    // LOGIN USER
    function login(){
        global $db, $username, $errors;

        // grap form values
        //$username = e($_POST['username']);//username
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($db,$username);
        //$pass = e($_POST['pass']);//pass
        $password = stripslashes($_REQUEST['pass']);
        $password = mysqli_real_escape_string($db,$password);

        // make sure form is filled properly
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
        // attempt login if no errors on form
        if (count($errors) == 0) {
            $pass = md5($password);

            $query = "SELECT * FROM users WHERE username='$username' AND pass='$pass' LIMIT 1";
            $results = mysqli_query($db, $query);




            if (mysqli_num_rows($results) == 1) { // user found
                // check if user is staff or user
                $logged_in_user = mysqli_fetch_assoc($results);
                    $_SESSION['user'] = $logged_in_user;
                    echo '<div style="width:50%;margin-top:100px;" class="fixed-top alert alert-info fade in alert-dismissible show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true" style="font-size:20px">×</span>
                    </button><strong>Success!</strong>
                  </div>';
                }
                else{
                    echo '<div style="width:50%;margin-top:100px;" class="fixed-top alert alert-danger fade in alert-dismissible show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true" style="font-size:20px">×</span>
                    </button><strong>Failed!</strong> Wrong username/password combination.
                  </div>';

            }
        }
    }

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: login");
	}

	// return user array from their id
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM users WHERE id=" . $id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

    function isadmin()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']['rank'] == 'Admin' ) {
            return true;
        }else{
            return false;
        }
    }

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}
    function er($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

?>