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
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
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
        <br>
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
    <input type="submit" name="save" value="Pagina opslaan"  class="save hidden">
    <br>
    <input type="submit" name="planning" value="Planning pagina" class="planning hidden">
<!--    <button onclick="printContent('a4')" class="hidden">PRINT </button>-->
    </div>
    <div class="a4" id="a4">
        <img src="<?php echo base_url()?>../assets/Img/Cornerstoneslogoblue.png" class="logocorner" >
        <img src="<?php echo base_url()?>../assets/Img/cornerstones-media.png" class="titleadress"align="right">
        <img src="<?php echo base_url()?>../assets/Img/adres.png" class="adress" align="right">
        <form action="" method="post">
        <h1 class="planningtitle font-style"> Planning.</h1>
        <textarea class="planningdescription" style=" min-width: 850px; min-height: 150px;" name="planningDescription"><?php if(is_string($name)){ echo "Een webshop ontwikkelen is een samenspel tussen u als ondernemer, en wij als opdrachtnemer. De haalbaarheid van onderstaande planning is dan ook mede afhankelijk van uw reactie(s) op concepten vanuit Cornerstones Media.";} else{foreach ($name->result() as $row){ if($row->entryname == "Planningdescription" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></textarea>

        </form>
        <div class="tableplanning font-style">
            <div class="tablerow">
                <div class="tablecell">Fase</div>
                <div class="tablecell">Werkzaamheden</div>
                <div class="tablecell">Verantwoordelijk</div>
                <div class="tablecell">Week</div>
            </div>
            <?php foreach($planning->result() as $row){
                if($row->week == 0){ $row->week = '';}
                if($row->phase == 0){?>

            <div class="tablerow">

                    <div class="added tablecell"></div>
                    <div class="added tablecell"><?php echo $row->activities ?></div>
                    <div class="added tablecell"><?php echo $row->responsible ?></div>
                    <div class="added tablecell"><?php echo $row->week ?></div>
            </div>
                    <?php } else { ?>

                <div class="tablerow">
                    <div class="tablecell"><?php echo $row->phase ?></div>
                    <div class="tablecell"><?php echo $row->activities ?></div>
                    <div class="tablecell"><?php echo $row->responsible ?></div>
                    <div class="tablecell"><?php echo $row->week ?> </div>
                </div>
                    <?php } ?>

            <?php } ?>

        </div>
        <div class="logo font-style">
            <img src="<?php echo base_url()?>../assets/Img/bedenklogo.png" class="logos thinklogo" >
            <p class="logos thinkdescription">Bedenken</p>
            <img src="<?php echo base_url()?>../assets/Img/ontwerplogo.png" class="logos designlogo" >
            <p class="logos designdescription">Ontwerpen</p>
            <img src="<?php echo base_url()?>../assets/Img/realiserenlogo.png" class="logos realiselogo" >
            <p class="logos realisedescription">Realiseren</p>
            <img src="<?php echo base_url()?>../assets/Img/uitvoerenlogo.png" class="logos executelogo" >
            <p class="logos executedescription" >Uitvoeren </p>
        </div>
        <div class="sidebar <?php foreach($color->result() as $row){ echo $row->color;} if($row->color == ''){ echo 'blue'; }?> font-style">
            <?php foreach ($companyName->result() as $row) {
                echo   "<p class='bedrijfsnaam companynamesidebar'>" .$row->name. "</p>";
            } ?>

            <?php foreach($quotation->result() as $row){
                echo  "<p class='descriptionsidebar'>" .$row->quotationName. "</p>";
            }?>
            <p class="pagenumbers "> <?php echo $pageCount ?> van <?php echo $pageNumbers?> </p>
        </div>
    </div>
</form>

</body>
</html>