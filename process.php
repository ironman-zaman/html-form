<?php
if (isset($_POST["submit"])) {
    $firstName = $_POST["first_name"];
    $lastName  = $_POST["last_name"];
    $email  = $_POST["email"];
    $color = $_POST["color"];
   
    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($color)) {
        
        /*host, username, password, dbname*/
        $link = mysqli_connect("localhost", "root", "", "register");
        
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        
        // Attempt insert query execution
        $sql = "INSERT INTO users (first_name, last_name, email, color) VALUES ('$firstName', '$lastName' , '$email', '$color')";
        if(mysqli_query($link, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        
        // Close connection
        mysqli_close($link);

    }else{
        echo "Please provide all information";
    }
}
else {
    echo "hello world";
}

?>