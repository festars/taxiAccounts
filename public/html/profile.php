<?php
$objUser = new objUser;
$userData = $objUser->getUserDataFromUsername($_SESSION['userLoggedIn']['userName']);
?>
<div class="row">
    <div class="col-xs-12">
        <form method="post" action="<?php echo taxiRent_URL;?>settings/profile/">
            <div class="form-group">
                <input type="text" class="form-control" name="profileUsernameDISABLED" placeholder="&#xf007; <?php echo $userData['userName']; ?>" minlength="4" maxlength="16" autocomplete="off" disabled>
                <input type="hidden" class="form-control" name="profileUsername" value="<?php echo $userData['userName']; ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="profileUserDisplayName" placeholder="&#xf007; Display Name" minlength="4" maxlength="32" autocomplete="off" required value="<?php echo $userData['userDisplayName']; ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="profileEmail" placeholder="&#xf0e0; Email" minlength="4" maxlength="64" autocomplete="off" autofocus required value="<?php echo $userData['userEmail']; ?>">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="profilePassword" placeholder="&#xf023; Password (leave blank to remain unchanged.)" minlength="4" maxlength="16" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="profilePasswordVerify" placeholder="&#xf023; Verify (leave blank to remain unchanged.)" minlength="4" maxlength="16" autocomplete="off">
            </div>
            <input type="hidden" class="form-control" name="frmSubmitted" value="1">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Save Profile</button>
        </form>
    </div>
</div>


