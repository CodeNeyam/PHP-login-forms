<?php
session_start();


if(isset($_SESSION["id"])) 
    header("Location: page_user.php");


$conn = new mysqli("localhost","root","","clubs");





if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password =$_POST['password'];

    $query  = "SELECT * FROM clients WHERE email = '$email'";
    $result = $conn->query($query);
    if($row = $result->fetch_assoc()){
        $idvar = $row['id'];
        $prenomVar =$row['prenom'];
        $varNom=$row['nom'];
        $varVille=$row['ville'];
        $varDate=$row['date'];
        $varSex=$row['sex'];
        $varPassword=$row['password'];
        $varEmail=$row['email'];



    }

    $sl ="SELECT * FROM clients WHERE email='$email' and password ='$password'";
    $res = mysqli_query($conn,$sl);

    $rownum=mysqli_num_rows($res);
    if($rownum == 1){
        while($row=mysqli_fetch_array($res)){
            $_SESSION['id']=$idvar;
            $_SESSION['prenom']=$prenomVar;
            $_SESSION['nom']=$varNom;
            $_SESSION['ville']=$varVille;
            $_SESSION['date']=$varDate;
            $_SESSION['sex']=$varSex;
            $_SESSION['password']=$varPassword;
            $_SESSION['email']=$varEmail;
             
           
            header("location:page_user.php?id=" . $_SESSION['id']);
         

        }
    }
    else{ 
      echo  "<div class=  'alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>email or password inccorect !</strong> try again.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                
    }
}



?>


<?php
session_start(); 

include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: index.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: index.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['user_name'] === $uname && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['user_name'] = $row['user_name'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['id'] = $row['id'];

                header("Location: home.php");

                exit();

            }else{

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="project.css" />
    <title>login</title>
</head>
<body class="bb">
    <nav class="navbar bg-black">
        <div class="container">
        <img src="imgs/logo.png" alt="">
        <a href="#" class="nav text-white">OFFRES SPECIALES</a>
        <a href="#" class="nav text-white">PROMOSIONS</a>
        <a href="#" class="nav text-white">A PROPOS</a>
        <a href="contact.php" class="nav text-white">CONTACT</a>
        <form class="d-flex" role="search">
        
          <input
            class="form-control btn-success me-2 rounded-pill"
            type="button"
            value="LOGIN"
            onclick="location.href='login.php'"
          />
          <input
            class="form-control btn-primary me-2 rounded-pill"
            type="button"
            value="SIGN UP"
            onclick="location.href='insert.php'"
          />
        </form>
      </nav>
      <div class="container">
        <div class="row">
          
            <div class="col-6">
                <br><br><br><br>
            <form class="shadow p-3 mb-5 bg-body rounded">
                 <h2 class="h2">Se connecter via vos réseaux sociaux</h2><br>
                 <p class="p_login"> Vous pouvez connecter facilement et trés rapidement via vos comptes sociaux.</p>
                 <input type="button" class="form-control bg-primary text-white" value="SE CONNECTER VIA FACEBOOK"><br>
                 <input type="button" class="form-control bg-danger text-white" value="SE CONNECTER VIA GOOGLE">
                 <br><br>
            </form>
                
            </div>
            <div class="col-6 ">
                <br><br><br><br>
                <form class="shadow p-3 mb-5 bg-body rounded" action="login.php" method="post">
                      <h2 class="h2">Se connecter avec votre email</h2> <br>
                <label class="p_login">Votre adresse email</label><br><br>
                <input type="email" class="form-control" placeholder="Votre email" name="email" required><br>
                <label class="p_login">Mot de passe</label><br><br>
                <input type="password" class="form-control" placeholder="Mot de passe" name="password" required><br>
                <input type="checkbox"> Se souvenir de moi <br><br>
                <input type="submit" class="form-control bg-success text-white" value="SE CONNECTER" name="login"><br>
                <button type="button" class="form-control btn btn-outline-secondary"  >J'AI OUBLIE MOT DE PASSE</button> <br><br>
                <input type="button" class="form-control bg-warning text-white" value="CREE UN COMPTE GRATUITEAMANT" onclick="location.href='insert.html'">
                </form>
              
            </div>
                
        </div>

      </div>
      
 
     
</body>
</html