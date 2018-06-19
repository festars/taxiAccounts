<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $this->pageTitle; ?></title>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="mobile-web-app-capable" content="yes">
        <link rel='stylesheet' type='text/css' href="<?php echo taxiRent_PUBLIC_CSS_URL; ?>font-awesome.min.css">
        <link rel='stylesheet' type='text/css' href="<?php echo taxiRent_PUBLIC_CSS_URL; ?>jquery-ui.css">
        <link rel="stylesheet" href="<?php echo taxiRent_PUBLIC_CSS_URL; ?>bootstrap.min.css" crossorigin="anonymous">
        <link rel='stylesheet' type='text/css' href="<?php echo taxiRent_PUBLIC_CSS_URL; ?>mobile.css">
        <script type="text/javascript" src="<?php echo taxiRent_PUBLIC_JS_URL; ?>jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo taxiRent_PUBLIC_JS_URL; ?>jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo taxiRent_PUBLIC_JS_URL; ?>bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="taxiRent">
        <nav class="navbar navbar-default navbar-fixed-top"> 
            <div class="container"> 
                <div class="navbar-header">
                    <a href="<?php echo taxiRent_URL; ?>" class="navbar-brand"><i class="fa <?php echo $this->appIcon; ?>"></i> <?php echo $this->appName; ?></a> 
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php $this->getAppMenu($this->pageID); ?>
                    </ul>
                </div>
            </div> 
        </nav>
        <div class="page container pg-<?php echo $this->pageID; ?>">
            <h1 class="page-title"><i class="fa <?php echo $this->pageTitleIcon; ?>"></i> <?php echo $this->pageTitleH1; ?></h1>
            <hr>
            <button type="button" onclick="window.history.back();" class="btn btn-default btn-block btn-lg goBackSmall"><i class="fa fa-arrow-circle-left"></i> Go Back</button>
            <?php echo $this->getWebMessage(); ?>
            <?php echo $this->getPageContent(); ?>
        </div>
        <div class="footer-copyright container text-center py-3"><?php echo $this->appName." v".$this->appVersion; ?> - Chris Scholes &copy; 2018</div>
    </body>
</html>