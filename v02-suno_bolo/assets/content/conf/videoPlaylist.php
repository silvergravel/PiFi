<?php

function makeVideoPlaylist($videos_dir_path_, $txt_file_name_){

  //variables storing the arguements being parsed
  $videos_dir_path = $videos_dir_path_;
  $txt_file_name = $txt_file_name_;

  $data = file_get_contents($videos_dir_path.$txt_file_name);
  $singleLine = explode("\n", $data);

  $extensions_array = array('mp4','jpg','png','mp3', 'aac', 'wav', 'amr');

  $file_names = array();

  if ($handle = opendir($videos_dir_path)) {
    while (false !== ($entry = readdir($handle))) {
      if ($entry != "." && $entry != ".." && $entry[0] != ".") {

          $file_names[] = $entry;

      }
    }

    closedir($handle);

  }

  for($i = 0; $i < count($file_names); $i++){

    $path_parts = pathinfo($file_names[$i]);
    $extension = $path_parts['extension'];

    if(in_array($extension, $extensions_array)){

      $filename = $path_parts['filename'];


//loop through the text file, find related meta info about the video in question
//(from the prevous for loop), and save that data in variables.
    if($txt_file_name !== NULL){
      for($j = 0 ; $j < count($singleLine); $j++){

        if (strpos($singleLine[$j], $filename) !== false){
          $video_info_string = $singleLine[$j];
          $video_info = explode(";", $video_info_string);
          $caption = $video_info[1];
          $description = $video_info[2];
          $district = $video_info[3];
          $block = $video_info[4];
          $village = $video_info[5];

        }

      }
    }

    //fill in the spaces in a video name with %20, cus that is the encoding
    //for html to be able to read 'space' in 'src'
    $encoded_file_name = str_replace(' ', '%20', $file_names[$i]);



    echo "<div class='video-block'>";
    if($extension === "mp4"){
        echo "<video class='video-player' controls>
              <source src=$videos_dir_path$encoded_file_name#t=1 type='video/mp4; codecs=\"avc1.42E01E, mp4a.40.2\"'>
              </video>";

    }else if($extension === "jpg" || $extension === "png" ){

        echo "<div class='image-wrapper'>
                <a href=$videos_dir_path$encoded_file_name target='_blank'>
                  <img src=$videos_dir_path$encoded_file_name >
                </a>
              </div>";


    }else if($extension === "mp3" || $extension === "aac" || $extension === "wav"){
        echo "<audio class='audio-player' controls>
                <source src=$videos_dir_path$encoded_file_name type=audio/$extension>
              </audio>";
    }else if($extension === "amr"){
        echo "<h2>$file_names[$i]</h2>
              <a href=$videos_dir_path$encoded_file_name download>download</a>";


       }

    echo "<h2>$caption</h2>
          <h3>$description</h3>
          <h6><strong>$district</strong></h6>
          <h6>$block | $village</h6>";
    if($videos_dir_path === '../bolo-videos/'){
      echo "<form method='post' action=''>
            <input type='hidden' name='file_name' value='".$file_names[$i]."'>
            <input type='submit' name='publish_to_suno' value='Publish To Suno'>
            </form>";
    }

     echo "<br>
          <hr>
          </div>";

    }

  }
}



?>
