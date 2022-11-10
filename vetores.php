<?php    
    $array = [
        ['nome' => 'Renato', 
        'idade' => '53', 
        'sexo' => 'M'],

        ['nome' => 'Marcia', 
        'idade' => '45', 
        'sexo' => 'F'],

        ['nome' => 'Teresa', 
        'idade' => '79', 
        'sexo' => 'F'],

        ['nome' => 'Valentiina', 
        'idade' => '15', 
        'sexo' => 'F']          
    ];

    echo "<pre>";
    print_r ($array);
    echo "</pre>";
    echo"<hr>";
    
    uasort($array, function($a,$b){
        if($a['nome'] == $b['nome']) return 0; 
        return $a['nome'] < $b['nome'] ? 1 : -1 ;   
    });
    echo "<pre>";
    print_r($array);
    echo "</pre>";

echo"<br><hr>";

$array = ['banana','laranja','coco'];
echo"<pre>";
print_r($array);
echo "</pre>";

echo"<br><hr>";
shuffle($array);

echo"<pre>";
print_r($array);
echo "</pre>";

echo"<br><hr>";

$array = ['1.0v1aaa', '1.0v100' ,'10.0a'];
echo"<pre>";
print_r($array);
echo "</pre>";

echo"<br><hr>";

$array = ['1.0v1aaa', '1.0v100' ,'10.0a'];
sort($array);
echo"<pre>";
print_r($array);
echo "</pre>";

echo"<br><hr>";

$array = ['1.0v1aaa', '1.0v100' ,'10.0a'];
natsort($array);
echo"<pre>";
print_r($array);
echo "</pre>";

echo"<br><hr>";

$array = ['1.0v1aaa', '1.0v100' ,'10.0a'];
natcasesort($array);
echo"<pre>";
print_r($array);
echo "</pre>";

echo"<br><hr>";

$array = [1,1,2,3,4,4,5,5,6,7,8,9,9];
echo"<pre>";
print_r($array);
echo "</pre>";

echo"<br><hr>";

$array = [1,1,2,3,4,4,5,5,6,7,8,9,9];
echo"<pre>";
print_r(array_unique($array));
echo "</pre>";

echo"<br><hr>";

$array = [
    ['nome' => 'Renato', 
    'idade' => '53', 
    'sexo' => 'M',
    'instagram' => null,
    'trabalhando' => false,
    'salario' => 0]
];

echo"<pre>";
print_r($array);
echo "</pre>";

echo"<br><hr>";


$array = [
    'nome' => 'Renato', 
    'idade' => '53', 
    'sexo' => 'M',
    'instagram' => null,
    'trabalhando' => false,
    'salario' => 0
];

