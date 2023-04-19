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

            <h2>Manage Educations</h2>

            <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
                <tr class="w3-red">
                    <th>School Name</th>
                    <th>Level of Education</th>
                    <th>Field</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Content</th>
                    <th>Created at</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach($educations as $education): ?>
                    <tr>

                        <td><?= $education->school_name ?></td>
                        <td><?= $education->level_of_education ?></td>
                        <td><?= $education->field ?></td>
                        <td><?= $education->location ?></td>
                        <td><?= "{$education->start_date} to {$education->end_date}"?></td>
                        <td><?= $education->content ?></td>
                        <td><?= $education->created_at->format('M j, Y') ?></td>
                        <td><a href="/console/educations/edit/<?= $education->id ?>">Edit</a></td>
                        <td><a href="/console/educations/delete/<?= $education->id ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="/console/educations/add" class="w3-button w3-green">New Education</a>
        </section>
<?php
    include( dirname(__DIR__).'/includes/footer.php' );
?>