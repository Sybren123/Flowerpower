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
        <div class="font-style tablecost ">
            <div class="tablerow">
                <div class="tablecell">Titel</div>
                <div class="tablecell">Kosten</div>
            </div>
<!--        <div class="tablemargin">-->
        <?php foreach($cost->result() as $row){
            echo  "<div class='tablerow' >" ;
            echo  "<div class='tablecell'>$row->title</div>";
            echo  "<div class='tablecell'>".str_replace('.',',', $row->cost)."</div>"; ?>
            <div class='tablecell'><a href="<?php echo base_url(); ?>deleteCost/<?php echo $pillar ?>/<?php echo $companyName ?>/<?php echo $quotation ?>/<?php echo $pageNumber ?>/<?php echo $row->id?>"> verwijder </a></div>
            <?php echo "</div>";
        }
        ?>
        </div>
<!--        </div>-->
        <div class="buttons">

        <input type="submit" name="addCost" value="Toevoegen" class="btn btn-primary btn-lg">
        <input type="submit" name="back" value="Terug"  class="btn btn-danger btn-lg">
        </div>
    </div>
    <div class="background">
        <P class="webName">Schema kosten</P>
    </div>
</form>

</body>
</html>