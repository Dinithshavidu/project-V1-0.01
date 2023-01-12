
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
              <a type="button" class="btn btn-primary"href="<?php echo base_url(); ?>customer/register" >  
                  Add Customer
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

                            
                    
                        <td scope="col" class="tableCell" onclick="showIndexOfCell(this)">
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
function showCustomer(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  console.log(str)
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  console.log(str);
  console.log( `customer/profile/${str}`);
  xhttp.open("GET", `<?php echo base_url(); ?>customer/profile/${str}`, true);
  xhttp.send();
}



function showIndexOfCell(x, cust, timeD) {
        var tr = x.parentNode.rowIndex;
        var td = x.cellIndex;        
        document.getElementById("cellCol").innerHTML = "Colum index is: " + td;
        document.getElementById("cellRow").innerHTML = "Row index is: " + tr;
}


</script>