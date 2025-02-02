<?php
    include(dirname(__DIR__).'/includes/header-left.php');
?>

        <hr>

        <section class="w3-padding">

            <h2>Manage Projects</h2>

            <?php if(session()->has('message')): ?>
                <div class="w3-padding w3-margin-top w3-margin-bottom">
                    <div class="w3-red w3-center w3-padding"><?= session()->get('message') ?></div>
                </div>
            <?php endif; ?>

            <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
                <tr class="w3-red">
                    <th></th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Created</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach($projects as $project): ?>
                    <tr>
                        <td>
                            <?php if($project->image): ?>
                                <img src="<?= asset('storage/'.$project->image) ?>" width="200">
                            <?php endif; ?>
                        </td>
                        <td><?= $project->title ?></td>
                        <td>
                            <a href="/project/<?= $project->slug ?>">
                                <?= $project->slug ?>
                            </a>
                        </td>
                        <td><?= $project->type->title ?></td>
                        <td>
                            <?php if($project->manySkills): ?>
                                <?php foreach($project->manySkills as $skill): ?>
                                    <?= $skill->title ?> <br>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </td>
                        <td><?= $project->created_at->format('M j, Y') ?></td>
                        <td><a href="/console/projects/image/<?= $project->id ?>">Image</a></td>
                        <td><a href="/console/projects/edit/<?= $project->id ?>">Edit</a></td>
                        <td><a href="/console/projects/delete/<?= $project->id ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <a href="/console/projects/add" class="w3-button w3-green">New Project</a>

        </section>

<?php
    include( dirname(__DIR__).'/includes/footer.php' );
?>