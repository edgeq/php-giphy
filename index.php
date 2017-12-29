<?php
require_once 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
  <title>giphy search</title>
</head>

<body>
<div class="container">
  <form action="index.php" method="post">
    <div class="form-group">
      <label for="search">GIPHY Search:</label>
      <input type="text" name="search" value=" ">
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
  </form>

<?php
$client = new GuzzleHttp\Client();
$res = $client->request('GET', "https:/api.giphy.com/v1/gifs/search?q=".$_POST['search']."&api_key=dc6zaTOxFJmzC&limit=10");

$json_object = json_decode($res->getBody());
foreach ($json_object->data as $gif) {
    // var_dump($gif->images->original->url);
    echo '<img src="'. $gif->images->original->url .'
    " height="'.$gif->images->original->height.'
    " width="'.$gif->images->original->width.'
    " alt="" />';
}
// var_dump($json_object->data);

// echo $body;

 ?>
</div>
</body>
</html>
