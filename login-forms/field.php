<?php
include "dbconnection.php";
include "functions.php";
?>
<?php
  if(isset($_POST['webSubmit'])) {
    chooseFieldWeb();
}
if(isset($_POST['appSubmit'])) {
    chooseFieldApp();
}
if(isset($_POST['desKsubmit'])) {
    chooseFieldDesk();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Field</title>
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
</head>
<style>
</style>
<body>
    <h1 class="hA">Choose your field</h1>
    <br>
    <br>
    <br>
    <form action="field.php" method="post">
        <div class="btn-group" role="group" aria-label="Basic example">
            <input type="submit" name="webSubmit" value="WEB" class="btn btn-primary btn-lg">
            <input type="submit" name="appSubmit" value="APP " class="btn btn-primary btn-lg">
            <input type="submit" name="desKsubmit" value="DESKTOP" class="btn btn-primary btn-lg">
        </div>
    </form>
        
</body>
</html>