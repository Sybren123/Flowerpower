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

    <script type="text/javascript">
        function printContent(invoice){
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(invoice).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
    </script>


</head>

<body>

<?php

foreach($access->result() as $row){
    $allow = $row->ID;
}
if($allow == $id && $level == 2){

    echo $allow;
    echo $id;
?>
<div class="container-fluid">
    <div class="row backgroundcolor">
        <div class="col-lg-3 ">
            <img src="<?php echo base_url()?>../assets/img/logoflowerpower.jpg" class="logo">
        </div>
        <div class="col-lg-6">
            <p class="flowerpower"> FlowerPower</p>
        </div>
        <div class="col-lg-3">
            <?php

            if (isset($level)){
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
            <button value="print" onclick="printContent('invoice')" class="btn btn-info">Print</button>
            <div class="invoice" id="invoice">
            <img src="<?php echo base_url()?>../assets/img/logoflowerpower.jpg" class="invoiceLogo"> <span class="invoiceTitle"><b>Flowerpower</b></span>

                <?php foreach($invoicedata->result() as $row){ ?>
                    <p class="adress"><b>Af te halen:</b></p>
                    <p class="adress"> <b><?php echo $row->Winkelnaam; ?></b></p>
                    <p class="adress"> <b><?php echo $row->Winkeladres; ?></b></p>
                    <p class="adress"> <b><?php echo $row->Winkelpostcode.' '.$row->Vestigingsplaats; ?></b></p>
                    <p class="adress"> <b><?php echo $row->Telefoonnummer; ?></b></p>

                    <?php     $convertdate = date('d-m-Y', strtotime($row->Datum));  $converttime = date('H:i', strtotime($row->Tijd));
                    if(date('H', strtotime($row->Tijd)) > 17){
                        $converttime = 'Tussen 09:00 en 18:00';
                        $Date = date("d-m-Y");
                        $convertdate = date("d-m-Y", strtotime($Date. ' + 3 days'));
                    };?>
                    <p class="adress"> <b><?php echo 'Op '.$convertdate.' Om: '.$converttime; ?></b></p>

                    <p class="invoiceContent"><b><i>Factuur</i></b></p>
                <div>Factuurnummer: <?php echo $row->Factuurnummer; ?></div>
                    <div><?php echo $row->Voorletters.' '. $row->Tussenvoegsels. ' '. $row->Achternaam;?></div>
                    <div><?php echo $row->Adres; ?></div>
                    <span><?php echo $row->Postcode.' '.$row->Woonplaats?></span>
                    <div class="date">Datum: <?php echo $row->Factuurdatum; ?></div>
                <?php } ?>

                    <p class="articles"><b><i>Artikelen</i></b></p>


                <?php
                $sum = 0;

                foreach($totalprice->result() as $row) { ?>
                    <?php

                    for($i = 0; $i < 1; $i++){
                        $sum += $row->Aantal * $row->Verkoopprijs;
                    }
                }
                ?>

                <table style="width:80%">

                <?php foreach($totalprice->result() as $row){ ?>
                    <tr>
                    <td><?php echo $row->Artikelnaam; ?></td>
                    <td class="width"><?php echo $row->Aantal; ?></td>
                    <td class="width"><?php $format = number_format($row->Verkoopprijs / 100,2, ".", "" );
                        echo '€'.str_replace(".", ",", $format);?></td>
                    <td class="width"><?php $total = $row->Aantal * $row->Verkoopprijs;  $format1 = number_format($total / 100,2, ".", "" );
                        echo '€'.str_replace(".", ",", $format1);    ?></td>
                    </tr>

                <?php } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="width top"><b><i>Totaal</i></b></td>
                        <td class="width top"><?php $format2 =  number_format($sum / 100,2, ".", "" );echo '€'.str_replace(".", ",", $format2); ; ?></td>

                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td class="width top"><b><i>BTW (21%)</i></b></td>
                        <td class="width top"><?php $btw = $sum / 100; $newbtw = $btw * 21;  $format3 = number_format($newbtw / 100,2, ".", "" );echo '€'.str_replace(".", ",", $format3);?></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td class="width top"><b><i>Netto</i></b></td>
                        <td class="width top"><?php $netto = $sum - $newbtw;  $format4 = number_format($netto / 100,2, ".", "" );echo '€'.str_replace(".", ",", $format4);?></td>

                    </tr>

                </table>


            </div>
        </div>
    </div>
</div>
</form>
<?php } else  { redirect(base_url()); } ?>
</body>
</html>
