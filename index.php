<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>A blog application</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #0d2a4a;
        }
    </style>

</head>

<body>
    <div class="container my-4">
        <div class="row">
            <div class="col-sm">
                <div class="card px-5" style="background-color:#234465;">
                    <div class="card-body">
                        <h3 class="text-center text-white">To Do List</h3>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" name="Add" data-bs-toggle="modal"
                                data-bs-target="#inputtask">Add to list</button>
                            <!--------------------------------------modal form ---------------------------------------------------->
                            <div class="modal fade" id="inputtask" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!--------------------------------------main form ---------------------------------------------------->
                                            <form action="index.php" method="POST">
                                                <div class="d-flex justify-content-end">
                                                    <input class="form-control" type="text" id="taskID"
                                                        style="width:5rem;" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="task">Enter task you want to add:</label>
                                                    <textarea type="text" class="form-control" name="task" id="task"
                                                        rows="3"></textarea>
                                                </div>
                                                <input type="submit" class="btn btn-primary" name="addTask" value="Submit"
                                                    onclick='alert("Task Added")'>
                                            </form>
                                            <!--------------------------------------end of main form ---------------------------------------------------->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--------------------------------------end of modal form ---------------------------------------------------->
                        </div>
                        <!-------------------------------------- Start of Task Table ---------------------------------------------------->
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col">
                                    <table class="table table-striped text-white text-center">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Task</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query = "SELECT * FROM todo ORDER BY id ASC";
                                                $result = mysqli_query($conn, $query);
                                            ?>
                                            <?php if (mysqli_num_rows($result) > 0) {
                                                    while($row = mysqli_fetch_assoc($result)) {?>
                                                    <tr>
                                                        <td><?php echo $row['id'] ?> </td>
                                                        <td><?php echo $row['task'] ?> </td>
                                                        <td><?php echo $row['date'] ?> </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--------------------------------------end of task Table ---------------------------------------------------->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php 
if(isset($_POST['addTask'])){
    $task=$_POST['task'];

    $query = "INSERT INTO todo (task, date) VALUES ('$task', NOW())";
    $result = mysqli_query($conn, $query);
}
?>
</html>