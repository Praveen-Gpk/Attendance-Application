<?php
include 'connection.php';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn) { 

 ?>
 <!DOCTYPE html>
 <html>

 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Task</title>
  <!-- Favicon -->
 
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>

  <!-- Main content -->

  <div class="main-content" id="panel">

    <div class="header bg-primary pb-8">
      <div class="container-fluid">
        <div class="header-body">

          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">

            </div>
          </div>
        </div>



        <!-- Page content -->

        <?php 
        $sqlmain="SELECT table_name FROM information_schema.tables WHERE table_schema ='face'";
        $resultmain=mysqli_query($conn,$sqlmain);
        if(mysqli_num_rows($resultmain)>0)
        {
          while ($rowmain=mysqli_fetch_assoc($resultmain)) {
            ?>

            <div class="col-xl-12">
              <div class="card">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">
                        <?php
                        $tempmain= $rowmain["table_name"];
                        echo $rowmain["table_name"] ?>
                      </h3>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <?php 
                        $dummy = 1;
                        $sqlcol="SHOW COLUMNS FROM `$tempmain`  ";
                        $resultcol=mysqli_query($conn,$sqlcol);
                        if(mysqli_num_rows($resultcol)>0)
                        {
                          while ($rowcol=mysqli_fetch_assoc($resultcol)) {
                            ?>
                            <th scope="col" ><?php echo $rowcol['Field']; ?></th>
                          <?php }} ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $sqlrow="SELECT * from `$tempmain`  ";
                        $resultrow=mysqli_query($conn,$sqlrow);
                        if(mysqli_num_rows($resultrow)>0)
                        {
                          while ($rowrow=mysqli_fetch_assoc($resultrow)) {
                            ?>
                            <tr>
                              <?php 
                              $resultcol=mysqli_query($conn,$sqlcol);
                              if(mysqli_num_rows($resultcol)>0)
                              {
                                while ($rowcol=mysqli_fetch_assoc($resultcol)) {
                                  $tempcool = $rowcol["Field"];
                                  ?>
                                  <td scope="col" ><?php echo $rowrow[$tempcool]; ?></td>
                                <?php }} ?>
                              <?php }} ?>
                            </tr>



                          </tbody>
                        </table>
                      </div>
                    </div>


                  </div>
                <?php }}} ?>
                <div class="row">
                  <div class="col text-center" >
                    <a href="index.html" class="btn btn-secondary mt-4">
                      <span class="btn-inner--text">Go Home</span>
                    </a>
                  </div>
                </div>
                <!-- Argon Scripts -->
                <!-- Core -->

              </body>

              </html>
