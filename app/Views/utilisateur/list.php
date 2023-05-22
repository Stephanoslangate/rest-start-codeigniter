<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
        caption-side: bottom;
        }
        th, td{
        border: 1px solid black;
        padding: 10px;
        }
        caption{
        background-color: #0AD;
        font-weight: bold;
        }
    </style>
</head>
<body>
    
    
<div class="row">

<div class="col-md-12">
<table class="table" border >
<caption>Info utilisateurs</caption>

  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Email</th>

    </tr>
  </thead>
  <tbody>
    <?php 
      foreach ($users as  $user) {
        echo "<tr><th scope='row'>".$user['nom']."</th>";
        echo "<td style='color: green;'>".$user['prenom']."</td>";
        echo "<td>".$user['email']."</td></tr>";
      }
    ?>

  </tbody>
</table>
</div>
</div>
 

</body>
</html>