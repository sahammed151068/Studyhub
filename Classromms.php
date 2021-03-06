<?php include 'templates/header.php';?>
<body>
<?php include 'templates/navbar.php';?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Classes</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Enroll in a new class
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form role="form" action="Classromms.php" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Classroom ID" name="id" type="text" autofocus>
                            </div>
                            <button type="Submit" class="btn btn-success btn-outline">Search</button>
                        </fieldset>
                    </form>

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Search Result
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Classroom id</th>
                                <th>name</th>
                                <th>department</th>
                                <th>subject</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "study";
                            error_reporting(1);
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT * FROM classroom where id=".$_POST["id"];
                            $result = mysqli_query($conn, $sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<td class="odd gradeX">'.$row["id"].'</td><td>'.$row["name"].'</td><td>'.$row["department"].'</td></td><td>'.$row["subject"].'</td><td class="center"><a href="enroll.php?classroomid='.$row["id"].'" class="btn btn-outline btn-success" role="button" aria-pressed="true">Enroll</a></td></tr>';
                                }
                            }
                            $conn->close();

                            ?>
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.panel-body -->
                <!-- /.panel-body -->
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Enrolled classes
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Role</th>
                            <th>Classroom id</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "study";
                            error_reporting(1);
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT * FROM classmember where id=".$_SESSION["userid"];
                            $result = mysqli_query($conn, $sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<td class="odd gradeX">'.$row["typee"].'</td><td>'.$row["classid"].'</td><td class="center"><a href="../Study/connection/setsession.php?classroomid='.$row["classid"].'" class="btn btn-outline btn-success" role="button" aria-pressed="true">View</a></td></tr>';
                                }
                            }
                            $conn->close();

                            ?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</body>
<?php include 'templates/footer.php';?>
<?php include 'templates/classroomcreate.php';?>
</tbody>