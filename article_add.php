<?php
require "includes/config.php";
include "admin_header.php";
?>

<!-- Contact Form -->
<div class="container no-padding border-bottom">
    <form method="post" action="article_add.php" enctype="multipart/form-data">
        <?php
        $articleId = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

        if (isset($_POST['do_post'])) {
            $errors = array();
            if (empty(trim ($_POST['name']))) {
                $errors[] = "Введите название!";
            }
            if (empty(trim ($_POST['text']))) {
                $errors[] = "Введите текст!";
            }
            if (empty(trim ($_POST['author']))) {
                $errors[] = "Введите имя автора!";
            }
            if (empty($_POST['category_id'])) {
                $errors[] = "Выберите категорию!";
            }
            if (isset($_FILES["article-img"])) {
                $articleImgTempName = $_FILES["article-img"]["tmp_name"];
                $articleImgName = $_FILES["article-img"]["name"];
                $uploadDir = "./images/";
                move_uploaded_file($articleImgTempName, $uploadDir . $articleImgName);
            } else {
                $articleImgName = "";
            }
            if (empty($errors)) {
                if ($articleId) {
                    $query = "UPDATE articles SET title='" . $_POST['name'] . "',
                            text='" . $_POST['text'] . "',
                            category_id='" . $_POST['category_id'] . "',
                            author='" . $_POST['author'] . "' ";
                    if (!empty($articleImgName)) {
                        $query .= ", image='" . $articleImgName . "'";
                    }
                    $query .= " WHERE id={$articleId}";
                } else {
                    $articleImgName = !empty($articleImgName) ? $articleImgName : "default/default_news.png";
                    $query = "INSERT INTO articles (title, text, category_id, author, image)
                                                VALUES ('" . $_POST['name'] . "',
                                                '" . $_POST['text'] . "',
                                                '" . $_POST['category_id'] . "',                                                
                                                
                                                '" . $_POST['author'] . "',                                         
                                                '" . $articleImgName . "')";
                }
                mysqli_query($connection, $query);
                header("Location:articles_page.php");
            } else {
                if (isset ($errors)) {
                    foreach ($errors as $error) {
                        echo $error . "<br>";
                    }
                    echo "<hr>";
                }
            }
        }

        if ($articleId) {
            $articleDataQuery = "SELECT * FROM articles WHERE id={$articleId}";
            $articleData = mysqli_fetch_assoc(mysqli_query($connection, $articleDataQuery));
            $action = 'edit';
        } else {
            $action = 'add';
        }
        ?>
        <label>Название</label>
        <div class="row margin-bottom-20">
            <div class="col-md-7 col-md-offset-0">
                <?php
                if ($action == 'edit') {
                    ?>
                    <input type="hidden" name="id" value="<?php echo $articleId; ?>">
                <?php } ?>
                <?php
                if ($action == 'edit') {
                    ?>
                    <input class="form-control" type="text" name="name" value="<?php echo $articleData['title']; ?>">
                <?php } else { ?>
                    <input class="form-control" type="text" name="name">
                <?php } ?>
            </div>
        </div>
        <label>Текст</label>
        <div class="row margin-bottom-20">
            <div class="col-md-7 col-md-offset-0">
                <?php
                if ($action == 'edit') {
                    ?>
                    <input type="hidden" name="id" value="<?php echo $articleId; ?>">
                <?php } ?>
                <?php
                if ($action == 'edit') {
                    ?>
                    <input class="form-control" type="text" name="text" value="<?php echo $articleData['text']; ?>">
                <?php } else { ?>
                    <input class="form-control" type="text" name="text">
                <?php } ?>
            </div>
        </div>
        <label>Автор</label>
        <div class="row margin-bottom-20">
            <div class="col-md-7 col-md-offset-0">
                <?php
                if ($action == 'edit') {
                    ?>
                    <input type="hidden" name="id" value="<?php echo $articleId; ?>">
                <?php } ?>
                <?php
                if ($action == 'edit') {
                    ?>
                    <input class="form-control" type="text" name="author" value="<?php echo $articleData['author']; ?>">
                <?php } else { ?>
                    <input class="form-control" type="text" name="author">
                <?php } ?>
            </div>
        </div>
        <label>Категория</label>
        <div class="row margin-bottom-20">
            <div class="col-md-7 col-md-offset-0">
                <?php
                if ($action == 'edit') {
                    ?>
                    <input type="hidden" name="id" value="<?php echo $articleId; ?>">
                <?php } ?>
                <?php
                $getAllCategoriesQuery = "SELECT * FROM articles_categories";
                $getAllCategoriesResult = mysqli_query($connection, $getAllCategoriesQuery);
                ?>
                <select name="category_id">
                    <option disabled selected>Выберите категорию</option>
                    <?php
                    while ($category = mysqli_fetch_assoc($getAllCategoriesResult)) {
                        if ($category['id'] == $articleData['category_id']) {
                            echo "<option selected value='{$category["id"]}'>{$category['title']}</option>";
                        } else {
                            echo "<option value='{$category["id"]}'>{$category['title']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <label>Изображение</label>
        <?php
        if ($action == 'edit') {
            ?>
            <div class="row margin-bottom-200">
                <img src="./images/<?php echo $articleData['image']; ?>"
            </div>
        <?php } ?>
        <div class="row margin-bottom-20">
            <div class="col-md-7 col-md-offset-0">
                <input class="form-control" type="file" name="article-img">
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