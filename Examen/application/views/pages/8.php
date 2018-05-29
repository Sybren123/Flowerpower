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
<form action="" method="post" id="frm">
    <div class="menu hidden">
        <img src="<?php echo base_url(); ?>../assets/img/Cornerstoneslogo.png" class="logoCornerMenu">
        <form action="" method="post" id="frm">
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
            <input type="submit" class="hidden toggle" name="toggle" value="Toggle">
<br>
            <input type="submit" name="save"  value="Pagina opslaan" class="save hidden">
    <br>
    <input type="submit" name="cost" value="Kosten pagina" class="hidden costbutton">

<!--<button onclick="printContent('a4')" class="hidden">PRINT </button>-->
    </div>
<div class="a4" id="a4">
    <img src="<?php echo base_url()?>../assets/Img/Cornerstoneslogoblue.png" class="logocorner" >
    <img src="<?php echo base_url()?>../assets/Img/cornerstones-media.png" class="titleadress" align="right">
    <img src="<?php echo base_url()?>../assets/Img/adres.png" class="adress" align="right">
    <?php $euro = '€'; ?>
    <h1 class="paymenttitle font-style"> ACCORDERING EN BETALING</h1>
    <div class="tablepayment font-style">
        <div class="tablerow">
            <div class="line  tablecell firstrow"><div style=" max-height: 10px; min-height: 25px; min-width: 300px;" >Werkzaamheden</div></div>
            <div class="kosten tablecell firstrow"><div style=" max-height: 10px; min-height: 25px; min-width: 100px;" >Investering</div></div>
        </div>
        <?php foreach($cost->result() as $row){ ?>

        <div class="tablerow">
            <div class="added line tablecell"><div style=" max-height: 10px; min-height: 25px; min-width: 500px;"><?php echo $row->title; ?></div></div>
            <div class="added  tablecell cost"><?php if($row->cost == 0) {echo '';} else{  echo $euro.str_replace('.',',',$row->cost);}  ?></div>
        </div>
<?php } ?>
        <div class="tablerow">
            <div class="tablecell"><b>Totaal</b></div>
            <div class="kosten tablecell"><b> <?php $total = number_format($totalcost[0]->cost, 2, ',', ''); echo $euro.$total;?></b> </div>
        </div>

        <div class="tablerow">
            <div class="tablecell"  ><i><textarea style=" max-height: 10px; min-height: 25px; min-width: 700px;" name="hosting"><?php if(is_string($name)){ echo "Business hosting";} else{foreach ($name->result() as $row){ if($row->entryname == "Hosting" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></textarea></i></div>
            <div class="kosten tablecell"><textarea style=" max-height: 10px; min-height: 25px; min-width: 700px;"  name="hostingCost"><?php if(is_string($name)){ echo "€17,50 p/m";} else{foreach ($name->result() as $row){ if($row->entryname == "Hostingcost" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></textarea></div>
        </div>
        
        </div>


    <?php if($toggle == 1) {
        echo "<div class='benefitbox' id='item'>
        <p class='benefit'>Indien voor <textarea class='datum' style='max-height: 10px; min-height: 20px; min-width: 50px;' name='date' >"; ?><?php if(is_string($name)){ echo '21-01-2017';} else{foreach ($name->result() as $row){ if($row->entryname == 'Date' && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?> </textarea> nog akkoord wordt gegeven op dit voorstel, geven wij €<textarea class='price' style='max-height: 10px; min-height: 20px; max-width: 60px;' name='discountPrice' ><?php if(is_string($name)){ echo '300';} else{foreach ($name->result() as $row){ if($row->entryname == 'Discountprice' && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></textarea> voordeel. </p>
        <img src='<?php echo base_url()?>../assets/Img/box.png' class='box'>
    </div> <?php } else { ?>
     <?php } ?>

    <div class="emailservicebox">
        <img src="<?php echo base_url()?>../assets/Img/emaillamp.png" class="lamp">
        <p class="emailservice font-style"> De e-mail diensten worden niet door Cornerstones geleverd. Wij adviseren dit via een externe partij te regelen (bijv. Bruinsma Kantoor Efficiency te Hardenberg),
            ivm specialistisch werk en het belang van goed probleemloos mailverkeer. </p>
        <p class="conditions font-style">Bedragen zijn excl. BTW, eventueel mediabudget en auteursrecht. Factureringstermijnen geschieden separaat van ontwikkeling project. Looptijd betreffende domeinen, hosting en internet support minimaal 12 maand per contractperiode. Tenzij opdrachtgever de overeenkomst tegen het einde van de onder “Looptijd” genoemde periode middels een aangetekende brief beëindigt met inachtneming van een opzegtermijn van 4 (vier) weken voor het einde van de betreffende periode, wordt de overeenkomst telkenmale stilzwijgend verlengd voor de duur van de oorspronkelijke periode.
        </p>
        <div class="tablepayment">
            <div class="tablerow">
                <div class="added tablecell">Geldigheid offerte</div>
                <div class="added tablecell" >:</div>
                <div class="payment added tablecell"><div style=" max-height: 12px; min-height: 28px; min-width: 700px; padding-top: 10px;" name="duration" > tot <?php foreach($quotation->result() as $row){  $date = $row->enddate; } $dateday = date("j",strtotime($date));  $datemonth = date("n",strtotime($date));   $arraymonth = ["januari", "februari", "maart", "april","mei","juni","juli","augustus","september","oktober","november","december"];
                        for($i = 0; $i < count($arraymonth); $i++){ if($i == $datemonth){ $exactmonth = $arraymonth[$i - 1];}}; $dateyear = date("Y", strtotime($date)); echo $dateday. ' '.$exactmonth .' '.$dateyear;?></div></div>

            </div>
            <div class="tablerow">
                <div class="added tablecell" style="padding-top: 14px; ">Facturering</div>
                <div class="added tablecell">:</div>
                <div class="payment added tablecell"><textarea style=" max-height: 14px; min-height: 35px; min-width: 700px; padding-top: 14px; position: absolute; " name="method" ><?php if(is_string($name)){ echo "50% aanbetaling, 50% afbetaling";} else{foreach ($name->result() as $row){ if($row->entryname == "Method" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></textarea></div>

            </div>
            <div class="tablerow">
                <div class="tablecell"></div>
                <div class="tablecell"></div>
                <div class="payment added tablecell"><textarea style=" max-height: 14px; min-height: 45px; min-width: 700px;" name="methodExplanation" ><?php if(is_string($name)){ echo "Na volledige betaling zal het geleverde werk opgeleverd worden.";} else{foreach ($name->result() as $row){ if($row->entryname == "Methodexplanation" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></textarea></div>
            </div>
            <div class="tablerow">
                <div class="added tablecell" style=" position:absolute; bottom: 285px;">Betaling</div>
                <div class="added tablecell"> :</div>
                <div class="payment added tablecell"><textarea style=" max-height: 25px; min-height: 25px; min-width: 700px; padding-top: 0px;  position:absolute;" name="endDate" ><?php if(is_string($name)){ echo "binnen 14 dagen na factuurdatum";} else{foreach ($name->result() as $row){ if($row->entryname == "Enddate" && $row->pagesid == $pageId) {echo $row->entryvalue; }}} ?></textarea></div>
            </div>
        </div>
        <p class="agreement font-style">Voor akkoord, datum</p>
        <div class="tableagreement font-style">
            <div class="tablerow">
                <div class="tablecell">        <?php foreach ($companyName->result() as $row) {
 echo $row->name; }?></div>
                <div class="cornerstones tablecell">Cornerstones Media</div>
            </div>
            <div class="tablerow">
                <div class="company tablecell">Contactpersoon</div>
                <div class="cornerstones tablecell">Dhr. T. Rolink</div>
            </div>
            <div class="tablerow">
                <div class="company tablecell">Handtekening</div>
                <div class="cornerstones tablecell"><img src="<?php echo base_url()?>../assets/Img/handtekening.png"></div>
            </div>
            <div class="tablerow">
                <div class="company tablecell">Administratief e-mailadres</div>
                <div class="cornerstones tablecell"></div>
            </div>
        </div>
    </div>

<div class="logo font-style">
        <img src="<?php echo base_url()?>../assets/Img/bedenklogo.png" class="logos thinklogo">
        <p class="logos thinkdescription">Bedenken</p>
        <img src="<?php echo base_url()?>../assets/Img/ontwerplogo.png" class="logos designlogo">
        <p class="logos designdescription">Ontwerpen</p>
        <img src="<?php echo base_url()?>../assets/Img/realiserenlogo.png" class="logos realiselogo">
        <p class="logos realisedescription">Realiseren</p>
        <img src="<?php echo base_url()?>../assets/Img/uitvoerenlogo.png" class="logos executelogo">
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
