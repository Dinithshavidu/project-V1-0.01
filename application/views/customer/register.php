<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Customer Registration Form</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Registration</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="card card-info">
            <!-- <div class="card-header">
                <h3 class="card-title">Horizontal Form</h3>
              </div> -->
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="<?php echo base_url('customer/newcustomerinsert'); ?>">
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Customer Name </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="cust_name" name="cust_name" placeholder="Name ">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Customer Contact Number </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="cus_no" name="cus_no" placeholder="Phone Number">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Customer Email </label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="cust_city" name="cust_city" placeholder="Email">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Customer Address </label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="cust_address" name="cust_address"
                      placeholder="Enter ..."></textarea>

                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Date of barth (optional) </label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="cust_dob" name="cust_dob" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Note </label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="cust_note" name="cust_note"
                      placeholder="Enter ..."></textarea>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" id="addnew_customer" name="addnew_customer" class="btn btn-info">Sign in</button>

              </div>
              <!-- /.card-footer -->
            </form>
          </div>
        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>