<!DOCTYPE html>
<html>
    <head>
        <?php require View('template/head') ?>
    </head>
    <body>
        <div class="container">

            <?php include View('user/partial/backButton') ?>

            <form action="" method="POST" class="columns">

                <div class="panel column is-half is-offset-one-quarter">
                    <p class="panel-heading">Delete</p>
                    <div class="panel-block">
                        <p>
                            Are you sure you want to delete the user?<br>
                            All user contacts will be deleted too.
                            <br><br>
                            <b>Name:</b> <?=$user->name?> <br>
                            <b>Email:</b> <?=$user->email?> <br><br>
                        </p>
                    </div>
                    <div class="panel-block">
                        <input type="submit" value="Delete user" class="button is-danger is-fullwidth">
                    </div>
                </div>

            </form>
        </div>
    </body>
</html>
