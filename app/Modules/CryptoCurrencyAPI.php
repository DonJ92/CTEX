<?php

namespace App\Modules;


use Illuminate\Support\Facades\Log;

class CryptoCurrencyAPI
{
    protected $_HOST = API_HOST;

    const _url_genkey                   = API_HOST . '/genkey';
    const _url_getbalance               = API_HOST . '/getbalance';
    const _url_send                     = API_HOST . '/send';
    const _url_maketransaction          = API_HOST . '/maketransaction';
    const _url_signtransaction          = API_HOST . '/signtransaction';
    const _url_sendtransaction          = API_HOST . '/sendtransaction';
    const _url_checktransaction         = API_HOST . '/checktransaction';
    const _url_checkbalance             = API_HOST . '/checkbalance';
    const _url_checkaddress             = API_HOST . '/checkaddress';
    const _url_getnonce                 = API_HOST . '/getnonce';

    const _usdt_getbalance              = API_HOST2 . '/getbalance';
    const _usdt_getdepositaddress       = API_HOST2 . '/getdepositaddress';
    const _usdt_send                    = API_HOST2 . '/send';
    const _usdt_checktransaction        = API_HOST2 . '/checktransaction';

    const _eth_genkey                   = API_HOST3 . '/genkey';
    const _eth_getbalance               = API_HOST3 . '/getbalance';
    const _eth_send                     = API_HOST3 . '/send';
    const _eth_sendtransaction          = API_HOST3 . '/sendtransaction';
    const _eth_maketransaction          = API_HOST3 . '/maketransaction';
    const _eth_signtransaction          = API_HOST3 . '/signtransaction';
    const _eth_checktransaction         = API_HOST3 . '/checktransaction';
    const _eth_checkaddress             = API_HOST3 . '/checkaddress';

    const _HTTP_RESPONSE_CODE_0 = 0;
    const _HTTP_RESPONSE_CODE_1 = 1;
    const _HTTP_RESPONSE_CODE_2 = 2;
    const _HTTP_RESPONSE_CODE_3 = 3;
    const _HTTP_RESPONSE_CODE_4 = 4;
    const _HTTP_RESPONSE_CODE_5 = 5;
    const _HTTP_RESPONSE_CODE_6 = 6;
    const _HTTP_RESPONSE_CODE_7 = 7;
    const _HTTP_RESPONSE_CODE_9 = 8;

    public static function call_generate_key($currency, $net = COIN_NET) {
        $response = [];
        try {
            if ($currency == 'ETH' || $currency == 'USDT') {
                $params = [
                    'CODE' => 'ETH',
                    'NET' => $net,
                ];

                $response = g_sendHttpRequest(self::_eth_genkey, HTTP_METHOD_POST, $params);
                $response = json_decode($response, true);
            }
            else {
                $params = [
                    'CODE' => $currency,
                    'NET' => $net,
                ];

                $response = g_sendHttpRequest(self::_url_genkey, HTTP_METHOD_POST, $params);
                $response = json_decode($response, true);
            }
        } catch(\Exception $e) {
            $response = [];
            Log::error($e->getMessage());
        }

        return $response;
    }

    public static function call_get_balance($currency, $address, $net = COIN_NET, $pubkey = '', $prikey = '') {
        $response = [];

        try {
            if ($currency == 'ETH' || $currency == '8CO' || $currency == 'USDT') {
                $params = [
                    'CODE'      => 'ETH',
                    'NET'       => $net,
                    'ADDRESS'   => $address,
                    'SYMBOL'    => $currency,
                ];

                $response = g_sendHttpRequest(self::_eth_getbalance, HTTP_METHOD_POST, $params);
                $response = json_decode($response, true);
            }
            else {
                $params = [
                    'CODE' => $currency,
                    'NET' => $net,
                    'ADDRESS' => $address,
                ];

                $response = g_sendHttpRequest(self::_url_getbalance, HTTP_METHOD_POST, $params);
                $response = json_decode($response, true);
            }
        } catch (\Exception $e) {
            $response = [];
            Log::error($e->getMessage());
        }

        return $response;
    }

