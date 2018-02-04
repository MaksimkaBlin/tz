<?php
require "includes/config.php";
include "admin_header.php";
?>

<!-- Contact Form -->
<div class="container no-padding border-bottom">
    <form method="post" action="banner_add.php" enctype="multipart/form-data">
        <?php
        $bannerId = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

        if (isset($_POST['do_post'])) {
            $errors = array();
            if (empty(trim ($_POST['name']))) {
                $errors[] = "Введите название баннера!";
            }
            if (isset($_FILES["banner-img"])) {
                $bannerImgTempName = $_FILES["banner-img"]["tmp_name"];
                $bannerImgName = $_FILES["banner-img"]["name"];
                $uploaddir = "./images/";
                move_uploaded_file($bannerImgTempName, $uploaddir . $bannerImgName);
            } else {
                $bannerImgName = "";
            }
            if (empty($errors)) {
                $query = "";
                if ($bannerId) {
                    if (empty($bannerImgName)) {
                        $query = "UPDATE banners SET title='" . $_POST['name'] . "' WHERE id={$bannerId}";
                    } else {
                        $query = "UPDATE banners SET title='" . $_POST['name'] . "', image='" . $bannerImgName . "'
                        WHERE id={$bannerId}";
                    }
                } else {
                    $bannerImgName = !empty($bannerImgName) ? $bannerImgName : "default/default_banner.png";
                    $query = "INSERT INTO banners (title, image) VALUES ('" . $_POST['name'] . "','" . $bannerImgName . "')";
                }
                mysqli_query($connection, $query);
                header("Location:banners_page.php");
            } else {
                if (isset ($errors)) {
                    foreach ($errors as $error) {
                        echo $error . "<br>";
                    }
                    echo "<hr>";
                }
            }
        }

        if ($bannerId) {
            $bannerDataQuery = "SELECT * FROM banners WHERE id={$bannerId}";
            $bannerData = mysqli_fetch_assoc(mysqli_query($connection, $bannerDataQuery));
            $action = 'edit';
        } else {
            $action = 'add';
        }
        ?>
        <label>Название баннера</label>
        <div class="row margin-bottom-20">
            <div class="col-md-7 col-md-offset-0">
                <?php
                if ($action == 'edit') {
                    ?>
                    <input type="hidden" name="id" value="<?php echo $bannerId; ?>">
                <?php } ?>
                <?php
                if ($action == 'edit') {
                    ?>
                    <input class="form-control" type="text" name="name" value="<?php echo $bannerData['title']; ?>">
                <?php } else { ?>
                    <input class="form-control" type="text" name="name">
                <?php } ?>
            </div>
        </div>
        <label>Изображение баннера
        </label>
        <?php
        if ($action == 'edit') {
            ?>
            <div class="row margin-bottom-200">
                <img src="./images/<?php echo $bannerData['image']; ?>"
            </div>
        <?php } ?>
        <div class="row margin-bottom-20">
            <div class="col-md-7 col-md-offset-0">
                <input class="form-control" type="file" name="banner-img">
            </div>
        </div>
        <p>
            <button class="btn btn-primary" type="submit" name="do_post"><?php
                include "submit_button_text.php";
                ?></button>
        </p>
    </form>
    <!-- End Contact Form -->
</div>
</div>
</body>