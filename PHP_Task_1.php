<?php
// Среди списка товаров существуют пары похожих,
// найдите количество всех таких пар. 
// Товары считаются похожими если их массы равны.

//счетчик для кол-ва пар
$counter = 0;
//мин для рандома число
$rand_min = 1;
//макс для рандома число
$rand_max = 5;
//массив продуктов 
$goods_arr = [
    "apple" => null,
    "carrot" => null,
    "tomato" => null,
    "potato" => null,
    "orange" => null,
    "lemon"   => null,
    "melon"  => null,
];
//rnd заполнение value key массива
foreach ($goods_arr as &$product)
    $product = rand($rand_min, $rand_max);
//вывод Key-value
foreach ($goods_arr as $key => $product)
    echo $key . "\t" . $product . "\n";
//подсчет пар в массиве
foreach(array_count_values($goods_arr) as $key => $prod){
    if($prod>=2 && ($prod % 2 === 0))
        $counter+=$prod/2;
    else if($prod>=2 && !($prod % 2 === 0))
        $counter+=($prod-1)/2;
}
echo "кол-во пар = " . $counter;
 



