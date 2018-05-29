<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/menuCompany.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/style.css">

    <title>Offertesysteem Cornerstones</title>

</head>
<body>

<form method="post" action="">
    <div class="menublock2">
        <img src="<?php echo base_url(); ?>../assets/img/Cornerstoneslogo.png" class="logoCorner">


    <div class="font-style table">
    <div class="tablerow">
        <div class="tablecell">Fase</div>
        <div class="tablecell">Werkzaamheden</div>
        <div class="tablecell">Verantwoordelijke</div>
        <div class="tablecell">Week</div>
    </div>
<?php foreach($planning->result() as $row){
            if($row->week == 0){ $row->week = '';}
            if($row->phase == 0){ $row->phase = '';}
            echo  "<div class='tablerow' >";
            echo  "<div class='tablecell'>$row->phase</div>";
            echo  "<div class='tablecell'> $row->activities</div>";
            echo " <div class='tablecell'> $row->responsible</div>";
            echo "<div class='tablecell'> $row->week </div>";
            ?>

        <div class='tablecell'><a href="<?php echo base_url(); ?>deletePlanning/<?php echo $pillar ?>/<?php echo $companyName ?>/<?php echo $quotation ?>/<?php echo $pageNumber ?>/<?php echo $row->id?>"> verwijder </a></div>
    <?php  echo "</div>";
             } ?>
        </div>
        <div class="buttons">
        <input type="submit" name="addPlanning" value="Toevoegen" class="btn btn-primary btn-lg">
        <input type="submit" name="back" value="Terug" class="btn btn-danger btn-lg">
        </div>
    </div>
    <div class="background">
        <P class="webName">Schema planning</P>
    </div>

</form>

</body>
</html>