<?php
// создание коротких имен переменных
// проверка, были ли переданы необходимые данные
	if (isset($_POST['tier'],
	$_POST['rooms_search'],
	$_POST['rooms_up'],
	$_POST['invest'],)) {
		$tier = $_POST['tier'];
		$rooms_search = $_POST['rooms_search'];
		$rooms_up = $_POST['rooms_up'];
		$invest = $_POST['invest'];
		$date=date('H:i, j F Y');
		
    // проверка на корректность вводимых данных
	if (!in_array($tier, ['one', 'two', 'three' , 'four'])){
		echo "<p>Ошибка: Неверный уровень здания. Должно быть 1,2,3,4. </p>";
		return;
	}
	
	if (!is_numeric($rooms_search)|| !is_numeric($rooms_up) || !is_numeric($invest)){
		echo "<p>Ошибка: Значения должны быть числовыми. </p>";
		return;
	}
	
	// приводим к целым числам
	$rooms_search = (int)$rooms_search;
	$rooms_up = (int)$rooms_up;
	$invest = (int)$invest;
	
	 // Данные для с инвестициями
    $index_invest = 5;
    $index_lvl_invest = 55;
	// Данные без инвестиций
    $index_lvl = 15;
	
	// Параметры для каждого уровня
	$params = [
		'one' => ['search' => 5, 'up' => 10],
		'two' => ['search' => 10, 'up' => 20],
		'three' => ['search' => 50, 'up' => 100],
		'four' => ['search' => 100, 'up' => 200],
	];
?>	
<html>
<head>
	<title>Результаты подсчета</title>
</head>
<body>
<h1>Hamster Kombat</h1>
<h2>Результаты подсчета</h2>

<?php
echo "<p>Заказ обработан в ".$date."</p>";

if (array_key_exists($tier, $params)){
	if ($invest == 1){
		$result = $index_lvl_invest * $rooms_search * $params[$tier]['search'] * $index_invest
			+ $index_lvl_invest * $rooms_up * $params[$tier]['up'] * $index_invest;
	} else {
		$result = $index_lvl * $rooms_search * $params[$tier]['search'] 
		+ $index_lvl * $rooms_up * $params[$tier]['up'];
	}
} else {
	$result = 'Операция не поддерживаеися';
}

// Вывод результат 
return $result;
	} else {
		echo "<p>Ошибка: Не все необходимые данные были переданы.</p>";
	}

/* switch ($_POST['tier']) {
    case 'one': 
        if ($invest == 1) {
		$result = $index_lvl_invest * $room_search * $t1_salagi_search * $index_invest + $index_lvl_invest * $room_up * $t1_salagi_up * $index_invest;
		} else {
		$result = $index_lvl * $room_search * $t1_salagi_search + $index_lvl * $room_up * $t1_salagi_up;
        }
		break;
    case 'two': 
        if ($invest == 1) {
		$result = $index_lvl_invest * $room_search * $t2_salagi_search * $index_invest + $index_lvl_invest * $room_up * $t2_salagi_up * $index_invest;
		} else {
        $result = $index_lvl * $room_search * $t2_salagi_search + $index_lvl * $room_up * $t2_salagi_up;
        }
		break;
	case 'three':
        if ($invest == 1) {
		$result = $index_lvl_invest * $room_search * $t3_salagi_search * $index_invest + $index_lvl_invest * $room_up * $t3_salagi_up * $index_invest;
		} else {
        $result = $index_lvl * $room_search * $t3_salagi_search + $index_lvl * $room_up * $t3_salagi_up;
        }
		break;
	case 'four':
        if ($invest == 1) {
		$result = $index_lvl_invest * $room_search * $t4_salagi_search * $index_invest + $index_lvl_invest * $room_up * $t4_salagi_up * $index_invest;
		} else {
        $result = $index_lvl * $room_search * $t4_salagi_search + $index_lvl * $room_up * $t4_salagi_up;
        }
		break;
    default:
        return 'Операция не поддерживается';
}

return $result; */

?>


