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
    <link rel="stylesheet" href="<?php echo base_url()?>../assets/css/print.css" media="print">
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
    <title>Offertesysteem Cornerstones</title>
</head>
<body>
<form action="" method="post">
    <div class="menu hidden">
        <img src="<?php echo base_url(); ?>../assets/img/Cornerstoneslogo.png" class="logoCornerMenu">

    <select name="pages" class="hidden selectmenu">
        <option value="2">Over ons</option>
        <option value="3">Website elementen</option>
        <option value="4">Uitleg CMS</option>
        <option value="5">Uitleg CMS (deel 2)</option>
        <option value="6">Voorstel</option>
        <option value="7">Verbeteringen</option>
        <option value="8">Kosten</option>
        <option value="9">Planning</option>
    </select>
    <input type="submit" name="add" value="Pagina toevoegen" class="hidden add">
    <br>
    <input type="submit" name="delete"  value="Verwijder deze pagina" class="hidden delete">
    <br>
    <input type="submit" name="homepage" value="Naar Homepage" class="hidden homepage">
        <br>
        <p class="font-style whitetext"> Pagina nummers:</p>
        <?php
        $i = 0;
        foreach($pagesdata->result() as $rows){
            $i++;
            if($pageCount == $i){
                echo "<a href='$rows->id' class='hidden pagenumbersViewHighlight'>" . $i . "</a>";
            } else {
                echo "<a href='$rows->id' class='hidden pagenumbersView'>" . $i . "</a>";
            }
        }; ?>
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
<!--<button onclick="printContent('a4')" class="hidden">PRINT </button>-->

<div class="a4" id="a4">
    <img src="<?php echo base_url()?>../assets/Img/Cornerstoneslogoblue.png" class="logocorner" >
    <img src="<?php echo base_url()?>../assets/Img/cornerstones-media.png" class="titleadress"align="right">
    <img src="<?php echo base_url()?>../assets/Img/adres.png" class="adress" align="right">
    <h2 class="trustfulltitle font-style"><b> Betrouwbaar platform voorbereid op de toekomst.</b> </h2>
    <p class="trustfulldescription">Het CMS bestaat al vele jaren, wordt toegepast bij vele ondernemingen en wordt gesteund door een zeer groot netwerk van programmeurs. U profiteert van de vele voordelen van het grote netwerk binnen het platform, de goede service vanuit Cornerstones Media en het geit dat het CMS Open-Source is.</p>
    <img src="<?php echo base_url()?>../assets/Img/opensource.png" class="opensource">
    <h2 class="opensourcetitle font-style"><b>De voordelen van Open-Source!</b></h2>
    <p class="opensourcedescription font-style">Het CMS is Open-Source. Het voordeel is dat deze software gemakkelijk aanpasbaar is door elke programmeur met kennis en dus niet gebonden aan de ontwikkelaar van het CMS. Iedereen kan verbeteringen aandragen waardoor het systeem constant verbetert wordt. Hierdoor profiteert u als gebruiker niet alleen van software die regelmatig uitgebreid wordt, maar ook van software die altijd verbeterd wordt en steeds zorgt voor een betere gebruikservaring.</p>
    <h2 class="advantagetitle font-style"><b>De vele voordelen:</b></h2>
    <p class="advantagedescription">- Opensource <span class="break">- Wordt constant verbeterd <span class="break"> - Gemakkelijk pagina's toevoegen en beheren <span class="break"> - Heel eenvoudig content plaatsen, aanpassen en verwijderen <span class="break"> - Super snel en gemakkelijk in gebruik <span class="break"> - Geoptimaliseerd voor zoekmachines zoals Google </p>
    <div class="logo font-style">
        <img src="<?php echo base_url()?>../assets/Img/bedenklogo.png" class="logos thinklogo" >
        <p class="logos thinkdescription">Bedenken</p>
        <img src="<?php echo base_url()?>../assets/Img/ontwerplogo.png"class="logos designlogo" >
        <p class="logos designdescription">Ontwerpen</p>
        <img src="<?php echo base_url()?>../assets/Img/realiserenlogo.png"class="logos realiselogo" >
        <p class="logos realisedescription">Realiseren</p>
        <img src="<?php echo base_url()?>../assets/Img/uitvoerenlogo.png"class="logos executelogo" >
        <p class="logos executedescription" >Uitvoeren </p>
    </div>
    <div class="sidebar <?php foreach($color->result() as $row){ echo $row->color;} if($row->color == ''){ echo 'blue'; } ?> font-style">
        <?php foreach ($companyName->result() as $row) {
            echo   "<p class='bedrijfsnaam companynamesidebar'>" .$row->name. "</p>";
        } ?>

        <?php foreach($quotation->result() as $row){
            echo  "<p class='descriptionsidebar'>" .$row->quotationName. "</p>";
        }?>
        <p class="pagenumbers"> <?php echo $pageCount ?> van <?php echo $pageNumbers?> </p>

    </div>
</div>

</body>
</html>
