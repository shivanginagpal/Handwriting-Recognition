<?php
    require_once "config.php";
/*    if (isset($_SESSION['access_token'])) {
		exit();
	}*/
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
          <a href="About.html">About</a>
          <a href="Contact_us.html">Contact Us</a>
        </nav>
        <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
      </div>
    </header>
<section id="banner">

</section>
<section id="three" class="wrapper align-center">
<?php

      if(isset($_FILES['image'])){
      $file_name = $_FILES['image']['name'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $selected_lang = $_POST['language'];
      move_uploaded_file($file_tmp,"images/".$file_name);
      shell_exec('"/usr/bin/python3" adaptive.py /var/www/html/images/'.$file_name.' 2>&1');

      shell_exec('"/usr/bin/tesseract" clearimage.png out -l '.$selected_lang.' 2>&1');
      //shell_exec('"/usr/bin/tesseract" "/var/www/html/images/'.$file_name.'" out -l '.$selected_lang.' 2>&1');
      shell_exec('vim out.txt -c "hardcopy > out.ps | q"; ps2pdf out.ps');
      }
?>
      <section id="three" class="wrapper align-center" >
				<div class="inner" >
          <div class="flex">
					<div class="flex flex-2" >
			<article >
      <?php
      echo "<h3>Uploaded Image</h3>";
      echo '<img src="images/'.$file_name.'" style="width:75%">';
      ?>
      </article>

      <article>
        <div style="width:60%">
      <?php
      echo "<h3>Output Text</h3>";
      $myfile = fopen("out.txt", "r") or die("Unable to open file!");
      ?>
    <p>
      <?php
    echo fread($myfile,filesize("out.txt"));
      fclose($myfile);
      ?>
    </p>
  </div>

      </article>
  <br>



<a href="out.txt" download><button  class="icon fa-file-text-o"  style="font-size:16px" class="button">Download as Text</button></a>


<a href="out.pdf" download><button class="icon fa-file-pdf-o" style="font-size:16px" class="button">Download as pdf</button></a>


<form action="upload.php" method="POST" enctype="multipart/form-data">

<input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Upload To Google Drives"/>

</form>

</div>
</div>
</div>
</section>
</body>
</html>
