<?php
	$sql = " update from partida where id = '" . $_REQUEST['id'] . "' "; //aqui eu recebo o ID de qual elemento vou alterar 
    $sql2 = " SELECT * FROM public.partida;";//sql2 será usado para listar os valores

	$conexao = new PDO('pgsql:host=localhost;port=5432;dbname=varzeacup;user= postgres; password=postgres');
	
	$resultado = $conexao->exec($sql);
	$resultado2 = $conexao->exec($sql2);//resultado2 vai faz parte da modificação
	unset($conexao);
//COMEÇO DA MODIFICAÇÃO DO CÓDIGO LINHA = 10 E TERMINA NA LINHA 34 +/-
	if ( $resultado and $resultado2 ) {
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel = "stylesheet" href = "style.css">
	</head>
	<body>
      <form id="editapartida"> 
			<p>Nome do Primeiro Time:<input type="text" name="timeA" placeholder="Nome do primeiro time" autocomplete="off" /></p>
			<p>Nome do Segundo Time: <input type="text" name="timeB" placeholder="Nome do segundo time" autocomplete="off" /></p>

			<p>Gols do Primeiro Time: <input type="number" name="golstimeA" placeholder="Gols marcados pelo primeiro time" autocomplete="off" /></p>
			<p>Gols do Segundo Time: <input type="number" name="golstimeB" placeholder="Gols marcados pelo segundo time" autocomplete="off" /></p>

			<p>Horário da Partida: <input type="time" name="horaP" placeholder="Horário da partida" autocomplete="off" /></p>
			<p>Data da Partida: <input type="date" name="dataP" placeholder="Data da partida" autocomplete="off" /></p>

			<p>Rodada da Partida: <input type="number" name="rodadaP" placeholder="Rodada da Partida" autocomplete="off" /></p>

			<p><button type="submit" form="edidapartida" 
		    formaction="lista_partida.php" formmethod="post" >Editar Partida</button></p>
		</form>
		</form>
	</body>
</html>
		<p>Alterado com sucesso.</p>
		<script> setTimeout( function() { window.location.assign('lista_partida.php'); }, 2000); </script>
<?php
	} else {
?>
		<p>Erro ao alterar.</p>
		<script> setTimeout( function() { window.history.back(); }, 2000); </script>
<?php
	}