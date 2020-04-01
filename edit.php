<?php
include 'connection.php';
$id = 0;
$absent = 0;
$da = $_POST["date"];
$clg=$_POST["college"];
$idv=0;
$present=0;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn) { ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Attendence</title>
    <!-- Favicon -->
    
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  </head>

  <body>
    <!-- Main content -->
    <div class="main-content" id="panel">

      <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">

            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                
              </div>
            </div>
          </div>
          
          <!-- Page content -->
          
          <div class="row">
            <div class="col-xl-12">
              <div class="card">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0"><?php $clg=$_POST["college"];
                      echo $clg; echo " on ".$da; ?>
                    </h3>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <!-- Projects table -->
                <form action="submit.php" method="POST">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Student Name</th>
                        <th scope="col">Present/Absent</th>
                      </tr>
                    </thead>
                    <tbody class="list">
                      <tr>
                        <?php

                        $sql = "SELECT `stu_names`,`$da` FROM $clg ";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                          while($row = mysqli_fetch_assoc($result)) { ?>
                            
                            <td>
                              <?php echo $row['stu_names']; ?>
                            </td>

                            <td>
                              <?php if( $row[$da] == 1)
                              { ?>
                                <i class="ni ni-circle-08" id="<?php echo $id++ ?>" style="font-size:20px;color:green;align-items:center" onclick="myclr(id)"></i>
                                
                                <input id = "<?php echo $idv."a";
                                $idv++; ?>" type="hidden" name=<?php echo $row["stu_names"]; ?> value="1"/>
                                <?php $present=$present+1; ?>
                              <?php }
                              else
                              {
                                ?>
                                <i class="ni ni-circle-08" id="<?php echo $id++ ?>" style="font-size:20px;color:red;align-items:center" onclick="myclr(id)"></i>
                                <input id = "<?php echo $idv."a";
                                $idv++; ?>" type="hidden" name=<?php echo $row["stu_names"]; ?> value="0"/>
                                <?php $absent=$id-$present; ?>
                              <?php  } ?>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <input type="hidden" name="college" value="<?php echo $clg ?>">
            <input type="hidden" name="date" value="<?php echo $da ?>">
            <input type="hidden" name="count" value="<?php echo $id ?>">


            <div class="row">
              <div class="col-xl-4 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Total No. of Students</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo $id ?></span>
                      </div>
                      <div class="col-auto">
                        <div >
                          <i class="ni ni-circle-08" style="font-size:48px;"></i>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Present</h5>
                        <span class="h2 font-weight-bold mb-0" id="present"><?php echo $present ?></span>
                      </div>
                      <div class="col-auto">
                        <div >
                          <i class="ni ni-circle-08" style="font-size:48px;color:green;"></i>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Absent</h5>
                        <span class="h2 font-weight-bold mb-0" id="absent"><?php echo $absent ?></span>
                      </div>
                      <div class="col-auto">
                        <div >
                          <i class="ni ni-circle-08" style="font-size:48px;color:red"></i>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="row col-lg-1 col-md-6 center"  >
              <div class="text-center col-lg-1" >
                <input type="Submit" class="btn btn-secondary mt-4" >
              </div>
            </form>
            <form action="taskdis1.php" method="POST">
              <input type="hidden" name="date" value="<?php echo $da ?>">
              <div class="text-center col-lg-1" >
                <input type="Submit" class="btn btn-secondary mt-4" value="Go Back" >
              </div>
            </div>
          </form>

          <script>
            presentsc=<?php echo $present ?>;
            absentsc=<?php echo $absent ?>;
            function myclr(wr) {

              var x = document.getElementById(wr);
              if (x.style.color == "green") {
               x.style.color = "red";
               
               presentsc--;
               absentsc++;

               document.getElementById("present").innerHTML = presentsc ;
               document.getElementById("absent").innerHTML =  absentsc ;
               document.getElementById(wr.concat("a")).value = 0;
             }
             else {
               x.style.color = "green";
               
               presentsc++;
               absentsc--;

               document.getElementById("present").innerHTML = presentsc ;
               document.getElementById("absent").innerHTML = absentsc ;
               document.getElementById(wr.concat("a")).value = '1';
             }
           }
         </script>
         
       </body>

       </html>
     <?php }} ?>
