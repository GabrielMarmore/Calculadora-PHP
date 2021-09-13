<?php

$mensagem="";
if ($_POST){
    $distancia = $_POST['km'];
    $consumo = $_POST['consumo'];
    if (is_numeric($distancia) && is_numeric($consumo)){
        if ($distancia > 0 && $consumo > 0){
            $preco = array(
                'gasolina'=> 4.80,
                'diesel'=>  3.80,
                'alcool'=> 3.90
            );

            //definindo o resultado e formatando as casas decimais.
            $rel_g=($distancia / $consumo) *$preco['gasolina']; $rel_g = number_format($rel_g,2,',','.');
            $rel_d=($distancia / $consumo) *$preco['diesel']; $rel_d = number_format($rel_d,2,',','.');
            $rel_a=($distancia / $consumo) *$preco['alcool']; $rel_a = number_format($rel_a,2,',','.');
            
            $resultado=array(
                $rel_g,
                $rel_d,
                $rel_a
            );
            
            $mensagem.= "<div>";
			$mensagem.= "O valor total gasto será de:";
			$mensagem.= "<ul>";
			$mensagem.= "<li><strong>Gasolina:</strong> R$ ".$resultado[0]."</li>";
			$mensagem.= "<li><strong>Álcool:</strong> R$ ".$resultado[1]."</li>";
			$mensagem.= "<li><strong>Diesel</strong>: R$ ".$resultado[2]."</li>";
			$mensagem.= "</ul>";
			$mensagem.= "</div>";

        } else{
            $mensagem.= "<p>O valor da distancia e do consumo devem ser maiores que zero!</p>";
        }
      

        
    } 
    else{
        $mensagem.= "<p>O valor recebido não é numérico</p>";
    }
} else{
    $mensagem.= "<p>Nenhum dado foi recebido pelo formulário.</p>";
};

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo de Consumo de Combustível</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<main>
<h1>Resultado de Consumo</h1>
<div>
   <?php
   echo $mensagem;
   ?>

   <a class="botao" href="index.html">Voltar</a>
</div>
</main>

</body>
</html>