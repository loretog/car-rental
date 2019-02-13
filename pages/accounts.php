<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
<?php element( 'header' ); ?>

<?php 
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

<?php element( 'footer' ); ?>