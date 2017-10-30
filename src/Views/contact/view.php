<!DOCTYPE html>
<html>
<head>
    <?php require View('template/head') ?>
</head>
<body>
    <div class="container">

        <?php include View('contact/partial/backButton') ?>

        <div class="card">
            <div class="card-content">
                <div class="media">
                    <div class="media-left">
                        <figure class="image">
                            <i class="fa fa-address-book-o fa-3x" aria-hidden="true"></i>
                        </figure>
                    </div>
                    <div class="content media-content">
                        <p class="title is-4"><?=$contact->name?></p>
                        <p class="subtitle is-6"><?=$contact->email?></p>
                        <p class="subtitle is-6">
                            <b>Adress:</b><br>
                            <?=$contact->adress?>
                        </p>
                        <b>Phones:</b><br>
                        <ul>
                            <?php foreach ($contact->phones as $phone): ?>
                                <li><?=$phone->number?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <br>
                <div class="content">

                </div>
            </div>
        </div>
        <div class="space"></div>
    </div>
</body>
</html>
