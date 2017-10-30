<!DOCTYPE html>
<html>
    <head>
        <?php require View('template/head') ?>
    </head>
    <body>
        <div class="container">

            <?php include View('contact/partial/backButton') ?>

            <form action="" method="POST" class="columns">

                <div class="panel column is-half is-offset-one-quarter">
                    <p class="panel-heading">Delete</p>
                    <div class="panel-block">
                        <p>
                            Are you sure you want to delete the contact?<br><br>
                            <b>Name:</b> <?=$contact->name?> <br>
                            <b>Email:</b> <?=$contact->email?> <br>
                            <b>Adress:</b> <?=$contact->adress?> <br><br>
                        </p>
                    </div>
                    <div class="panel-block">
                        <input type="submit" value="Delete contact" class="button is-danger is-fullwidth">
                    </div>
                </div>

            </form>
        </div>
    </body>
</html>
