<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url()?>../assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url()?>../assets/css/print.css" media="print" type="text/css">
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
<button id="hide" class="hidden hide"> Toggle </button>

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
<!--<button onclick="printContent('a4')" class="hidden">PRINT </button>-->

<div class="a4" id="a4">
    <img src="<?php echo base_url()?>../assets/Img/Cornerstoneslogoblue.png" class="logocorner" >
    <img src="<?php echo base_url()?>../assets/Img/cornerstones-media.png" class="titleadress"align="right">
    <img src="<?php echo base_url()?>../assets/Img/adres.png" class="adress" align="right">
    <h1 class="titleexplanation font-style"> Het unieke Content Management Systeem</h1>
    <h2 class="ownusetitle font-style"><b> Intuïtief te gebruiken</b> </h2>
    <p class="ownusedescription">Met het Open-source CMS waarop de nieuwe website zal worden gebouwd, kunt u zich volledig inzetten op content creatie en voor zoekmachines geoptimaliseerde inhoud. De backend is zorgvuldig gestructureerd om het dagelijkse werk te vereenvoudigen en tijd te besparen.</p>
    <h2 class="mobiledevicetitle font-style"><b>Op elk (mobiel) apparaat</b></h2>
    <p class="mobiledevicedescription">Het systeem is responsive en adaptief zodat de website altijd te benaderen is op desktop, tablet en zelfs mobiel. Het systeem past zich aan aan de gebruiker, niet andersom.</p>
    <img src="<?php echo base_url()?>../assets/Img/pages.png" class="pagesimage">
    <h2 class="stateofarttitle font-style"><b>State-of-the-art technologie</b></h2>
    <p class="stateofartdescription">Met een high-end, trendy software architectuur die als basis fungeert, weet u zeker dat u een goede basis heeft om de komende jaren zorgenloos te kunnen blijven ontwikkelen. De techniek is vooruitstrevend, flexibel en voor iedereen te begrijpen.</p>
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
    <div class="sidebar <?php foreach($color->result() as $row){ echo $row->color;} if($row->color == ''){ echo 'orange'; } ?> font-style">
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
