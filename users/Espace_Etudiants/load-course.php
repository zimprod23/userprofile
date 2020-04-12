<?php
require_once('../.config/connect.php');
session_start();


if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $query = "SELECT * FROM course ";
    $response = $db->query($query);
    echo "<table>";
    echo "<tr><th>course</th><th>name</th><th>fname</th><th>branche</th><th>semester</th><th>desc</th><th>date</th></tr>";
    while($row = mysqli_fetch_object($response)){
        $id=$row->ID;
        $course_name = $row->_TITLE;
        $name = $row->_PUB_NAME;
        $fname = $row->_PUB_FNAME;
        $branche = $row->_BRANCHE;
        $semester = $row->_SEMESTER;
        $description = $row->_DESCRIPTION;
        $date = $row->_RELEASE_DATE;
        $link = '<a href="../includes/download.php?id='.$id.'">TELECHARGER</a>';
        echo "<tr>";
        echo "<td>$course_name</td>";
        echo "<td>$name</td>";
        echo "<td>$fname</td>";
        echo "<td>$branche</td>";
        echo "<td>$semester</td>";
        echo "<td>$description</td>";
        echo "<td>$date</td>";
        echo '<td>'.$link.'</td>';
        echo "</tr>";
    }
    echo "</table>";


}
$db->close();
?>