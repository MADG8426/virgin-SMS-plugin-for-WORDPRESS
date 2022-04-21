<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    partials/wp10settingscallback
 */
?>

<h1>General Settings for Virgincareer SMS gateway</h1><br><hr>
<div class="container" style="max-width:100%;">
  <div class="row">
    <div class="col">
      <div class="alert alert-warning">
        <h1 class="display-4">Virgin Career SMS Gateway</h1>
        <p class="lead">You can use our SMS gateway by giving following data.</p>
        <hr class="my-4">
        <p>Put in the username and password for your SMS gateway from Virgincareer Production Pvt Ltd</p>
        <form method="post" action="options.php">
        <?php
        settings_fields( 'wp10customsettings' );
        do_settings_sections( 'wp10customsettings' );
        ?>
        <div class="form-group">
          <label for="youtubeAPIKey">Your Username</label>
          <input name="virgin_username" value="<?php echo get_option( 'virgin_username' ); ?>" type="text" class="form-control" id="virgin_username" placeholder="Your virgincareer username">
        </div>
        <div class="form-group">
          <label for="youtubeChannelID">Your token</label>
          <input type="text" name="virgin_password" value="<?php echo get_option( 'virgin_password' ); ?>" class="form-control" id="virgin_password" placeholder="Your virgincareer password">
        </div>

        <div class="form-group">
          <label for="message_text">Your Message prefix</label>
          <input type="text" name="message_text" value="<?php echo get_option( 'message_text' ); ?>" class="form-control" id="message_text" placeholder="Hi there -">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>


      <br>



    </div>
    <div class="col">
      
    </div>
  </div>
</div>