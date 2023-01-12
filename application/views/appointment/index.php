
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
              <a type="button" class="btn btn-primary"  onclick="addApointment()">  
                  Add Appointment to Sameera 3.30 - 4.00
                </a>

                <a type="button" class="btn btn-warning"  onclick="addApointment2()">  
                  Add Appointment to Akila 4.30 - 5.30
                </a>
              </div>
              
              <div class="form-group">
                <h2 id="cellCol">CELL ROW INDEX</h2>
                <h2 id="cellRow">CELL ROW INDEX</h2>
               
              </div>

            </div>
            <!-- /.card-header -->
          <!-- /.card-body -->
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
                    foreach ($retrieveCustomers as $customerData) { ?>
                        <th scope="col">
                        <?php echo $customerData->cust_name; ?>
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
                    foreach ($retrieveCustomers as $customerData) { ?>

                            
                    
                        <td scope="col" id="<?php echo $customerData->cust_name; ?>_<?php echo $hrs; ?>" class="tableCell" onclick="showIndexOfCell(this)">
                        <!-- <
                            ?php echo $customerData->cust_id; ?> -->
                            CELL DATA
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
            <!-- /.card-header -->
          <!-- /.card-body -->
         </div>
  
        <!-- /.row -->
    </div>
      <!-- /.container-fluid -->
  </section>


  
</div>

<script>

function addApointment(str) {
  document.getElementById("Sameera_3:30 AM").style.background='#0984e3';
  document.getElementById("Sameera_3:30 AM").innerHTML = "topic <br> 3:30 AM - 4.00 AM"; 
}


function addApointment2(str) {
  document.getElementById("Akila_4:30 AM").style.background='#f9ca24';
  document.getElementById("Akila_5:00 AM").style.background='#f9ca24';
  document.getElementById("Akila_5:30 AM").style.background='#f9ca24';
  document.getElementById("Akila_4:30 AM").innerHTML = "topic <br> 4:30 AM"; 
  document.getElementById("Akila_5:00 AM").innerHTML = "-"; 
  document.getElementById("Akila_5:30 AM").innerHTML = "<br> 5:30 AM"; 
}



function showIndexOfCell(x, cust, timeD) {
        var tr = x.parentNode.rowIndex;
        var td = x.cellIndex;        
        document.getElementById("cellCol").innerHTML = "Colum index is: " + td;
        document.getElementById("cellRow").innerHTML = "Row index is: " + tr;       
}




</script>
