<?php
    include(dirname(__DIR__).'/includes/header-left.php');
?>

        <hr>

        <section class="w3-padding">

            <h2>Edit Experience</h2>

            <form method="post" action="/console/experiences/edit/<?= $experience->id ?>" novalidate class="w3-margin-bottom">

                <?= csrf_field() ?>

                <div class="w3-margin-bottom">
                    <label for="title">Title:</label>
                    <input type="title" name="title" id="title" value="<?= old('title', $experience->title) ?>" required>
                    
                    <?php if($errors->first('title')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('title'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="company">Company:</label>
                    <input type="text" name="company" id="company" value="<?= old('company', $experience->company) ?>">

                    <?php if($errors->first('company')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('company'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="start_date">Start Date:</label>
                    <input type="date" name="start_date" id="start_date" value="<?= old('start_date', $experience->start_date) ?>" required>

                    <?php if($errors->first('start_date')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('start_date'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="end_date">End Date:</label>
                    <input type="date" name="end_date" id="end_date" value="<?= old('end_date', $experience->end_date) ?>">

                    <?php if($errors->first('end_date')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('end_date'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="content">Content:</label>
                    <textarea name="content" id="content" required><?= old('content', $experience->content) ?></textarea>

                    <?php if($errors->first('content')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('content'); ?></span>
                    <?php endif; ?>
                </div>


                <button type="submit" class="w3-button w3-green">Edit Experience</button>

            </form>

            <a href="/console/experiences/list">Back to Experience List</a>

        </section>

<?php
    include( dirname(__DIR__).'/includes/footer.php' );
?>