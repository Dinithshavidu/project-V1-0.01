
<head>
<style>
.tableCell:hover{
    cursor: pointer !important;
    background-color: #f6e58d;
}

.timeValue {
    padding-top: -20 !important;
    background-color: #00d2d3;
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
                      <option value="4.00 AM">4:00 AM</option>
                      <option value="4.30 AM">4:30 AM</option>
                      <option value="5.00 AM">5:00 AM</option>
                      <option value="5.30 AM">5:30 AM</option>
                      <option value="6.00 AM">6:00 AM</option>
                      <option value="6.30 AM">6:30 AM</option>
                      <option value="7.00 AM">7:00 AM</option>
                      <option value="7.30 AM">7:30 AM</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>End Time</label>
                  <select id="ap_end_time" name="ap_end_time"
                      class="form-control select2bs4" style="width: 100%;">
                      <option value="4.00 AM">4:00 AM</option>
                      <option value="4.30 AM">4:30 AM</option>
                      <option value="5.00 AM">5:00 AM</option>
                      <option value="5.30 AM">5:30 AM</option>
                      <option value="6.00 AM">6:00 AM</option>
                      <option value="6.30 AM">6:30 AM</option>
                      <option value="7.00 AM">7:00 AM</option>
                      <option value="7.30 AM">7:30 AM</option>
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
          <button type="submit" id="addnew_section" name="addnew_section" class="btn btn-primary">Save changes</button>
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
              <h3 class="card-title">Sections</h3>
              <div align="right">
               <a type="button" class="btn btn-warning"  onclick="addApointment2()">  
                  Add Appointment to Nirmala 4.30 - 5.30
                </a>

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                  Book an Appointment
                </button>

              </div>              
              <div class="form-group">
                <h2 id="cellCol">CELL ROW INDEX</h2>
                <h2 id="cellRow">CELL ROW INDEX</h2>               
              </div>
            </div>
         </div>

  <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">             
            <div class="table-responsive">
                <table class="table">
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
                    $i = 1;                    
                    foreach ($hoursRange as $hrs) { 
                        ?>
                <tr>   
                  <td class="timeValue">
                    <span>
                  <?php echo $hrs; ?>   
                  </span>      
                  </td>               
                    <?php
                    $i = 1;                    
                    foreach ($allUsers as $userData) { ?>
                        <td scope="col" id="<?php echo  $userData->user_id; ?>_<?php echo $hrs; ?>" class="tableCell" onload="showIndexOfCell(this)">
                            AVAILABLE
                        </td>
                        <?php $i++;
                            }
                    ?>   
                    </tr>
                    <?php
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

  console.log(787878, appoitmentData);
 
  let timeArr = [
      "3:00 AM",
      "3:30 AM",
      "4:00 AM",
      "4:30 AM",
      "5:00 AM",
      "5:30 AM",
      "6:00 AM",
      "6:30 AM",
      "7:00 AM",
      "7:30 AM",
      "8:00 AM",
      "8:30 AM",
      "9:00 AM",
      "9:30 AM",
      "10.00 AM",
      "10.30 AM",
      "11:00 AM",
      "11:30 AM",
      "12:00 AM",
      "12:30 AM",
      "1:00 AM",
      "1:30 AM",
      "2:00 AM",
      "2:30 AM",
      "3:00 PM",
      "3:30 PM",
      "4:00 PM",
      "4:30 PM",
      "5:00 PM",
      "5:30 PM",
      "6:00 PM",
      "6:30 PM",
      "7:00 PM",
      "7:30 PM",
      "8:00 PM",
      "8:30 PM",
      "9:00 PM",
      "9:30 PM",
      "10.00 PM",
      "10.30 PM",
      "11:00 PM",
      "11:30 PM",
     ];

     let startTimeElement;
     let endTimeElement;
     let newButton;

  appoitmentData.forEach((element)=>{
     startTimeElement =  document.getElementById(`${element.ap_user_id}_${element.ap_start_time}`);
     endTimeElement = document.getElementById(`${element.ap_user_id}_${element.ap_end_time}`);
    //  startTimeElement.style.background='#f9ca24';
    //  startTimeElement.innerHTML= `${element.cust_name} <br> ${element.sr_name} <br> ${element.ap_alocate_time}`;
     //endTimeElement.style.background='#f9ca24';

     newButton = document.createElement('button');
     newButton.setAttribute("id", `button_${element.ap_user_id}_${element.ap_start_time}`);
     newButton.setAttribute("class", "btn btn-primary");
     newButton.innerHTML = `${element.cust_name} <br> Jb: ${element.ap_job_id} - Srv: ${element.sr_id} <br> ${element.ap_alocate_time}`;
     startTimeElement.innerHTML= "";
     startTimeElement.style.background='#f9ca24';
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


     for (let k = startIndex+1; k < endIndex; k++) {        
        document.getElementById(`${element.ap_user_id}_${timeArr[k]}`).style.background='#f9ca24';
        document.getElementById(`${element.ap_user_id}_${timeArr[k]}`).innerHTML = "";
        var dd = document.createElement('button');
        dd.innerHTML = `Jb: ${element.ap_job_id}`;
        dd.setAttribute("class", "btn btn-primary");
        document.getElementById(`${element.ap_user_id}_${timeArr[k]}`).appendChild(dd);
      } 
  
  })

  // document.getElementById("38_4:30 AM").style.background='#f9ca24';
  // document.getElementById("38_5:00 AM").style.background='#f9ca24';
  // document.getElementById("38_5:30 AM").style.background='#f9ca24';
  // document.getElementById("38_4:30 AM").innerHTML = "topic <br> 4:30 AM"; 
  // document.getElementById("38_5:00 AM").innerHTML = "-"; 
  // document.getElementById("38_5:30 AM").innerHTML = "<br> 5:30 AM"; 
}


function showIndexOfCell(x, cust, timeD) {
        var tr = x.parentNode.rowIndex;
        var td = x.cellIndex;        
        document.getElementById("cellCol").innerHTML = "Colum index is: " + td;
        document.getElementById("cellRow").innerHTML = "Row index is: " + tr;       
}


// SELECT OPTIONS
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })
  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
// SELECT OPTIONS

</script>


