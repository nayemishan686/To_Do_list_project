<!-- Class.php Added -->
<?php require_once('inc/class.php') ?>

<!-- PHP CODE -->
<?php
$obj = new Admin();

// PHP CODE FOR Add Task 
if (isset($_POST['taskAddBtn'])) {
    $returnTaskMsg = $obj->addTask($_POST);
}

// PHP CODE FOR Display Task 
$returnTaskData = $obj->displayTask();


$task = $_GET['task'] ?? 'allTask';
?>
<!-- Header Added -->
<?php require_once('inc/template/header.php'); ?>
<h1 class="text-primary text-center">Goal Tracker</h1>
<!-- Navbar Added -->
<?php require_once('inc/template/nav.php'); ?>

<!-- Design for add task -->
<?php
if ('addTask' == $task) :
?>
    <form method="post" action="">
        <?php
        if (isset($returnTaskMsg)) :
        ?>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
            </svg>

            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    <?php echo $returnTaskMsg; ?>
                </div>
            </div>
        <?php
        endif;
        ?>
        <div class="mb-3 form-group">
            <label for="taskName" class="form-label">Task Name :</label>
            <input type="text" class="form-control" name="taskName" placeholder="Enter Your Task" required>
        </div>
        <div class="mb-3 form-group">
            <label for="taskDate" class="form-label">Task Date</label>
            <input type="date" name="taskDate" id="" class="form-control">
        </div>
        <button type="submit" name="taskAddBtn" class="btn btn-primary">Submit</button>
    </form>
<?php
endif;
?>


<!-- Design for Display task -->
<?php
if ('allTask' == $task) :
?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th scope="col text-center">Task Name</th>
                <th scope="col text-center">Task Date</th>
                <th scope="col text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($dTask = mysqli_fetch_assoc($returnTaskData)) {
            ?>
                <tr>
                    <td><input class="label-inline" type="checkbox" value=""></td>
                    <td><?php echo $dTask['task_name']; ?></td>
                    <td><?php echo $dTask['task_date']; ?></td>
                    <td>
                        <a href="#" class="btn btn-danger">Delete</a> |
                        <a href="#" class="btn btn-success">Complete</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
<?php
endif;
?>

<!-- BootStrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>