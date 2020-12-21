<?php
 //session_start();
 // if($_SERVER['REQUEST_METHOD'] == 'POST') {

   // $username = $_POST['username'] ?? '';
    //$password = $_POST['password'] ?? '';

    // temp hardcoded values while database is completed
    //define("USER","admin");
    //define("PASSWD",'$2y$10$DSNRkMfPC3PvkmA6v7rO5OxE1sE6tob/KQY2.z0tkW2nXVjFeW6L6'); // letmein
    // Connecting sqlite3 database
    //$db = new SQLite3('test.db');
	//$query="SELECT * from users where username='" . $username . "' LIMIT 1";
	//$data = array();
	//while ($row = $USER->fetchArray(1)){
	//	array_push ($data, $row);
	//}
	//$result = $db->query($query)->fetchArray();
	//	echo $result['2'];
   	//if (password_verify($password,$result['2'])) && hash_equals($username,$result['1'])) {
     	//while ($result){
     	//	if (password_verify($password,'$2y$10$DSNRkMfPC3PvkmA6v7rO5OxE1sE6tob/KQY2.z0tkW2nXVjFeW6L6')){
      	//	header("Location:/dashboard.php");
       //	echo "Success!";}
       //	else {
      	//	 echo "Use valid cread";}
    //else{
      //echo "Error!";}
    	
    //}
  // }
//New code <?php 
    session_start();

    // initialization of variables, not required but a good practice
    $username = '';
    $password = '';
    $message  = '';
  

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    // I am using the ternary operator. 
    // https://stackoverflow.com/questions/1506527/how-do-i-use-the-ternary-operator-in-php-as-a-shorthand-for-if-else
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // as you want a SQLinjection at the login page, we need a weaker authentication, 
    // the logic would be that we store plaintext passwords in the db, so we can compare while making the query
    $db = new SQLite3('test.db');
    $query = "SELECT * FROM users where username='".$username."' and password='".$password."' limit 1";
     //echo $query;
    $request = $db->query($query);

    // sqlite 'query' returns either the row or FALSE 
    // https://www.php.net/manual/en/sqlite3.query
    if ($request) {
        $row= $request->fetchArray(SQLITE3_ASSOC);

        // the original authentication. If we implement this, it won't be vulnerable to the typical SQL injection
        // if(password_verify($password, $row['password']) && hash_equals($username, $row['username'])) {

        // the new verification checks that only one row (3 field) is returned
        if(count($row)==3) {
            $_SESSION['id'] = "l33t";
            $_SESSION["flag"] = "super_secret_flag";
            header("Location:/dashboard.php");
        }else{
        $message = 'Incorrect credentials, please try again';
        }
    }
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
                    <small id="usernameHelp" class="form-text text-muted">super secure login-inject</small>
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
