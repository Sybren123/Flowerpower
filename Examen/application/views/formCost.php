<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/menuCompany.css">
    <title>Offertesysteem Cornerstones</title>

</head>
<body>
<form method="post" action="">
    <div class="menublock2">
        <img src="<?php echo base_url(); ?>../assets/img/Cornerstoneslogo.png" class="logoCorner">
        <div class="item1">
        <p> Titel </p>
        <input type="text" name="title">
        </div>
        <div class="item2">
        <p> Kosten </p>
        <input type="text" name="cost">
        </div>
        <div class="buttons">
            <input type="submit" value="Opslaan" name="save" class="btn btn-primary btn-lg">
            <input type="submit" value="Terug" name="back" class="btn btn-danger btn-lg">
        </div>
    </div>

    <div class="background">
        <P class="webName">Formulier kosten</P>
    </div>
</form>

</body>
</html>