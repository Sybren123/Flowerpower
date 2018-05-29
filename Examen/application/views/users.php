<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Cornerstones</title>
</head>
<body>
<form method="post" action="">

    <?php if($level == 2) { ?>

    <?php  foreach($users->result() as $row){ ?>
     <?php   echo $row->gebruikersnaam; ?>
            <?php   echo $row->rol; ?>

            <br>
   <?php } ?>

<a href="http://localhost:81/Examen/cornerstones/login">Login</a>
    <?php }  else redirect('http://localhost:81/Examen/cornerstones/'); ?>


</form>

</body>
</html>