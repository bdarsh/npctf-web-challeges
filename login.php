<?php
 session_start();
  if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';


    // temp hardcoded values while database is completed
    define("USER","admin");
    define("PASSWD",'$2y$10$DSNRkMfPC3PvkmA6v7rO5OxE1sE6tob/KQY2.z0tkW2nXVjFeW6L6'); // letmein

    if(password_verify($password,PASSWD) && hash_equals($username, USER)) {
       header("Location:/dashboard.php");
       echo "Success!";
       }
    else{
       echo "Error!";}
    	
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Test CTF. Design based on bootstrap 'Cover' example">
        <meta name="author" content="Drash">
        <meta  >
        <title>NPCTF - Darsh</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link href="cover.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
            <div class="inner">
            <h3 class="masthead-brand">NPCTF</h3>
            <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="#">Home</a>
            </nav>
            </div>
            </header>

            <main class="form-signin">
  		<form action="/login.php" method="post">
  		<h1 class="h3 mb-3 fw-normal">Please Sign In!!</h1>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="usernameHelp">
                    <small id="usernameHelp" class="form-text text-muted">super secure login</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
</main>
	<footer class="mastfoot mt-auto">
                <div class="inner">
                    <p>Made with ♥️ by #Itachi09.</p>
                </div>
        </footer>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>

