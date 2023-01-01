<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Employee Management
                    </h1>
                </div>
                <div class="col-sm-6">
                    <!-- <ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="#">Home</a></li><li class="breadcrumb-item active">DataTables</li></ol> -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <?php
    date_default_timezone_set("Asia/Colombo");
    // Return current date from the remote server
    $date = date('d-m-y h:i:s');

    ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card-header -->



                    <div class="card">
                        <div class="card-header">
                            <!-- <h3 class="card-title">DataTable with default features</h3> -->
                            <div align="right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                    Add New Employee
                                </button>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NIC</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Added Date</th>
                                        <th>Emp CID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;

                                    foreach ($get_Emp as $get_emps) {

                                      
                                    ?>

                                            <tr>
                                                <td>
                                                    <?php echo $i; ?>
                                                </td>
                                                <td>
                                                    <?php echo $get_emps->emp_nic; ?>
                                                </td>
                                                <td>
                                                    <?php echo $get_emps->emp_name; ?>
                                                </td>
                                                
                                                <td>
                                                    <?php echo $get_emps->emp_contact; ?>
                                                </td>
                                                <td>
                                                    <?php echo $get_emps->emp_email; ?>
                                                </td>

                                                <td>
                                                    <?php if ($get_emps->emp_active == 1) {
                                                    ?>
                                                        <span class="badge badge-success">Active</span><?php
                                                                                                    } else { ?>
                                                        <span class="badge badge-danger">Deactive</span>
                                                    <?php   } ?>
                                                </td>

                                                <td>
                                                    <?php echo $get_emps->emp_date; ?>
                                                </td>
                                                <td>
                                                    <?php echo $get_emps->emp_cid; ?>
                                                </td>

                                                <td style="text-align:center">

                                                    <div class="row">


                                                        <div class="col">

                                                            <form method="post" action="<?php echo base_url('portal/setup/change_emp_status'); ?>" <?php if ($get_emps->emp_active == 1) {
                                                                                                                                                        echo "hidden";
                                                                                                                                                    }
                                                                                                                                                    ?>>
                                                                <input type="hidden" value=" <?php echo $get_emps->emp_id; ?>" id="emp_id" name="emp_id">
                                                               
                                                                <input type="hidden" value="<?php {
                                                                                                echo 1;
                                                                                            } ?>" name="emp_status">
                                                                <button class="btn btn btn-success " type="submit" name="active_btn"> <span><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                                                    Active
                                                                </button>
                                                            </form>


                                                            <form method="post" action="<?php echo base_url('portal/setup/change_emp_status'); ?>" <?php if ($get_emps->emp_active == 0) {
                                                                                                                                                        echo "hidden";
                                                                                                                                                    }
                                                                                                                                                    ?>>
                                                                <input type="hidden" value=" <?php echo $get_emps->emp_id; ?>" id="emp_id" name="emp_id">
                                                         
                                                                <input type="hidden" value="<?php {
                                                                                                echo 0;
                                                                                            } ?>" name="emp_status">
                                                                <button class="btn btn btn-secondary " type="submit" name="deactive_btn"><span><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                                                    Deactive
                                                                </button>
                                                            </form>

                                                        </div>

                                                       


                                                    </div>

                                                </td>
                                            </tr>
                                    <?php
                                            $i++;
                                        
                                        //end if

                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>NIC</th>
                                        <th>Name</th>
                                       
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Added Date</th>
                                        <th>Emp CID</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Collector</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="<?php echo base_url('portal/setup/add_emp'); ?>">
                    <div class="modal-body">
                        <div class="row">

                           
                            <div class="form-group">
                                <label for="user_eno">Employee Name</label>
                                <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="emp Name">
                            </div>
                            <div class="form-group">
                                <label for="user_eno">Employee NIC</label>
                                <input type="text" class="form-control" id="emp_nic" name="emp_nic" placeholder="emp NIC">
                            </div>
                            <div class="form-group">
                                <label for="user_eno">Employee Contact</label>
                                <input type="number" class="form-control" id="emp_contact" name="emp_contact" placeholder="emp Contact">
                            </div>
                            <div class="form-group">
                                <label for="user_eno">Employee Email</label>
                                <input type="email" class="form-control" id="emp_email" name="emp_email" placeholder="emp Email">
                            </div>

                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="emp_add" id="emp_add" value="<?php echo $date ?>;" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>