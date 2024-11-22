<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nigenius</title>
</head>

<body>

<?php
echo $resp;
?>

<?php
if($verify_first_return){

    echo form_open('api/lesson-file-req-save');
    echo '<input type="text" name="auth" placeholder="auth" required="required" />
    <br />
    <input type="text" name="data_file" placeholder="data_file" required="required" />
    <br />
    <input type="text" name="neo_data_file" placeholder="neo_data_file" required="required" />
    <br />
    <input type="text" name="data_file_type" placeholder="data_file_type" required="required" />
    <br />
    <input type="text" name="req_type" placeholder="req_type" required="required" />
    <input type="submit" name="process" value="Go.." />';
    echo form_close();

}
else{
    echo '.';
}
?>
  

</body>
</html>