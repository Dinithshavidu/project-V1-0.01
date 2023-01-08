<div class="content-wrapper">
    <br>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Groups</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="<?php echo base_url('setup/newsGroupInsert'); ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Group Name</label>
                                <input type="text" class="form-control" id="gr_name" name="gr_name"
                                    placeholder="Enter .. ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Note</label>
                                <input type="text" class="form-control" id="gr_note" name="gr_note"
                                    placeholder="Enter ..">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="addnew_groups" name="addnew_groups" class="btn btn-primary">Save
                        changes</button>
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
                            <h3 class="card-title">Groups</h3>
                            <div align="right">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Add Groups
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Group Name</th>
                                        <th>Note</th>
                                        <th>Create At</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;

                                    foreach ($retrieveGroups as $get_gr) {


                                        ?>
                                        <tr>
                                            <td> <?php echo $i; ?></td>
                                            <td>
                                                <?php echo $get_gr->name; ?>
                                            </td>
                                            <td><?php echo $get_gr->gr_note; ?></td>
                                            <td>
                                                <?php echo $get_gr->gr_create_at; ?>
                                            </td>

                                        </tr>

                                        <?php
                                        $i++;
                                    }
                                    ?>


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Group Name</th>
                                        <th>Note</th>
                                        <th>Create At</th>

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