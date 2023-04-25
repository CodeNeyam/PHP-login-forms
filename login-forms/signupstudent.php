<?php
include "dbconnection.php";
include "functions.php";

?>
<?php
  if(isset($_POST['submit'])) {
    insertStudent();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    ->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <!-- JavaScript Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
    <title>Sign up as a student</title>
  </head>
  <body>
    <div class="container">
      <div class="col-sm-6">
        <form action="signupstudent.php" method="post">
          <div class="form-group">
            <label for="fname">Firstname</label>
            <input type="text" name="firstname" class="form-control">
          </div>
          <div class="form-group">
            <label for="lname">Lastname</label>
            <input type="text" name="lastname" class="form-control">
          </div>
          <div class="form-group">
            <label for="birthday">Birthdate</label>
            <input type="date" name="birthday" class="form-control">
          </div>
          <div class="form-group">
          <label for="sex">Sex</label>
          <select class="form-select" aria-label="Default select example" name="sex">
              <option value="M">M</option>
              <option value="F">F</option>
          </select>
          </div>
          <div class="form-group">
            <label for="fname">email</label>
            <input type="text" name="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="fname">password</label>
            <input type="password" name="password" class="form-control">
          </div>
          <br>
          <input type="submit" name="submit" value="SIGNUP" class="btn btn-primary">
        </form>
      </div>
    </div>
  </body>
</html>
