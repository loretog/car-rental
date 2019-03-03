<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
<?php element( 'header' ); ?>

<?php 
  if( $_SESSION[ AUTH_TYPE ] == "admin" ) :
  $accounts = $DB->query( "SELECT * FROM users" );
?>

<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h1>Accounts</h1>          
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>
                    <a class="btn btn-success btn-xs" href="<?php echo SITE_URL ?>/?page=add_account">New Account</a>
                  </th> 
                  <th>Username</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th>Phone No.</th>
                  <th>Address</th>
                  <th>Type</th>                                  
                </tr>
              </thead>
              <?php if( $accounts->num_rows ) { ?>
              <tbody>
                <?php while( $account = $accounts->fetch_object() ) : ?>
                <tr>
                  <td>
                    <a class="btn btn-primary btn-xs" href="<?php echo SITE_URL ?>/?page=edit_account&id=<?php echo $account->user_id ?>">Edit</a>
                    <a class="btn btn-danger btn-xs" href="<?php echo SITE_URL ?>/?action=delete_account&id=<?php echo $account->user_id ?>">Delete</a>
                    <?php if( $account->active && $account->active == 1 ) : ?>
                      <a class="btn btn-warning btn-xs" href="<?php echo SITE_URL ?>/?action=activate_account&id=<?php echo $account->user_id ?>&active=0">Deactivate</a>
                    <?php else : ?>
                      <a class="btn btn-success btn-xs" href="<?php echo SITE_URL ?>/?action=activate_account&id=<?php echo $account->user_id ?>&active=1">Activate</a>
                    <?php endif; ?>
                  </td>
                  <td><?php echo $account->username ?></td>                  
                  <td><?php echo $account->first_name ?></td>
                  <td><?php echo $account->middle_name ?></td>
                  <td><?php echo $account->last_name ?></td>
                  <td><?php echo $account->phone_no ?></td>
                  <td><?php echo $account->address ?></td>
                  <td><?php echo $account->usertype ?></td>
                </tr>
                <?php endwhile; ?>
              </tbody>
              <?php } else { ?>
              <tbody>
                <tr>
                  <td colspan="3">
                    No records yet
                  </td>
                </tr>
              </tbody>
              <?php } ?>
              
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>

  <?php else : ?>
  <!-- <div class="container-scroller"> -->
    <!-- <div class="container-fluid page-body-wrapper full-page-wrapper auth-page"> -->
      <!-- <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one"> -->
        <?php 
          $users = $DB->query( "SELECT * FROM users WHERE user_id={$_SESSION[ AUTH_ID ]}" );
          $user = $users->fetch_object();
        ?>
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="card">
              <div class="card-body">
            <h2 class="text-center mb-4">Account Info</h2>
            <div class="auto-form-wrapper">
              <?php echo element( "message" ); ?>
              <form method="post">
                <input type="hidden" name="action" value="save_account">  
                <input type="hidden" name="user_id" value="<?php echo $_SESSION[ AUTH_ID ] ?>">                          
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $user->username ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="New Password" name="password">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Confirm Password">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                  <small>Leave password blank if you don't want to change.</small>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="email" class="form-control" placeholder="Email Address" name="email" value="<?php echo $user->email ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?php echo $user->first_name ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="middle_name" class="form-control" placeholder="Middle Name" value="<?php echo $user->middle_name ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name"  value="<?php echo $user->last_name ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="phone_no" class="form-control" placeholder="Phone Number" value="<?php echo $user->phone_no ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="address" class="form-control" placeholder="Home Address" value="<?php echo $user->address ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>              
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Update</button>
                </div>
                
              </form>
            </div>
          </div>
          </div>
          </div>
        </div>
      <!-- </div> -->
      <!-- content-wrapper ends -->
    <!-- </div> -->
    <!-- page-body-wrapper ends -->
  <!-- </div> -->
  <?php endif; ?>

<?php element( 'footer' ); ?>