<?php

if (isset($_POST["Delete_Entry"])) {
    include "./dbconfig.php";
    $roll_roll = $_POST["roll_to_delete"];
    $start_date = $_POST["start_date_to_delete"];
    $end_date = $_POST["end_date_to_delete"];

    $sql="DELETE FROM demo_table1 WHERE (roll='$roll_roll' AND date='$start_date');";
    while (strtotime($start_date) < strtotime($end_date)) {
        // echo "$start_date \n";
        $start_date = date("Y-m-d", strtotime("+1 day", strtotime($start_date)));
        $sql.="DELETE FROM demo_table1 WHERE (roll='$roll_roll' AND date='$start_date');";
      }
      mysqli_multi_query($conn, $sql);
      echo "DELETE Successful";
}

?>