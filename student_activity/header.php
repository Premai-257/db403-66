<?
session_start();
if(!isset($_SESSION['user'])) {
    header('location:signin.php');
    exit;
}
require 'connection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student_activity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
  <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="./index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <img class="position-static top-20 start-100 bottom-50" src="img/aespa.png" alt="" width="180" height="">
        <span class="ms-3 fs-4">Karina rocket puncher</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a id='nav-activity'href="index.php" class="nav-link">Activity</a></li>
        <li class="nav-item"><a id='nav-report'href="report.php" class="nav-link">Report</a></li>
      </ul>
      <div class="dropdown text-end ms-2">
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="img/karina.jpg" alt="mdo" width="45" height="45" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" style="">
            <li><div class="dropdown-item text-primary"><?php echo $_SESSION['user']['studentName'];?></div></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="signout.php">Sign out</a></li>
          </ul>
        </div>
</div>
    </header>