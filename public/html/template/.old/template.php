<!DOCTYPE html>
<html lang="en">
    <head>
        <title>taxiRent v1.0</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="mobile-web-app-capable" content="yes">
        
        <link rel='stylesheet' type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel='stylesheet' type='text/css' href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <!--<link rel='stylesheet' type='text/css' href="../css/mobile/iphone4.css">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        
        <style type="text/css">
            body { padding-top: 70px;}
            .panel-title{display:inline-block;}
            .panel-links{display:inline-block;float:right;}
            .panel-clear{clear:both;}
        </style>
        
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
                    <a href="#" class="navbar-brand"><i class="fa fa-taxi"></i> taxiRent</a> 
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Dashboard</a></li>
                        <li><a href="#">Reports</a></li>
                        <li><a href="#">Settings</a></li>
                    </ul>
                </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Dashboard</a></li>
                        <li><a href="#">Reports</a></li>
                        <li><a href="#">Settings</a></li>
                    </ul>
            </div> 
        </nav>
        
        <div class="container">
            
            <h2>Dashboard : W/C (10-07-17)</h2>
            <hr>
            
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="well well-sm"><b>17</b> DUE</div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="well well-sm"><b>48</b> PAID</div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="well well-sm"><b>11</b> OFF</div>
                </div>
            </div>
            
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-calendar"></i> <b>W/C:</b> 10-07-17</h3>
                    <div class="panel-links"><b>SORT BY: </b>
                        <a href="#"> DUE</a> |
                        <a href="#"> PAID</a> |
                        <a href="#"> OFF</a>
                    </div>
                    <div class="panel-clear"></div>
                </div>
                <div class="panel-body">
            
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>DRV #</th>
                                        <th>STATUS</th>
                                        <th>CASH</th>
                                        <th>ACC</th>
                                        <th>T.V</th>
                                        <th>TOTAL</th>
                                        <th>SIGN</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                
                                <tfoot>
                                    <tr>
                                        <th>5</th>
                                        <th></th>
                                        <th>107.00</th>
                                        <th>92.00</th>
                                        <th>61.00</th>
                                        <th>260.00</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                
                                <tbody>
                                    <tr class="success">
                                        <th scope="row">1</th>
                                        <td>PAID</td>
                                        <td>52.00</td>
                                        <td>10.00</td>
                                        <td>18.00</td>
                                        <td>80.00</td>
                                        <td><button><i class="fa fa-edit"></i></button></td>
                                    </tr>
                                    
                                    <tr class="warning">
                                        <th scope="row">2</th>
                                        <td>OFF</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td><button><i class="fa fa-edit"></i></button></td>
                                    </tr>
                                    
                                    <tr class="success">
                                        <th scope="row">3</th>
                                        <td>PAID</td>
                                        <td>-</td>
                                        <td>62.00</td>
                                        <td>28.00</td>
                                        <td>90.00</td>
                                        <td><button><i class="fa fa-edit"></i></button></td>
                                    </tr>
                                    
                                    <tr class="success">
                                        <th scope="row">4</th>
                                        <td>PAID</td>
                                        <td>55.00</td>
                                        <td>20.00</td>
                                        <td>15.00</td>
                                        <td>90.00</td>
                                        <td><button><i class="fa fa-edit"></i></button></td>
                                    </tr>
                                    
                                    <tr class="danger">
                                        <th scope="row">5</th>
                                        <td>DUE</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td><button><i class="fa fa-edit"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>