<?php // Сотрудник расходовал и пополнял счет компании, найдите серию с наибольшим балансом и возвратите его. 
               
//ранд для типа 'расход'
$minus_rand_min = -2500; $minus_rand_max =  -500;
//ранд для типа 'пополнение'
$plus_rand_min = 2500; $plus_rand_max =  500;

// Массив операций
$operations_arr = [
    ['type' => 'расход    ', 'amount'  =>   null],    
    ['type' => 'пополнение ', 'amount' =>   null],
    ['type' => 'расход    ', 'amount'  =>   null],    
    ['type' => 'пополнение ', 'amount' =>   null],
    ['type' => 'пополнение ', 'amount' =>   null],
    ['type' => 'расход    ', 'amount'  =>   null],   
    ['type' => 'расход    ', 'amount'  =>   null],    
    ['type' => 'пополнение ', 'amount' =>   null],
];
//заполнение массива rnd
foreach ($operations_arr as &$product)
{
    if($product['type'] == 'расход    ')
    $product['amount'] = rand($minus_rand_min, $minus_rand_max);  
    else $product['amount'] = rand($plus_rand_min, $plus_rand_max); 
}
//находит максимальный баланс во всевозможных сериях
function FindMaxBalanceSeries($operations_arr) {
    //найденный максимальный баланс серии
    $maxBalance = 0;
    //записывает операции у серии с max балансом
    $maxBalanceSeries = [];
    // Перебор серий
    for ($length = 1; $length <= count($operations_arr); $length++) {
        for ($start = 0; $start < count($operations_arr) - $length + 1; $start++) {
            $series = array_slice($operations_arr, $start, $length); //массив, откуда забираем, длина забираемого
            $balance = calculateSeriesBalance($series);
            if ($balance > $maxBalance) {
                $maxBalance = $balance;
                $maxBalanceSeries = $series;
            }
        }
    }
    return $maxBalanceSeries;
}
//ворачивает сумму всех операций в серии
function calculateSeriesBalance($series) {
    $balance = 0;
    foreach ($series as $transaction) {
        $balance += $transaction['amount'];
    }
    return $balance;
}
echo "Все операции: \n\n";
foreach($operations_arr as $key => $value) echo $value['type'] . " " .$value['amount'] . "₽\n";
echo "\n";
$maxBalanceSeries = FindMaxBalanceSeries($operations_arr);
echo "Серия с max балансом состоит из следующих операций: \n\n";
foreach($maxBalanceSeries as $key => $value) echo $value['type'] . " " .$value['amount'] . "₽\n";
echo "БАЛАНС : ". calculateSeriesBalance($maxBalanceSeries);
?>