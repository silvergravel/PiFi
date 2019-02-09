<?php
function uploadVideo($upload_directory_, $file_info_path_){

$upload_directory = $upload_directory_;
$file_info_path = $file_info_path_;



$errors = []; // Store all foreseen and unforseen errors here

$fileExtensions = ['mp4', 'jpg', 'png', 'mp3']; // Get all the file extensions

$video_source_path = $_FILES['video_file']['name'];
$path_parts = pathinfo($video_source_path);
$fileName = $path_parts['filename'];



$fileSize = $_FILES['video_file']['size'];
$fileTmpName  = $_FILES['video_file']['tmp_name'];
$fileType = $_FILES['video_file']['type'];
$fileExtension = strtolower(end(explode('.',$video_source_path)));

$uploadPath = $upload_directory . basename($video_source_path);

if (isset($_POST['submit'])) {



    if (! in_array($fileExtension,$fileExtensions)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
    }


   if($fileSize < 500000000){ //only if file is smaller than 500 MB then...
    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);


        if ($didUpload) {

            if ($file_info_path !== NULL){

            chmod($file_info_path, 0666);

            if (strpos(file_get_contents($file_info_path), $fileName) === false){

            $title = $_POST['title'];
            $subTitle = $_POST['sub-title'];
            $category = $_POST['category'];

            $file = fopen($file_info_path,"a+");
            echo fwrite($file, $fileName . ',' . $title . ',' . $subTitle . ',' . $category . "\n" );
            fclose($file);

            }
          }

            echo "The file " . basename($video_source_path) . " has been uploaded";
            echo "<form action='index.php'>";
            echo "<button>upload another file</button>";
            echo "</form>";

        } else {
            echo "An error occurred somewhere. Try again or contact the admin";
            echo "<form action='index.php'>";
            echo "<button>Try Again</button>";
            echo "</form>";
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "These are the errors" . "\n";
        }
    }
  }

}
}

?>
