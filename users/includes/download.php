<?php
/*<a href="../includes/download.php?id=<?php echo $id?>">*/
require_once('../.config/connect.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM course WHERE ID = '$id'";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_object($results);
    $file = '../.main/'.$row->_COURSE_PATH; 
    if(file_exists($file)){
        header('Content-Description: '.'File Transfer');
        header('Content-Type: '.'application/octet-stream');
        header('Content-Disposition: '.'attachment'.'; filename="'.basename($file).'"');
        header('Expires: '.'0');
        header('Cache-Control: '.'must-revalidate');
        header('Pragma: '.'public');
        header('Content-Length: '.filesize($file));
        readfile($file);
        exit;
    }else{
        echo "Cant download file";
    }
    
}else{
    echo "cannot find id";
}

$db->close();
?>