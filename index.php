<?php
include "coverage/database.php";
include "includes/header.php";

$status = $_GET['status'] ?? 'all';

if($status == 'completed'){
$query = "SELECT * FROM tasks WHERE status='completed'";
}
elseif($status == 'pending'){
$query = "SELECT * FROM tasks WHERE status='pending'";
}
else{
$query = "SELECT * FROM tasks";
}

$result = $conn->query($query);
?>
<link rel="stylesheet" href="style.css">

<div class="container">

<h1>Task Manager</h1>

<a class="logout" href="auth/logout.php">Logout</a>

<div class="filters">
<a href="?status=all">All</a>
<a href="?status=pending">Pending</a>
<a href="?status=completed">Completed</a>
</div>



<hr>

<form id="taskForm">
<input name="title" id="title" placeholder="New Task">
<button type="submit">Add Task</button>
</form>

<hr>

<?php while($task = $result->fetch_assoc()){ ?>

<div class="task">

<span class="<?= $task['status']=='completed' ? 'done':'' ?>">
<?= $task['title'] ?>
</span>

<div class="actions">

<a href="tasks/update.php?id=<?= $task['id'] ?>&status=completed">
Complete
</a>

<a href="tasks/delete.php?id=<?= $task['id'] ?>">
Delete
</a>

</div>

</div>

<?php } ?>

</div>

<script>

document.getElementById("taskForm").addEventListener("submit", function(e){

e.preventDefault();

const title = document.getElementById("title").value;

fetch("tasks/create.php",{
method:"POST",
headers:{
"Content-Type":"application/x-www-form-urlencoded"
},
body:"title="+title
})
.then(()=>location.reload());

});

</script>


</body>
</html>