<?php
include 'Connection.php';

include 'header.php';

$qury = "SELECT * FROM books";

$result = mysqli_query($connect, $qury) or die("Error");

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['all'])) {
    $qury = "SELECT * FROM books";

    $result = mysqli_query($connect, $qury) or die("Error");

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} elseif (isset($_GET['business'])) {
    $qury = "SELECT * FROM books WHERE Book_Category = 'Business'";

    $result = mysqli_query($connect, $qury) or die("Error");

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} elseif (isset($_GET['cooking'])) {
    $qury = "SELECT * FROM books WHERE Book_Category = 'Cooking'";

    $result = mysqli_query($connect, $qury) or die("Error");

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} elseif (isset($_GET['programing'])) {
    $qury = "SELECT * FROM books WHERE Book_Category = 'Programing'";

    $result = mysqli_query($connect, $qury) or die("Error");

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

mysqli_close($connect);

?>



<section class="banner">
    <div class="container">
        <div class="heading txt-center pos-relative w-600 mx-auto">
            <div>
                <h1>Books Store</h1>
            </div>
            <span class="pos-absolute">Books Store</span>
        </div>
    </div>
</section>


<section class="books-container">
    <div class="container">
        <div class="books-heading txt-center mt-15">
            <h2>New Books</h2>
        </div>
        <div class="content d-flex align-start justify-center mt-25">
            <div class="books ">
                <div class="row w-full d-flex justify-start align-center
                        flex-wrap gap-25 pl-25 ">
                    <?php

if ($data > 0) {
    foreach ($data as $col) {

        echo '<div class="col">
<div class="image pos-relative">
<img class="w-full maxh-100"  src="data:image/jpeg;base64,' . base64_encode($col['Book_img']) . '"  alt="">


    <div class="buttons ">
        <a href="ViewFiles.php?id=' . $col['id'] . '" target="_blanck"  class="border-none ol-none
                bg-transparent" title="Read Book">
            <i class="fa-solid fa-book-open"></i>
        </a>
        <a href="download.php?id=' . $col['id'] . '" class="border-none ol-none
                bg-transparent" title="Download">
            <i class="fa-solid fa-download"></i>
        </a>
    </div>
</div>
<div class="book-title txt-center">
    <span>' . $col['Book_Name'] . '</span>
</div>

</div>';
    }
}
?>



                </div>
            </div>
            <div class="menu-filter">
                <ul>
                    <li class="menu-heading">Category</li>
                    <li><a href="index.php?all">All</a></li>
                    <li><a href="index.php?business">Business</a></li>
                    <li><a href="index.php?cooking">Cooking</a></li>
                    <li><a href="index.php?programing">Programing</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
include 'footer.php'
?>