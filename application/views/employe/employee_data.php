<!-- Content Wrapper. Contains page content -->
<script src="https://code.jquery.com/jquery-3.5.0.js">
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Existing Attendence List
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
                <div class="col-12 ">
                    <!-- /.card-header -->



                    <div class="card">
                        <div class="card-header">
                          
                            <div align="right">


                                <a class="btn btn-primary" href="<?php echo base_url(); ?>portal/employee/action/employe_process" class="nav-link">
                                    Add New Attendence
                                </a>

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
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;

                                    foreach ($retrieveEmpAttend as $get_emps) {

                                      
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
                                                    <?php echo $get_emps->emp_check_in; ?>
                                                </td>
                                                <td>
                                                    <?php echo $get_emps->emp_check_out; ?>
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
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                       
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


    
</div>
</div>

