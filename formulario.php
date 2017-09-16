<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <title>Conect.Ideias | Formulário</title>

	     <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	    <link rel="stylesheet" href="./css/main.css">
	</head>
	<body>
		<div class="container">
		    <form action="formulario.php" method="post" class="col-md-5">
		      	<div class="form-group">
		      		<label for="nome_completo">Nome Completo:</label><br/>
		      		<input type="text" id="nome_completo" class="form-control" placeholder="Digite seu Nome">
		      	</div>
		      	<div class="form-group">
		      		<label for="matricula">Matrícula:</label><br/>
		      		<input type="number" id="matricula_user" class="form-control" placeholder="Digite sua Matrícula">
		      	</div>
		     	<div class="form-group">
		      		<label for="nascimento">Data do Aniversário:</label><br/>
		      		<input type="date" id="aniversario" class="form-control" placeholder="Digite a data do seu Aniversário">
		      	</div>
		      	<div class="form-group">
		      		<label for="gender">Gênero:</label><br/>
		      		<label for="male">Homem</label>
		      		<input type="radio" name="gender" id="male" value="male" class="form-control">
		      		<label for="female">Mulher</label>
		      		<input type="radio" name="gender" id="female" value="female" class="form-control">
		      		<label for="other">Outro</label>
		      		<input type="radio" name="gender" id="other" value="other" class="form-control">
		      	</div>
		      		<div class="form-group">
		      		<label for="course">Curso:</label><br/>
		      		<label for="aero">Aeroespacial</label>
		      		<input type="radio" name="course" id="aero" value="aero" class="form-control">
		      		<label for="auto">Automotiva</label>
		      		<input type="radio" name="course" id="auto" value="auto" class="form-control">
		      		<label for="eletro">Eletrônica</label>
		      		<input type="radio" name="course" id="eletro" value="eletro" class="form-control">
		      		<label for="energia">Energia</label>
		      		<input type="radio" name="course" id="energia" value="energia" class="form-control">
		      		<label for="soft">Software</label>
		      		<input type="radio" name="course" id="soft" value="soft" class="form-control">
		      		<label for="tronco">Tronco Padrâo</label>
		      		<input type="radio" name="course" id="tronco" value="tronco" class="form-control">
		      	</div>
		      		<button type="submit" class="btn btn-primary">Concluir</button>
		    </form>  		
		</div>


			<script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
			<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script
		</body>
	</html>
