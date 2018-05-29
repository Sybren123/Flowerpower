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
<?php if(isset($level) && $level == 2){?>

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
            <?php foreach($data->result() as $row){ ?>
            <div class="table-responsive-sm" style="overflow-x:auto;">
            <table style="width:100%" class="table">
                    <tr>
                        <th>Voorletter(s)</th>
                        <th>Tussenvoegsel</th>
                        <th>Achternaam</th>
                        <th>Voornaam</th>
                        <th>Adres</th>
                        <th>Postcode</th>
                        <th>Woonplaats</th>
                        <th>Geboortedatum</th>
                        <th>Emailadres</th>


                    </tr>
                    <tr>
                        <td><?php echo $row->Voorletters;?></td>
                        <td><?php echo $row->Tussenvoegsels;?></td>
                        <td><?php echo $row->Achternaam;?></td>
                        <td><?php echo $row->Voornaam;?></td>
                        <td><?php echo $row->Adres;?></td>
                        <td><?php echo $row->Postcode;?></td>
                        <td><?php echo $row->Woonplaats;?></td>
                        <?php  $convertdate = date('d-m-Y', strtotime($row->Geboortedatum)) ?>
                        <td><?php echo $convertdate;?></td>
                        <td><?php echo $row->Emailadres;?></td>


                    </tr>

            <?php } ?>
            </table>

            </div>
            <form method="post" action="">
                <?php if(isset($error)){ ?>
                    <p class="errorlogin"><?php echo $error ?></p>
                <?php } ?>
            <div class="updatemenu">
            <p> Voorletter(s)</p>
            <input type="text" name='voorletter' value="<?php echo $row->Voorletters; ?>">
                <span class="text-danger"><?php echo form_error('voorletter');?></span>
                <p> Tussenvoegsel</p>
            <input type="text" name='tussenvoegsel' value="<?php echo $row->Tussenvoegsels; ?>">
                <p> Achternaam</p>
            <input type="text" name='achternaam' value="<?php echo $row->Achternaam; ?>">
                <span class="text-danger"><?php echo form_error('achternaam');?></span>
                <p> Voornaam</p>
            <input type="text" name='voornaam' value="<?php echo $row->Voornaam; ?>">
                <span class="text-danger"><?php echo form_error('voornaam');?></span>
                <p> Adres</p>
            <input type="text" name='adres' value="<?php echo $row->Adres; ?>">
                <span class="text-danger"><?php echo form_error('adres');?></span>
                <p> Postcode</p>
            <input type="text" name='postcode' value="<?php echo $row->Postcode; ?>">
                <span class="text-danger"><?php echo form_error('postcode');?></span>
                <p> Woonplaats</p>
            <input type="text" name='woonplaats' value="<?php echo $row->Woonplaats; ?>">
                <p> Geboortedatum</p>
            <input type="date" name='geboortedatum' value="<?php echo $row->Geboortedatum; ?>">
                <span class="text-danger"><?php echo form_error('geboortedatum');?></span>
                <p> Emailadres</p>
            <input type="text" name='emailadres' value="<?php echo $row->Emailadres; ?>">
                <span class="text-danger"><?php echo form_error('emailadres');?></span>
            </div>
            <input type="submit" value="update" name='update' class="btn btn-info updatebutton">
        </div>
        </form>



    </div>



</div>
<?php } else { redirect(base_url()); } ?>
</body>
</html>
