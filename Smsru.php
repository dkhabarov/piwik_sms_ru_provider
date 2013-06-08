<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 * @category Piwik_Plugins
 * @package Piwik_MobileMessaging_SMSProvider
 * 
 * module author: Denis 'Saymon21' Khabarov (saymon@hub21.ru)
 */

/**
 *
 * @package Piwik_MobileMessaging_SMSProvider
 */
class Piwik_MobileMessaging_SMSProvider_Smsru extends Piwik_MobileMessaging_SMSProvider
{
	const SOCKET_TIMEOUT = 15;
	const BASE_API_URL = 'http://sms.ru/';
	const CHECK_CREDIT_RESOURCE = 'my/balance';
	const SEND_SMS_RESOURCE = 'sms/send';
	const MAXIMUM_CONCATENATED_SMS = 3;
	const MAXIMUM_FROM_LENGTH = 11;
	const ERROR_STRING = 'Error';
    
    
	public function verifyCredential($apiKey){
		return true;
	}

	public function sendSMS($apiKey, $smsText, $phoneNumber, $from){
		$from = substr($from, 0, self::MAXIMUM_FROM_LENGTH);
		$smsText = self::truncate($smsText, self::MAXIMUM_CONCATENATED_SMS);
		$additionalParameters = array('to' => str_replace('+', '', $phoneNumber), 'text' => $smsText, 'partner_id' => 3805,
            // 'from'    => $from, // Если надо использовать какое-то отдельное имя отправителя, раскоментируйте сами эту строку...
            // По умолчанию Piwik подставляет очевидное имя, Piwik.
		);
		$this->ApiCall($apiKey, self::SEND_SMS_RESOURCE, $additionalParameters);
	}
    
	private function get_error_info($code) {
		if (is_string(Piwik_Translate('MobileMessaging_sms_ru_state_'.(string)$code))) {
			return Piwik_Translate('MobileMessaging_sms_ru_state_'.(string)$code);
		}
	}
	
	private function ApiCall($apiKey, $resource, $additionalParameters = array()) {
		$accountParameters = array('api_id' => $apiKey,);
		$parameters = array_merge($accountParameters, $additionalParameters);
		$url = self::BASE_API_URL. $resource . '?' . http_build_query($parameters, '', '&');
		$timeout = self::SOCKET_TIMEOUT;
		$result = Piwik_Http::sendHttpRequestBy(Piwik_Http::getTransportMethod(), $url,$timeout,$userAgent = null,$destinationPath = null,$file = null,$followDepth = 0,$acceptLanguage = false,$acceptInvalidSslCertificate = true);
        $info=preg_split('/\n/',$result);
		if (strpos($result, self::ERROR_STRING) !== false) {
			throw new Piwik_MobileMessaging_APIException(Piwik_Translate('MobileMessaging_sms_ru_error_message_str', $info[0]));
		} elseif ($info[0] !== '100'){
			throw new Piwik_MobileMessaging_APIException(Piwik_Translate('MobileMessaging_sms_ru_error_message_str',$this->get_error_info($info[0])));
		}
		return $result;
    }
	public function getCreditLeft($apiKey){
		$result = $this->ApiCall($apiKey, self::CHECK_CREDIT_RESOURCE);
		$info=preg_split('/\n/',$credit);
		if (is_array($info) and $info[0] == '100'){
			return Piwik_Translate('MobileMessaging_sms_ru_balance',$info[1]);
		}
       // return 1;
	}
}
