<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
<?php element( 'header' ); ?>

<?php 
  $id = $_GET[ 'id' ];
	$accounts = $DB->query( "SELECT * FROM users WHERE user_id = $id" );
  if( $accounts->num_rows ) {
    $account = $accounts->fetch_object();
  } else {
    set_message( "Car not found." );
    redirect( "accounts" );
  }
?>

<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h1>Edit Account</h1>          
          <div class="card">
            <div class="card-body">              
              <form class="forms-sample" method="post">
                <input type="hidden" name="action" value="save_account">
                <input type="hidden" name="user_id" value="<?php echo $id ?>">
                <div class="form-group row">
                  <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" name="username" required class="form-control" placeholder="User Name" value="<?php echo $account->username ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" name="password" required class="form-control" placeholder="***">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" name="email" required class="form-control" placeholder="Email Address" value="<?php echo $account->email ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">First Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="first_name" required class="form-control" placeholder="First Name" value="<?php echo $account->first_name ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Middle Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="middle_name" required class="form-control" placeholder="Middle Name" value="<?php echo $account->middle_name ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Last Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="last_name" required class="form-control" placeholder="Last Name" value="<?php echo $account->last_name ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Phone No.</label>
                  <div class="col-sm-9">
                    <input type="text" name="phone_no" required class="form-control" placeholder="Phone Number" value="<?php echo $account->phone_no ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Address</label>
                  <div class="col-sm-9">
                    <input type="text" name="address" required class="form-control" placeholder="Home Address" value="<?php echo $account->address ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Type</label>
                  <div class="col-sm-9">                    
                    <select class="form-control" name="usertype">
                      <option value="admin" <?php echo ($account->usertype=='admin' ? 'selected': '' ) ?>>Admin</option>
                      <option value="customer" <?php echo ($account->usertype=='customer' ? 'selected': '' ) ?>>Customer</option>
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <a class="btn btn-light" href="<?php echo SITE_URL ?>/?page=accounts">Cancel</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php element( 'footer' ); ?>