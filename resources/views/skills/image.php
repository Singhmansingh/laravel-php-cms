<?php
    include(dirname(__DIR__).'/includes/header-left.php');
?>

        <hr>

        <section class="w3-padding">

            <h2>Skill Image</h2>

            <div class="w3-margin-bottom">
                <?php if($skill->image): ?>
                    <img src="<?= asset('storage/'.$skill->image) ?>" width="200">
                <?php endif; ?>
            </div>

            <form method="post" action="/console/skills/image/<?= $skill->id ?>" novalidate class="w3-margin-bottom" enctype="multipart/form-data">

                <?= csrf_field() ?>

                <div class="w3-margin-bottom">
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image" value="<?= old('image') ?>" required>

                    <?php if($errors->first('image')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('image'); ?></span>
                    <?php endif; ?>
                </div>

                <button type="submit" class="w3-button w3-green">Add Image</button>

            </form>

            <a href="/console/skills/list">Back to Skill List</a>

        </section>

<?php
    include( dirname(__DIR__).'/includes/footer.php' );
?>
