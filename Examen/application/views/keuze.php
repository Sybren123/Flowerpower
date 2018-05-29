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
    <div class="menublock">
        <img src="http://offerte2.local/assets/img/Cornerstoneslogo.png" class="logo">
<form method="post" action="">
    <div class="section">
<select name="section">
    <?php foreach($companies as $row) {?>
        <option value="<?php echo $row->id?>"><?php echo $row->name ?></option>"
    <?php } ?>
</select>
    </div>

    <div class="textfield">
        <p>Bedrijfsnaam:</p>

        <input type="text"   name="company">
        <p>Straatnaam + nummer:</p>

        <input type="text"   name="street">
        <p>Postcode:</p>

        <input type="text"   name="zipcode">
        <p>Stad:</p>

        <input type="text"   name="city">
    </div>

        <div class="build">
    <input type="submit" name="aanmaken" value="Aanmaken" class="btn btn-primary">
            </div>
        <div class="get">
    <input type="submit" name="ophalen" value="Ophalen" class="btn btn-primary">

        </div>
    <input type="submit" name="delete" value="Verwijderen" class="btn btn-danger delete">

</form>
        </div>
    </div>
</body>
</html>