<?php
    include(dirname(__DIR__).'/includes/header-left.php');
?>

        <hr>

        <section class="w3-padding">

            <h2>Add Project</h2>

            <form method="post" action="/console/projects/add" novalidate class="w3-margin-bottom">

                <?= csrf_field() ?>

                <div class="w3-margin-bottom">
                    <label for="title">Title:</label>
                    <input type="title" name="title" id="title" value="<?= old('title') ?>" required>
                    
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
                    <label for="git">Github Link:</label>
                    <input type="url" name="git" id="git" value="<?= old('git') ?>">

                    <?php if($errors->first('git')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('git'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="slug">Slug:</label>
                    <input type="text" name="slug" id="slug" value="<?= old('slug') ?>" required>

                    <?php if($errors->first('slug')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('slug'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="content">Content:</label>
                    <textarea name="content" id="content" required><?= old('content') ?></textarea>

                    <?php if($errors->first('content')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('content'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="type_id">Type:</label>
                    <select name="type_id" id="type_id">
                        <option></option>
                        <?php foreach($types as $type): ?>
                            <option value="<?= $type->id ?>"
                                <?= $type->id == old('type_id') ? 'selected' : '' ?>>
                                <?= $type->title ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if($errors->first('type_id')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('type_id'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="skill_id">Skill:</label>
                    <br>
                        <?php foreach($skills as $skill): ?>
                            <input type="checkbox" id="<?= $skill->id ?>" name="skills[]" value="<?= $skill->id ?>"/>
                            <label for="<?= $skill->id ?>"> <?= $skill->title ?></label><br>
                        <?php endforeach; ?>
                    <?php if($errors->first('skill_id')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('skill_id'); ?></span>
                    <?php endif; ?>
                </div>

                <button type="submit" class="w3-button w3-green">Add Project</button>

            </form>

            <a href="/console/projects/list">Back to Project List</a>

        </section>

<?php
    include( dirname(__DIR__).'/includes/footer.php' );
?>