<?php
	require_once "config.php";
	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} 

if ($gClient->getAccessToken()) {
  print "Test 1\n";

  $folder_metadata = new Google_Service_Drive_DriveFile(
                          array('name' => 'HandwritingToText',
                                'mimeType' => 'application/vnd.google-apps.folder'));
  
  print "Test 2\n";
  
  $folder = $service->files->create($folder_metadata, array('fields' => 'id'));
  
  print "Folder ID: %s\n" . $folder->id;
  
  $file_metadata = new Google_Service_Drive_DriveFile(
                                    array('name' => 'out.txt',
                                          'parents' => array($folder->id)));
  
  print "Test 3\n";

  $content = file_get_contents('out.txt');

  print "Test 4\n";

  $file_txt = 
    $service->files->create($file_metadata, 
                            array('data' => $content,
                                  'mimeType' => 'text/plain',
                                  'uploadType' => 'multipart',
                                  'fields' => 'id'));

  printf("File ID: %s\n", $file_txt->id);
/*
  $pageToken = null;
  do {
      $response = $service->files->listFiles(array(
          'q' => "mimeType='text/plain'",
          'spaces' => 'drive',
          'pageToken' => $pageToken,
          'fields' => 'nextPageToken, files(id, name)'
      ));
      
      print "Test 5\n";

      foreach ($response->files as $sfile) {
          printf("Found file: %s (%s)\n", $sfile->name, $sfile->id);
      }

      $pageToken = $repsonse->pageToken;
  } while ($pageToken != null);
*/  
  header('Location: index.html?status=Uploaded to drive');
		
} else {
		header('Location: index.html?status=Fail');
		exit();
}

?>