$filter = array_filter($array,function($value){
    return  ($value !== false);
    });
    
    echo"<pre>";
    print_r($filter);
    echo "</pre>"; 

    echo"<br><hr>";

    $arrayA = [10,20,30];
    $arrayB = [10,22,33];
    echo"<pre>";
    print_r(array_diff($arrayA,$arrayB));
    echo"</pre>";


    echo"<br><hr>";

    $arrayA = [10,20,30];
    $arrayB = [10,22,33];
    echo"<pre>";
    print_r(array_diff($arrayA,$arrayB));
    echo"</pre>";

    echo"<br><hr>";

    echo"<pre>";
    print_r(array_diff($arrayB,$arrayA));
    echo"</pre>";

    echo"<br><hr>";

    $arrayA = [10,20,30];
    $arrayB = [10,22,33];
    echo"<pre>";
    print_r(array_intersect($arrayA,$arrayB));
    echo"</pre>";

    echo"<br><hr>";

    echo"<pre>";
    print_r(array_intersect($arrayB,$arrayA));
    echo"</pre>";

    echo"<br><hr>";


    $array = [
        ['nome' => 'Renato', 
        'idade' => '53', 
        'sexo' => 'M'],

        ['nome' => 'Marcia', 
        'idade' => '45', 
        'sexo' => 'F'],

        ['nome' => 'Teresa', 
        'idade' => '79', 
        'sexo' => 'F'],

        ['nome' => 'Valentiina', 
        'idade' => '15', 
        'sexo' => 'F']          
    ];

    echo"<pre>";
    print_r($array);
    echo"</pre>";

    echo"<br>";

    echo"<pre>";
    print_r(array_column($array,'idade'));
    echo"</pre>";

    echo"<br>";

    $arrayA = [1, 2, 3];
    $arrayB = ['A', 'B', 'C'];


    echo"<pre>";
    print_r(array_combine($arrayB,$arrayA));
    echo"</pre>";

    echo"<br><hr>";


    $array = [
        ['nome' => 'Renato', 
        'idade' => '53', 
        'sexo' => 'M'],

        ['nome' => 'Marcia', 
        'idade' => '45', 
        'sexo' => 'F'],

        ['nome' => 'Teresa', 
        'idade' => '79', 
        'sexo' => 'F'],

        ['nome' => 'Valentina', 
        'idade' => '15', 
        'sexo' => 'F']          
    ];

    echo"<pre>";
    print_r($array);
    echo"</pre>";

    echo"<br>";

    echo"<pre>";
    print_r(array_combine(array_column($array, 'nome'), array_column($array, 'idade')));
    echo"</pre>";

    echo"<br>";
    $key = array_column($array,'nome');
    $value = array_column($array,'idade');
    print_r(array_combine($key,$value));

    echo"<br><hr>";

    $arrayA = ['A' => 10, 'B' => 20, 'C' => 30];
    $arrayB = ['A' => 30, 'D' => 50, 'E' => 60];
    echo"<pre>";
    print_r(array_merge($arrayA,$arrayB));
    echo"</pre>";

    echo"<br><hr>";

    $array = ['A', 'B', 'C'];
   
    
    echo"<br><hr>";
    unset($array[1]);

    echo"<br><hr>";

    echo"<pre>";
    print_r($array);
    echo"</pre>";

    echo"<br><hr>";


    $array = [
        ['nome' => 'Renato', 
        'idade' => '53', 
        'sexo' => 'M'],

        ['nome' => 'Marcia', 
        'idade' => '45', 
        'sexo' => 'F'],

        ['nome' => 'Teresa', 
        'idade' => '79', 
        'sexo' => 'F'],

        ['nome' => 'Valentina', 
        'idade' => '15', 
        'sexo' => 'F']          
    ];

    echo"<pre>";
    print_r($array);
    echo"</pre>";

    echo"<br>";

    $map = array_map(function($value){    
       $value['nome'] = "{{" . $value['nome'] . "}}";
       $value['novo'] = rand(00,99);
        return $value;
    }, $array);

    echo"<pre>";
    print_r($map);
    echo"</pre>";

    echo"<br>";
    $base = '2022-05-10  13:55:20';
    $dateHour = date('d/m/Y  à\s  H:i:s' , strtotime($base));
    echo $dateHour;

    $date  = date('d/m/Y ' , strtotime($base));
    echo"<br>";
    echo $date;
    
    $hour = date('H:i:s' , strtotime($base));
    echo"<br>";
    echo $hour;

    $data1 = date('d/m/y \h\o\r\a -> H:i:s');
    echo"<br> data 1 antes:";
    echo $data1;
    $local = date_default_timezone_get();
    echo "<br>";
    echo "Local : " . $local;
    echo "<br>";
    date_default_timezone_set('America/Sao_Paulo');
    $dateA = date('l');
    $dateB = date('Y');
    $dateC = date('r');
    $dateD = date('p');

    echo"<br> dataA : " . $dateA;
    echo"<br> dataB : " . $dateB;
    echo"<br> dataC : " . $dateC;
    echo"<br> dataD : " . $dateD;

    $aa = 10;
    $bb = bin2hex($aa);
    echo "<br> aa = " . $aa . "bb = " . $bb;    

?>


