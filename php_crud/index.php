<?php
session_start();
include_once("conexao.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  	<?php include('navbar.php'); ?>
  	<div class="container mt-4">
  		<!– Mensagens de aviso -->
  		<?php include('mensagens.php'); ?>
  		<div class="row">
  			<div class="col-md-12">
  				<div class="card">
  					<div class="card-header">
  						<h4>Lista de clientes
  						<a href="usuario-create.php" class="btn btn-primary float-end">Adicionar usuário</a>
  						</h4>	
  					</div>
  					<!– Inicio da estrutura da tabela -->
  					<div class="card-body">
  					 	<table class="table table-bordered table-striped">
  					 		<thead>
  					 			<tr>
  					 				<th>ID</th>
  					 				<th>Nome</th>
  					 				<th>Email</th>
  					 				<th>Data</th>
  					 				<th>Ações</th>
  					 			</tr>
  					 		</thead>
  					 		
  					 		<!– Conexão para visualização dos dados  -->
  					 		<?php
  					 			$sql = 'SELECT * FROM usuarios';
  					 			$usuarios = mysqli_query($conexao, $sql);
  					 			if (mysqli_num_rows($usuarios) > 0){
  					 				foreach ($usuarios as $usuario) {
  					 		?>
  					 		
  					 		<!– Corpo da  tabela -->
  					 		<tbody>
  					 			<tr>
  					 				<td><?=$usuario['id']?></td>
  					 				<td><?=$usuario['nome']?></td>
  					 				<td><?=$usuario['email']?></td>
  					 				<td><?=date('d/m/Y', strtotime($usuario['data_nascimento']))?></td>
  					 				<!– Coluna de ações -->
  					 				<td>
  					 					<a href="usuario-view.php?id=<?=$usuario['id']?>" class="btn btn-secondary btn-sm">Visualizar</a>
  					 					<a href="usuario-edit.php?id=<?=$usuario['id']?>" class="btn btn-success btn-sm">Editar</a>
  					 					<form action="acoes.php" method="POST" class="d-inline">
  					 						<button onclick="return confirm('Tem certeza que quer excluir?')" type="subimit" name="delete_usuario" value="<?=$usuario['id']?>" class="btn btn-danger btn-sm">Excluir</button>
  					 					</form>
  					 				</td>
  					 				<!– Fim coluna de ações -->
  					 			</tr>
  					 			<?php
  					 				}
  					 			} else {
  					 				echo 'Nenhum usuário encontrado';
  					 			}
  					 			?>
  					 		</tbody>
  					 	</table>
  					 </div>
  					<!– Fim da estrutura da tabela -->
  				</div>
  			</div>
  		</div>
  	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>




