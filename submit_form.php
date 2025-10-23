    <?php
    // Check if the form was submitted using the POST method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Access form data
        $servername = "localhost";
        $user = "root";
        $password = "";
        $dbname = "joshwebsite"; 

        $name = $_POST['name'];
        $email = $_POST['email'];
        $msg = $_POST['message'];

        // Create connection
        $conn = new mysqli($servername, $user, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO messages (fullname, email, content)
        VALUES ('$name', '$email', '$msg')";

        if ($conn->query($sql) === TRUE) {
            echo "Thank you " . htmlspecialchars($name) . "<br>";
            echo "Your message has been sent! We will be in touch.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();


    } else {
        echo "An error has occured. Please try again later.";
    }
    ?>