<html>
  <head>
    <link rel="stylesheet" href="/content/css/page_style.css">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width">
    <title>The Smart Network</title>


  </head>
  <body>
    <div class="imgBg">
      <img src="img/smartman_logo.png">
      <h1>તમારું સ્વાગત છે</h1>
    </div>

  <?php

  $dir_path = '../Shared/';
  $extensions_array = array('mp4');
  $file_names = array();


    if ($handle = opendir($dir_path)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && $entry[0] != ".") {

            $file_names[] = $entry;
        }
    }
    closedir($handle);
}

for($i = 0; $i < count($file_names); $i++){
  //echo "$file_names[$i]<br>";

  $path_parts = pathinfo($file_names[$i]);
  $extension = $path_parts['extension'];
  //echo "$extension<br>";

  if(in_array($extension, $extensions_array)){
    $caption = $path_parts['filename'];
    $video_source_path = str_replace(' ', '%20', $file_names[$i]);
    //echo "This is the path of the video ";
    //echo "$dir_path$video_source_path<br>";

    echo"<div class='video-block'>
            <h2>$caption</h2>
            <video class='video-player' controls>
                <source src=$dir_path$video_source_path#t=1 type='video/mp4; codecs=\"avc1.42E01E, mp4a.40.2\"'>
            </video>
         </div>";

  }

}


  ?>

  </body>

</html>
