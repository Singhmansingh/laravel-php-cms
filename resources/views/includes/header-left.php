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
    <body class="body-with-sidebar">

        <header class="w3-padding">

            <div class="sidebar">

                <div class="sidebar-top">

                    <div class="sidebar-email">
                        <p><?= auth()->user()->first ?> <?= auth()->user()->last ?></p>
                    </div>

                    <div class="sidebar-menu">
                        <a href="/console/dashboard" class="sidebar-item">Dashboard</a>
                        <a href="/console/educations/list" class="sidebar-item">Education</a>
                        <a href="/console/experiences/list" class="sidebar-item">Experience</a>
                        <a href="/console/projects/list" class="sidebar-item">Projects</a>
                        <a href="/console/types/list" class="sidebar-item">Project Types</a>
                        <a href="/console/skills/list" class="sidebar-item">Skills</a>
                        <a href="/console/users/list" class="sidebar-item">Users</a>
                    </div>

                </div>

                <div class="sidebar-bottom">
                    <a href="/console/logout.php">Logout</a>
                </div>

        </div>

        </header>
        
        
