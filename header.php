<?php
session_start();

if (isset($_SESSION['username'])) {
    $auth = 1;
    $role = $_SESSION['role'];

} else {
    $auth = 0;
    $role = null;

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="framework.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Online Book Store</title>
</head>

<body>

    <header>
        <div class="container ">
            <div class="header flex-between ">
                <div class="logo py-10">
                    <a href="index.php">
                        <img src="imgs/logo.png" alt="">
                    </a>
                </div>
                <nav class="navbar">
                    <ul class="d-flex justify-center align-center ">
                        <li class="py-10 mr-20">
                            <a class="c-fff fw-500 fz-20" href="index.php">Books</a>
                        </li>
                        <?php
if ($auth == 1) {
    echo '<li class="py-10 mr-20">
              <a class="c-fff fw-500 fz-20" >' . $_SESSION['username'] . '</a>
          </li>
          <li class="py-10 mr-20">
              <a class="c-fff fw-500 fz-20" href="logout.php">LogOut</a>
          </li>';
} else {
    echo '                        <li class="py-10 mr-20">
                            <a class="c-fff fw-500 fz-20" href="login.php">Login</a>
                        </li>
                        <li class="py-10 mr-20">
                            <a class="c-fff fw-500 fz-20" href="signup.php">SignUp</a>
                        </li>';
}
?>

                        <?php if ($role && $role == 'admin') {?>
                        <li class="py-10">
                            <a class="c-fff fw-500 fz-20" href="dashboard.php">Dashboard</a>
                        </li>
                        <?php } else {}?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>