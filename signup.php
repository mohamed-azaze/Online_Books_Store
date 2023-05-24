<?php
include 'Connection.php';

include 'header.php';
$emailExists = false;

if (isset($_POST['submit'])) {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $verifySql = "SELECT email FROM users WHERE email = '$_POST[email]'";
        $verifyquery = mysqli_query($connect, $verifySql);
        $result = mysqli_fetch_assoc($verifyquery);

        if (!$result) {
            if (strlen($_POST['password']) >= 8) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
                $query = mysqli_query($connect, $sql);

                session_start();
                $_SESSION['username'] = $_POST['name'];
                $_SESSION['role'] = 'user';

                header('location:/Online Books Store/');
                exit();

            } else {
                echo '<script> alert("password should be at least 8 character") </script>';

            }
        } else {
            $emailExists = "This Email Already Exists<br>you can try login with this email <a href='login.php'>login</a>";
        }

    } else {
        echo '<script> alert("all field required") </script>';

    }
    mysqli_close($connect);
}

?>



<section class="signup">
    <div class="container">
        <div class="heading txt-center mt-25">
            <h1>Sign Up</h1>
        </div>
        <div class="signup-form mt-25 w-400 mx-auto">
            <form method="POST">
                <input class="border-none ol-none p-10 mb-15  w-full" type="text" name="name"
                    placeholder="First and Last Name">
                <input class="border-none ol-none p-10 mb-15  w-full" type="email" name="email" placeholder="Email">
                <input class="border-none ol-none p-10 mb-15  w-full" type="password" name="password"
                    placeholder="Password">
                <?php if ($emailExists) {?>
                <span href="#"><?php echo $emailExists; ?></span>
                <?php } else {}?>
                <button class="border-none ol-none p-10 mb-15  w-full cursor-pointer" type="submit" name="submit">
                    Sign up
                </button>
            </form>
        </div>
    </div>
</section>


<?php
include 'footer.php'
?>