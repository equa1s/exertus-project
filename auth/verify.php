<?php

include_once '../cfg/config.php';

// if email is set and not empty
if(isset($_GET['email']) && !empty($_GET['email'])) {

    // if email activate code is set and not empty
    if(isset($_GET['email_active_code']) && !empty($_GET['email_active_code'])) {

        // then get that params
        $email = mysqli_real_escape_string($conn, $_GET['email']);
        $email_active_code = mysqli_real_escape_string($conn, $_GET['email_active_code']);

        // set a query to check on existing account in our database
        $query = "SELECT email, email_activ_code, email_activated FROM accounts WHERE email='".$email."'
                                                                                  AND email_activ_code='".$email_active_code."'
                                                                                  AND email_activated='0'";

        // execute a query
        $search = mysqli_query($conn, $query);

        // get a count of returned rows
        $match = mysqli_num_rows($search);

        // if returned value more than ZERO
        if($match > 0) {

            // then create a query to set col email_activated to ONE in accounts table
            $update_query = "UPDATE accounts SET email_activated='1' WHERE email='".$email."' AND email_activ_code='".$email_active_code."' AND email_activated='0'";

            // execute a query
            mysqli_query($conn, $update_query);

            // redirect to activated.html
            header("Location: activated.html");
            exit();

        }

        // redirect if already activated
        header("Location: already_activated.html");
        exit();
    }

}
