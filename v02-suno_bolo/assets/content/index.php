<?php
include 'conf/videoPlaylist.php';
include 'conf/uploadVideo.php';



function logThisVisit(){
  $analyticsFilePath = "analytics/analytics.txt";
  $file = fopen($analyticsFilePath,"a+");
  date_default_timezone_set("Asia/Kolkata");
  fwrite($file, date("d/m/y"). date(" H:i") . "\n" );
  fclose($file);
}

logThisVisit();
?>

<html>
  <head>
    <link rel="stylesheet" href="css/page_style.css">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width">
    <title>Suno Bolo</title>


  </head>
  <body>
    <div class="logoContainer">
      <a href="index.php"><img src="img/logo.png"></a>

      <!-- તમારું સ્વાગત છે -->
    </div>

    <div class='primaryToggleBar'>
      <button class="tablink" onclick="openBlock('sunoBlock', this, 'rgb(41, 41, 41)')" id="suno">Suno</button>
      <button class="tablink" onclick="openBlock('boloBlock', this, 'rgb(41, 41, 41)')" id="bolo">Bolo</button>
    </div>

<div id="sunoBlock" class="tabcontent">

<?php

$videos_dir_path = '../Shared/';
$file_name = 'file_info.txt';

makeVideoPlaylist($videos_dir_path, $file_name);

?>

</div>  <!-- closing the sunoBlock div -->



<div id="boloBlock" class="tabcontent">

  <?php

      $upload_directory = "bolo-videos/";
      $file_info_path = "bolo-videos/file_info.txt";

      uploadVideo($upload_directory, $file_info_path);

  ?>

  <form action="" method="post" enctype="multipart/form-data" id="form_uploadBoloVideos_user" class="forms">

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

</div>  <!-- closing the boloBlock div -->



    <script>


    var defaultOpen;

    // Based on selection on prev. page, capture the correct tab and click it (suno or bolo)
    if(localStorage.getItem('idToDisplay') !== null){
       defaultOpen = localStorage['idToDisplay'];
    }else{
      defaultOpen = "suno";
    }

    console.log(defaultOpen);
    document.getElementById(defaultOpen).click();

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
        localStorage.setItem( 'idToDisplay', elmnt.id );

    }


    </script>

  </body>

</html>
