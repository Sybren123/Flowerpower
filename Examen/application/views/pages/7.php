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

        function removeTextAreaWhiteSpace() {
            var myTxtArea = document.getElementById('myTextArea');
            myTxtArea.value = myTxtArea.value.replace(/^\s*|\s*$/g,'');
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
    <input type="submit" name="save"  value="Pagina opslaan" class="save hidden">
<!--<button onclick="printContent('a4')" class="hidden">PRINT </button>-->
    </div>
<div class="a4" id="a4">
    <img src="<?php echo base_url()?>../assets/Img/Cornerstoneslogoblue.png" class="logocorner" >
    <img src="<?php echo base_url()?>../assets/Img/cornerstones-media.png" class="titleadress" align="right">
    <img src="<?php echo base_url()?>../assets/Img/adres.png" class="adress" align="right">

    <h1 class="improvementstitle font-style"> Verbeteringen </h1>

    <textarea class="improvementstext font-style" name="textImprovement" style="max-height: 400px; min-height: 240px; min-width: 700px;   "><?php if(is_string($name)){ echo "De huidige website is inmiddels een paar jaar oud en voldoet op veel vlakken niet meer aan de eisen van het internet. De techniek staat niet stil en vooral zoekmachines wensen tegenwoordig van de website bezitters dat zij mee ontwikkelen om het internet beter en gebruiksvriendelijker te maken. Tevens krijgen websites welke hier niet aan voldoen tegenwoordig strafpunten waardoor zij minder goed vindbaar zijn dan hun concurrenten.";} else{foreach ($name->result() as $row){ if($row->entryname == "Improvement" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?>
</textarea>
    <div class="listimprovements font-style">
        <b class="thinkabout">Denk hierbij aan:</b>
        <br>
        <br>
        <textarea class="font-style" name="addImprovement" style=" max-height: 10px; min-height: 25px; min-width: 700px;" ><?php if(is_string($name)){ echo "Duidelijke fotografie en persoonlijke sfeer";} else{foreach ($name->result() as $row){ if($row->entryname == "Addimprovement" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></textarea>
        <textarea class="font-style" name="addImprovement1" style=" max-height: 10px; min-height: 25px; min-width: 700px;  "><?php if(is_string($name)){ echo "Autoriteit en vertrouwen uitstralen";} else{foreach ($name->result() as $row){ if($row->entryname == "Addimprovement1" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></textarea>
        <textarea class="font-style" name="addImprovement2" style=" max-height: 10px; min-height: 25px; min-width: 700px;   "><?php if(is_string($name)){ echo "Technische en tekstuele zoekmachine optimalisatie";} else{foreach ($name->result() as $row){ if($row->entryname == "Addimprovement2" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></textarea>
        <textarea class="font-style" name="addImprovement3" style=" max-height: 10px; min-height: 25px; min-width: 700px;  "><?php if(is_string($name)){ echo "Gekoppelde social media kanalen";} else{foreach ($name->result() as $row){ if($row->entryname == "Addimprovement3" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></textarea>
        <textarea class="font-style" name="addImprovement4" style=" max-height: 10px; min-height: 25px; min-width: 700px;  "><?php if(is_string($name)){ echo "Mobiel vriendelijk (responsive)";} else{foreach ($name->result() as $row){ if($row->entryname == "Addimprovement4" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></textarea>
        <textarea class="font-style" name="addImprovement5" style=" max-height: 10px; min-height: 25px; min-width: 700px;   "><?php if(is_string($name)){ echo "Gemakkelijk persoonlijk contact";} else{foreach ($name->result() as $row){ if($row->entryname == "Addimprovement5" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></textarea>
        <textarea class="font-style" name="addImprovement6" style=" max-height: 50px; min-height: 50px; min-width: 700px;  "><?php if(is_string($name)){ echo "Laagdrempelig";} else{foreach ($name->result() as $row){ if($row->entryname == "Addimprovement6" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></textarea>
    </div>

    <img src="<?php echo base_url()?>../assets/Img/boximprovement.png" class="boximprovements">
    <h2 class="titleboximprovements font-style">Wij leveren de middelen tot success</h2>
    <p class="textboximprovements font-style"> Met een website bent u er nog niet. Een website is een middel om uw nieuwe leads binnen te halen. Het is een samenspel van diverse facetten. Wij leveren de beste middelen om uw onderneming tot een hoger niveau te brengen.</p>
    <p class="textboxend font-style">Wij geven graag advies voor toevoegingen zoals zoekmachine optimalisatie en marketing activiteiten. Vraag ons hier vrijblijvend naar!</p>
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
</form>

<div class="sidebar <?php foreach($color->result() as $row){ echo $row->color;}if($row->color == ''){ echo 'green'; } ?> font-style">
        <?php foreach ($companyName->result() as $row) {
            echo   "<p class='bedrijfsnaam companynamesidebar'>" .$row->name. "</p>";
        } ?>

        <?php foreach($quotation->result() as $row){
            echo  "<p class='descriptionsidebar'>" .$row->quotationName. "</p>";
        }?>
        <p class="pagenumbers "> <?php echo $pageCount ?> van <?php echo $pageNumbers?> </p>
    </div>
</div>

</body>
</html>