<?php
    include(dirname(__DIR__).'/includes/header.php');
?>

        <hr>

        <?php if(session()->has('message')): ?>
            <div class="w3-padding w3-margin-top w3-margin-bottom">
                <div class="w3-red w3-center w3-padding"><?= session()->get('message') ?></div>
            </div>
        <?php endif; ?>

        <section class="w3-padding">

            <h2>Manage Types</h2>

            <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
                <tr class="w3-red">
                    <th>Name</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach($types as $type): ?>
                    <tr>
                        <td><?= $type->title ?></td>
                        <td><a href="/console/types/edit/<?= $type->id ?>">Edit</a></td>
                        <td><a href="/console/types/delete/<?= $type->id ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <a href="/console/types/add" class="w3-button w3-green">New Type</a>

        </section>

<?php
    include( dirname(__DIR__).'/includes/footer.php' );
?>