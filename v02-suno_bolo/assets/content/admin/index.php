<?php
include '../conf/videoPlaylist.php';
include '../conf/uploadVideo.php';



$upload_directory = "../../Shared/";
$file_info_path = "../../Shared/file_info.txt";

uploadVideo($upload_directory, $file_info_path);




// <!-- actual file deletion and removal of related metadata entry from text file -->


if(isset($_POST['delete_file']))
{
 $video_source_path = $_POST['file_name'];
 $path_parts = pathinfo($video_source_path);
 $fileName = $path_parts['filename'];

 $DELETE = $fileName;

  $data = file_get_contents($file_info_path);



  $singleLine = explode("\n", $data);

  $out = array();

  for($i = 0 ; $i < count($singleLine); $i++){

    if (strpos($singleLine[$i], $fileName) === false){
      $out[] = $singleLine[$i];

    }
  }


  $fp = fopen($file_info_path, "w+");
  flock($fp, LOCK_EX);
  foreach($out as $line) {
      if($line !== ""){
      fwrite($fp, $line . "\n");
  }
}
  flock($fp, LOCK_UN);
  fclose($fp);

 unlink($upload_directory.$video_source_path);
}
?>



<html>

<head>
  <link rel="stylesheet" href="../css/page_style.css">
  <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width">
  <title>Suno Bolo Admin</title>




</head>
<body>

  <div class="logoContainer">
    <a href=""><img src="../img/logo.png"></a>
    <h2 class="page-title">Admin Panel</h2>
    <!-- તમારું સ્વાગત છે -->
    <button style="float:right"><a href="/content/admin/analyticslog.php">View Analytics Log</a></button>
  </div>

  <div class="primaryToggleBar">
    <button class="tablink" onclick="openBlock('adminHome', this, 'rgb(41, 41, 41)')" id="defaultOpen">Upload Suno Media</button>
    <button class="tablink" onclick="openBlock('viewBolo', this, 'rgb(41, 41, 41)')">View Bolo Submissions</button>
  </div>


<div id="adminHome" class="tabcontent">

  <div id='uploadVideoBtnWrapper'>
  <button id="uploadVideoBtn" onClick="openUploadPopUp()">UPLOAD MEDIA</button>
  </div>

  <div id="availableSpace">
    <?php

    $totUsedSpace = 0;

    $sunoContentPath = '../../Shared/';
    $boloContentPath = '../bolo-videos/';

    if ($handle = opendir($sunoContentPath)) { //get the folder that contains the media.
        /* This is the correct way to loop over the directory. */
        while (false !== ($file = readdir($handle))) {
          if($file != "." && $file != ".." && $file[0] != "."){
          $totUsedSpace += filesize($sunoContentPath.$file)/1000000000; //file size in GB
          }
        }
        closedir($handle);
    }

    if ($handle = opendir($boloContentPath)) { //get the folder that contains the media.
        /* This is the correct way to loop over the directory. */
        while (false !== ($file = readdir($handle))) {
          if($file != "." && $file != ".." && $file[0] != "."){
          $totUsedSpace += filesize($boloContentPath.$file)/1000000000; //file size in GB
          }
        }
        closedir($handle);
    }

    $totUsedSpace = round($totUsedSpace, 2);
    $totAvailableSpace = round(disk_free_space ( $sunoContentPath )/1000000000,2); //in GB
    $totSpaceCapacity = $totUsedSpace+$totAvailableSpace;
    $percentUsedSpace = ($totUsedSpace/$totSpaceCapacity)*100;

    echo"<div style='margin:30px'>
           <h2>Total Available Space on PiFi:</h2>
           <h1><strong>".$totAvailableSpace." GB</strong> of ".$totSpaceCapacity." GB</h1>
           <div style='height:20px;
                       background-color: grey;'>
             <div class='usedSpaceIndicator' style='height:100%;
                                                    width:".round($percentUsedSpace,2)."%;
                                                    background-color:black;'>
             </div>
           </div>
         </div>"

    ?>
  </div>

<div id="uploadSuno">
  <button id="closeUploadSunoPopUp" onClick="closeUploadPopUp()" style="cursor:pointer; background:none;">
    <img src="../img/close.svg">
  </button>

  <form action="" method="post" enctype="multipart/form-data" id="form_uploadSunoVideos_admin" class="forms">

      <h2>Choose A Media to Upload</h2>
      <input type="file" name="video_file" id="fileToUpload">


      <h2>Title:</h2>
      <input type="text" name="title">

      <h2>Sub Title:</h2>
      <textarea rows="4" cols="50" name="sub-title"></textarea><br>


      <h2>District:</h2>
      <select name="district">
        <option value="" disabled selected>--Please choose a district--</option>
        <option value="ali rajpur">Ali Rajpur</option>
        <option value="balasore">Balasore</option>
        <option value="bhagalpur">Bhagalpur</option>
        <option value="buxar">Buxar</option>
        <option value="chikballapur">Chikballapur</option>
        <option value="dungarpur">Dungarpur</option>
        <option value="jhabua">Jhabua</option>
        <option value="johrat">Johrat</option>
        <option value="nalbari">Nalbari</option>
        <option value="nalgonda">Nalgonda</option>
        <option value="other">Other</option>
      </select>

      <input type="submit" name="submit" value="Upload File Now" >
    </form>

</div>


<div id="sunoVideoList">

<?php
if ($handle = opendir('../../Shared/')) { //get the folder that contains the media.

    /* This is the correct way to loop over the directory. */
    while (false !== ($file = readdir($handle))) {

      $fileExtension = strtolower(end(explode('.', $file)));
      if($file != "." && $file != ".." && $file[0] != "." && $fileExtension != "txt"){

      echo "<h2>".$file."</h2>";
      echo "<p>".(filesize('../../Shared/'.$file)/1000000)." MB</p>";
      echo "<form method='post' action=''>";
      echo "<input type='hidden' name='file_name' value='".$file."'>";
      echo "<input type='submit' name='delete_file' value='Delete File'>";
      echo "</form>";
      }
    }



    closedir($handle);
}
?>
</div>

</div>

<div id="viewBolo" class="tabcontent">
  <div class="page-title-wrapper">
  <h1 >Bolo content submitted by users</h1>
  </div>
  <?php
  $videos_dir_path = '../bolo-videos/';
  $file_name = '../bolo-videos/file_info.txt';
  makeVideoPlaylist($videos_dir_path, $file_name);
  ?>

</div>

<script>

document.getElementById("defaultOpen").click();

function openBlock(blockName,elmnt, color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(blockName).style.display = "block";
    elmnt.style.backgroundColor = color;

}

function openUploadPopUp(){
  document.getElementById('uploadSuno').style.display = "block";
}

function closeUploadPopUp(){
  document.getElementById('uploadSuno').style.display = "none";
}

</script>

</body>
</html>
