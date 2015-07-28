<?php

include '../configurations/config.php';

// if form submitted then
if(isset($_POST['submit'])) {

    // initialize vars
    $_login = mysqli_real_escape_string($conn, $_POST['login']);
    $_password = mysqli_real_escape_string($conn, $_POST['password']);
    $_email = mysqli_real_escape_string($conn, $_POST['email']);

    // check on login field is empty
    if(!empty($_login)) {

        // check on password field is empty
        if(!empty($_password)) {

            // check on email field is empty
            if(!empty($_email)) {

                // if all prev. field are not empty then
                // check login on allowed characters
                if(preg_match('/^[a-zA-Z0-9_]{6,16}$/', $_login)) {

                    // check password on allowed characters
                    if(preg_match('/^[a-zA-Z0-9_]{6,16}$/',$_password)) {

                        // check email on allowed characters
                        if(preg_match('/^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$/', $_email)) {

                            // if login, password and email consist of allowed chars, do next
                            $login = $_login;

                            // need to encode password to base64 for save to database
                            $password = base64_encode($_password);
                            $email = $_email;

                            // check submitted login for existing in our database
                            $login_query = "SELECT * FROM accounts WHERE login = '".$login."'";
                            $check_login = mysqli_query($conn, $login_query);

                            // if submitted login exist in database then throw an error
                            if(mysqli_num_rows($check_login) == 1) {
                                print "<h1>Error. Current login is using!</h1>";
                            }

                            // generate an email activation code
                            $email_active_code = md5(rand(0,1000));
                            $email_activated = 0;

                            // if login is not exist, then add login, password, email, activate_code and active_status to database
                            $registration_sql = "INSERT INTO accounts(login, password, email, email_activ_code, email_activated)
                                                                    VALUES ('".$login."','".$password."','".$email."','".$email_active_code."',".$email_activated.")";
                            $registration_query = mysqli_query($conn, $registration_sql);

                            // if query has been successful
                            if($registration_query) {

                                // set the email for activate an user account
                                $subject = 'Thank you for registration on our server, please verify your account!';
                                $admin_mail = 'admin@rukalitso.besaba.com';
                                $massage = "<br />
                                ------------------------
                                <br />
                                Login: ".$login."<br />
                                Password: ".$_password."<br />
                                ------------------------
                                <br />
                                Please click this link to activate your account:<br />
                                <a href='http://rukalitso.besaba.com/auth/verify.php?email=".$email."&email_active_code=".$email_active_code."'>Go this link to activate your account</a>
                                ";
                                $headers = 'From: '.$admin_mail."\r\n".
                                    'Reply-To: '.$admin_mail."\r\n" .
                                    'Content-type: text/html; charset=utf-8'."\r\n".
                                    'X-Mailer: PHP/' . phpversion();

                                mail($email, $subject, $massage, $headers);

                                // redirect to success.html
                                header("Location: ../index.php");
                                exit();
                            }

                            header("Location: failed.html");
                            exit();

                        }

                    }

                }

            }

        }

    }

}

mysqli_close($conn);

