<?php
    require_once "config.php";
    if (isset($_SESSION['access_token'])) {
		exit();
	}
    $loginURL = $gClient->createAuthUrl();

 ?>
<!DOCTYPE html>
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>

  <!-- Header -->
    <header id="header">
      <div class="inner">
      <a href="index.html" class=" logo button special big">Home</a>
         <nav id="nav">
          <a href="generic.html">About</a>
          <a href="elements.html">Contact us</a>
        </nav>
        <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
      </div>
    </header>

<section id="three" class="wrapper align-center">
<?php
      if(isset($_FILES['image'])){
      $file_name = $_FILES['image']['name'];
      $file_tmp =$_FILES['image']['tmp_name'];
      move_uploaded_file($file_tmp,"images/".$file_name);
      echo "<h3>Image Upload Success</h3>";
      echo '<img src="images/'.$file_name.'" style="width:30%">';

      shell_exec('"/usr/bin/tesseract" "/var/www/html/images/'.$file_name.'" out -l hin');

      shell_exec('vim out.txt -c "hardcopy > out.ps | q"; ps2pdf out.ps');

      echo "<br><h3>OCR after reading</h3><br><pre>";

      $myfile = fopen("out.txt", "r") or die("Unable to open file!");
      echo fread($myfile,filesize("out.txt"));
      fclose($myfile);
      echo "</pre>";
      }
?>


<a href="out.txt" download><button class="button">Download</button></a>
<br>
<a href="out.pdf" download><button class="button">Download as pdf</button></a>
<br>
<form action="upload.php" method="POST" enctype="multipart/form-data">
<input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Upload To Google Drives"/>
</form>
</section>
</body>
</html>
