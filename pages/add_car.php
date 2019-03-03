<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
<?php element( 'header' ); ?>

<div class="row">
	  <div class="col-md-12 grid-margin">
	    <div class="card">
	      <div class="card-body">
	        <h1>New Car</h1>          
          <div class="card">
            <div class="card-body">              
              <form class="forms-sample" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add_car">
                <div class="form-group row">
                  <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Model</label>
                  <div class="col-sm-9">
                    <input type="text" name="car_model" required class="form-control" id="exampleInputEmail2" placeholder="Model Name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Plate Number</label>
                  <div class="col-sm-9">
                    <input type="text" name="plate_no" required class="form-control" id="exampleInputPassword2" placeholder="Plate Number">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Capacity (Seats)</label>
                  <div class="col-sm-9">
                    <input type="text" name="capacity" required class="form-control" id="exampleInputPassword2" placeholder="Capacity">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Unit</label>
                  <div class="col-sm-9">
                    <input type="text" name="car_unit" required class="form-control" id="exampleInputPassword2" placeholder="Unit">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Color</label>
                  <div class="col-sm-9">
                    <input type="text" name="car_color" required class="form-control" id="exampleInputPassword2" placeholder="Plate Number">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Type</label>
                  <div class="col-sm-9">
                    <input type="text" name="car_type" required class="form-control" id="exampleInputPassword2" placeholder="Plate Number">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="car_name" required class="form-control" id="exampleInputPassword2" placeholder="Car Name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Price</label>
                  <div class="col-sm-9">
                    <input type="number" name="price" required class="form-control" id="exampleInputPassword2" placeholder="Price">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Manufacturer</label>
                  <div class="col-sm-9">
                    <input type="text" name="manufacturer" required class="form-control" id="exampleInputPassword2" placeholder="Manufacturer">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Image</label>
                  <div class="col-sm-9">
                    <input type="file" name="car_image" class="form-control" placeholder="Select an image for the car.">
                  </div>
                </div>
                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <a class="btn btn-light" href="<?php echo SITE_URL ?>/?page=cars">Cancel</a>
              </form>
            </div>
          </div>
	      </div>
	    </div>
	  </div>
	</div>

<?php element( 'footer' ); ?>