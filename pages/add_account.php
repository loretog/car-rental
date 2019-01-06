<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
<?php element( 'header' ); ?>

<div class="row">
	  <div class="col-md-12 grid-margin">
	    <div class="card">
	      <div class="card-body">
	        <h1>New Account</h1>          
          <div class="card">
            <div class="card-body">              
              <form class="forms-sample" method="post">
                <input type="hidden" name="action" value="save_account">
                <div class="form-group row">
                  <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" name="username" required class="form-control" id="exampleInputEmail2" placeholder="User Name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" name="password" required class="form-control" id="exampleInputPassword2" placeholder="***">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" name="email" required class="form-control" id="exampleInputPassword2" placeholder="Email Address">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">First Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="first_name" required class="form-control" id="exampleInputPassword2" placeholder="First Name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Middle Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="middle_name" required class="form-control" id="exampleInputPassword2" placeholder="Middle Name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Last Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="last_name" required class="form-control" id="exampleInputPassword2" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Phone No.</label>
                  <div class="col-sm-9">
                    <input type="text" name="phone_no" required class="form-control" id="exampleInputPassword2" placeholder="Phone Number">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Address</label>
                  <div class="col-sm-9">
                    <input type="text" name="address" required class="form-control" id="exampleInputPassword2" placeholder="Home Address">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Type</label>
                  <div class="col-sm-9">                    
                    <select class="form-control" name="usertype">
                      <option value="admin">Admin</option>
                      <option value="customer">Customer</option>
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