    public static function call_valid_address($currency, $address, $net = COIN_NET) {
        $params = [
            'CODE' => $currency,
            'NET' => $net,
            'ADDRESS' => $address,
        ];

        $ret = true;
        try {
            $response = g_sendHttpRequest(self::_url_getbalance, HTTP_METHOD_POST, $params);
            $response = json_decode($response, true);
            if (isset($response['result']) && $response['result'] == 21) { //Unvalid Address
                $ret = false;
            } else if (isset($response['result']) && $response['result'] == 0) {
                $ret = true;
            } else {
                $ret = false;
            }
        } catch(\Exception $e) {
            $ret = false;
            Log::error($e->getMessage());
        }

        return $ret;
    }

    public static function CheckWalletAddress($address, $secret, $currency)
    {
        $ret = CryptoCurrencyAPI::call_checkaddress($address, $secret, $currency, COIN_NET);

        if (!isset($ret['result'])) {
            return false;
        }
        if ($ret['result'] == 0) {
            return true;
        }

        return false;
    }

    public static function call_send($currency, $from, $to, $amount, $fee = '', $net = COIN_NET, $gas_price = '', $gas_limit = '') {
        $response = [];

        try {
            if ($currency == '8CO' || $currency == 'USDT' || $currency == 'ETH') {
                $params = [
                    'CODE' => 'ETH',
                    'NET' => $net,
                    'FROM' => $from,
                    'TO' => $to,
                    'SYMBOL' => $currency,
                    'AMOUNT' => $amount,
                    'GASPRICE' => $gas_price,
                    'GASLIMIT' => $gas_limit,
                ];

                $response = g_sendHttpRequest(self::_eth_send, HTTP_METHOD_POST, $params);
                $response = json_decode($response, true);
            }
            else {
                $params = [
                    'CODE' => $currency,
                    'NET' => $net,
                    'FROM' => $from,
                    'TO' => $to,
                    'AMOUNT' => $amount,
                    'FEE' => $fee,
                ];

                $response = g_sendHttpRequest(self::_url_send, HTTP_METHOD_POST, $params);
                $response = json_decode($response, true);
            }
        } catch (\Exception $e) {
            $response = [];
            Log::error($e->getMessage());
        }

        return $response;
    }

    public static function call_checkaddress($address, $secret, $currency, $net = COIN_NET) {
        $check_url = self::_url_checkaddress;
        if ($currency == '8CO' || $currency == 'USDT' || $currency == 'ETH') {
            $currency = 'ETH';
            $check_url = self::_eth_checkaddress;
        }

        $params = [
            'CODE' => $currency,
            'NET' => $net,
            'ADDRESS' => $address,
            'SECRET' => $secret,
        ];

        $response = [];
        try
        {
            $response = g_sendHttpRequest($check_url, HTTP_METHOD_POST, $params);
            $response = json_decode($response, true);
        } catch(\Exception $e) {
            $response = [];
            Log::debug($e->getMessage());
        }

        return $response;
    }

    public static function call_getnonce($address, $net = COIN_NET) {
        $params = [
            'CODE' => 'ETH',
            'NET'  => $net,
            'ADDRESS'   => $address
        ];
        $response = [];
        try
        {
            $response = g_sendHttpRequest(self::_url_getnonce, HTTP_METHOD_POST, $params);
            $response = json_decode($response, true);
        } catch(\Exception $e) {
            $response = [];
            Log::debug($e->getMessage());
        }

        return $response;
    }

