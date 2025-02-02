<?php
    include(dirname(__DIR__).'/includes/header-left.php');
?>

        <hr>
        <section class="w3-padding">

            <h2>Manage Users</h2>

            <?php if(session()->has('message')): ?>
                <div class="w3-padding w3-margin-top w3-margin-bottom">
                    <div class="w3-red w3-center w3-padding"><?= session()->get('message') ?></div>
                </div>
            <?php endif; ?>

            <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
                <tr class="w3-red">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user->first ?> <?= $user->last ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->created_at->format('M j, Y') ?></td>
                        <td><a href="/console/users/edit/<?= $user->id ?>">Edit</a></td>
                        <td><a href="/console/users/delete/<?= $user->id ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <a href="/console/users/add" class="w3-button w3-green">New User</a>

        </section>

<?php
    include( dirname(__DIR__).'/includes/footer.php' );
?>