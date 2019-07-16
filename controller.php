<?php

$files = $_FILES['files'];
echo move_uploaded_file($files['tmp_name'], "/home/anderson/$files[name]");
