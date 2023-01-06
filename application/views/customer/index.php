<div class="content-wrapper">
  <br>
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Sections</h3>
              <div align="right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                  Add Customer
                </button>
              </div>
              
              <div class="form-group">
                <label>Select Customer</label>
                <select id="sr_sec_id" name="sr_sec_id" class="form-control select2bs4"  onchange="showCustomer(this.value)" style="width: 100%;">
                  <option selected="selected" disabled >Select Section</option>
                  <?php
                  $i = 1;
                 
                  foreach ($retrieveCustomers as $get_customers) { ?>
                    <option value="<?php echo $get_customers->cust_id ; ?>">
                      <?php echo $get_customers->cust_name; ?> -   <?php echo $get_customers->cus_no; ?>
                    </option>
                    <?php $i++;
                  }
                  ?>
                </select>
              </div>
            </div>
            <!-- /.card-header -->
          
            
            <!-- /.card-body -->
          </div>
          <div id="txtHint">Customer info will be listed here...</div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>
</div>

<script>
function showCustomer(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  console.log(str)
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  console.log(str);
  console.log( `customer/profile/${str}`);
  xhttp.open("GET", `customer/profile/${str}`, true);
  xhttp.send();
}
</script>