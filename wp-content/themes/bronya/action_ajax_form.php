<?php

add_action('wp_ajax_order_data', 'bronya_order');
add_action('wp_ajax_nopriv_order_data', 'bronya_order');

function bronya_order(){
	// $name = $_POST['field-name'];
	//
	//В переменную $token нужно вставить токен, который нам прислал @botFather
	$token = "5511751280:AAETCb5Dk-43VGA86QT9I7ZSJBg06OgFxfo";

	//Сюда вставляем chat_id
	$chat_id = "-686611514";

	$truePhone = '';
	$name = '';
	$sphere = '';

	if (isset($_POST["truePhone"])) {

		$truePhone = $_POST['truePhone'];
		$name = $_POST['name'];
		$sphere = $_POST['sphere'];


		$name = trim(urldecode(htmlspecialchars($name)));
		$sphere = trim(urldecode(htmlspecialchars($sphere)));


		if (strlen($name)) {
			$name = "%0AІм'я: {$name}. ";
		}

		if (strlen($sphere)) {
			$sphere = "%0AСфера діяльності: {$sphere}. ";
		}

		if (strlen($truePhone)) {
			$phone = "Телефон: +38{$truePhone}. ";
			$phoneGT = "%0AТелефон: %2B38{$truePhone}. ";
		}

		// Отправка в телеграм
		$messageTG = "<b>Нова заявка!</b> {$name}{$phoneGT}{$sphere}";
		//Передаем данные боту
	    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$messageTG}","r");
	}

	$truePhone_wp = $_POST['truePhone'];
	$name_wp = $_POST['name'];
	$sphere_wp = $_POST['sphere'];

	$id = wp_insert_post(wp_slash([
		'post_title' => 'Заявка від: ' . $name_wp,
		'post_type' => 'orders',
		'post_status' => 'publish',
		'meta_input' => [
			'client-name' => $name_wp,
			'client-phone' => $truePhone_wp,
			'client-sphere' => $sphere_wp,
		],
	]));

	if ($id) {
		$field_data = array(
			'client-name' => $name_wp,
			'client-phone' => $truePhone_wp,
			'client-sphere' => $sphere_wp,
		);
		$post_data = array( 'ID' => $id ); // the ID is required
		CFS()->save( $field_data, $post_data );
	}



	wp_die();
}

?>