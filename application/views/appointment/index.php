
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



</style>

</head>

<div class="content-wrapper">
  <br>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Section</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post" action="<?php echo base_url('appointment/insertApointment'); ?>">
            <div class="card-body">             
              <div class="form-group">
                  <label>Select Customer</label>
                <select id="ap_cust_id" name="ap_cust_id" class="form-control select2bs4"  onchange="showCustomer(this.value)" style="width: 100%;">
                  <option selected="selected" disabled >Select Customer</option>
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

               <div class="form-group">
                  <label>Start Time</label>
                  <select id="ap_start_time" name="ap_start_time"
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


               <div class="form-group">
                  <label>Choose a Service with Users</label>
                  <div class="select2-purple">
                  <select id="serviceAndEmp" name="serviceAndEmp" class="form-control select2bs4" style="width: 100%;">                    
                     <?php
                    $i = 1;                    
                    foreach ($usersWithServices as $urs) { ?>
                        <option value="<?php echo $urs->user_id; ?>_<?php echo $urs->sr_id; ?>">
                        <?php echo $urs->user_name; ?>
                         - <?php echo $urs->sr_name; ?>
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
              <h2><?php echo $this->session->userdata("appointmentDateSelected"); ?></h2>
              <div align="right">
                
                <div class="form-group selectDate">
                  <label >Change View Date</label>
                  <div class="col-sm-3">
                    <input type="date" id="dateChange" class="form-control" value="<?php date("Y-m-d"); ?>" name="dateChange" placeholder="" onchange="changeDateOption()">
                  </div>
                </div>

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                  Book an Appointment
                </button>

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
     newButton.setAttribute("id", `button_${element.ap_user_id}_${element.ap_start_time}_${element.ap_cust_id}`);
     newButton.setAttribute("class", "btn btn-primary apointmentBtn");
     newButton.style.background = `${element.ap_color}`;
     newButton.innerHTML = `${element.cust_name} <br> Jb: ${element.ap_job_id} - Srv: ${element.sr_id} <br> ${element.ap_alocate_time}`;
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

     for (let k = startIndex+1; k < endIndex; k++) {        
        document.getElementById(`${element.ap_user_id}_${timeArr[k]}`).style.background='#E5E4E2';
       
        var dd = document.createElement('button');
        dd.innerHTML = `Jb: ${element.ap_job_id}`;
        dd.style.background = `${element.ap_color}`;
       // dd.style["border-bottom"] = `1px solid ${element.ap_color}`;
        dd.setAttribute("class", "btn btn-primary apointmentBtn");
        document.getElementById(`${element.ap_user_id}_${timeArr[k]}`).appendChild(dd);
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


// A $( document ).ready() block.
// $( document ).ready(function() {
//     console.log( "ready!" );
// });



</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


