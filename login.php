<?php
include 'Connection.php';

include 'header.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";

    $query = mysqli_query($connect, $sql);

    $user = mysqli_fetch_assoc($query);
    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['username'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        header('location:/Online Books Store/');
        exit();

    } else {
        echo '<script>alert("invalid Email or Password")</script>';
    }

    mysqli_close($connect);
}
?>



<section class="login">
    <div class="container">
        <div class="heading txt-center mt-25">
            <h1>Login</h1>
        </div>
        <div class="login-form mt-25 w-400 mx-auto">
            <form method="POST">
                <input class="border-none ol-none p-10 mb-15  w-full" type="email" name="email"
                    placeholder="Enter your Email" required value="admin@admin.com">
                <input class="border-none ol-none p-10 mb-15  w-full" type="password" name="password"
                    placeholder="Password" required value="12345678">
                <button class="border-none ol-none p-10 mb-15  w-full cursor-pointer" type="submit" name="submit">
                    Login
                </button>
            </form>
        </div>
    </div>
</section>


<?php
include 'footer.php'
?>