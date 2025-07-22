<?php
session_start();
include 'config.php';

//add logic
if(isset($_POST['addTask'])) {
    $task=$_POST['task'];

    if(!empty($_POST['task'])){
        $query = "INSERT INTO todo (task, date) VALUES ('$task', NOW())";
        $result = mysqli_query($conn, $query);
    }

    header("Location: task.php");
    exit();
}

// Delete Logic
if(isset($_POST['delete'])) {
    $id = intval($_POST['delete']);

    $query = "DELETE FROM todo WHERE id=$id";
    $result = mysqli_query($conn, $query);

    header("Location: task.php");
    exit();
}

//truncate whole table
if(isset($_POST['truncate'])) {

    $query = "TRUNCATE TABLE todo";
    $result = mysqli_query($conn, $query);
}
if(isset($_POST['logout'])){
    include 'logout.php';
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>To Do List</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-icons-1.13.1/bootstrap-icons.css">
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
                        <div class="d-flex justify-content-end container mt-3 ml-2">
                            <button type="submit" class="btn btn-outline-primary text-white" name="Add" data-bs-toggle="modal"
                                data-bs-target="#inputtask">Add to list</button>
                            <form action="" method="post">
                                <button type="submit" class="btn btn-outline-warning  text-white" name="truncate" onclick='alert("Are you sure you want to truncate table?")'>Truncate</button>
                                <button type="submit"  class="btn btn-outline-danger  text-white" name="logout" >Log Out</button>
                            </form>
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
                                            <form action="task.php" method="POST">
                                                <div class="mb-3">
                                                    <label for="task">Enter task you want to add:</label>
                                                    <textarea type="text" class="form-control" name="task" id="task"
                                                        rows="3"></textarea>
                                                </div>
                                                <input type="submit" class="btn btn-primary" name="addTask" value="Add" onclick="checking()">
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
                                    <table class="table table-responsive table-sm table-striped text-white text-center">
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
                                                        <td>
                                                            <form action="task.php" method="post">
                                                                <button type="submit" class="btn btn-danger" name="delete" value="<?= $row['id']?>" onclick="deleteWarning()"><i class="bi bi-trash"></i></button>
                                                            </form>
                                                        </td>
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
</html>

<script>
    function deleteWarning(){
        alert("Are you sure you want to delete? ");
    }

    function checking(){
        const task = document.getElementById('task').value.trim();
        if (task !== ""){
            alert("Task Added");
        }
        else {
            alert ("Walang laman");
        }
    }
</script>
