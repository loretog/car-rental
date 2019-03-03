<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
<?php element( 'header' ); ?>


<div class="jumbotron">
  <h1>Welcome back <?php echo $_SESSION[ AUTH_NAME ] ?>!</h1>
  
</div>

<?php element( 'footer' ); ?>