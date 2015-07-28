<?php include 'configurations/config.php'; ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>LineAge 2 Exertus</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/scroll_bar.css" rel="stylesheet" type="text/css">
    <link href="css/registration_style.css" rel="stylesheet" type="text/css">
    <link href="css/statistics_style.css" rel="stylesheet" type="text/css">
    <link href="css/news_style.css" rel="stylesheet" type="text/css">
    <link href="css/footer_style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
</head>
<body>
    <div class="main" id="main">

        <script>
            $(function() {
                $(this).on("contextmenu", function(e) {
                    e.preventDefault();
                });
            });
        </script>

        <div class="menu" id="menu">
                <ul>
                    <li>
                        <a href="#registration" id="registration-window">REGISTRATION</a>
                    </li>
                    <li>
                        <a href="#news">NEWS</a>
                    </li>
                    <li>
                        <a href="#downloads">DOWNLOADS</a>
                    </li>
                    <li>
                        <a href="#statistics">STATISTICS</a>
                    </li>
                    <li>
                        <a href="">FORUM</a>
                    </li>
                    <li>
                        <a href="#about">ABOUT</a>
                    </li>
                </ul>
        </div>

        <script type="text/javascript">
            $().ready(function() {
                $('#registration-window').click(function() {

                    // Getting the variable's value from a link
                    var loginBox = $(this).attr('href');

                    //Fade in the Popup and add close button
                    $(loginBox).fadeIn(300);

                    //Set the center alignment padding + border
                    var popMargTop = ($(loginBox).height() + 24) / 2;
                    var popMargLeft = ($(loginBox).width() + 24) / 2;

                    $(loginBox).css({
                        'margin-top' : -popMargTop,
                        'margin-left' : -popMargLeft
                    });

                    // Add the mask to body
                    $('body').append('<div id="mask"></div>');
                    $('#mask').fadeIn(300);

                    return false;
                });

                // When clicking on the button close or the mask layer the popup closed
                $('a.close, #mask').on('click', function() {
                    $('#mask , .login-popup').fadeOut(300 , function() {
                        $('#mask').remove();
                    });
                    return false;
                });

            });
        </script>
        <script type="text/javascript">

            jQuery.validator.addMethod("pattern", function(value, element) {
               return this.optional(element) || /^[a-zA-Z0-9_]{6,16}$/.test(value);
            }, "Login must consist only a - z, A - Z, 0 - 9 and _");

            // validate signup form on keyup and submit
            $(document).ready(function() {
                $("#registrationForm").validate({
                    rules: {
                        login: {
                            required: true,
                            minlength: 6,
                            pattern: true
                        },
                        password: {
                            required: true,
                            minlength: 6,
                            pattern: true
                        },
                        confirm_password: {
                            required: true,
                            minlength: 6,
                            equalTo: "#password"
                        },
                        email: {
                            required: true,
                            email: true
                        }
                    },
                    messages: {
                        login: {
                            required: "Please enter a login",
                            minlength: "Your username must consist of at least 6 characters"
                        },
                        password: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 6 characters long"
                        },
                        confirm_password: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 6 characters long",
                            equalTo: "Please enter the same password as above"
                        },
                        email: "Please enter a valid email address"
                    }
                });
            });

        </script>

        <div class="container">
                <div id="registration" class="login-popup">
                    <a href="#" class="close"><img src="img/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                    <form id="registrationForm" method="post" action="auth/registration.php">
                        <fieldset>
                            <p>
                                <label>Login: </label>
                                <input type="text" id="login" name="login" placeholder="Login">
                            </p>
                            <p>
                                <label>Password: </label>
                                <input type="password" id="password" name="password" placeholder="Password">
                            </p>
                            <p>
                                <label>Confirm password: </label>
                                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password">
                            </p>
                            <p>
                                <label>Email: </label>
                                <input type="email" id="email" name="email" placeholder="Email">
                            </p>
                            <input type="submit" value="Submit" name="submit" id="submit">
                        </fieldset>
                    </form>
                </div>
        </div>

        <div class="top">

            <div class="sign-in">
                <p>
                    <a href="office" target="_blank">Sign-in</a>
                </p>
            </div>

            <div class="status">
                <p>0</p>
            </div>

        </div>

        <script>
            $(function() {
                $('#menu').find("ul li a").on('click',function(event){
                    if("registration-window" == event.target.id) {
                        return false;
                    } else {
                        var $anchor = $(this);
                        $('html, body').stop().animate({
                            scrollTop: $($anchor.attr('href')).offset().top
                        }, 500,'easeInOutBack');
                        event.preventDefault();
                    }
                });
            });
        </script>

        <div class="content">

            <div class="news" id="news">
                    <?php include 'categories/news.php'; ?>
            </div>

            <div class="downloads" id="downloads">
                <div class="downloads-main">
                    <div></div>
                </div>
            </div>

            <div class="statistics" id="statistics">
                    <?php include 'categories/statistics.php'; ?>
            </div>

            <div class="about" id="about">
                    <?php include 'categories/about.php'; ?>
            </div>

            <div class="footer-main">
                <div class="footer-inner">
                    <?php include 'categories/footer.php'; ?>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
