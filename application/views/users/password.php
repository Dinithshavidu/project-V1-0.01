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
          <h3 class="card-title">User Registration Form</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <?php
        // Return current date from the remote server
        $date = date('d-m-y h:i:s');

        ?>
        <!-- /.card-header -->


        <!-- /.card-header -->

        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <form method="post" action="<?php echo base_url('user/changeuserpassword'); ?>">
                <input type="hidden" name="user_updateid" value="<?php echo $_SESSION['passed_user_national'] ?>" />
                <input type="hidden" name="user_updatetime" value="<?php echo $date; ?>" />
                <div class="form-group">
                  <label>Select User's NIC</label>
                  <select id="get_user_list" name="get_user_list" onchange="load_director()"
                    class="form-control select2" style="width: 100%;">

                    <?php 

                    foreach ($retrieveUserNic as $get_nic) {
                      ?>
                      <option value="<?php echo $get_nic->user_nic; ?>">
                        <?php echo $get_nic->user_nic; ?>
                      </option>
                      <?php              
                    }
                    ?>

                  </select>
                </div>
                <!-- <div class="form-group">
                        <label>NIC</label>
                        <input type="text" id="user_nic" name="user_nic" class="form-control" >
                      </div> -->
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="user_name_new" id="user_name_new" class="form-control" placeholder=""
                    disabled>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <a id="generate_password" name="addnew_director" onclick="generate_password()"
                        class="btn btn-danger">Generate Password</a>
                    </div>
                    <!-- /btn-group -->
                    <input type="text" id="user_password" name="user_password" type="password" class="form-control"
                      placeholder="" disabled>
                    <input type="hidden" id="user_password1" name="user_password1" type="password" class="form-control"
                      placeholder="">
                  </div>
                </div>


                <br>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <!-- /.form-group --><br><br><br>
              </div>
              <div class="form-group">
                <label>NIC</label>
                <input type="text" name="user_nic_new" id="user_nic_new" class="form-control" placeholder="" disabled>
                <input type="hidden" name="user_nic" id="user_nic" class="form-control" placeholder="">
              </div>
              <br><br><br><br><br>
              <div align='right'>
                <button type="submit" class="btn btn-primary" value="change_password" name="change_password">Change User
                  Password</button>
              </div>
            </div>
            <!-- /.form-group -->
          </div>
          <!-- /.col -->
        </div>

      </div>

      <!-- /.card-body -->
      </form>
    </div>
  </section>
  <!-- /.content -->
</div>

<script type="text/javascript">
  function load_director() {

    var user_name = document.getElementById('user_name_new');
    var user_nic = document.getElementById('user_nic');
    var user_nic_new = document.getElementById('user_nic_new');
    var get_user_list = document.getElementById('get_user_list').value;

    console.log(get_user_list)
    var url = '<?php echo base_url('user/load_user'); ?>';

    $.post(url, { get_user_list: get_user_list },
      function (data) {
        if (data != 'no') {

          var obj = JSON.parse(data);
          var res = [];

          for (var i in obj)
            res.push(obj[i]);


          user_nic.value = "";
          user_name.value = "";
          user_nic.value = res[0][0];

          user_name.value = res[0][1];
          user_nic_new.value = res[0][0];

          console.log(res[0][4])

        }
        else if (data == 'no') {
          console.log("NOT SAVED");

        }
      });

    if (select_id_type == 'NIC') {
      $("#select_id_type").prop('selectedIndex', 1);

    }


  }
</script>


<script>


  function generate_password() {

    var length = 8,
      charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
      retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
      retVal += charset.charAt(Math.floor(Math.random() * n));
    }

    var pp = document.getElementById("user_password");
    var qq = document.getElementById("user_password1");
    pp.value = retVal;
    pp.readOnly = true;
    qq.value = retVal;
    qq.readOnly = true;

  }
</script>