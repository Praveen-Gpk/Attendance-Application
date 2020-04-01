<?php
include 'connection.php';
$da = $_POST["date"];
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

  <body >

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
          <div class="row">
            <div class="col-xl-12">
              <div class="card">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0"><?php
                      echo $da ?></h3>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <!-- Light table -->
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">

                      <?php

                      $sql = "SELECT start_time, end_time, college, attendance FROM task where date='$da'";
                      $result = mysqli_query($conn, $sql);

                      if (mysqli_num_rows($result) > 0) { ?>
                        
                        <thead class="thead-light">
                          <tr>
                            <th scope="col" >College</th>
                            <th scope="col" >Start Time</th>
                            <th scope="col" >End Time</th>
                            <th scope="col" >Attedence</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php while($row = mysqli_fetch_assoc($result)) { ?>

                            <tr>
                              <th scope="row">

                                <span class="name mb-0 text-sm"><?php echo $row["college"] ?></span>
                              </div>
                            </div>
                          </th>
                          <td class="budget">
                            <?php echo $row["start_time"] ?>
                          </td>
                          <td class="budget">
                            <?php echo $row["end_time"] ?>
                          </td>
                          <td>
                            <?php if($row["attendance"] == 0)
                            { ?>
                              <span class="badge badge-dot mr-4">
                                <i class="bg-warning"></i>
                                <span class="status">pending</span>
                              </span>
                            <?php }
                            else
                            {
                              ?>
                              <span class="badge badge-dot mr-4">
                                <i class="bg-success"></i>
                                <span class="status">Taken</span>
                              </span>
                            <?php } ?>
                          </td>
                          <td>
                            <?php if($row["attendance"] == 0)
                            { ?>
                              <form action="attendance.php" method="POST">
                                <input type="hidden" name="college" value=<?php echo $row["college"] ?> >
                                <input type="hidden" name="date" value=<?php echo $da ?> >
                                <div class="text-center">
                                  <input type="Submit" value="Take" class="btn btn-primary mt-2">
                                </div>
                              </form>
                            <?php }
                            else
                            {
                              ?>
                              <form action="edit.php" method="post">
                                <input type="hidden" name="college" value=<?php echo $row["college"] ?> >
                                <input type="hidden" name="date" value=<?php echo $da?> >
                                <div class="text-center">
                                  <input type="Submit" value="Edit" class="btn btn-primary mt-2">
                                </div>
                              </form>
                            <?php } ?>


                          </tr>
                        <?php }}
                        else
                        {
                          ?> <tbody>
                            <td>
                              <span class="name mb-0 text-sm text-center">No task found</span>
                            </td>
                          </tbody>
                       <?php  }
                        } ?>
                      </tbody>
                    </table>

                  </div>
                  <!-- Card footer -->

                </div>
              </div>
              <div class="row">
                <div class="col-md-4 text-center">
                  <a href="index.html" class="btn btn-secondary mt-4">
                    <span class="btn-inner--text">Go Back</span>
                  </a>
                </div>
                <div class="col-md-4 text-center">
                  <form action="reset.php" method="POST">
                    <input type="hidden" name="date" value=<?php echo $da ?> />
                    <input type="Submit" value="Reset values" class="btn btn-secondary mt-4" />
                  </form>
                </div>
                <div class="col-md-4 text-center" >
                  <form action="showall.php" method="POST">
                    <input type="Submit" value="Show All" class="btn btn-secondary mt-4" />
                  </form>
                </div>


              </div>

            </div>
            <!-- Argon Scripts -->
            <!-- Core -->

          </body>

          </html>
