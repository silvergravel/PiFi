<html>

  <head>

    <link rel="stylesheet" href="css/page_style.css">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width">
    <title>Suno Bolo</title>

  </head>

  <body>


    <div class="logoContainer">
      <img src="img/logo_placeholder.png">
      <h1></h1>


    </div>

    <a href="sunobolo.php" class="primaryBtn--linkWrapper" onClick="passDefaultOpen(this)" id="suno">

    <div class="primaryBtn">
      <h1>Suno</h1>
    </div >
    </a>

    <a href="sunobolo.php" class="primaryBtn--linkWrapper" onClick="passDefaultOpen(this)" id="bolo">

    <div class="primaryBtn">

      <h1>Bolo</h1>

    </div>
    </a>



<script> //save data of which button was clicked in local memory

function passDefaultOpen(element){
var clicked = element.id;
localStorage.setItem( 'idToDisplay', clicked );
}

</script>

  </body>

</html>
