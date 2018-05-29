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
<?php if (isset($level) && $level == 4) { ?>
<div class="container-fluid">
    <div class="row backgroundcolor">
        <div class="col-lg-3 ">
            <img src="<?php echo base_url()?>../assets/img/logoflowerpower.jpg" class="logo">
        </div>
        <div class="col-lg-6">
            <p class="flowerpower"> FlowerPower</p>
        </div>
        <div class="col-lg-3">
            <?php if (isset($level)){
                if($level){ ;?>
                    <div class="welcome"> Welkom: <?php echo $name ?> </div>

                    <a class="btn btn-info uitloggen" href="<?php echo base_url(); ?>logout"> Uitloggen </a>

                <?php } } else {?>
                <a class="btn btn-info inloggen" href="<?php echo base_url(); ?>inloggen"> Inloggen </a>
            <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 backgroundcolorSidebar">
            <div class="menu">
                <a href="<?php echo base_url(); ?>" class="menuitem"> Homepagina </a> <br>
                <a href="<?php echo base_url(); ?>contact" class="menuitem"> Contactpagina </a> <br>

                <?php if (isset($level)){
                    if($level == 2 ){ ?>
                        <a href="<?php echo base_url(); ?>klantgegevens" class="menuitem"> Klantgegevens </a> <br>
                        <a href="<?php echo base_url(); ?>bestellen" class="menuitem"> Bestellen </a> <br>

                    <?php }
                    elseif($level == 3){ ?>
                        <a href="<?php echo base_url(); ?>bestellingen" class="menuitem"> Bestellingen </a> <br>
                        <a href="<?php echo base_url(); ?>artikelen" class="menuitem"> Artikelen </a> <br>
                        <a href="<?php echo base_url(); ?>gebruikers" class="menuitem"> Gebruikers </a> <br>


                    <?php } elseif($level == 4){ ?>
                        <a href="<?php echo base_url(); ?>bestellingen" class="menuitem"> Bestellingen </a> <br>
                        <a href="<?php echo base_url(); ?>artikelen" class="menuitem"> Artikelen </a> <br>
                        <a href="<?php echo base_url(); ?>gebruikers" class="menuitem"> Gebruikers </a> <br>
                        <a href="<?php echo base_url(); ?>medewerkers" class="menuitem"> Medewerkers </a> <br>


                    <?php } } else {?>
                    <a href="<?php echo base_url(); ?>register" class="menuitem"> Registreren </a>
                <?php } ?>
            </div>
        </div>

        <div class="col-lg-10">
            <form method="post" action="">
                <?php if(isset($error)){ ?>
                <p class="errorlogin"><?php echo $error; } ?></p>
                <div class="updatemenu">
                    <div> Voorletter(s)</div>
                    <input type="text" name='voorletter' >
                    <span class="text-danger"><?php echo form_error('voorletter');?></span>
                    <div> Tussenvoegsel</div>
                    <input type="text" name='tussenvoegsel' >
                    <div> Achternaam</div>
                    <input type="text" name='achternaam' >
                    <span class="text-danger"><?php echo form_error('achternaam');?></span>
                    <div> Voornaam</div>
                    <input type="text" name='voornaam' >
                    <span class="text-danger"><?php echo form_error('voornaam');?></span>
                    <div> Adres</div>
                    <input type="text" name='adres'>
                    <span class="text-danger"><?php echo form_error('adres');?></span>
                    <div> Postcode</div>
                    <input type="text" name='postcode'>
                    <span class="text-danger"><?php echo form_error('postcode');?></span>
                    <div> Woonplaats</div>

                    <select name="woonplaats">
                        <?php foreach($winkel->result() as $row) { ?>
                            <option value="<?php echo $row->Vestigingsplaats; ?>" ><?php echo $row->Vestigingsplaats; ?></option>
                        <?php } ?>
                    </select>


                    <div> Geboortedatum</div>
                    <input type="date" name='geboortedatum'>
                    <span class="text-danger"><?php echo form_error('geboortedatum');?></span>
                    <div> Emailadres</div>
                    <input type="text" name='emailadres'>
                    <span class="text-danger"><?php echo form_error('emailadres');?></span>
                    <div> Wachtwoord </div>
                    <input type="text" name='wachtwoord' >
                    <span class="text-danger"><?php echo form_error('wachtwoord');?></span>
                </div>
                <input type="submit" value="Toevoegen" name='add' class="btn btn-info updatebutton">
            </form>

        </div>



    </div>



</div>
<?php } else { redirect(base_url()); } ?>
</body>
</html>
