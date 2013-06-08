<?php 
/**
 * Piwik - Open source web analytics
 * 
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @version $Id: en.php 6828 2012-08-18 22:48:37Z capedfuzz $
 * 
 * @category Piwik_Plugins
 * @package Piwik_MobileMessaging
 */
$translations = array(


	'MobileMessaging_sms_ru_error_message_str' => 'API сервиса SMS.ru сообщил об ошибке: %s.',	
	'MobileMessaging_sms_ru_state_100' => 'Сообщение принято к отправке. На следующих строчках вы найдете идентификаторы отправленных сообщений в том же порядке, в котором вы указали номера, на которых совершалась отправка.',
	'MobileMessaging_sms_ru_state_200' => 'Неправильный api_id',
	'MobileMessaging_sms_ru_state_201' => 'Не хватает средств на лицевом счету',
	'MobileMessaging_sms_ru_state_202' => 'Неправильно указан получатель',
	'MobileMessaging_sms_ru_state_203' => 'Нет текста сообщения',
	'MobileMessaging_sms_ru_state_204' => 'Имя отправителя не согласовано с администрацией',
	'MobileMessaging_sms_ru_state_205' => 'Сообщение слишком длинное (превышает 8 СМС)',
	'MobileMessaging_sms_ru_state_206' => 'Будет превышен или уже превышен дневной лимит на отправку сообщений',
	'MobileMessaging_sms_ru_state_207' => 'На этот номер (или один из номеров) нельзя отправлять сообщения, либо указано более 100 номеров в списке получателей',
	'MobileMessaging_sms_ru_state_208' => 'Параметр time указан неправильно',
	'MobileMessaging_sms_ru_state_209' => 'Вы добавили этот номер (или один из номеров) в стоп-лист',
	'MobileMessaging_sms_ru_state_210' => 'Используется GET, где необходимо использовать POST',
	'MobileMessaging_sms_ru_state_211' => 'Метод не найден',
	'MobileMessaging_sms_ru_state_212' => 'Текст сообщения необходимо передать в кодировке UTF-8 (вы передали в другой кодировке)',
	'MobileMessaging_sms_ru_state_220' =>	'Сервис временно недоступен, попробуйте чуть позже.',
	'MobileMessaging_sms_ru_state_230' => 'Сообщение не принято к отправке, так как на один номер в день нельзя отправлять более 100 сообщений.',
	'MobileMessaging_sms_ru_state_300' => 'Неправильный token (возможно истек срок действия, либо ваш IP изменился)',
	'MobileMessaging_sms_ru_state_301' => 'Неправильный пароль, либо пользователь не найден',
	'MobileMessaging_sms_ru_state_302'	=> 'Пользователь авторизован, но аккаунт не подтвержден (пользователь не ввел код, присланный в регистрационной смс)',
	'MobileMessaging_sms_ru_balance' => 'Баланс: %s',
	
	);
	

