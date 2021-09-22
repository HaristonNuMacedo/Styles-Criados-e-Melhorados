<?php 
    include_once 'C:/xampp/htdocs/Calendario/bd/banco.php';

	$id_servicos = $_REQUEST['id_servicos'];
	
	$result_sub_cat = "select * from servicos_has_funcionarios "
    ."left join funcionarios on funcionarios.id = servicos_has_funcionarios.funcionarios_id "
    ."WHERE servicos_id = $id_servicos ORDER BY nome";
	$resultado_sub_cat = mysqli_query($conn, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$funcionario_post[] = array(
			'id'	=> $row_sub_cat['id'],
			'nome' => utf8_encode($row_sub_cat['nome']),
		);
	}
	
	echo(json_encode($funcionario_post));