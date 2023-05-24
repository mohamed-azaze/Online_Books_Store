<?php
include 'Connection.php';
include 'header.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $image = $_FILES['image']['tmp_name'];
    $pdf = $_FILES['pdf']['tmp_name'];

    $image_content = file_get_contents($image);
    $image_data = mysqli_real_escape_string($connect, $image_content);

    $pdf_content = file_get_contents($pdf);
    $pdf_data = mysqli_real_escape_string($connect, $pdf_content);

    $sql = "INSERT INTO books (Book_Name,Book_img,Book_Category,Book_PDF) VALUES
    ('$name','$image_data','$category','$pdf_data')";

    $qurey = mysqli_query($connect, $sql);

    if ($qurey) {
        header('location:/Online Books Store/');
    } else {
        echo 'error';
    }

    mysqli_close($connect);
}

?>

<section class="add-book">
    <div class="container">
        <div class="heading txt-center mt-25">
            <h1>Add New Book</h1>
        </div>
        <div class="add-book-form mt-25 w-600 mx-auto">
            <form method="POST" enctype="multipart/form-data">
                <input class="border-none ol-none place-none p-15 mb-15 border-r-5 " type="text"
                    placeholder="Enter Book Name" name="name">
                <input class="border-none ol-none place-none p-15 mb-15 border-r-5 " type="text"
                    placeholder="Enter Book Category" name="category">
                <input class="border-none ol-none place-none mb-15 border-r-5 " type="file" name="image"
                    accept="image/*">
                <input class="border-none ol-none place-none mb-15 border-r-5 " type="file" name="pdf" accept="pdf/">
                <button class="border-none ol-none place-none p-15 mb-15 border-r-5 cursor-pointer" type="submit"
                    name="submit">Add
                    Book
                </button>
            </form>
        </div>
    </div>
</section>


<?php
include 'footer.php'
?>