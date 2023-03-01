<?php

var_dump($_FILES);
move_uploaded_file($_FILES['anh']['tmp_name'],'images/'.$_FILES['anh']['name']);

?>