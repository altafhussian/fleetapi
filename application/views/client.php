<!DOCTYPE html>
<html lang="en">
<head>
  <title>API Client | Altaf</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .red{
    background-color: red;
   }
   .green{
    background-color: green;
   }
  </style>
</head>
<body>
<?php
// Create a stream
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"auth-key: test\r\n" .
              "auth-secret: test\r\n"
  )
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$file = file_get_contents('http://localhost/fleetapi/devices', false, $context);

$devices = json_decode($file);

?>
<div class="container">
<div>
    <div>            
    </br>
      <h4>Device Informations</h4>
    </br>
      <table class="table">
        <thead>
          <tr>
            <th>Device ID</th>
            <th>Device Label</th>
            <th>Last Reported</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
        <?php
            if ($devices != '') {
                for ($i=0; $i < count($devices); $i++) { 
                 echo "<tr style='background-color:"; echo ($devices[$i]->status == 1) ? "lightgreen'>" : "lightsalmon'>";
                 echo "<td>" . $devices[$i]->device_id . "</td>";
                 echo "<td>" . $devices[$i]->device_label . "</td>";
                 echo "<td>" . $devices[$i]->last_reported . "</td>";
                 echo "<td>" . $devices[$i]->status . "</td>";
                 echo "</tr>";
                }
            }
        ?>
        </tbody>
      </table>
    </div>
</div>
</body>
</html>