<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Document</title>
</head>
<body>
  <?php 
    $data['content'] = str_replace('[Name]',$data['name'],$data['content']);
    $data['content'] = str_replace( "\n", "<br />",$data['content']);
    echo $data['content']
  ?>
  
</body>
</html>