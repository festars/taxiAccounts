<?php

function getPageTitle(){}

function getPageTitleIcon(){
    
}
    
function getAppVersion(){
        echo '1.2';}
    
function getAppName(){
        echo 'taxiRent';
}

function getAppIcon(){
        echo 'fa-taxi';
}

function getHomeUrl(){
        echo '#';
}


function getAppMenu($menu=null){
    
    $menu_items = array(
        'Dashboard'=>'/dash',
        'Reports'=>'/reports',
        'Settings'=>'/settings'
        );
        
    foreach($menu_items as $item => $url){
        echo '<li><a href="'.$url.'">'.$item.'</a></li>';
    }    
    
}

function getWebMessage(){
    // check if there is messages, use composer to create
    
    composeWebMessage("danger","Incorrect Username or Password.");
    
    composeWebMessage("info","You must be logged in to view this page.");
}

function composeWebMessage($type,$message){
    switch ($type) {
        case "danger":
            $bold = "Oh Snap!";
            break;
        case "warning":
            $bold = "Warning!";
            break;
        case "info":
            $bold = "Heads up!";
            break;
        case "success":
            $bold = "Success!";
            break;
    }

    echo '<div class="alert alert-'.$type.' alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>'.$bold.'</strong> '.$message.'</div>';
        
}

function getPageContent(){}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php getPageTitle(); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="mobile-web-app-capable" content="yes">
        <link rel='stylesheet' type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel='stylesheet' type='text/css' href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel='stylesheet' type='text/css' href="../css/mobile.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>
    <body class="taxiRent">
        <nav class="navbar navbar-default navbar-fixed-top"> 
            <div class="container"> 
                <div class="navbar-header"> 
                    <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> 
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <a href="<?php getHomeUrl(); ?>" class="navbar-brand"><i class="fa <?php getAppIcon(); ?>"></i> <?php getAppName(); ?></a> 
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
                    <ul class="nav navbar-nav">
                        <?php getAppMenu(); ?>
                    </ul>
                </div>
            </div> 
        </nav>
        <div class="page container">
            <h1 class="page-title"><i class="fa <?php getPageTitleIcon(); ?>"></i> <?php getPageTitle(); ?></h1>
            <hr>
            <?php getWebMessage(); ?>
            <?php getPageContent(); ?>
        </div>
        <div class="footer-copyright container text-center py-3"><?php getAppName();?> v<?php getAppVersion(); ?> - Chris Scholes &copy; 2018</div>
    </body>
</html>