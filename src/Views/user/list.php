<!DOCTYPE html>
<html>
    <head>
        <?php require View('template/head') ?>
    </head>
    <body>
        <div class="container">

            <p class="bottom-space">
                <a href="/users/create" class="button is-success">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    &nbsp; New user
                </a>
            </p>

            <?php if (count($users) == 0): ?>

                <div class="notification is-warning">No users</div>

            <?php else: ?>

                <table class="table table is-striped is-fullwidth">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th width="100"></th>
                            <th width="91"></th>
                            <th width="91"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>

                            <tr>
                                <td><?=$user->name?></td>
                                <td><?=$user->email?></td>
                                <td>
                                    <a href="/users/<?=$user->id?>/delete" class="button is-danger">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        &nbsp; Delete
                                    </a>
                                </td>
                                <td>
                                    <a href="/users/<?=$user->id?>/edit" class="button is-warning">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        &nbsp; Edit
                                    </a>
                                </td>
                                <td>
                                    <a href="/users/<?=$user->id?>/view" class="button is-info">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        &nbsp; View
                                    </a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>

            <?php endif; ?>
        </div>
    </body>
</html>
