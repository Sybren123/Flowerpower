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
<!--            .adress{-->
<!--                margin-top: 100px;-->
<!--            }-->
<!--            .blue {-->
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
<!--            .pdf, .add, .homepage, .delete, .print, .pages, .save, .color{-->
<!--                display: none;-->
<!--            }-->
<!---->
<!---->
<!--            .logocorner {-->
<!--                width: 250px;-->
<!--                margin-top: -150px;-->
<!--                margin-left: 250px;}-->
<!---->
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
<!---->
<!--            .pagenumbers{-->
<!--                color: red;-->
<!--            }-->
<!---->
<!--            .name {-->
<!--                margin-top: -30px;-->
<!--                margin-left: 143px;-->
<!--                font-weight: bold;-->
<!--                text-align: left;-->
<!--                font-size: 12px;}-->
<!---->
<!--            .street{-->
<!--                margin-left: 143px;-->
<!--                margin-top: -10px;-->
<!--                font-weight: 300;-->
<!--                font-size: 12px;-->
<!--            }-->
<!---->
<!--            .address{-->
<!--                margin-left: 143px;-->
<!--                margin-top: -15px;-->
<!--                font-weight: 300;-->
<!--                font-size: 12px;-->
<!--            }-->
<!---->
<!--            .suggestiontitle {-->
<!--                margin-top: 40px;-->
<!--                margin-left: 143px;-->
<!--                font-weight: 600;-->
<!--                font-size: 28px; }-->
<!---->
<!--            .suggestionstart{-->
<!--                margin-left: 143px;-->
<!--                padding-right: 150px;-->
<!--                font-weight: 300;-->
<!--                line-height: 10px;-->
<!--                margin-top: 35px;-->
<!--                font-size: 12px;}-->
<!---->
<!--            .suggestiontext{-->
<!--                margin-left: 143px;-->
<!--                padding-right: 600px;-->
<!--                font-weight: 300;-->
<!--                line-height: 30px;-->
<!--                margin-top: 20px;-->
<!--                font-size: 12px;-->
<!--            }-->
<!---->
<!--            .ending{-->
<!--                margin-top: 10px;-->
<!--                margin-left: 143px;-->
<!--                font-weight: 300;-->
<!--                line-height: 30px;-->
<!--                font-size: 12px;-->
<!---->
<!--            }-->
<!---->
<!--            .logopadding{-->
<!--                float:right;-->
<!--                position: absolute;-->
<!--                /*top: 700px;*/-->
<!--                bottom: 10px;-->
<!--                margin-right: 450px;-->
<!--            }-->
<!---->
<!--            .logos{-->
<!--                margin-left: 20px;-->
<!--                margin-top: 0px;-->
<!--                padding-top: 30px;-->
<!---->
<!---->
<!--            }-->
<!---->
<!--            .thinklogo, .realiselogo, .executelogo, .designlogo{-->
<!--                padding-top: 20px;-->
<!--            }-->
<!---->
<!--            .pdfpagenumbers{-->
<!--                margin-top: -40px;-->
<!--                margin-left: 93px;-->
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
<body onload="removeTextAreaWhiteSpace()">
<form action="" method="post">
    <div class="menu hidden">
        <img src="<?php echo base_url(); ?>../assets/img/Cornerstoneslogo.png" class="logoCornerMenu">

    <select name="pages" class="pages hidden selectmenu">
        <option value="2">Over ons</option>
        <option value="3">Website elementen</option>
        <option value="4">Uitleg CMS</option>
        <option value="5">Uitleg CMS (deel 2)</option>
        <option value="6">Voorstel</option>
        <option value="7">Verbeteringen</option>
        <option value="8">Kosten</option>
        <option value="9">Planning</option>
    </select>
    <input type="submit" name="add" class="add hidden" value="Pagina toevoegen" >
    <br>
    <input type="submit" name="delete" class="delete hidden" value="Verwijder deze pagina">
    <br>
    <input type="submit" name="homepage" class="homepage hidden" value="Naar Homepage">
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
<div class="a4" id="a4">
    <?php if($this->input->post('pdf')){ ?>
    <img src="assets/Img/Cornerstoneslogoblue.png" class="logocorner" >
    <img src="assets/Img/cornerstones-media.png" class="titleadress" align="right">
    <img src="assets/Img/adres.png" class="adress" align="right">
    <?php } else { ?>
        <img src="<?php echo base_url()?>../assets/Img/Cornerstoneslogoblue.png" class="logocorner" >
        <img src="<?php echo base_url()?>../assets/Img/cornerstones-media.png" class="titleadress" align="right">
        <img src="<?php echo base_url()?>../assets/Img/adres.png" class="adress" align="right">

    <?php } ?>



    <?php if($this->input->post('pdf')){ ?>
         <p class='name font-style' id="myTextArea">
      <?php if(is_string($name)){ echo "Matthijs de Haan";} else{foreach ($name->result() as $row){ if($row->entryname == "Name" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></textarea>

   <?php } else { ?>

  <textarea class='name font-style' id="myTextArea" name='name' style=' max-height: 30px; min-width: 400px; '>
      <?php if(is_string($name)){ echo "Matthijs de Haan";} else{foreach ($name->result() as $row){ if($row->entryname == "Name" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></textarea>
<?php } ?>



    <?php if($this->input->post('pdf')){ ?>
    <p class="street font-style">
           <?php foreach($companyAddress->result() as $row) { echo $row->street;} ?></p>
    <?php } else { ?>
        <div class="street font-style" style="max-height: 50px; min-height: 50px; min-width: 700px;   ">
            <?php foreach($companyAddress->result() as $row) { echo $row->street;} ?></div>
    <?php } ?>



    <?php if($this->input->post('pdf')){ ?>
    <p class="address font-style">
         <?php foreach($companyAddress->result() as $row) { echo $row->zip_code. ' ';}  foreach($companyAddress->result() as $row) { echo $row->city;} ?></p>
    <?php } else { ?>
        <div class="address font-style" style=" max-height: 50px; min-height: 50px; min-width: 700px;  ">
            <?php foreach($companyAddress->result() as $row) { echo $row->zip_code. ' ';}  foreach($companyAddress->result() as $row) { echo $row->city;} ?></div>
    <?php } ?>




    <?php if($this->input->post('pdf')) { ?>
    <p class="suggestiontitle font-style" name="title"><?php if(is_string($name)){ echo "Investeringsvoorstel nieuwe website";} else{foreach ($name->result() as $row){ if($row->entryname == "Title" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?> </p>
    <?php } else { ?>
        <textarea class="suggestiontitle font-style" name="title" style=" max-height: 50px; min-height: 50px; min-width: 700px;  "><?php if(is_string($name)){ echo "Investeringsvoorstel nieuwe website";} else{foreach ($name->result() as $row){ if($row->entryname == "Title" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?> </textarea>

    <?php } ?>


    <?php if($this->input->post('pdf')) { ?>
    <p class="suggestionstart font-style" name="salutation"><?php if(is_string($name)){ echo "Beste Matthijs";} else{foreach ($name->result() as $row){ if($row->entryname == "Salutation" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?> </p>
    <?php } else { ?>
        <textarea class="suggestionstart font-style" name="salutation" style=" max-height: 40px; min-height: 40px; min-width: 700px;  "><?php if(is_string($name)){ echo "Beste Matthijs";} else{foreach ($name->result() as $row){ if($row->entryname == "Salutation" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?> </textarea>

    <?php } ?>


    <?php if($this->input->post('pdf')) { ?>
    <p class="suggestiontext font-style" name="textSuggestion"><?php if(is_string($name)){ echo "zoals besproken op 11 januari 2017, is er de wens om een nieuwe website te laten ontwikkelen voor hse-emmen.nl. Een website welke voldoet aan de hedendaagse ontwikkelingen op het gebied van website bouw (responsive). Deze aanpassingen moeten bijdragen aan het beter positioneren van de website en de onderneming. Met vooral het beter presenteren van het bedrijf, de diensten en de producten, waar een verbeterde toegankelijkheid, klantbinding en conversie een grote rol zal spelen.";} else{foreach ($name->result() as $row){ if($row->entryname == "Textsuggestion" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?>
</p>
    <? } else { ?>
        <textarea class="suggestiontext font-style" name="textSuggestion" style="max-height: 400px; min-height: 240px; min-width: 700px;   "><?php if(is_string($name)){ echo "zoals besproken op 11 januari 2017, is er de wens om een nieuwe website te laten ontwikkelen voor hse-emmen.nl. Een website welke voldoet aan de hedendaagse ontwikkelingen op het gebied van website bouw (responsive). Deze aanpassingen moeten bijdragen aan het beter positioneren van de website en de onderneming. Met vooral het beter presenteren van het bedrijf, de diensten en de producten, waar een verbeterde toegankelijkheid, klantbinding en conversie een grote rol zal spelen.";} else{foreach ($name->result() as $row){ if($row->entryname == "Textsuggestion" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?>
</textarea>
    <?php } ?>


    <?php if($this->input->post('pdf')) { ?>
    <p class="suggestiontext font-style" name="endtextSuggestion"><?php if(is_string($name)){ echo "In dit document is terug te lezen welke werkzaamheden voor dit investeringsvoorstel aan bod komen.";} else{foreach ($name->result() as $row){ if($row->entryname == "Endtextsuggestion" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></p>
    <?php } else { ?>
        <textarea class="suggestiontext font-style" name="endtextSuggestion" style=" max-height: 200px; min-height: 150px; min-width: 700px;  "><?php if(is_string($name)){ echo "In dit document is terug te lezen welke werkzaamheden voor dit investeringsvoorstel aan bod komen.";} else{foreach ($name->result() as $row){ if($row->entryname == "Endtextsuggestion" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></textarea>

    <?php } ?>

</form>
    <?php if($this->input->post('pdf')) { ?>
    <div class="ending font-style"> Met vriendelijke groet, <br> Thomas Rolink <br> <img src="assets/Img/handtekening.png" width="150px"></div>

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

<? } else { ?>
        <div class="ending font-style"> Met vriendelijke groet, <br> Thomas Rolink <br> <img src="<?php echo base_url()?>../assets/Img/handtekening.png" width="150px"></div>
<?php } ?>




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
    <div class="sidebar <?php foreach($color->result() as $row){ echo $row->color;} if($row->color == ''){ echo 'blue'; } ?> font-style">
        <?php if($this->input->post('pdf')){ ?>
            <img src="assets/img/sidebarblue.png" class="blue">
        <?php } ?>
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
