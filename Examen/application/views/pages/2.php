<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url() ?>../assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>../assets/css/print.css" media="print">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript">
        function printContent(el){
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
    </script>
<!--    @@@@@@@@@@@@@@@         voor DOM PDF gebruik!        @@@@@@@@@@@@@@@ -->
<!--    --><?php //if($this->input->post('pdf')){ ?>
<!--        <style>-->
<!--            .sidebar {-->
<!--                top: 0;-->
<!--                height: 151%;-->
<!--                width: 6cm;-->
<!--                position: absolute;-->
<!--                z-index: -1;-->
<!--                color: #FFF;-->
<!--            }-->
<!---->
<!--            .red {-->
<!--                position: absolute;-->
<!--                top: -23px;-->
<!--                height: 1060px;-->
<!--                width: 170px;-->
<!--                left: -23px;-->
<!--                background-repeat: no-repeat;-->
<!--                background-size: cover;-->
<!--                z-index: -1;-->
<!--            }-->
<!---->
<!--            .pdf, .add, .homepage, .delete, .print, .pages{-->
<!--                display: none;-->
<!--            }-->
<!---->
<!--            .aboutusdescription{-->
<!--                margin-top: 10px;-->
<!--                margin-left: 132px;-->
<!--                padding-right: 50px;-->
<!--                font-size: 12px;-->
<!--                line-height: 24px;-->
<!--            }-->
<!---->
<!--            .aboutustitle {-->
<!--                margin-top: 60px;-->
<!--                margin-left: 132px;-->
<!--                font-weight: 600;-->
<!--                font-size: 20px; }-->
<!---->
<!--            .stateofartdescription{-->
<!--                margin-left: 132px;-->
<!---->
<!--            }-->
<!--            .logocorner {-->
<!--                width: 250px;-->
<!--                margin-top: -55px;-->
<!--            margin-left: 250px;}-->
<!---->
<!---->
<!--            .office{-->
<!--                width: 600px;-->
<!--                z-index: 2;-->
<!--                margin-top: 30px;-->
<!--            }-->
<!--            .companynamesidebar{-->
<!--                position:absolute;-->
<!--                top: 160px;-->
<!--                margin-left: 0px;-->
<!--                float:left;-->
<!--                background-color:rgba(0, 0, 0, 0);-->
<!--                text-align: right;-->
<!--                font-weight: 500;-->
<!--                width: 50px;-->
<!--                padding-left: -80px;-->
<!--                color: #FFF;-->
<!--            }-->
<!---->
<!--            .descriptionsidebar {-->
<!--                position:absolute;-->
<!--                top: 230px;-->
<!--                width: 50px;-->
<!--                padding-left: -80px;-->
<!--                margin-left: -130px;-->
<!--                float:left;-->
<!--                background-color:rgba(0, 0, 0, 0);-->
<!--                text-align: right;-->
<!--                font-weight: 500;-->
<!--                color: #FFF; }-->
<!---->
<!--                .thinkdescription{-->
<!--                    color: black;-->
<!--                }-->
<!---->
<!--            .pagenumbers{-->
<!--                color: red;-->
<!--            }-->
<!---->
<!--            .logopadding{-->
<!--            float:right;-->
<!--                margin-right: 130px;-->
<!--            }-->
<!---->
<!--            .logos{-->
<!--                margin-left: 20px;-->
<!--                margin-top: 0px;-->
<!--                padding-top: 30px;-->
<!--            }-->
<!---->
<!--            .thinklogo, .realiselogo, .executelogo, .designlogo{-->
<!--                padding-top: 20px;-->
<!--            }-->
<!---->
<!--            .pdfpagenumbers{-->
<!--                margin-left: 90px;-->
<!--                margin-top: -115px;-->
<!--                color: #FFF;-->
<!--            }-->
<!---->
<!--            .font-style{-->
<!--                font-family: "Sofia Pro", sans-serif;-->
<!--                font-style: normal;-->
<!--            }-->
<!--        </style>-->
<!--    --><?php //} ?>
    <title>Offertesysteem Cornerstones</title>
</head>
<body>
<form action="" method="post">
    <div class="menu hidden">
        <img src="<?php echo base_url(); ?>../assets/img/Cornerstoneslogo.png" class="logoCornerMenu">
    <select name="pages" class="pages hidden selectmenu" >
        <option value="2">Over ons</option>
        <option value="3">Website elementen</option>
        <option value="4">Uitleg CMS</option>
        <option value="5">Uitleg CMS (deel 2)</option>
        <option value="6">Voorstel</option>
        <option value="7">Verbeteringen</option>
        <option value="8">Kosten</option>
        <option value="9">Planning</option>

    </select>
    <input type="submit" name="add" class="add hidden add" value="Pagina toevoegen">
    <br>
    <input type="submit" name="delete" class="delete hidden delete" value="Verwijder deze pagina">
    <br>
    <input type="submit" name="homepage"  class="homepage hidden homepage" value="Naar Homepage">
        <br>
        <p class="font-style whitetext"> Pagina nummers:</p>
        <?php
        $i = 0;
        foreach($pagesdata->result() as $rows){
            $i++;
            if($pageCount == $i){
                echo "<a href='$rows->id' class='hidden pagenumbersViewHighlight' title='asd'>" . $i . "</a>";
            } else {
                echo "<a href='$rows->id' class='hidden pagenumbersView'>" . $i . "</a>";
            }
        }; ?>
        <br>
        <select name="color" class="color hidden">
            <option value="red">Rood</option>
            <option value="green">Groen</option>
            <option value="blue">Blauw</option>
            <option value="orange">Oranje</option>
        </select>
        <br>
        <input type="submit" name="save" class="save hidden" value="Pagina opslaan">
    </div>
</form>
<!--<button onclick="printContent('a4')" class="print hidden">PRINT </button>-->
<?php if($this->input->post('pdf')) {

} else { ?>
<div class="a4" id="a4">
    <?php } ?>
    <?php if($this->input->post('pdf')){ ?>

        <img src="assets/Img/Cornerstoneslogoblue.png" class="logocorner" >
        <img src="assets/Img/cornerstones-media.png" class="titleadress"align="right">
        <img src="assets/Img/adres.png" class="adress" align="right">
    <?php } else { ?>


    <img src="<?php echo base_url()?>../assets/Img/Cornerstoneslogoblue.png" class="logocorner" >
    <img src="<?php echo base_url()?>../assets/Img/cornerstones-media.png" class="titleadress"align="right">
    <img src="<?php echo base_url()?>../assets/Img/adres.png" class="adress" align="right">

    <?php } ?>

    <h1 class="aboutustitle font-style"> Over ons </h1>
    <p class="aboutusdescription">De media builders van Cornerstones gaan voor het hoogst haalbare kwaliteitsniveau en helpen u met een slimme budgetverdeling. Zo houdt u een voorsprong op uw concullega´s en maakt u het verschil binnen uw markt. Hoe? Niet omdat we het wiel opnieuw uitvinden, maar met onze expertise laten we het wiel wel sneller draaien. Waar het kan maken we gebruik van bestaande bouwblokken van top kwaliteit.
    </p>
    <p class="aboutusdescription">Het team van Cornerstones bestaat uit een selecte groep specialisten met veel ervaring binnen het media landschap. De media builders zijn allen opgegroeid in het digitale tijdperk. Dat geeft ons de kans om vernieuwend te denken en tegelijkertijd te weten waarover we praten en te begrijpen wat er voor uw organisatie nodig is.</p>
    <p class="aboutusdescription">      Door middel van onze doordachte strategie en de aanwezige competenties binnen ons team, ontwikkelen wij media die u goed zichtbaar gaat maken. Bovendien werken we samen met diverse aanvullende bureaus om u zodoende optimaal te kunnen bedienen
    </p>
    <p class="stateofartdescription"><b>Samen sta je sterk!</b>
    </p>
    <?php if($this->input->post('pdf')){ ?>
        <img src="assets/Img/office.png" class="office">
        <div class="logopadding font-style">
            <img src="assets/Img/bedenklogo.png" class="logos thinklogo" >
            <p class="logos thinkdescription ">Bedenken</p>
            <img src="assets/Img/ontwerplogo.png"class="logos designlogo" >
            <p class="logos designdescription">Ontwerpen</p>
            <img src="assets/Img/realiserenlogo.png"class="logos realiselogo" >
            <p class="logos realisedescription">Realiseren</p>
            <img src="assets/Img/uitvoerenlogo.png"class="logos executelogo" >
            <p class="logos executedescription" >Uitvoeren </p>
    <p class="pdfpagenumbers"> <?php echo $pageCount ?> van <?php echo $pageNumbers?>

                </div>


    <?php } else { ?>
    <img src="<?php echo base_url()?>../assets/Img/office.png" class="office">
    <?php } ?>

    <div class="logo font-style">
        <img src="<?php echo base_url()?>../assets/Img/bedenklogo.png" class="logos thinklogo" >
        <p class="logos thinkdescription ">Bedenken</p>
        <img src="<?php echo base_url()?>../assets/Img/ontwerplogo.png"class="logos designlogo" >
        <p class="logos designdescription">Ontwerpen</p>
        <img src="<?php echo base_url()?>../assets/Img/realiserenlogo.png"class="logos realiselogo" >
        <p class="logos realisedescription">Realiseren</p>
        <img src="<?php echo base_url()?>../assets/Img/uitvoerenlogo.png"class="logos executelogo" >
        <p class="logos executedescription" >Uitvoeren </p>
    </div>
    <div class="sidebar <?php foreach($color->result() as $row){ echo $row->color;} if($row->color == ''){ echo 'red'; } ?> font-style">
        <?php if($this->input->post('pdf')){ ?>
        <img src="assets/img/sidebarred.png" class="red">
        <?php } ?>
        <?php foreach ($companyName->result() as $row) {
                 echo   "<p class='bedrijfsnaam companynamesidebar'>" .$row->name. "</p>";
        } ?>

        <?php foreach($quotation->result() as $row){
     echo  "<p class='descriptionsidebar'>" .$row->quotationName. "</p>";
    }?>
        <p class="pagenumbers"> <?php echo $pageCount ?> van <?php echo $pageNumbers?>
        </p>
    </div>

</div>
</body>
</html>

