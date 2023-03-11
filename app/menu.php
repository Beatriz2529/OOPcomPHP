<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #3f51b5">
<div class="container-fluid">
  <a class="navbar-brand" href="./index.php">Logo</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="mynavbar">
    <ul class="navbar-nav me-auto">

<?php
  require  'conexao.php';
  $sql = "SELECT * FROM menu";
  $result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo '<li class="nav-item">
      <a class="nav-link" href="'.$row["link"].'" target="'.$row=["target"].'">'.$row["icone"]." ".$row["texto"].'</a></li>';
  }
} else {
  echo "0 results";
}
$conn->close();

?>
</ul>
    <form class="d-flex" method="post">
      <input class="form-control me-2" type="text" placeholder="Search" name="textoBusca">
      <button class="btn btn-primary" name="busca" type="submit">Search</button>
    </form>
  </div>
</div>
</nav>