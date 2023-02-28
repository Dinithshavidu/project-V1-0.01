
<head>
<style>

.tableCell{
  padding: 0px !important;
  /* width: 100% !important; */
  white-space: nowrap;
  margin-right: 0px !important;
  border: 1px solid #d3dceb;
  /* text-align: right; */
}

/* .tableCell:hover{
    cursor: pointer !important;
    background-color: #f6e58d;
} */

.timeValue {
    background-color: #fc8a51;
    height: 80px;
    vertical-align: top;
    padding-top: 0px !important;
}

.apointmentBtn{
  width: 120px;
  height: 80px;
  border-top: 0px !important;
  border-left: 0px !important;
  border-right: 0px !important;
  border-radius: 0px !important;
}

.apointmentTable{
  overflow-x: scroll;
  width: auto;
}

.headerCustom{
  display: flex;
}



</style>

  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/bs-stepper/css/bs-stepper.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/dropzone/min/dropzone.min.css">


</head>

<div class="content-wrapper">
  <br>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Appointment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post" action="<?php echo base_url('appointment/insertApointment'); ?>">
            <div class="card-body">             
              
            
               <div id="ap_cust_id_section" onClick="hideNewCustomerDiv()">

               <div class="form-group"> 
                      <label>Select Customer</label>
                      <select id="ap_cust_id" name="ap_cust_id" class="form-control select2bs4"  style="width: 100%;">
                        <option selected="selected" disabled >Select Customer</option>
                        <?php
                        $i = 1;                 
                        foreach ($retrieveCustomers as $get_customers) { ?>
                          <option value="<?php echo $get_customers->cust_id ; ?>">
                            <?php echo $get_customers->cust_name; ?> -   <?php echo $get_customers->cus_no; ?>
                            <a class="btn btn-danger" href="/#" align="right"> View </a>
                          </option>
                          <?php $i++;
                        }
                        ?>
                      </select>
              </div>

              <p>If customer not registered choose this option</p>
              
               </div>

               <div class="form-group">               
                 <button class="btn btn-primary" value="" id="new_customer_button" type="button" onClick="viewNewCustomerDiv()">NEW CUSTOMER</button>
                </div>                
                


                <div id="ap_new_customer_section" hidden> 

                <div class="form-group">
                  <label for="customerMobile">Customer Mobile</label>
                  <input type="text" class="form-control" id="ap_customer_mobile" name="ap_customer_mobile" placeholder="Enter Mobile Number Here">
                </div>

                <div class="form-group">
                  <label for="customerMobile">Customer Name</label>
                  <input type="text" class="form-control" id="ap_customer_name" name="ap_customer_name" placeholder="Enter Customer Name Here">
                </div>

                </div>             

                <div class="form-group selectDate">
                  <label >Appointment Date</label>               
                    <input type="date" id="ap_date" class="form-control" value="<?php date("Y-m-d"); ?>" name="ap_date" placeholder="">
                </div>

               <div class="form-group">
                  <label>Start Time</label>
                  <select id="ap_start_time" name="ap_start_time"
                      class="form-control select2bs4" style="width: 100%;" onchange="filterEndTime(this.value);">
                      <?php 
                      foreach($hoursRange as $hrData){
                          ?>
                        <option value="<?php echo $hrData; ?>"><?php echo $hrData; ?></option>
                      <?php
                      }                      
                      ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>End Time</label>
                  <select id="ap_end_time" name="ap_end_time"
                      class="form-control select2bs4" style="width: 100%;">
                      <?php 
                      foreach($hoursRange as $hrData){
                          ?>
                        <option value="<?php echo $hrData; ?>"><?php echo $hrData; ?></option>
                      <?php
                      }                      
                      ?>
                  </select>
                </div>


               <!-- <div class="form-group">
                  <label>Choose a Service with Users</label>
                  <div class="select2-purple">
                  <select id="serviceAndEmp" name="serviceAndEmp" class="form-control select2bs4" style="width: 100%;">                    
                     <
                      ?php
                    $i = 1;                    
                    foreach ($usersWithServices as $urs) { ?>
                        <option value="<
                          ?php echo $urs->user_id; ?>_<
                            ?php echo $urs->sr_id; ?>">
                        <
                          ?php echo $urs->user_name; ?>
                         - <
                          ?php echo $urs->sr_name; ?>
                        </option>
                        <
                          ?php $i++;
                         }
                       ?>                       
                    </select>
                  </div>
                </div> -->

                <div class="form-group">
                  <label>Choose a Employer</label>
                  <div class="select2-purple">
                  <select id="employerName" name="employerName" class="form-control select2bs4" style="width: 100%;">                    
                     <?php
                    $i = 1;                    
                    foreach ($usersList as $urs) { ?>
                        <option value="<?php echo $urs->user_id; ?>">
                        <?php echo $urs->user_name; ?>
                      </option>
                        <?php $i++;
                         }
                       ?>                       
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label>Choose a Service</label>
                  <div class="select2-purple">
                  <select id="serviceName" name="serviceName" class="form-control select2bs4" style="width: 100%;">                    
                     <?php
                    $i = 1;                    
                    foreach ($servicesList as $srv) { ?>
                        <option value="<?php echo $srv->sr_id; ?>">
                        <?php echo $srv->sr_name; ?>
                        </option>
                        <?php $i++;
                         }
                       ?>                       
                    </select>
                  </div>
                </div>


              <div class="form-group">
                <label for="exampleInputPassword1">Note</label>
                <input type="text" class="form-control" id="ap_note" name="ap_note" placeholder="Enter ..">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="addnew_appointment" name="addnew_appointment" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>



  <div class="modal fade" id="appointModal" tabindex="-1" role="dialog" aria-labelledby="appointModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Appointment Edit Controller</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post" action="<?php echo base_url('appointment/updateAppointment'); ?>">
            <div class="card-body">  
              
                        <div class="form-group">
                         <button class="btn btn-success" value="" id="jobStartBtn"  type="button" onClick="startJob();">START JOB</button>
                        </div>

                        <div class="form-group">
                         <button class="btn btn-warning" value="" id="jobEndBtn" type="button" onClick="finishJob();">FINISH JOB</button>
                        </div>

                       
              <div class="form-group">
                  <label>Select Customer</label>
                <select id="ap_cust_id_editmode" name="ap_cust_id_editmode" class="form-control select2bs4"  style="width: 100%;">
                  <option disabled >Select Customer</option>
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

            
                <div class="form-group selectDate">
                  <label >Appointment Date</label>
               
                    <input type="date" id="ap_date_editmode" class="form-control" value="<?php date("Y-m-d"); ?>" name="ap_date_editmode" placeholder="">
                </div>

               <div class="form-group">
                  <label>Start Time</label>
                  <select id="ap_start_time_editmode" name="ap_start_time_editmode"
                      class="form-control select2bs4" style="width: 100%;" onchange="filterEndTime(this.value);">
                      <?php 
                      foreach($hoursRange as $hrData){
                          ?>
                        <option value="<?php echo $hrData; ?>"><?php echo $hrData; ?></option>
                      <?php
                      }                      
                      ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>End Time</label>
                  <select id="ap_end_time_editmode" name="ap_end_time_editmode"
                      class="form-control select2bs4" style="width: 100%;">
                      <?php 
                      foreach($hoursRange as $hrData){
                          ?>
                        <option value="<?php echo $hrData; ?>"><?php echo $hrData; ?></option>
                      <?php
                      }                      
                      ?>
                  </select>
                </div>


               <!-- <div class="form-group">
                  <label>Choose a Service with Users</label>
                  <div class="select2-purple">
                  <select id="serviceAndEmp_editmode" name="serviceAndEmp_editmode" class="form-control select2bs4" style="width: 100%;">                    
                     <
                      ?php
                    $i = 1;                    
                    foreach ($usersWithServices as $urs) { ?>
                        <option value="<
                          ?php echo $urs->user_id; ?>_<
                            ?php echo $urs->sr_id; ?>">
                        <
                          ?php echo $urs->user_name; ?>
                         - <
                          ?php echo $urs->sr_name; ?>
                        </option>
                        <
                          ?php $i++;
                         }
                       ?>                       
                    </select>
                  </div>
                </div>  -->


                <div class="form-group">
                  <label>Choose a Employer</label>
                  <div class="select2-purple">
                  <select id="employerName_editmode" name="employerName_editmode" class="form-control select2bs4" style="width: 100%;">                    
                     <?php
                    $i = 1;                    
                    foreach ($usersList as $urs) { ?>
                        <option value="<?php echo $urs->user_id; ?>">
                        <?php echo $urs->user_name; ?>
                      </option>
                        <?php $i++;
                         }
                       ?>                       
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label>Choose a Service</label>
                  <div class="select2-purple">
                  <select id="serviceName_editmode" name="serviceName_editmode" class="form-control select2bs4" style="width: 100%;">                    
                     <?php
                    $i = 1;                    
                    foreach ($servicesList as $srv) { ?>
                        <option value="<?php echo $srv->sr_id; ?>">
                        <?php echo $srv->sr_name; ?>
                        </option>
                        <?php $i++;
                         }
                       ?>                       
                    </select>
                  </div>
                </div>


              <div class="form-group">
                <label for="exampleInputPassword1">Note</label>
                <input type="text" class="form-control" id="ap_note_editmode" name="ap_note_editmode" placeholder="Enter ..">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="update_appointment" name="update_appointment" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>


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

              <div class="row">
                <div class="col-md-6">
                    <h2><?php echo $this->session->userdata("appointmentDateSelected"); ?></h2>

                    <div class="form-group selectDate">
                        <label >Change View Date</label>
                        <div class="col-sm-6">
                          <input type="date" id="dateChange" class="form-control" value="<?php date("Y-m-d"); ?>" name="dateChange" placeholder="" onchange="changeDateOption()">
                        </div>
                    </div>
                </div>

                <div class="col-md-6" align="right">
                         
                    <div class="form-group selectDate">
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="flex: 3;">
                        Book an Appointment
                      </button>
                    </div>

                    <div class="form-group">
                    <i class="fa fa-fw fa-circle"></i>   
                      In Progress
                    </div>

                </div>
              </div>            

         
             
         </div>

  <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">             
            <div class="table-responsive">
                <table class="table apointmentTable">
                <thead>
                <tr>
                <th> ###### </th>
                <?php
                $i = 1;                    
                foreach ($allUsers as $userData) { ?>
                    <th scope="col">
                    <?php echo $userData->user_name; ?>
                    </th>
                    <?php $i++;
                      }
                      ?>                   
                    </tr>
                </thead>
                <tbody>

               <?php 
                    $k = 0;                    
                    foreach ($hoursRange as $hrs) { 
                        ?>
                <tr>   
                  <td class="timeValue">
                    <span>
                  <?php echo $hrs; ?> 
                  <!-- <
                    ?php echo $hoursRangeFormatted[$k]; ?>     -->
                  </span>      
                  </td>               
                    <?php
                                    
                    foreach ($allUsers as $userData) { ?>
                        <td scope="col" id="<?php echo  $userData->user_id; ?>_<?php echo $hrs; ?>" class="tableCell" onload="showIndexOfCell(this)">
                            <!-- AVAILABLE -->
                        </td>
                        <?php 
                            }
                    ?>   
                    </tr>
                    <?php
                    $k++;
                     } 
                    ?>
                </tbody>
                </table>
            </div>
            </div>
          </div>
     </div>
  </section>
  
