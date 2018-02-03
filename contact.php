<?php
include "header.php";
?>
            <!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!-- Main Column -->
                        <div class="col-md-9">
                            <!-- Main Content -->
                            <div class="headline">
                                <h2>Contact Form</h2>
                            </div>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas feugiat. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor
                                sit amet, consectetur adipiscing elit landitiis.</p>
                            <br>
                            <!-- Contact Form -->
                            <form method="post" action="contact.php">
                                <?php
                                if (isset($_POST['do_post']))
                                {
                                    $errors = array();
                                    if (empty($_POST['name']))
                                    {
                                        $errors[] = "Введите имя!";
                                    }

                                    if (empty($_POST['email']))
                                    {
                                        $errors[] = "Введите Email!";
                                    }

                                    if (empty($_POST['text']))
                                    {
                                        $errors[] = "Введите комментарий!";
                                    }

                                    if (empty($errors))
                                    {
                                        mysqli_query($connection, "INSERT INTO users (user_name, email, text)
                                                        VALUES ('" . $_POST['name'] . "','".$_POST['email']."','".$_POST['text']."')");
                                        echo "Сообщение успешно отправленно <hr>";

                                    }else
                                    {
                                        foreach ($errors as $error) {
                                            echo $error . "<br>";
                                        }
                                        echo "<hr>";
                                    }
                                }
                                ?>
                                <label>Имя</label>
                                <div class="row margin-bottom-20">
                                    <div class="col-md-7 col-md-offset-0">
                                        <input class="form-control" type="text" name="name" >
                                    </div>
                                </div>
                                <label>Email
                                </label>
                                <div class="row margin-bottom-20">
                                    <div class="col-md-7 col-md-offset-0">
                                        <input class="form-control" type="text"name="email" >
                                    </div>
                                </div>
                                <label>Сообщение</label>
                                <div class="row margin-bottom-20">
                                    <div class="col-md-11 col-md-offset-0">
                                        <textarea class="form-control" rows="8" name="text" ></textarea>
                                    </div>
                                </div>
                                <p>
                                    <button class="btn btn-primary" type="submit" name ="do_post">Отпрaвить сообщение</button>
                                </p>
                            </form>
                            <!-- End Contact Form -->
                            <!-- End Main Content -->
                        </div>
                        <!-- End Main Column -->
                        <!-- Side Column -->
                        <div class="col-md-3">
                            <!-- Recent Posts -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Contact Info</h3>
                                </div>
                                <?php
                                    $contacts = mysqli_query($connection, "SELECT * FROM `main` ORDER BY id DESC");
                                    $contact = mysqli_fetch_assoc($contacts);
                                    ?>

                                <div class="panel-body">
                                    <p><?php echo mb_substr($contact['info'], 0, 200, 'utf-8'); ?></p>
                                    <ul class="list-unstyled">
                                        <li>
                                            <i class="fa-phone color-primary"></i><?php echo $contact['phone']; ?></li>
                                        <li>
                                            <i class="fa-envelope color-primary"></i><?php echo $contact['mail']; ?></li>
                                        <li>
                                            <i class="fa-home color-primary"></i><?php echo $contact['Eaddress']; ?></li>
                                        <li>
                                            <i class="fa-home color-primary"></i><?php echo $contact['address']; ?></li>
                                    </ul>
                                    <ul class="list-unstyled">
                                        <li>
                                            <strong class="color-primary">Monday-Friday:</strong>9am to 6pm</li>
                                        <li>
                                            <strong class="color-primary">Saturday:</strong>10am to 3pm</li>
                                        <li>
                                            <strong class="color-primary">Sunday:</strong>Closed</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End recent Posts -->
                            <!-- About -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">About</h3>
                                </div>
                                <div class="panel-body">
                                    <?php echo mb_substr($contact['info'], 0, 200, 'utf-8'); ?>
                                </div>
                            </div>
                            <!-- End About -->
                        </div>
                        <!-- End Side Column -->
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->
            <?php
include "footer.php";
?>