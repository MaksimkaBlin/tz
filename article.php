<?php
require "includes/config.php";
include "header.php";
?>
    <!-- === BEGIN CONTENT === -->
    <div id="content">
        <div class="container background-white">
            <div class="row margin-vert-30">

                <?php
                $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE id=" . (int)$_GET['id']);
                $article = mysqli_fetch_assoc($articles);
                if (isset($_POST['do_post'])) {
                    $errors = array();
                    if (empty($_POST['name'])) {
                        $errors[] = "Введите имя!";
                    }
                    if (empty($_POST['email'])) {
                        $errors[] = "Введите Email!";
                    }
                    if (empty($_POST['text'] )) {
                        $errors[] = "Введите комментарий!";
                    }
                    if (empty($errors)) {
                        $queryResult = mysqli_query($connection, "INSERT INTO comments (author, text, publication_date, article_id, email)
                                                        VALUES ('" . $_POST['name'] . "','" . $_POST['text'] . "', NOW(), '" . $article['id'] . "','" . $_POST['email'] . "')");

                        if ($queryResult) {
                            echo "Комментарий успешно добавлен <hr>";
                        }
                    }
                }

                ?>
                <!-- Main Column -->
                <div class="col-md-9">
                    <div class="blog-post">
                        <div class="blog-item-header">
                            <h2>
                                <a href="#">
                                    <?php echo $article['title']; ?>
                                </a>
                            </h2>
                            <!-- Date -->
                            <div class="blog-post-date">
                                <a href="#"> <?php echo $article['publication_date']; ?></a>
                            </div>
                            <!-- End Date -->
                        </div>
                        <div class="blog-post-details">

                            <!-- # of Comments -->
                            <div class="blog-post-details-item blog-post-details-item-left blog-post-details-item-last">
                                <a href="">
                                    <i class="fa fa-comments color-gray-light"></i>
                                    <?php
                                    $comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE  article_id=" . (int)$article['id']);
                                    $counter_comments = mysqli_num_rows($comments);
                                    echo "$counter_comments"; ?> Комментариев
                                </a>
                            </div>
                            <!-- End # of Comments -->
                        </div>
                        <div class="blog-item">
                            <div class="clearfix"></div>
                            <div class="blog-post-body row margin-top-15">
                                <div class="col-md-5">
                                    <img class="margin-bottom-20" src="images/<?php echo $article['image']; ?>" alt="image">
                                </div>
                                <div class="col-md-12">
                                    <p><?php echo $article['text']; ?></p>
                                </div>
                            </div>
                            <div class="blog-item-footer">
                                <!-- About the Author -->
                                <div class="blog-author panel panel-default margin-bottom-30">
                                    <div class="panel-heading">
                                        <h3>Про автора</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img class="pull-left" src="images/<?php
                                                    echo !empty($article['author_image'])
                                                        ? $article['author_image'] : 'default_user.jpg';
                                                ?>"
                                                     alt="image">
                                            </div>
                                            <div class="col-md-10">
                                                <label><?php echo $article['author']; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End About the Author -->
                                <!-- Comments -->
                                <div class="blog-recent-comments panel panel-default margin-bottom-30">
                                    <div class="panel-heading">
                                        <h3>Комментарии</h3>
                                    </div>
                                    <ul class="list-group">
                                        <?php
                                        if ($counter_comments == 0) {
                                            echo "<div class=\"col-md-10\"><p>НЕТ КОММЕНТАРИЕВ (((</p></div>";
                                        } else {
                                            while ($comment = mysqli_fetch_assoc($comments)) {
                                                ?>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-2 profile-thumb">
                                                            <a href="#">
                                                                <img class="media-object" src="images/<?php
                                                                echo !empty($article['author_image'])
                                                                    ? $article['author_image']
                                                                    : 'default_user.jpg';
                                                                ?>" />
                                                            </a>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <h4><?php echo $comment['author']; ?></h4>
                                                            <p><?php echo $comment['text']; ?></p>
                                                            <span class="date">
                                                    <i class="fa fa-clock-o color-gray-light"></i><?php echo $comment['publication_date']; ?></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <!-- Comment Form -->
                                        <li class="list-group-item">
                                            <div class="blog-comment-form">
                                                <div class="row margin-top-20">
                                                    <div class="col-md-12">
                                                        <div class="pull-left">
                                                            <h3>Оставьте свой комментарий</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row margin-top-20">
                                                    <div class="col-md-12">
                                                        <?php
                                                        if(isset ($errors)) {
                                                            foreach ($errors as $error) {
                                                                echo $error . "<br>";
                                                            }
                                                            echo "<hr>";
                                                        }?>
                                                        <form method="post"
                                                              action="article.php?id=<?php echo $article['id']; ?>#blog-comment-form">

                                                            <label>Имя</label>
                                                            <div class="row margin-bottom-20">
                                                                <div class="col-md-7 col-md-offset-0">
                                                                    <input class="form-control" type="text" name="name">
                                                                </div>
                                                            </div>
                                                            <label>Email
                                                            </label>
                                                            <div class="row margin-bottom-20">
                                                                <div class="col-md-7 col-md-offset-0">
                                                                    <input class="form-control" type="text"
                                                                           name="email">
                                                                </div>
                                                            </div>
                                                            <label>Комментарий</label>
                                                            <div class="row margin-bottom-20">
                                                                <div class="col-md-11 col-md-offset-0">
                                                                    <textarea class="form-control" rows="8"
                                                                              name="text"></textarea>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                <button class="btn btn-primary" type="submit"
                                                                        name="do_post">Отприваить комментарий
                                                                </button>
                                                            </p>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Comment Form -->
                                    </ul>
                                </div>
                                <!-- End Comments -->
                            </div>
                        </div>
                    </div>
                    <!-- End Blog Post -->
                </div>
                <!-- End Main Column -->
                <!-- Side Column -->
                <div class="col-md-3">
                    <!-- Blog Tags -->
                    <div class="blog-tags">
                        <h3>Tags</h3>
                        <ul class="blog-tags">
                            <li>
                                <a href="#" class="blog-tag">HTML</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">CSS</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">JavaScript</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">jQuery</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">PHP</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">Ruby</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">CoffeeScript</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">Grunt</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">Bootstrap</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">HTML5</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Blog Tags -->
                    <!-- Latest news -->
                    <div class="recent-posts">
                        <h3>Latest news</h3>
                        <ul class="posts-list margin-top-10">
                            <?php
                            $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY id DESC LIMIT 5")
                            ?><?php
                            while ($article = mysqli_fetch_assoc($articles)) {
                                ?>
                                <li>
                                    <div class="recent-post">
                                        <a href="article.php?id=<?php echo $article['id']; ?>">
                                            <img class="pull-left" src="images/<?php echo $article['image']; ?>"
                                                 alt="thumb1">
                                        </a>
                                        <a href="article.php?id=<?php echo $article['id']; ?>"
                                           class="posts-list-title"><?php echo $article['title']; ?></a>
                                        <br>
                                        <span class="recent-post-date">
                                                <?php echo $article['publication_date']; ?>
                                            </span>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                <?php
                            }
                            ?>


                        </ul>
                    </div>
                    <!-- End Latest news -->
                    <!-- End Side Column -->
                </div>
            </div>
        </div>
    </div>
    <!-- === END CONTENT === -->
<?php
include "footer.php";
?>