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
<?php if(isset($level) && $level == 4){?>

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
                    <p class="errorlogin"><?php echo $error ?></p>
                <?php } ?>
                <br>
                <br>
                <?php foreach($currentworker->result() as $row){ ?>


                <div class="updatemenu">
                    <p> Voornaam</p>
                    <input type="text" name='voornaam' value="<?php echo $row->Voornaam; ?>" >
                    <span class="text-danger"><?php echo form_error('voornaam');?></span>
                    <p> Voorletter(s)</p>
                    <input type="text" name='voorletter' value="<?php echo $row->Voorletters; ?>" >
                    <span class="text-danger"><?php echo form_error('voorletter');?></span>
                    <p> Tussenvoegsel</p>
                    <input type="text" name='tussenvoegsel' value="<?php echo $row->Tussenvoegsels; ?>" >
                    <p> Achternaam</p>
                    <input type="text" name='achternaam' value="<?php echo $row->Achternaam; ?>">
                    <span class="text-danger"><?php echo form_error('achternaam');?></span>
                    <p> Adres</p>
                    <input type="text" name='adres'  value="<?php echo $row->Adres; ?>">
                    <span class="text-danger"><?php echo form_error('adres');?></span>
                    <p> Postcode</p>
                    <input type="text" name='postcode'  value="<?php echo $row->Postcode; ?>">
                    <span class="text-danger"><?php echo form_error('postcode');?></span>
                    <p> Woonplaats</p>

                    <select name="woonplaats">
                        <?php foreach($winkel->result() as $rows) { ?>
                            <option value="<?php echo $rows->Vestigingsplaats; ?>" ><?php echo $rows->Vestigingsplaats; ?></option>
                        <?php } ?>
                    </select>
                    <p> Geboortedatum</p>
                    <input type="date" name='geboortedatum' value="<?php echo $row->Geboortedatum; ?>" >
                    <span class="text-danger"><?php echo form_error('geboortedatum');?></span>
                    <p> Emailadres</p>
                    <input type="text" name='emailadres'  value="<?php echo $row->Emailadres; ?>">
                    <span class="text-danger"><?php echo form_error('emailadres');?></span>
                    <?php } ?>
                </div>
                <input type="submit" name="update" value="Update" class="btn btn-info">

            </form>

        </div>



    </div>



</div>
<?php } else { redirect(base_url());} ?>
</body>
</html>
