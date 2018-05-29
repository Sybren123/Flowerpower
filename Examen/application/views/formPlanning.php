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
    <?php foreach ($companyName->result() as $row) {
        $bedrijfsnaam = $row->name;
    } ?>


    <div class="menublock2">
        <img src="<?php echo base_url(); ?>../assets/img/Cornerstoneslogo.png" class="logoCorner">

        <div class="item1">
    <p> Fase </p>
    <input type="text" name="phase">
        </div>
        <div class="item2">
    <p> Werkzaamheden </p>
    <input type="text" name="activities">
        </div>
    <div class="item3">
    <p> Verantwoordelijk </p>
    <select name="responsible">
        <option value="Cornerstones Media">Cornerstones Media</option>
        <option value="<?php echo $bedrijfsnaam; ?>"><?php echo $bedrijfsnaam; ?></option>
        <option value="Beide partijen">Beide partijen</option>
    </select>
    </div>
        <div class="item4">
    <p> Week </p>
    <input type="text" name="week">
        </div>
        <div class="buttons">
    <input type="submit" value="Opslaan" name="save" class="btn btn-primary btn-lg">
    <input type="submit" value="Terug" name="back" class="btn btn-danger btn-lg">
        </div>
    </div>

    <div class="background">
        <P class="webName">Formulier planning</P>
    </div>
</form>

</body>
</html>