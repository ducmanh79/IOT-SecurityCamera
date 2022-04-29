<?php require_once 'config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Security View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php 
  header("refresh: 3");
?>
<?php 
  $sql = "SELECT * FROM facereg";
  $result = mysqli_query($conn,$sql);
?>
 
<div class="container">
     
  <table class="table">
    <thead>
      <tr>
        <th>Logged ID</th>
        <th>View</th>
        <th>Date/time logged in </th>
      </tr>
    </thead>
    <tbody>
      <?php
         while($r = $result->fetch_assoc()){
      ?>
      <tr>
        <td scope="row"><?php echo $r['id'] ?></td>
        <td><img src="<?php echo $r['location'] ?>" style="max-width:150px;"/></td>
        <?php $tcreate = strtotime($r['time_created']) ?>
        <td><?php echo date('D M Y h:i:s A',$tcreate); ?></td>
      </tr>
      <?php
          }
      ?>
    </tbody>
  </table>
  <a class="btn btn-danger" role="button" href="tel:+84977101480" style="justify-content:center;">Call Security</a>
</div>
 
</body>
</html>