

<b>Add a CV</b>
    <form method="post" enctype="multipart/form-data">
        Select file: 
        <input type="file" name="filename" size="10" value="Select file" >
        <input type="submit" value="Upload"/>
    </form>

    <?php
        if ($_FILES && $_FILES["filename"]["error"]== UPLOAD_ERR_OK){
            $name = $_FILES["filename"]["name"];
            move_uploaded_file($_FILES["filename"]["tmp_name"], $name);
            echo "File downloaded";
        }
    ?>


    