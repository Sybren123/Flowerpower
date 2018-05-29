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

        <div class="col-lg-3">

            <div class="shop1">

            <div> Hardenberg</div>
            <div> Winkelstraat 10</div>
            <div> 0243123456     </div>
            <div> FlowerpowerH@gmail.com </div>
            </div>

            <div class="shop2">
                <div> Ommen</div>
                <div> Winkelshop 8</div>
                <div> 0243467812  </div>
                <div> FlowerpowerO@gmail.com </div>
            </div>

            <div class="shop3">
                <div> Zwolle</div>
                <div> Vestigingstraat 5</div>
                <div> 1234567890     </div>
                <div> FlowerpowerZ@gmail.com </div>
            </div>

            <div class="shop4">
                <div> Dalfsen</div>
                <div> Vestigingslaan 20</div>
                <div> 0987654321     </div>
                <div> FlowerpowerD@gmail.com </div>
            </div>
        </div>
<div class="col-lg-5">
     <img src="<?php echo base_url()?>../assets/img/flowerpowershop.jpg" class="imagecontact">
            <img src="<?php echo base_url()?>../assets/img/flowerpowerommen.jpg" class="imageommen">


            <img src="<?php echo base_url()?>../assets/img/flowerpowerdalfsen.jpg" class="imagezwolle">



            <img src="<?php echo base_url()?>../assets/img/flowerpowerzwolle.jpg" class="imagedalfsen">

</div>


    </div>
</div>
</body>
</html>
