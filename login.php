<?php 

   require_once("section/header.php");
   if (isset($_POST["register"])) {
      $name = $_POST["name"];
      $pass = $_POST["pass"];
      $email = $_POST["email"];
      
      require_once("conn.php");

      $sql="INSERT INTO users(name, pass, email) VALUES ('$name','$pass','$email')";
      if($conn->query($sql)===TRUE){
            header("Location:login.php");
         }
         else{
            echo "ERROR".$sql."<br>".$conn->error;
         }
         $conn->close();
      

   }else if (isset($_POST["signin"])) {
      $name = $_POST["name"];
      $pass = $_POST["pass"];
      
      require_once("conn.php");
      $sql = "SELECT * FROM users WHERE name = '$name' AND pass = '$pass' ";
      $result = $conn->query($sql);

     if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
             $_SESSION['name'] = $row['name'];
             $_SESSION['pass'] = $row['pass'];
             header("Location: index.php");
         }}
       else {  
          echo "<script>alert('User not found')</script>";
      }
      $conn->close();
   }
?>
    
   <link rel="stylesheet" href="css/style.css">

   <div class="login-page">
      <div class="form">

         <form class="register-form" method="post">
            <input type="text" placeholder="name" name="name"/>
            <input type="password" placeholder="password" name="pass"/>
            <input type="text" placeholder="email address" name="email"/>
            <input type="submit" value="Create" id="but" name="register"/>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
         </form>


         <form method="post" class="login-form">
            <input type="text" placeholder="username" required name="name"/>
            <input type="password" placeholder="password" required name="pass"/>
            <input type="submit" value="Login" id="but" name="signin"/>
         <p class="message">Not registered? <a href="#">Create an account</a></p>
         </form>

      </div>
   </div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>

    
    