    public static function call_maketransaction($currency, $net, $from, $to, $amount, $nonce, $fee = '', $gas_price = '', $gas_limit = '') {
        $response = [];

        try {
            if ($currency == 'ETH' || $currency == '8CO' || $currency == 'USDT') {
                $params = [
                    'CODE'      => 'ETH',
                    'NET'       => $net,
                    'FROM'      => $from,
                    'TO'        => $to,
                    'SYMBOL'    => $currency,
                    'AMOUNT'    => $amount,
                    'GASPRICE'  => $gas_price,
                    'GASLIMIT'  => $gas_limit,
                    'NONCE'     => $nonce,
                ];

                $response = g_sendHttpRequest(self::_eth_maketransaction, HTTP_METHOD_POST, $params);
                $response = json_decode($response, true);
            }
            else {
                $params = [
                    'CODE'      => $currency,
                    'NET'       => $net,
                    'FROM'      => $from,
                    'TO'        => $to,
                    'AMOUNT'    => $amount,
                    'FEE'       => $fee,
                ];

                $response = g_sendHttpRequest(self::_url_maketransaction, HTTP_METHOD_POST, $params);
                Log::info(">> !!!!!!! " . $response);
                $response = json_decode($response, true);
            }
        } catch(\Exception $e) {
            $response = [];
            Log::debug($e->getMessage());
        }

        return $response;
    }

    public static function call_sendtransaction($currency, $transaction, $net = COIN_NET) {
        $response = [];

        try {
            if ($currency == 'ETH' || $currency == '8CO' || $currency == 'USDT') {
                $params = [
                    'CODE' => 'ETH',
                    'NET' => $net,
                    'TX_SIGNED' => $transaction,
                ];

                $response = g_sendHttpRequest(self::_eth_sendtransaction, HTTP_METHOD_POST, $params);
                $response = json_decode($response, true);
            }
            else {
                $params = [
                    'CODE' => $currency,
                    'NET' => $net,
                    'TX_SIGNED' => $transaction,
                ];

                $response = g_sendHttpRequest(self::_url_sendtransaction, HTTP_METHOD_POST, $params);
                $response = json_decode($response, true);
            }
        } catch(\Exception $e) {
            $response = [];
            Log::debug($e->getMessage());
        }

        return $response;
    }

    public static function call_checktransaction($currency, $tx_id, $net = COIN_NET, $from_key = '', $from_secret = '') {
        $response = [];

        try {
            if ($currency == '8CO' || $currency == 'USDT' || $currency == 'ETH') {
                $params = [
                    'CODE'      => 'ETH',
                    'NET'       => $net,
                    'TX_ID'     => $tx_id,
                ];

                $response = g_sendHttpRequest(self::_eth_checktransaction, HTTP_METHOD_POST, $params);
                $response = json_decode($response, true);
            }
            else {
                $params = [
                    'CODE'      => $currency,
                    'NET'       => $net,
                    'TX_ID'     => $tx_id,
                ];

                $response = g_sendHttpRequest(self::_url_checktransaction, HTTP_METHOD_POST, $params);
                $response = json_decode($response, true);
            }
        } catch(\Exception $e) {
            $response = [];
            Log::debug($e->getMessage());
        }

        return $response;
    }

    public static function call_usdt_send($currency, $from_key, $from_secret, $to_address, $amount, $net = COIN_NET, $fee = '') {
        $params = [
            'CODE'          => $currency,
            'NET'           => $net,
            'FROMKEY'       => $from_key,
            'FROMSECRET'    => $from_secret,
            'TOADDRESS'     => $to_address,
            'AMOUNT'        => $amount,
            'FEE'           => $fee,
        ];

        $response = [];
        try {
            $response = g_sendHttpRequest(self::_usdt_send, HTTP_METHOD_POST, $params);
            $response = json_decode($response, true);
        } catch(\Exception $e) {
            $response = [];
            Log::debug($e->getMessage());
        }

        return $response;
    }

    public static function call_usdt_getdepositaddress($currency, $key, $secret, $net = COIN_NET) {
        $params = [
            'CODE'      => $currency,
            'NET'       => $net,
            'KEY'       => $key,
            'SECRET'    => $secret,
        ];

        $response = [];
        try {
            $response = g_sendHttpRequest(self::_usdt_getdepositaddress, HTTP_METHOD_POST, $params);
            $response = json_decode($response, true);
        } catch(\Exception $e) {
            $response = [];
            Log::debug($e->getMessage());
        }

        return $response;
    }