</div>

<script type="text/javascript">


document.addEventListener("DOMContentLoaded", function() {

  addApointment2();
});

function addApointment2(str) {

  var appoitmentData = <?php echo json_encode($allApointments); ?>;  

  let timeArrFromPhp = <?php echo json_encode($hoursRange); ?>

  let timeArr = [];
  for(const ele in timeArrFromPhp){
    timeArr.push(timeArrFromPhp[ele]);
  }

 
     let startTimeElement;
     let endTimeElement;
     let newButton;

     appoitmentData.forEach((element)=>{
     startTimeElement =  document.getElementById(`${element.ap_user_id}_${element.ap_start_time}`);
     endTimeElement = document.getElementById(`${element.ap_user_id}_${element.ap_end_time}`);
    //  startTimeElement.style.background='#f9ca24';
    //  startTimeElement.innerHTML= `${element.cust_name} <br> ${element.sr_name} <br> ${element.ap_alocate_time}`;
     //endTimeElement.style.background='#f9ca24';
     console.log(88888, `${element.ap_user_id}_${element.ap_start_time}`);

     newButton = document.createElement('button');

     startElementDiv = document.createElement('div');
   
     newButton.setAttribute("id", `button_${element.ap_user_id}_${element.ap_start_time}_${element.ap_cust_id}`);
     newButton.setAttribute("class", "btn btn-primary apointmentBtn mainBtnAppointment");
     newButton.setAttribute("value", `${element.ap_job_id}`);
     newButton.style.background = `${element.ap_color}`;

     newButton.innerHTML = `${element.cust_name} <br> Jb: ${element.ap_job_id} - Srv: ${element.sr_id} <br> ${element.ap_alocate_time}`;

    //  newButton.setAttribute("data-toggle", "modal");
    //  newButton.setAttribute("data-target", "#appointModal");
    //  newButton.setAttribute("onClick", "changeAppointmentRequest(this)");

    if(element.ap_active == "1"){
      newButton.setAttribute("onClick", "changeAppointmentRequest(this)");
      newButton.setAttribute("data-toggle", "modal");
      newButton.setAttribute("data-target", "#appointModal");
    }
  
     newButton.style["border-bottom"] =  `1px solid ${element.ap_color} !important`;


     startTimeElement.style.background= '#E5E4E2'; 
    //  startTimeElement.style["text-align"] = "left"; 
    
     
     startTimeElement.appendChild(newButton);


     let startIndex = 0;
     let endIndex = 0;
     i = 0;
     timeArr.forEach((ele)=> {
      if(ele === element.ap_start_time){
        startIndex = i;
      }else if(ele === element.ap_end_time){
        endIndex = i;
      }
      i++;
     });

     var gapIndex = endIndex-startIndex;
     //startTimeElement.setAttribute("rowspan", `${gapIndex}`);
     let rightElementAlignStart;

     for (let k = startIndex+1; k < endIndex; k++) {        
        document.getElementById(`${element.ap_user_id}_${timeArr[k]}`).style.background='#E5E4E2';
       
        var dd = document.createElement('button');
        dd.innerHTML = `Jb: ${element.ap_job_id}`;
        dd.style.background = `${element.ap_color}`;
       // dd.style["border-bottom"] = `1px solid ${element.ap_color}`;
        dd.setAttribute("class", "btn btn-primary apointmentBtn");

        // select index of alignment right loop start index
        var previousChildCount = document.getElementById(`${element.ap_user_id}_${timeArr[k-1]}`)?.childElementCount;
        if(previousChildCount && previousChildCount == 2){
          rightElementAlignStart = k;
        }

        document.getElementById(`${element.ap_user_id}_${timeArr[k]}`).appendChild(dd);
      } 

      // align second elements to right
      for (let k = rightElementAlignStart; k < endIndex; k++) {     
        document.getElementById(`${element.ap_user_id}_${timeArr[k]}`).style["text-align"] = "right";
      }  
  })

}


