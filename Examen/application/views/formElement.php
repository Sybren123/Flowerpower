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
<?php echo form_open_multipart('addElement/'.$pillar.'/'.$companyName.'/'.$quotation.'/'.$pageNumber);?>
    <div class="menublock2">
        <img src="<?php echo base_url(); ?>../assets/img/Cornerstoneslogo.png" class="logoCorner">
        <div class="itemelement1">
            <p> Titel </p>
            <input type="text" name="title">
        </div>
        <div class="itemelement2">
            <p> Beschrijving </p>
            <textarea style="max-width: 500px; min-width: 400px; min-height: 300px; font-size: 12px;" name="description"> </textarea>
        </div>
        <div class="itemelement3">
            <p> Afbeelding </p>
            <select name="image">

            <?php if(empty($imageElement->result())){ ?>
            <option value="1">Nieuwe afbeelding</option>

            <?php } else { ?>
                <?php
                foreach ($imageElement->result() as $row) {
                    ?>

                <option value="<?php echo $row->image?>"><?php echo $row->title ?></option>"
                <?php $newImage = $row->image + 1; } ?>
                <option value="<?php echo $newImage ?>" name="custom"><?php  echo 'Nieuwe afbeelding '.$newImage.'.png'; ?></option>


                <?php }

            ?>
            </select>


            <br>
            <br>
            <input type="file" name="userfile" size="20" />

        </div>
        <div class="buttons">
            <input type="submit" value="Opslaan" name="save" class="btn btn-primary btn-lg">
            <input type="submit" value="Ophalen" name="get" class="btn btn-primary btn-lg">
            <input type="submit" value="Terug" name="back" class="btn btn-danger btn-lg">
        </div>


        <p class="titleselectelement"> Element ophalen </p>
        <select name="selectElement" class="selectelement">
            <?php foreach($element->result() as $row) {
                if($row->description == ' '){
                    continue;
                }?>
                <option value="<?php echo $row->id?>"><?php echo $row->title ?></option>"
            <?php } ?>
        </select>
    </div>

    <div class="background">
        <P class="webName">Formulier elementen</P>
    </div>
</form>

</body>
</html>