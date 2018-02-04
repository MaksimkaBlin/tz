<?php
require "includes/config.php";
include "admin_header.php";
?>

<!-- Contact Form -->
<div class="container no-padding border-bottom">
    <form method="post" action="contact_add.php" enctype="multipart/form-data">
        <?php
        $contactId = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

        if (isset($_POST['do_post'])) {
            $errors = array();
            if (empty(preg_match("/[0-9]/", $_POST['phone']))) {
                $errors[] = "Введите корректный номер телефона!";
            }
            if (empty(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))) {
                $errors[] = "Введите контактный mail!";
            }
            if (empty(trim ($_POST['Eaddress']))) {
                $errors[] = "Введите контактный адрес сайта!";
            }
            if (empty($_POST['address'])) {
                $errors[] = "Введите адрес!";
            }
            if (empty(trim ($_POST['info']))) {
                $errors[] = "Введите информацию...!";
            }
            if (isset($_FILES["contact-img"])) {
                $contactImgTempName = $_FILES["contact-img"]["tmp_name"];
                $contactImgName = $_FILES["contact-img"]["name"];
                $uploaddir = "./images/";
                move_uploaded_file($contactImgTempName, $uploaddir . $contactImgName);
            } else {
                $contactImgName = "";
            }
            if (empty($errors)) {
                $query = "";
                if ($contactId) {
                    if (empty($contactImgName)) {
                        $query = "UPDATE main SET phone='" . $_POST['phone'] . "',
                            mail='" . $_POST['mail'] . "',
                            Eaddress='" . $_POST['Eaddress'] . "',                            
                            address='" . $_POST['address'] . "',
                            info='" . $_POST['info'] . "'                                                  
                            WHERE id={$contactId}";
                    } else {
                        $query = "UPDATE main SET phone='" . $_POST['phone'] . "',
                              mail='" . $_POST['mail'] . "',
                            Eaddress='" . $_POST['Eaddress'] . "',                            
                            address='" . $_POST['address'] . "',
                            info='" . $_POST['info'] . "',
                             image='" . $contactImgName . "'
                        WHERE id={$contactId}";
                    }
                } else {
                    $contactImgName = !empty($contactImgName) ? $contactImgName : "default/default_logo.png";
                    $query = "INSERT INTO main (phone, mail, Eaddress, address, info, image)
                                        VALUES ('" . $_POST['phone'] . "',
                                                '" . $_POST['mail'] . "',
                                                '" . $_POST['Eaddress'] . "',                                                
                                                '" . $_POST['address'] . "',                      
                                                '" . $_POST['info'] . "',                                         
                                                '" . $contactImgName . "')";
                }
                mysqli_query($connection, $query);
                header("Location:contacts_page.php");


            } else {
                if (isset ($errors)) {
                    foreach ($errors as $error) {
                        echo $error . "<br>";
                    }
                    echo "<hr>";
                }
            }
        }

        if ($contactId) {
            $contactDataQuery = "SELECT * FROM main WHERE id={$contactId}";
            $contactData = mysqli_fetch_assoc(mysqli_query($connection, $contactDataQuery));
            $action = 'edit';
        } else {
            $action = 'add';
        }
        ?>
        <label>Контактный телефон</label>
        <div class="row margin-bottom-20">
            <div class="col-md-7 col-md-offset-0">
                <?php
                if ($action == 'edit') {
                    ?>
                    <input type="hidden" name="id" value="<?php echo $contactId; ?>">
                <?php } ?>
                <?php
                if ($action == 'edit') {
                    ?>
                    <input class="form-control" type="text" name="phone" value="<?php echo $contactData['phone']; ?>">
                <?php } else { ?>
                    <input class="form-control" type="text" name="phone">
                <?php } ?>
            </div>
        </div>
        <label>Адрес электронной почты</label>
        <div class="row margin-bottom-20">
            <div class="col-md-7 col-md-offset-0">
                <?php
                if ($action == 'edit') {
                    ?>
                    <input type="hidden" name="id" value="<?php echo $contactId; ?>">
                <?php } ?>
                <?php
                if ($action == 'edit') {
                    ?>
                    <input class="form-control" type="text" name="mail" value="<?php echo $contactData['mail']; ?>">
                <?php } else { ?>
                    <input class="form-control" type="text" name="mail">
                <?php } ?>
            </div>
        </div>
        <label>Электронный адрес</label>
        <div class="row margin-bottom-20">
            <div class="col-md-7 col-md-offset-0">
                <?php
                if ($action == 'edit') {
                    ?>
                    <input type="hidden" name="id" value="<?php echo $contactId; ?>">
                <?php } ?>
                <?php
                if ($action == 'edit') {
                    ?>
                    <input class="form-control" type="text" name="Eaddress"
                           value="<?php echo $contactData['Eaddress']; ?>">
                <?php } else { ?>
                    <input class="form-control" type="text" name="Eaddress">
                <?php } ?>
            </div>
        </div>
        <label>Адрес</label>
        <div class="row margin-bottom-20">
            <div class="col-md-7 col-md-offset-0">
                <?php
                if ($action == 'edit') {
                    ?>
                    <input type="hidden" name="id" value="<?php echo $contactId; ?>">
                <?php } ?>
                <?php
                if ($action == 'edit') {
                    ?>
                    <input class="form-control" type="text" name="address"
                           value="<?php echo $contactData['address']; ?>">
                <?php } else { ?>
                    <input class="form-control" type="text" name="address">
                <?php } ?>
            </div>
        </div>
        <label>Информация</label>
        <div class="row margin-bottom-20">
            <div class="col-md-7 col-md-offset-0">
                <?php
                if ($action == 'edit') {
                    ?>
                    <input type="hidden" name="id" value="<?php echo $contactId; ?>">
                <?php } ?>
                <?php
                if ($action == 'edit') {
                    ?>
                    <input class="form-control" type="text" name="info" value="<?php echo $contactData['info']; ?>">
                <?php } else { ?>
                    <input class="form-control" type="text" name="info">
                <?php } ?>
            </div>
        </div>
        <label>Логотип</label>
        <?php
        if ($action == 'edit') {
            ?>
            <div class="row margin-bottom-200">
                <img src="./images/<?php echo $contactData['image']; ?>"
            </div>
        <?php } ?>
        <div class="row margin-bottom-20">
            <div class="col-md-7 col-md-offset-0">
                <input class="form-control" type="file" name="contact-img">
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