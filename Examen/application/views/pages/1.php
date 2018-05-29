<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/print.css" media="print">
    <title>Offertesysteem Cornerstones</title>
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
<!--    <style>-->
<!--        .backgroundimagehomepage {-->
<!--            background-repeat: no-repeat;-->
<!--            position: absolute;-->
<!--            top: -23px;-->
<!--            left: -23px;-->
<!--            z-index: -1;-->
<!--            height: 33cm;-->
<!--            width: 21.8cm; }-->
<!---->
<!--        .logohomepage {-->
<!--            display: block;-->
<!--            padding-top: 100px;-->
<!--            margin-left: 32%; }-->
<!---->
<!--        .companyname{-->
<!--            position: absolute;-->
<!--            top: 880px;-->
<!--            left: 340px;-->
<!--        }-->
<!---->
<!--        .projectlogo{-->
<!--            position: absolute;-->
<!--            top: 850px;-->
<!--            left: 348px;-->
<!--        }-->
<!---->
<!--        .pdf, .add, .print{-->
<!--            display: none;-->
<!--        }-->
<!---->
<!---->
<!--    </style>-->
<!--   --><?php //} ?>
    <title>Cornerstones</title>

</head>
<body>


<form action="" method="post">
    <div class="homepagemenu hidden">
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
    <input type="submit" name="add" class="add hidden" value="Pagina toevoegen">
        <br>
        <p class="font-style whitetext"> Pagina nummers:</p>
        <?php
        $i = 0;
        foreach($pagesdata->result() as $rows){
            $i++;
            echo "<a href='$rows->id' class='hidden pagenumbersView'>". $i ."</a>";

        }; ?>
<br>

        <input type="submit" name="back" class="back hidden" value="Terug">

    </div>
</form>
<!--<button onclick="printContent('a4')" class="print hidden">PRINT </button>-->

<div class="backgroundimagehomepage a4" id="a4">
    <?php if($this->input->post('pdf')){ ?>

    <img src="assets/Img/bitmap.png" class="backgroundimagehomepage">
    <?php }  else {?>

    <img src="<?php echo base_url(); ?>../assets/Img/bitmap.png" class="backgroundimagehomepage">
    <?php } ?>

    <?php if($this->input->post('pdf')){ ?>
    <img src="assets/Img/Cornerstoneslogo.png" class="logohomepage"/>
    <?php }  else {?>
    <img src="<?php echo base_url(); ?>../assets/Img/Cornerstoneslogo.png" class="logohomepage"/>
    <?php } ?>


    <div class="startproject">
    <?php
    if($pillar == 1){
        ?>
        <img src="<?php echo base_url(); ?>../assets/Img/bedenklogo.png" class="projectlogo">
    <?php
    }
    if($pillar == 2){
        ?>
         <img src="<?php echo base_url(); ?>../assets/Img/ontwerplogo.png" class="projectlogo">
    <?php
    }
    if($pillar == 3){
        ?>
         <img src="<?php echo base_url(); ?>../assets/Img/realiserenlogo.png" class="projectlogo">
    <?php
    }
    if($pillar == 4){
        ?>
         <img src="<?php echo base_url(); ?>../assets/Img/uitvoerenlogo.png" class="projectlogo">
    <?php } ?>

    <?php foreach($companyName->result() as $row){
        echo "<p class='companyname font-style'  style='max-height: 50px; min-height: 50px; min-width: 700px;'> " .$row->name. "</p>";
    } ?>

    <?php foreach($quotation->result() as $row){

    echo "<p class='companyname descriptionproject font-style'  style='max-height: 50px; min-height: 50px; min-width: 700px;'>". $row->quotationName ."</p>";
}?>

</div>
</div>



