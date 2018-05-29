<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url()?>../assets/css/style.css">
    <title>FlowerPower</title>
</head>

<body>
<div class="container-fluid">
    <div class="row backgroundcolor">
        <div class="col-lg-3 ">
            <img src="<?php echo base_url()?>../assets/img/logoflowerpower.jpg" class="logo">
        </div>
        <div class="col-lg-6">
            <p class="flowerpower"> FlowerPower</p>
        </div>
        <div class="col-lg-3">
            <a class="btn btn-info inloggen" href="<?php echo base_url(); ?>inloggen"> Inloggen </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 backgroundcolorSidebar">
            <div class="menu">
                <a href="<?php echo base_url(); ?>" class="menuitem"> Homepagina </a> <br>
                <a href="<?php echo base_url(); ?>contact" class="menuitem"> Contactpagina </a> <br>
                <a href="register" class="menuitem"> Registreren </a>
            </div>
        </div>

        <div class="col-lg-10">
            <form method="post" action="">
                <?php if(isset($error)){ ?>
                    <p class="errorlogin"><?php echo $error ?></p>
                <?php } ?>
            <div class="registerform">
                <p>Voorletters</p>
                <input type="text" name="voorletter">
                <span class="text-danger"><?php echo form_error('voorletter');?></span>
                <p>Tussenvoegsel</p>
                <input type="text" name="tussenvoegsel">
                <p>Achternaam</p>
                <input type="text" name="achternaam">
                <span class="text-danger"><?php echo form_error('achternaam');?></span>
                <p>Voornaam</p>
                <input type="text" name="voornaam">
                <span class="text-danger"><?php echo form_error('voornaam');?></span>
                <p>Adres</p>
                <input type="text" name="adres">
                <span class="text-danger"><?php echo form_error('adres');?></span>
                <p>Postcode</p>
                <input type="text" name="postcode">
                <span class="text-danger"><?php echo form_error('postcode');?></span>
                <p>Woonplaats</p>
                <input type="text" name="woonplaats">
                <span class="text-danger"><?php echo form_error('woonplaats');?></span>
                <p>Geboortedatum</p>
                <input type="date" name="geboortedatum">
                <span class="text-danger"><?php echo form_error('geboortedatum');?></span>
                <p>Emailadres</p>
                <input type="text" name="emailadres">
                <span class="text-danger"><?php echo form_error('emailadres');?></span>
                <p>Wachtwoord</p>
            <input type="password" name="wachtwoord">
                <span class="text-danger"><?php echo form_error('wachtwoord');?></span>

                <input type="submit" value="registreren" name='register' class="btn btn-info">

            </div>
            </form>

        </div>

    </div>
</div>
</body>
</html>
