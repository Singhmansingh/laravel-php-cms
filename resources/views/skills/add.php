<?php
    include(dirname(__DIR__).'/includes/header-left.php');
?>

        <hr>

        <section class="w3-padding">

            <h2>Add Skill</h2>

            <form method="post" action="/console/skills/add" novalidate class="w3-margin-bottom">

                <?= csrf_field() ?>

                <div class="w3-margin-bottom">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" value="<?= old('title') ?>" required>

                    <?php if($errors->first('title')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('title'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="url">URL:</label>
                    <input type="url" name="url" id="url" value="<?= old('url') ?>">

                    <?php if($errors->first('url')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('url'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="color">Color:</label>
                    <input type="color" name="color" id="color" value="<?= old('color') ?>">

                    <?php if($errors->first('color')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('color'); ?></span>
                    <?php endif; ?>
                </div>

                <button type="submit" class="w3-button w3-green">Add Skill</button>

            </form>

            <a href="/console/skills/list">Back to Skill List</a>

        </section>

<?php
    include( dirname(__DIR__).'/includes/footer.php' );
?>
