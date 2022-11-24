
<?php
function divide($x ,$y){  
  if($x == '' || $y == ''){
    throw new Exception('números não podem ser vazios !!!',405); 
  }
  elseif($y == 0){
      throw new Exception('0 não pode divisor !!!',404);  
  }
  else{ 
    
    $x = str_replace(',','.',$x);
    $y = str_replace(',','.',$y);
    return  "Divisão ok ! $x / $y ===> " . str_replace('.',',', $x/$y); 
  }
}


try{
  
  if(isset($_POST['n1']) && isset($_POST['n2'])){
    
    echo divide($_POST['n1'],$_POST['n2']);
  }
  else{
    echo "Entre com os números: ";
    
  }

}catch (Exception $e){
  echo "Mensagem de erro: " . $e->getMessage(). "<br>";
  echo "Código de erro: " . $e->getCode();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form style = "width:400px" action="" method="POST">
    <fieldset>Divisão
      <br>
      <input type="float" name="n1" id="n1" placeholder="Dividendo">
      <br>
      <input type="float" name="n2" id="n2" placeholder="Divisor">
      <br>
      <button type="submit">Divida</button>
      <br>
    </fieldset>
    
  </form>
</body>
</html>


