
 <div class="content-wrapper">
 <br> 
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

              <form method="post" action="<?php echo base_url('setup/newsServiceInsert'); ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Service Name</label>
                    <input type="text" class="form-control" id="sr_name" name="sr_name" placeholder="Enter .. ">
                  </div>
                  <div class="form-group">
                  <label>Minimal</label>
                  <select id="sr_sec_id" name="sr_sec_id" class="form-control select2" style="width: 100%;">
                    <option selected="selected">Select Section</option>
                    <?php $i = 1;

foreach ($retrieveSections as $get_secs) {

  
?>
                    <option value = " <?php echo $get_secs->sec_id; ?>"> <?php echo $get_secs->sec_name; ?></option>
                    <?php
                                            $i++;
                                        
                                      

                                    }
                                    ?>
                  </select>
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Note</label>
                    <input type="text" class="form-control" id="sr_note" name="sr_note"  placeholder="Enter ..">
                  </div>
                 
                

                
              
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id= "addnew_service" name="addnew_service" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Sections</h3><div align ="right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Customer
</button>
</div>

<div class="form-group">
                  <label>Select Customer</label>
                  <select id="sr_sec_id" name="sr_sec_id" class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Select Section</option>
                    <?php $i = 1;

foreach ($retrieveSections as $get_secs) {

  
?>
                    <option value = " <?php echo $get_secs->sec_id; ?>"> <?php echo $get_secs->sec_name; ?></option>
                    <?php
                                            $i++;
                                        
                                      

                                    }
                                    ?>
                  </select>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>#</th>
                    <th>Service Name</th>
                    <th>Section Name</th>
                    <th>Note</th>
                    <th>Create At</th>
                    <th>Active</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1;

foreach ($retrieveServices as $get_ser) {

  
?>
                  <tr>
                    <td> <?php echo $i; ?></td>
                    <td> <?php echo $get_ser->sr_name; ?></td>
                    <td> <?php echo $get_ser->sec_name; ?></td>
                    <td><?php echo $get_ser->sr_note; ?></td>
                    <td> <?php echo $get_ser->sr_create_at; ?></td>
                    <td> <?php echo $get_ser->sr_active; ?></td>
                  </tr>

                  <?php
                                            $i++;
                                        
                                      

                                    }
                                    ?>
                  
                  
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>#</th>
                  <th>Service Name</th>
                    <th>Section Name</th>
                    <th>Note</th>
                    <th>Create At</th>
                    <th>Active</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
</div>