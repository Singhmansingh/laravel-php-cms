<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Portfolio</title>

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/app.css">

        <script src="/app.js"></script>
        
    </head>
    <body>


        <header class="w3-padding">

            <h1 class="w3-text-red">Portfolio Console</h1>

            <?php if(Auth::check()): ?>
                You are logged in as <?= auth()->user()->first ?> <?= auth()->user()->last ?> | 
                <a href="/console/logout">Log Out</a> | 
                <a href="/console/dashboard">Dashboard</a> | 
                <a href="/">Website Home Page</a>
            <?php else: ?>
                <a href="/">Return to My Portfolio</a>
            <?php endif; ?>

        </header>

        <hr>

        <section class="w3-padding">

            <h2>Add Education</h2>

            <form method="post" action="/console/educations/add" novalidate class="w3-margin-bottom">

                <?= csrf_field() ?>
        
                <div class="w3-margin-bottom">
                    <label for="school_name">School Name:</label>
                    <input type="text" name="school_name" id="school_name" value="<?= old('school_name') ?>" required>
                    
                    <?php if($errors->first('school_name')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('school_name'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="level_of_education">Level of Education:</label>
                    <input type="text" name="level_of_education" id="level_of_education" value="<?= old('level_of_education') ?>" required>
                    
                    <?php if($errors->first('level_of_education')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('level_of_education'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="field">Field:</label>
                    <input type="text" name="field" id="field" value="<?= old('field') ?>" required>
                    
                    <?php if($errors->first('field')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('field'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="location">Location:</label>
                    <input type="text" name="location" id="location" value="<?= old('location') ?>" required>
                    
                    <?php if($errors->first('location')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('location'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="start_date">Start Date:</label>
                    <input type="date" name="start_date" id="start_date" value="<?= old('start_date') ?>" required>

                    <?php if($errors->first('start_date')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('start_date'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="end_date">End Date:</label>
                    <input type="date" name="end_date" id="end_date" value="<?= old('end_date') ?>" required>

                    <?php if($errors->first('end_date')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('end_date'); ?></span>
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

                <button type="submit" class="w3-button w3-green">Add Education</button>

            </form>

            <a href="/console/educations/list">Back to Education List</a>

        </section>

    </body>
</html>