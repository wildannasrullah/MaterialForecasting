<!doctype html>
<html lang='en'> <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='initial-scale=1.0,maximum-scale=1.0,user-scalable=no'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='msapplication-tap-highlight' content='no'/>

    <link rel='icon' type='image/png' href='assets/img/favicon-16x16.png' sizes='16x16'>
    <link rel='icon' type='image/png' href='assets/img/favicon-32x32.png' sizes='32x32'>

    <title>ForAPP - Login Page</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

    <!-- uikit -->
    <link rel='stylesheet' href='bower_components/uikit/css/uikit.almost-flat.min.css'/>
	<link rel='stylesheet' href='assets/css/login_page.min.css' />

</head>
<body class='login_page'>

    <div class='login_page_wrapper'>
        <div class='md-card' id='login_card'>
            <div class='md-card-content large-padding' id='login_form'>
                <div class='login_heading'>
                    <img src='assets/img/logo2.png' class='image-responsive' alt=''>
                </div>
                <form method='POST' action='au_login.php'>
                    <div class='uk-form-row'>
                        <label for='login_username'>Username</label>
                        <input class='md-input' type='text' id='username' name='username' autofocus required />
                    </div>
                    <div class='uk-form-row'>
                        <label for='login_password'>Password</label>
                        <input class='md-input' type='password' id='password' name='password'  required />
                    </div>
                    <div class='uk-margin-medium-top'>
                        <button type='submit' class='md-btn md-btn-primary md-btn-block md-btn-large'>Sign In</button>
                    </div>
                    
                </form>
            </div>
            
           
        </div>
        <div class='uk-margin-top uk-text-center'>
           <h6>Copyright © EDP Team, PT. Krisanthium. All rights reserved.</h6>
        </div>
    </div>

    <!-- common functions -->
    <script src='assets/js/common.min.js'></script>
    <!-- uikit functions -->
    <script src='assets/js/uikit_custom.min.js'></script>
    <!-- altair core functions -->
    <script src='assets/js/altair_admin_common.min.js'></script>

    <!-- altair login page functions -->
    <script src='assets/js/pages/login.min.js'></script>

    <script>
        // check for theme
        if (typeof(Storage) !== 'undefined') {
            var root = document.getElementsByTagName( 'html' )[0],
                theme = localStorage.getItem('altair_theme');
            if(theme == 'app_theme_dark' || root.classList.contains('app_theme_dark')) {
                root.className += ' app_theme_dark';
            }
        }
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-65191727-1', 'auto');
        ga('send', 'pageview');
    </script>
</body>

<!-- Mirrored from altair_html.tzdthemes.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Dec 2018 04:30:03 GMT -->
</html>