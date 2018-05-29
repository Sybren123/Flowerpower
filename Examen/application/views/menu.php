<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/menuCompany.css">
    <title>Offertesysteem Cornerstones</title>

</head>
<body>

<div class="container">
    <div class="menublock1">
        <img src="http://offerte2.local/assets/img/Cornerstoneslogo.png" class="logo">
        <form method="post" action="">
        <input type="submit" name="terug" value="Terug" class="btn btn-primary back">
    <div class="section1">
    <select name="receiveQuotation">
        <?php foreach($quotation->result() as $row) {
            ?>
            <option value="<?php echo $row->id?>" name="companyselect"><?php echo urldecode($row->quotationName) ?></option>

        <?php }
        ?>
    </select>
    </div>
    <div class="textfield1">
    <p>Offertenaam</p>
        <input type="text" name="quotation">
        <p>Vervaldatum offerte</p>
        <input type="date"  name="enddate">


    </div>
    <div class="quotation1">
        <select name="pillars">

            <option value="1" name="pillarselect">Denklogo </option>
            <option value="2" name="pillarselect">Ontwerplogo </option>
            <option value="3" name="pillarselect">Realiserenlogo </option>
            <option value="4" name="pillarselect">Uitvoerenlogo </option>
        </select>
    </div>
    <div class="build1">

    <input type="submit" name="aanmaken" value="Aanmaken" class="btn btn-primary">

    </div>
    <div class="get1">
   <input type="submit" name="ophalen" value="Ophalen" class="btn btn-primary">
        <input type="submit" name="delete" value="Verwijderen" class="btn btn-danger">

    </div>



</form>
<?php foreach($address->result() as $row) {
  //  echo $row->street .'<br>';
   // echo $row->address;
} ?>
    </div>
</div>

</body>
</html>