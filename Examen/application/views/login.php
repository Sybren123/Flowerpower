<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Cornerstones</title>
</head>
<body>
<form method="post" action="">

    <h1>Ingelogd</h1>
    <?php if($level == 1) { ?>
        <p> Dit is een normale gebruiker </p>
    <a href="http://localhost:81/Examen/cornerstones/logout"> Uitloggen </a>
    <?php } elseif($level == 2) { ?>
        <p> Dit is een Admin </p>
    <a href="http://localhost:81/Examen/cornerstones/logout"> Log uit </a>
        <a href="http://localhost:81/Examen/cornerstones/homepage">Homepage</a>
        <a href="http://localhost:81/Examen/cornerstones/users">Users</a>

    <?php } ?>







</form>

</body>
</html>