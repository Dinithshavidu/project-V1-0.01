<div class="col-12  align-items-stretch flex-column">
    <div class="card bg-light d-flex flex-fill">



        <div class="card-body pt-0">
            <div class="row">
                <div class="col-7">
                    <br>
                    <h2 class="lead"><b>
                            <?php echo $retive->cust_name; ?>
                        </b></h2>
                    <table class="table">

                        <tbody>

                            <tr>
                                <td style="width:1%"><i class="fas fa-lg fa-phone-square"></i> </td>
                                <td>Phone Number: </td>
                                <td>
                                    <?php echo $retive->cus_no; ?>
                                    </li>
                                </td>

                            </tr>
                            <tr>
                                <td style="width:1%"><i class="fas fa-lg fa-id-card"></i> </td>
                                <td>Date Of Birth : </td>
                                <td>
                                    <?php echo $retive->cust_dob; ?>
                                    </li>
                                </td>

                            </tr>
                            <tr>
                                <td style="width:1%"><i class="fas fa-lg fa-building"></i></td>
                                <td> Address: </td>
                                <td>
                                    <?php echo $retive->cust_address; ?>
                                    </li>
                                </td>

                            </tr>
                            <tr>
                                <td style="width:1%"><i class="fas fa-lg fa-envelope"></td>
                                <td></i> Email: </td>
                                <td>
                                    <?php echo $retive->cust_mail; ?>
                                    </li>
                                </td>

                            </tr>
                            <tr>
                                <td style="width:1%"><i class="fas fa-lg fa-venus-mars "></i></td>
                                <td> Gender : </td>
                                <td>
                                    <?php if ($retive->cust_sex == 'male') { ?>
                                        Male
                                    <?php } else { ?>
                                        Female
                                    <?php } ?>
                                    </li>
                                </td>

                            </tr>
                            <tr>
                                <td style="width:1%"><i class="fas fa-lg fa-tag"></i></td>
                                <td> Special : </td>
                                <td>
                                    <?php echo $retive->cust_note; ?>
                                    </li>
                                </td>

                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="col-5 text-center">
                    <?php if ($retive->cust_sex == 'male') { ?>
                        <img src="<?php echo base_url(); ?>dist/img/profile/male.png" alt="user-avatar"
                            class="img-circle img-fluid">
                    <?php } else { ?>
                        <img src="<?php echo base_url(); ?>dist/img/profile/female.png" alt="user-avatar"
                            class="img-circle img-fluid">
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="text-right">
                <a href="#" class="btn btn-sm bg-teal">
                    <i class="fas fa-comments"></i>
                </a>
                <a href="#" class="btn btn-sm btn-primary">
                    <i class="fas fa-user"></i> View Profile
                </a>
            </div>
        </div>

    </div>
</div>
</div>