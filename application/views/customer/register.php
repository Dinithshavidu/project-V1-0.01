<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        
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

      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Customer Registration Form</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <form class="form-horizontal" method="post" action="<?php echo base_url('customer/newcustomerinsert'); ?>">

          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label>Customer Name </label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="cust_name" name="cust_name" placeholder="Name "
                      required>
                  </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group row">
                  <label>Gender </label>
                  <div class="col-sm-12">
                    <select id="cust_sex" name="cust_sex" class="form-control" required>
                      <option selected="selected" disabled>Select Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group row">
                  <label>Customer Contact Number </label>
                  <div class="col-sm-12">
                    <input type='tel' pattern='[0-9]{10}$' title='Phone Number (Format: 0XXXXXXXXX)'
                      class="form-control" id="cus_no" name="cus_no" placeholder="Phone Number" required>
                  </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group row">
                  <label >Customer Email </label>
                  <div class="col-sm-12">
                    <input type="email" class="form-control" id="cust_mail" name="cust_mail" placeholder="Email">
                  </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->


            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group row">
                  <label >Customer Address </label>
                  <div class="col-sm-12">
                    <textarea class="form-control" rows="3" id="cust_address" name="cust_address"
                      placeholder="Enter ..."></textarea>

                  </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
                <div class="form-group row">
                  <label >Date of barth (optional) </label>
                  <div class="col-sm-12">
                    <input type="date" class="form-control" id="cust_dob" name="cust_dob" placeholder="">
                  </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>

            <div class="row">
              <div class="col-12 col-sm-12">

                <div class="form-group row">
                  <label >Note </label>
                  <div class="col-sm-12">
                    <textarea class="form-control" rows="3" id="cust_note" name="cust_note"
                      placeholder="Enter ..."></textarea>
                  </div>
                </div>

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            
          </div>
          <div class="card-footer">
              <button type="submit" id="addnew_customer" name="addnew_customer" class="btn btn-info">Register</button>

            </div>
          <!-- /.card-body -->
        </form>
      </div>
  </section>
  <!-- /.content -->
</div>
<script>
  function validating($phone) {
    if (preg_match('/^[0-9]{10}+$/', $phone)) {
echo " Valid Phone Number";
    } else {
echo " Invalid Phone Number";
    }
  }
</script>