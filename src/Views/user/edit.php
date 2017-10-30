<!DOCTYPE html>
<html>
    <head>
        <?php require View('template/head') ?>
    </head>
    <body>
        <div class="container">

            <?php include View('user/partial/backButton') ?>
            <?php include View('partial/errorMessage') ?>

            <form action="" method="POST">

                <div class="field">
                    <label class="label">Name</label>
                    <input class="input" type="text" name="name" value="<?=old('name', $user->name)?>">
                </div>

                <div class="field">
                    <label class="label">Email</label>
                    <input class="input" type="email" name="email" value="<?=old('email', $user->email)?>">
                </div>

                <br>
                <div class="field">
                    <input type="submit" value="Update user" class="button is-warning is-fullwidth">
                </div>

            </form>
        </div>
    </body>
</html>
