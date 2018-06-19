<div class="row">
    <div class="col-md-6">
        <a href="/settings/profile/" class="btn btn-primary btn-lg btn-block"><i class="fa fa-search"></i> Edit Profile</a>
    </div>
    <div class="col-md-6">
        <h3>Latest Updates</h3>
        <?php
        $file = taxiRent_URL."update.log";
        $lines = file($file);
        // Loop through our array, show HTML source as HTML source; and line numbers too.
        foreach ($lines as $line_num => $line) {
            echo htmlspecialchars($line) . "<br />\n";
        }
        
        
        
        ?>
    </div>
</div>
