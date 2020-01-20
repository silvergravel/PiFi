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
    <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
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

  <h3>Filter By:</h3>
  <h2>District:</h2>
  <form action="" method="post" enctype="multipart/form-data" id="form_bolovideos_filter" class="forms">
    <select name="district_filter" id="district_filter">
      <option value="all" selected>All</option>
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
    <input type="submit" name="apply_filters" value="Apply Filters" >
  </form>

<?php

$videos_dir_path = '../Shared/';
$file_name = 'file_info.txt';
$allDistricts = ["ali rajpur", "balasore", "bhagalpur", "buxar" ,"chikballapur", "dungarpur", "jhabua", "johrat", "nalbari", "nalgonda", "other"];
$selectedDistrictFilter = "all";






if(isset($_POST['apply_filters'])){

  //if some option is selected before clicking apply filter
  if(isset($_POST['district_filter'])){
    //if selected filter is "all" then set the filters to the all districts array
    if($_POST['district_filter'] === "all")
    { $filterDistrict = $allDistricts; }
    //else set the filter to whatever district has been selected.
    else{ $filterDistrict = [$_POST['district_filter']]; }
    makeVideoPlaylist($videos_dir_path, $file_name, $filterDistrict);
    $selectedDistrictFilter = $_POST['district_filter'];
  }

}else{
  makeVideoPlaylist($videos_dir_path, $file_name, $allDistricts);
}


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
    <select name="district" id="district_select">
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

    <div id="block_selectors_wrapper">
      <h2>Block:</h2>
      <select class="block_select" id="block_selector_jhabua" name="block">
        <option value="" disabled selected>--Please choose a block--</option>
        <option value="j block 1">J Block 1</option>
        <option value="j block 2">J Block 2</option>
      </select>
      <select class="block_select" id="block_selector_chikballapur" name="block">
        <option value="" disabled selected>--Please choose a block--</option>
        <option value="c block 1">C Block 1</option>
        <option value="c block 2">C Block 2</option>
      </select>
    </div>

    <div id="village_selectors_wrapper">
      <h2>Village:</h2>
      <select class="village_select" id="village_selector_jhabua" name="village">
        <option value="" disabled selected>--Please choose a block--</option>
        <option value="j village 1">J Village 1</option>
        <option value="j village 2">J Village 2</option>
      </select>
      <select class="village_select" id="village_selector_chikballapur" name="village">
        <option value="" disabled selected>--Please choose a block--</option>
        <option value="c village 1">C Village 1</option>
        <option value="c village 2">C Village 2</option>
      </select>
    </div>

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

    //functions

    const hideSelectors = (selectorClass) => {
      var selects = document.getElementsByClassName(selectorClass);
      for (i = 0; i < selects.length; i++) {
          selects[i].style.display = "none";
          selects[i].setAttribute("disabled", true);
      }
    }

    //hide the block & village dropdowns
    document.getElementById("block_selectors_wrapper").style.display = "none";
    document.getElementById("village_selectors_wrapper").style.display = "none";
    hideSelectors("block_select");
    hideSelectors("village_select");


    $( "#district_select" ).change(function(event) {
          hideSelectors("block_select");
          hideSelectors("village_select");
          console.log($(this).val());
          document.getElementById("block_selectors_wrapper").style.display = "block";
          document.getElementById(`block_selector_${$(this).val()}`).style.display = "block";
          document.getElementById(`block_selector_${$(this).val()}`).removeAttribute("disabled");

          document.getElementById("village_selectors_wrapper").style.display = "block";
          document.getElementById(`village_selector_${$(this).val()}`).style.display = "block";
          document.getElementById(`village_selector_${$(this).val()}`).removeAttribute("disabled");
    });

    var selectedFilterVal = "<?php echo $selectedDistrictFilter ?>"

    $(`#district_filter`).val(selectedFilterVal);

    </script>

  </body>

</html>
