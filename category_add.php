<?php
require "includes/config.php";
include "admin_header.php";
?>
  
        <!-- Contact Form -->
        <div class="container no-padding border-bottom">
        <form method="post" action="category_add.php" enctype="multipart/form-data">
            <?php
            $categoryId = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

            if (isset($_POST['do_post']))
            {
                $errors = array();
                if (empty($_POST['name']))
                {
                    $errors[] = "Введите имя!";
                }
                if (isset($_FILES["category-img"])){
                    $categoryImgTempName = $_FILES["category-img"]["tmp_name"];
                    $categoryImgName = $_FILES["category-img"]["name"];
                    $uploaddir = "./images/";
                    move_uploaded_file($categoryImgTempName, $uploaddir . $categoryImgName);
                } else {
                    $categoryImgName = "";
                }
                if (empty($errors))
                {
                    $query = "";
                    if($categoryId) {
                        if (empty($categoryImgName)) {
                            $query = "UPDATE articles_categories SET title='".$_POST['name']."' WHERE id={$categoryId}";
                        } else {
                            $query = "UPDATE articles_categories SET title='" . $_POST['name'] . "', image='" . $categoryImgName . "'
                        WHERE id={$categoryId}";
                        }
                        $message = "Категория успешно обновлена <hr>";
                    } else {
                        $categoryImgName = !empty($categoryImgName) ? $categoryImgName : "default/default_category.png";
                        $query = "INSERT INTO articles_categories (title, image) VALUES ('".$_POST['name']."','".$categoryImgName."')";
                        $message = "Категория успешно добавлена <hr>";
                    }
                    mysqli_query($connection, $query);
                    header("Location:categories_page.php");
                    //echo $message;

                }else
                {
                    if(isset ($errors)) {
                        foreach ($errors as $error) {
                            echo $error . "<br>";
                        }
                        echo "<hr>";
                    }
                }
            }

            if ($categoryId) {
                $categoryDataQuery = "SELECT * FROM articles_categories WHERE id={$categoryId}";
                $categoryData = mysqli_fetch_assoc(mysqli_query($connection, $categoryDataQuery));
                $action = 'edit';
            } else {
                $action = 'add';
            }
            ?>
            <label>Название категории</label>
            <div class="row margin-bottom-20">
                <div class="col-md-7 col-md-offset-0">
                    <?php
                        if ($action == 'edit') {
                    ?>
                    <input type="hidden" name="id" value="<?php echo $categoryId; ?>">
                    <?php }?>
                    <?php
                    if ($action == 'edit') {
                    ?>
                    <input class="form-control" type="text" name="name" value="<?php echo $categoryData['title']; ?>" >
                    <?php } else {?>
                        <input class="form-control" type="text" name="name">
                    <?php }?>
                </div>
            </div>
            <label>Изображение категории
            </label>
            <?php
            if ($action == 'edit') {
            ?>
            <div class="row margin-bottom-200">
                <img src="./images/<?php echo $categoryData['image']; ?>"
            </div>
            <?php }?>
            <div class="row margin-bottom-20">
                <div class="col-md-7 col-md-offset-0">
                    <input class="form-control" type="file" name="category-img">
                </div>
            </div>
            <p>
                <button class="btn btn-primary" type="submit" name ="do_post">Отправить</button>
            </p>
        </form>
        <!-- End Contact Form -->
    </div>
    </div>
    </body>