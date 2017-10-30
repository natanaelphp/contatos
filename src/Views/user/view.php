<!DOCTYPE html>
<html>
<head>
    <?php require View('template/head') ?>
</head>
<body>
    <div class="container">

        <?php include View('user/partial/backButton') ?>

        <div class="card">
            <div class="card-content">
                <div class="media">
                    <div class="media-left">
                        <figure class="image">
                            <i class="fa fa-user fa-3x" aria-hidden="true"></i>
                        </figure>
                    </div>
                    <div class="media-content">
                        <p class="title is-4"><?=$user->name?></p>
                        <p class="subtitle is-6"><?=$user->email?></p>
                    </div>
                </div>
                <br>
                <div class="content">
                    <?php require View('contact/list') ?>
                </div>
            </div>
        </div>
        <div class="space"></div>
    </div>
</body>
</html>
