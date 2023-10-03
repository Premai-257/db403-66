<?
 require 'connection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student_Activity-Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      html,
      body {
        height: 100%;
      }

      .form-singup {
        max-width: 330px;
        padding: 1rem;
      }

      .form-singup .form-floating:focus-within {
        z-index: 2;
      }

      .form-singup input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }

      .form-singup input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
    </style>
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-singup w-100 m-auto">
      <form>
        <img class="mb-4" src="img/logo.png" alt="" width="333" height="auto">
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
    
        <div class="input-group mb-3">
  <span class="input-group-text">ID</span>
  <div class="form-floating">
    <input type="text" class="form-control" id="Student-ID" placeholder="Username">
    <label for="Student-ID">Student ID</label>
  </div>
</div>
<div class="input-group mb-3">
  <span class="input-group-text">Name</span>
  <div class="form-floating">
    <input type="text" class="form-control" id="Student-Name" placeholder="Username">
    <label for="Student-Name">Student Name</label>
  </div>
</div>
<div class="form-floating mb-2">
          <select class="form-control" id="major">
        <?php 
            $sql = 'select * from major order by faculty';
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value ='{$row['major']}'>
                {$row['faculty']}-{$row['major']}
                </option>";
            }
            $conn->close();
        ?>
        </select>
        <label for="major">major<label>
</div>
<div class="input-group mb-3">
  <span class="input-group-text">Key</span>
  <div class="form-floating">
    <input type="text" class="form-control" id="Password" placeholder="Username">
    <label for="Password">Password</label>
  </div>
</div>
<div class="input-group mb-3">
  <span class="input-group-text">Key</span>
  <div class="form-floating">
    <input type="text" class="form-control" id="Confirm-Password" placeholder="Username">
    <label for="Confirm-Password">Confirm Password</label>
  </div>
</div>
    
        <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
        <!-- <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p> -->
      </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>