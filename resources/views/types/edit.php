<?php
    include(dirname(__DIR__).'/includes/header-left.php');
?>

        <hr>

        <section class="w3-padding">

            <h2>Edit Type</h2>

            <form method="post" action="/console/types/edit/<?= $type->id ?>" novalidate class="w3-margin-bottom">

                <?= csrf_field() ?>

                <div class="w3-margin-bottom">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" value="<?= old('title', $type->title) ?>" required>
                    
                    <?php if($errors->first('title')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('title'); ?></span>
                    <?php endif; ?>
                </div>

                <button type="submit" class="w3-button w3-green">Edit Type</button>

            </form>

            <a href="/console/types/list">Back to Type List</a>

        </section>

<?php
    include( dirname(__DIR__).'/includes/footer.php' );
?>