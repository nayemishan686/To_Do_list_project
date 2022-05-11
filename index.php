<!-- Class.php Added -->
<?php require_once('inc/class.php') ?>

<!-- PHP CODE -->
<?php
$obj = new Admin();
if (isset($_POST['taskAddBtn'])) {
    $returnTaskMsg = $obj->addTask($_POST);
}

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
            <div class="alert alert-dark" role="alert">
                <?php echo $returnTaskMsg; ?>
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


<!-- BootStrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>