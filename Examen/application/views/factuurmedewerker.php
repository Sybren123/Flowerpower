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
<?php if(isset($level) && $level == 3 || $level == 4){?>
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
                    <div class="table-responsive-sm" style="overflow-x:auto;">
                        <table style="width:100%" class="table">
                            <tr>
                                <th>Product</th>
                                <th>Aantal</th>
                            </tr>
                            <?php foreach($data->result() as $row){ ?>

                                <tr>
                                    <td><?php echo $row->Artikelnaam;?></td>
                                    <td><?php echo $row->Aantal;?></td>

                                </tr>


                            <?php } ?>
                        </table>
                    </div>
                </form>

            </div>



        </div>



    </div>
<?php } else { redirect(base_url()); } ?>
</body>
</html>