    public static function call_coin_ex_rate() {
        $result = [
            'BTC' => '6392.28',
            'BTH' => '6392.28',
            'ETH' => '200.53',
            'ETC' => '9.12',
            'XRP' => '0.457776',
            'LTC' => '6392.28',
            'USDT' => '1',
            'EOS' => '5.35',
            'XLM' => '0.234676',
            'ADA' => '0.072390',
        ];

        return $result;
    }

    public static function GetNonce($address)
    {
        $ret = CryptoCurrencyAPI::call_getnonce($address, COIN_NET);
        if (!isset($ret['result'])) {
            return false;
        }

        if ($ret['result'] != 0) {
            return false;
        }

        $result = $ret['detail'];

        return doubleVal($result);
    }

    public static function MakeTransaction($currency, $net, $from, $to, $amount, $nonce, $fee = '', $gas_price = '', $gas_limit = '')
    {
        $send_sucess = false;

        for ($_cnt = 0; $_cnt < API_RETRY_COUNT; $_cnt++) {
            $ret = CryptoCurrencyAPI::call_maketransaction($currency, $net, $from, $to, $amount, $nonce, $fee, $gas_price, $gas_limit);

            if (!isset($ret['result'])) {
                Log::info("  : Call MakeTransaction has failed. retryCount: " . $_cnt . " >>" . json_encode($ret));
                Sleep(1);
                continue;
            }

            if ($ret['result'] != 0) {
                Log::info("  : Error " . json_encode($ret));
                Sleep(1);
                continue;
            } else {
                $send_sucess = true;
                $result = $ret['detail'];
                break;
            }
        }

        if ($send_sucess == false) {
            return false;
        }
        else {
            return $result;
        }
    }

    public static function SendTransaction($currency, $transaction)
    {
        $ret = CryptoCurrencyAPI::call_sendtransaction($currency, $transaction, COIN_NET);
        if (!isset($ret['result'])) {
            Log::channel('crypto')->error("  : Call Send API failed. >>");
            return false;
        }

        if ($ret['result'] != 0) {
            Log::channel('crypto')->error("*** Call Send API : code - ".$ret['result']." ".$ret['detail']." >>");
            Log::channel('crypto')->error("  : Error ". json_encode($ret));

            return false;
        }

        $tx_id = $ret['detail'];

        return $tx_id;
    }

    public static function SendUsdtTransaction($id, $currency, $from_key, $from_secret, $to_address, $amount)
    {
        try {
            $ret = CryptoCurrencyAPI::call_usdt_send($currency, $from_key, $from_secret, $to_address, $amount, COIN_NET);

            if ($ret['result'] != 0) {
                Log::error("*** Call Send API : code - ".$ret['result']." ".$ret['detail']." >>");
                Log::error("  : Error ". json_encode($ret));

                return false;
            }

            $tx_id = $ret['detail']['id'];

            Transactions::updateRecord(['id' => $id], [
                'status'    => SENT_STATE,
                'tx_id'     => $tx_id,
            ]);

            Log::info("  : Call API Success, waiting for confirm...");
            Log::info("  * TX_ID: " . $tx_id);

            return true;
        }
        catch (\Exception $e)
        {
            print_r('Send USDT transaction has failed.');
            Log::error('Send USDT transaction has failed. Error:', $e->getMessage());
            return false;
        }
    }

    public static function CheckTransaction($tx_id, $currency, $from_key = '', $from_secret = '', &$gas = null)
    {
        $ret = CryptoCurrencyAPI::call_checktransaction($currency, $tx_id, COIN_NET, $from_key, $from_secret);
        if (!isset($ret['result'])) {
            Log::error("  : Call Send API failed. >>");
            return false;
        }

        if ($ret['result'] != 0) {
            Log::error("*** Call Send API : code - ".$ret['result']." >>");
            Log::error("  : Error ". json_encode($ret));

            if (isset($ret['detail']) && stripos($ret['detail'], "not found") !== false) {
                return STATUS_FAILED;
            }

            return false;
        }

        Log::info("  : Call API Success");

		$gas = 0;
		if ($currency == '8CO' || $currency == 'USDT' || $currency == 'ETH') {
			$gas = $ret['detail']['gasUsed'];
		}

        return true;
    }

}
