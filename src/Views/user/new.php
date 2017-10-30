<!DOCTYPE html>
<html>
    <head>
        <?php require View('template/head') ?>
    </head>
    <body>
        <div class="container">

            <?php include View('user/partial/backButton') ?>
            <?php include View('partial/errorMessage') ?>

            <form action="/users" method="POST">

                <div class="field">
                    <label class="label">Name</label>
                    <input class="input" type="text" name="name" value="<?=old('name')?>">
                </div>

                <div class="field">
                    <label class="label">Email</label>
                    <input class="input" type="email" name="email" value="<?=old('email')?>">
                </div>

                <div class="field">
                    <label class="label">Password</label>
                    <input class="input" type="password" name="password">
                </div>

                <br>
                <div class="field">
                    <input type="submit" value="Create user" class="button is-success is-fullwidth">
                </div>

            </form>
        </div>
    </body>
</html>
