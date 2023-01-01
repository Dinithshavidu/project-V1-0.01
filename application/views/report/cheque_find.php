<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cheque Reports</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cheque Reports</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <?php
    date_default_timezone_set("Asia/Colombo");
    // Return current date from the remote server
    $date = date('d-m-y h:i:s');

    ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"></h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body">


                    <form method="post" action="<?php echo base_url('portal/report/cheque_details'); ?>" name="upload_excel" enctype="multipart/form-data">
                        <div class="modal-body">


                            <div class="row">


                               


                            </div>
                            <br>
                            <div class="row">


                                <div class="col">
                                    <div class="form-group">
                                        <label for="user_eno">Cheque Start Date</label>
                                        <input type="date" class="form-control" id="start_cheque" name="start_cheque" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="user_eno">Cheque End Date</label>
                                        <input type="date" class="form-control" id="end_cheque" name="end_cheque" required>
                                    </div>
                                </div>



                            </div>

                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                            <button type="submit" id="submit" name="Import" class="btn btn-primary" data-loading-text="Loading...">Next </button>


                    </form>


                </div>

            </div>






        </div>



</div>
</div>

</div>

</section>

</div>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>


<