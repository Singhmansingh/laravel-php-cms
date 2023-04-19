<?php
    include(dirname(__DIR__).'/includes/header-left.php');
?>

        <hr>

        <section class="w3-padding">

            <h2>Edit Skill</h2>

            <form method="post" action="/console/skills/edit/<?= $skill->id ?>" novalidate class="w3-margin-bottom">

                <?= csrf_field() ?>

                <div class="w3-margin-bottom">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" value="<?= old('title', $skill->title) ?>" required>

                    <?php if($errors->first('title')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('title'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="url">URL:</label>
                    <input type="url" name="url" id="url" value="<?= old('url', $skill->url) ?>">

                    <?php if($errors->first('url')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('url'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="color">Color:</label>
                    <input type="color" name="color" id="color" value="<?= old('color', $skill->color) ?>">

                    <?php if($errors->first('color')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('color'); ?></span>
                    <?php endif; ?>
                </div>

                <button skill="submit" class="w3-button w3-green">Edit Skill</button>

            </form>

            <a href="/console/skills/list">Back to Skill List</a>

        </section>

<?php
    include( dirname(__DIR__).'/includes/footer.php' );
?>
