<?php
$conn=mysqli_connect("localhost","root","", "db_crud");
if(!$conn){
    die("Cnão foi possivel connectar".mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script type="text/javascript">

$(document).ready(function(){
  
    $("#form1 #select-all").click(function(){

        $("#form1 input[type='checkbox'").prop('checked', this.checked);
    });

});

</script>

<title>Mult Checbox</title>

</head>
<body>
<?php
    
    if(isset($_POST['submit'])){
        if(isset($_POST['id'])){
            foreach ($_POST['id'] as $id) {
                $query="DELETE FROM vagas WHERE id='$id'";
                mysqli_query($conn,$query);
            }
        }
    }


   $sql = "select * from vagas";
   $result=mysqli_query($conn,$sql);
?>
<form id="form1" action="index.php" method="post">

<div class="container">

<table style="width:100%">
  <tr colspan="3">
  <input type="submit" name="submit" value="Delete" onclick="return confirm('Produtos Excluidos com Sucesso !!!')"  class="btn btn-danger" >
  </tr>
  <tr>
  <th> <input type="checkbox" id="select-all"> </th>
    <th>ID</th>
    <th>NOME</th>
    <th>DESCRIÇÃO</th>
  </tr>
  <?php
  while($row=mysqli_fetch_array($result)){
  
  ?>
  <tr>
    <td><input type="checkbox" value="<?= $row['id'] ?>" name="id[]"></td>
    <td><?= $row['id']; ?></td>
    <td><?= $row['titulo']; ?></td>
    <td><?= $row['descricao']; ?></td>
  </tr>
  <?php
  }
  ?>

</table>

</div>

    </form>
</body>
</html>
