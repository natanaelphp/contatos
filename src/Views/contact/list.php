<p>
    <a href="/users/<?=$user->id?>/contacts/create" class="button is-success">
        <i class="fa fa-user-plus" aria-hidden="true"></i>
        &nbsp; New Contact
    </a>
</p>

<?php if (count($contacts) == 0): ?>

    <div class="notification is-warning">This user has no contacts</div>

<?php else: ?>

    <table>
        <thead>
            <tr>
                <th>Contact name</th>
                <th>Email</th>
                <th width="116"></th>
                <th width="99"></th>
                <th width="99"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>

                <tr>
                    <td><?=$contact->name?></td>
                    <td><?=$contact->email?></td>
                    <td>
                        <a href="/users/<?=$user->id?>/contacts/<?=$contact->id?>/delete" class="button is-danger">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                            &nbsp; Delete
                        </a>
                    </td>
                    <td>
                        <a href="/users/<?=$user->id?>/contacts/<?=$contact->id?>/edit" class="button is-warning">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                            &nbsp; Edit
                        </a>
                    </td>
                    <td>
                        <a href="/users/<?=$user->id?>/contacts/<?=$contact->id?>" class="button is-info">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            &nbsp; View
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>
