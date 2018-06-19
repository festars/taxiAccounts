<?php
    if(isset($_SESSION['userLoggedIn'])){
    ?>
        <div class="home-splash">
            <i class="fa fa-5x <?php echo $this->appIcon; ?>"></i><br/>
            <h1 class="splash-title"><?php echo $this->appName; ?></h1>
            <a href="/dash/" type="submit" class="btn btn-primary btn-lg"><i class="fa fa-dashboard"></i> Go to Dashboard</a>
        </div> 
    <?php
    }else{
    ?>
        <div class="home-splash">
            <i class="fa fa-5x <?php echo $this->appIcon; ?>"></i><br/>
            <h1 class="splash-title"><?php echo $this->appName; ?></h1>
            <a href="/login/" type="submit" class="btn btn-primary btn-lg"><i class="fa fa-sign-in"></i> Go to Login</a>
        </div> 
    <?php	
    }