function showIndexOfCell(x, cust, timeD) {
        var tr = x.parentNode.rowIndex;
        var td = x.cellIndex;        
        document.getElementById("cellCol").innerHTML = "Colum index is: " + td;
        document.getElementById("cellRow").innerHTML = "Row index is: " + tr;       
}


function changeDateOption()
{
  var val = document.getElementById("dateChange").value;
  $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>appointment/changeDateOfAppointmentViewSession",
      data: { dateValue: val },
      success: function(data){
        window.location.reload();
      }
     
  });
}


function filterEndTime(value)
{
   console.log("SELECTED VALUE ", value);
 
   document.querySelectorAll("#ap_end_time option").value = value;

  const hrs = value.split(":")[0];
  const timeR = value.split(":")[1].split(" ")[1];

  document.querySelectorAll("#ap_end_time option").forEach(opt => {
    const hrsIn = opt.value.split(":")[0];
    const timeRIn = opt.value.split(":")[1].split(" ")[1];
   
    if(timeR === timeRIn && Number(hrs) >= Number(hrsIn)){
      opt.disabled = true;
    }
    
});
}


function changeAppointmentRequest(props){
     $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>appointment/changeAppointmentRequestCall",
      data: { appointmentId: props.value },
      success: function(data){       
          const res = JSON.parse(data);
          const apCustIdBox = document.getElementById("ap_cust_id_editmode");
          const apDateBox = document.getElementById("ap_date_editmode");
          const apStartTimeBox = document.getElementById("ap_start_time_editmode");
          const apEndTimeBox = document.getElementById("ap_end_time_editmode");
          // const apServiceEmpBox = document.getElementById("serviceAndEmp_editmode");

          const employeNameBox = document.getElementById("employerName_editmode");
          const serviceNameBox = document.getElementById("serviceName_editmode");

          if(res.length > 0){
          const appointmentData = res[0];
            $("#ap_cust_id_editmode").find('option').each(function(){
            if ($(this).val() == appointmentData.ap_cust_id){              
              $(this).attr("selected","selected");
              $(this).val(appointmentData.ap_cust_id).change();
            }           
            });
            apCustIdBox.value = appointmentData.ap_cust_id;

            apDateBox.value = appointmentData.ap_date;
          
            $("#ap_start_time_editmode").find('option').each(function(){
            if ($(this).val() == appointmentData.ap_start_time){              
              $(this).attr("selected","selected");
              $(this).val(appointmentData.ap_start_time).change();
            }           
            });
            apStartTimeBox.value = appointmentData.ap_start_time;

            $("#ap_end_time_editmode").find('option').each(function(){
            if ($(this).val() == appointmentData.ap_end_time){              
              $(this).attr("selected","selected");
              $(this).val(appointmentData.ap_end_time).change();
            }           
            });
            apEndTimeBox.value = appointmentData.ap_end_time;

            // $("#serviceAndEmp_editmode").find('option').each(function(){
            // if ($(this).val() == `${appointmentData.ap_user_id}_${appointmentData.ap_sr_id}`){              
            //   $(this).attr("selected","selected");
            //   $(this).val(`${appointmentData.ap_user_id}_${appointmentData.ap_sr_id}`).change();
            // }           
            // });

            $("#employerName_editmode").find('option').each(function(){
            if ($(this).val() == `${appointmentData.ap_user_id}`){              
              $(this).attr("selected","selected");
              $(this).val(`${appointmentData.ap_user_id}`).change();
            }           
            });

            $("#serviceName_editmode").find('option').each(function(){
            if ($(this).val() == `${appointmentData.ap_sr_id}`){              
              $(this).attr("selected","selected");
              $(this).val(`${appointmentData.ap_sr_id}`).change();
            }           
            });

           // apServiceEmpBox.value = `${appointmentData.ap_user_id}_${appointmentData.ap_sr_id}`;

            employeNameBox.value = `${appointmentData.ap_user_id}`;
            serviceNameBox.value = `${appointmentData.ap_sr_id}`;
          
            const jobStartBtn = document.getElementById("jobStartBtn");
            const jobEndBtn = document.getElementById("jobEndBtn");
            const updateAppointment = document.getElementById("update_appointment");
            
            jobStartBtn.value = appointmentData.ap_job_id;
            jobEndBtn.value = appointmentData.ap_job_id;
            updateAppointment.value = appointmentData.ap_job_id;
            console.log("BUTTON VALUE SETTLED >>> ");
            console.log("gggggg >>> " , updateAppointment.value);
          }
          }     
  });
}

function startJob(){
  const jobStartBtn = document.getElementById("jobStartBtn");
  $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>appointment/startJob",
      data: { ap_job_id: jobStartBtn.value },
      success: function(data){
        window.location.reload();
      }
     
  });
}

function finishJob(){
  const jobEndBtn = document.getElementById("jobEndBtn");
  $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>appointment/finishJob",
      data: { ap_job_id: jobEndBtn.value },
      success: function(data){
        window.location.reload();
      }
     
  });
}


function viewNewCustomerDiv(){
  document.getElementById("ap_new_customer_section").hidden = false;
  document.getElementById("ap_cust_id_section").hidden = true;
}


function hideNewCustomerDiv(){
  document.getElementById("ap_cust_id_section").hidden = false;
}



</script>


<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url(); ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- BS-Stepper -->
<script src="<?php echo base_url(); ?>plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url(); ?>plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
<!-- Page specific script -->




