<?php
$conn = mysqli_connect(DB_HOST, DB_USER,DB_PASSWORD,DB_NAME);
if(!$conn){
    echo "Unable to connect to DB.";
    die;
}
$SQL = "SELECT * FROM stations order by name";
$result = mysqli_query($conn, $SQL);
$stations = array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $stations[$row['id']] = $row['name'];
    }
}

if(!empty($_POST)) {
    
    $len = count($_POST['from']);
    for($i = 0; $i < $len; $i++) {
        $SQL =  "insert into booking (	from_station,to_station,reciever_address,date)"
                . "values"
                . "("
                . "'".$_POST['from'][$i]."',"
                . "'".$_POST['to'][$i]."',"
                . "'".$_POST['recadd'][$i]."',"
                . "'".date("Y-m-d", strtotime($_POST['date'][$i]))."'"
                . ")";
        if(!mysqli_query($conn, $SQL)){
            echo '<div class="alert alert-danger">
  <strong>Error!</strong> Data not added, Please try again.
</div>';
        } else {
            echo '<div class="alert alert-success">
  <strong>Success!</strong> Data added successfully, Please try again.
</div>';
        }
    }
}


