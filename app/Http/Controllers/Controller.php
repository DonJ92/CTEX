<?php

namespace App\Http\Controllers;

use App\Models\CryptoSettings;
use App\Models\News;
use App\Models\Notifications;
use App\Models\UserBalance;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Get Crypto Currency Setting List
     *
     * @return array
     */
    protected function getCryptocurrencyList()
    {
        $cryptocurrency_list = array();

        try {
            $cryptocurrency_list = CryptoSettings::where('status', config('constants.crypto_setting_status.valid'))->get()->toArray();
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return $cryptocurrency_list;
        }

        for ($i = 0; $i < count($cryptocurrency_list); $i++) {

            $cryptocurrency_list[$i]['cashback'] = _number_format($cryptocurrency_list[$i]['cashback'], $cryptocurrency_list[$i]['rate_decimals']);
            $cryptocurrency_list[$i]['min_deposit'] = _number_format($cryptocurrency_list[$i]['min_deposit'], $cryptocurrency_list[$i]['rate_decimals']);
            $cryptocurrency_list[$i]['min_withdraw'] = _number_format($cryptocurrency_list[$i]['min_withdraw'], $cryptocurrency_list[$i]['rate_decimals']);
            $cryptocurrency_list[$i]['transfer_fee'] = _number_format($cryptocurrency_list[$i]['transfer_fee'], $cryptocurrency_list[$i]['rate_decimals']);
            $cryptocurrency_list[$i]['gas_price'] = _number_format($cryptocurrency_list[$i]['gas_price'], $cryptocurrency_list[$i]['rate_decimals']);
            $cryptocurrency_list[$i]['gas_limit'] = _number_format($cryptocurrency_list[$i]['gas_limit'], $cryptocurrency_list[$i]['rate_decimals']);
            $cryptocurrency_list[$i]['gas'] = _number_format($cryptocurrency_list[$i]['gas'], $cryptocurrency_list[$i]['gas']);

            if ($cryptocurrency_list[$i]['currency'] == 'BTC')
                $cryptocurrency_list[$i]['ico'] = asset('/icons/btc.svg');
            else if ($cryptocurrency_list[$i]['currency'] == 'ETH')
                $cryptocurrency_list[$i]['ico'] = asset('/icons/eth.svg');
            else if ($cryptocurrency_list[$i]['currency'] == 'XRP')
                $cryptocurrency_list[$i]['ico'] = asset('/icons/xrp.svg');
            else if ($cryptocurrency_list[$i]['currency'] == 'LTC')
                $cryptocurrency_list[$i]['ico'] = asset('/icons/ltc.svg');
            else if ($cryptocurrency_list[$i]['currency'] == 'USDT')
                $cryptocurrency_list[$i]['ico'] = asset('/icons/usdt.svg');
            else if ($cryptocurrency_list[$i]['currency'] == 'ADA')
                $cryptocurrency_list[$i]['ico'] = asset('/icons/ada.svg');
            else if ($cryptocurrency_list[$i]['currency'] == 'WIZ+')
                $cryptocurrency_list[$i]['ico'] = asset('/icons/wiz+.svg');
            else
                $cryptocurrency_list[$i]['ico'] = asset('/icons/btc.svg');
        }

        return $cryptocurrency_list;
    }

    /**
     * Get Crypto Setting Info from currency
     *
     * @param $currency
     * @return array
     */
    protected function getCryptocurrencySetting($currency)
    {
        $crypto_setting = array();

        try {
            $crypto_info = CryptoSettings::where('currency', $currency)->first();
            if (is_null($crypto_info))
                return $crypto_setting;

        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return $crypto_setting;
        }

        $crypto_setting = $crypto_info->toArray();
        return $crypto_setting;
    }

    /**
     * Get crypto currency list with balance
     *
     * @return array
     */
    protected function getCryptocurrencyListWithBalance()
    {
        $user = Auth::user();
        $cryptocurrency_list = array();

        try {
            $cryptocurrency_list = CryptoSettings::leftjoin('lk_ctex_db.ct_users_balance', 'lk_crypto_settings.currency', '=', 'ct_users_balance.currency')
                ->where('lk_crypto_settings.status', config('constants.crypto_setting_status.valid'))
                ->where('ct_users_balance.user_id', $user->id)
                ->select('lk_crypto_settings.*', 'ct_users_balance.balance')
                ->get()->toArray();
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return $cryptocurrency_list;
        }

        for ($i = 0; $i < count($cryptocurrency_list); $i++) {
            $cryptocurrency_list[$i]['balance'] = _number_format($cryptocurrency_list[$i]['balance'], $cryptocurrency_list[$i]['rate_decimals']);
            $cryptocurrency_list[$i]['cashback'] = _number_format($cryptocurrency_list[$i]['cashback'], $cryptocurrency_list[$i]['rate_decimals']);
            $cryptocurrency_list[$i]['min_deposit'] = _number_format($cryptocurrency_list[$i]['min_deposit'], $cryptocurrency_list[$i]['rate_decimals']);
            $cryptocurrency_list[$i]['min_withdraw'] = _number_format($cryptocurrency_list[$i]['min_withdraw'], $cryptocurrency_list[$i]['rate_decimals']);
            $cryptocurrency_list[$i]['transfer_fee'] = _number_format($cryptocurrency_list[$i]['transfer_fee'], $cryptocurrency_list[$i]['rate_decimals']);
            $cryptocurrency_list[$i]['gas_price'] = _number_format($cryptocurrency_list[$i]['gas_price'], $cryptocurrency_list[$i]['rate_decimals']);
            $cryptocurrency_list[$i]['gas_limit'] = _number_format($cryptocurrency_list[$i]['gas_limit'], $cryptocurrency_list[$i]['rate_decimals']);
            $cryptocurrency_list[$i]['gas'] = _number_format($cryptocurrency_list[$i]['gas'], $cryptocurrency_list[$i]['rate_decimals']);

            if ($cryptocurrency_list[$i]['currency'] == 'BTC')
                $cryptocurrency_list[$i]['ico'] = asset('/icons/btc.svg');
            else if ($cryptocurrency_list[$i]['currency'] == 'ETH')
                $cryptocurrency_list[$i]['ico'] = asset('/icons/eth.svg');
            else if ($cryptocurrency_list[$i]['currency'] == 'XRP')
                $cryptocurrency_list[$i]['ico'] = asset('/icons/xrp.svg');
            else if ($cryptocurrency_list[$i]['currency'] == 'LTC')
                $cryptocurrency_list[$i]['ico'] = asset('/icons/ltc.svg');
            else if ($cryptocurrency_list[$i]['currency'] == 'USDT')
                $cryptocurrency_list[$i]['ico'] = asset('/icons/usdt.svg');
            else if ($cryptocurrency_list[$i]['currency'] == 'ADA')
                $cryptocurrency_list[$i]['ico'] = asset('/icons/ada.svg');
            else if ($cryptocurrency_list[$i]['currency'] == 'WIZ+')
                $cryptocurrency_list[$i]['ico'] = asset('/icons/wiz+.svg');
            else
                $cryptocurrency_list[$i]['ico'] = asset('/icons/btc.svg');
        }

        return $cryptocurrency_list;
    }

    /**
     * Get User's Balance List
     *
     * @return array
     */
    protected function getBalance()
    {
        $user = Auth::user();

        $balance_list = array();

        try {
            $balance_list = UserBalance::leftjoin('lk_main_db.lk_crypto_settings', 'lk_crypto_settings.currency', '=', 'ct_users_balance.currency')
                ->where('ct_users_balance.user_id', $user->id)
                ->where('ct_users_balance.status', config('constants.balance_status.valid'))
                ->select('ct_users_balance.user_id', 'ct_users_balance.currency', 'ct_users_balance.balance', 'lk_crypto_settings.rate_decimals')
                ->get()->toArray();
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return $balance_list;
        }

        for ($i = 0; $i < count($balance_list); $i++) {
            $balance_list[$i]['balance'] = _number_format($balance_list[$i]['balance'], $balance_list[$i]['rate_decimals']);

            if ($balance_list[$i]['currency'] == 'BTC')
                $balance_list[$i]['ico'] = asset('/icons/btc.svg');
            else if ($balance_list[$i]['currency'] == 'ETH')
                $balance_list[$i]['ico'] = asset('/icons/eth.svg');
            else if ($balance_list[$i]['currency'] == 'XRP')
                $balance_list[$i]['ico'] = asset('/icons/xrp.svg');
            else if ($balance_list[$i]['currency'] == 'LTC')
                $balance_list[$i]['ico'] = asset('/icons/ltc.svg');
            else if ($balance_list[$i]['currency'] == 'USDT')
                $balance_list[$i]['ico'] = asset('/icons/usdt.svg');
            else if ($balance_list[$i]['currency'] == 'ADA')
                $balance_list[$i]['ico'] = asset('/icons/ada.svg');
            else if ($balance_list[$i]['currency'] == 'WIZ+')
                $balance_list[$i]['ico'] = asset('/icons/wiz+.svg');
            else
                $balance_list[$i]['ico'] = asset('/icons/btc.svg');
        }

        return $balance_list;
    }

    /**
     * Get User's balance from currency
     *
     * @param $currency
     * @return array
     */
    protected function getBalanceFromCurrency($currency)
    {
        $user = Auth::user();

        $balance = [
            'balance' => 0,
            'decimals' => 0,
        ];

        try {
            $balance_info = UserBalance::leftjoin('lk_main_db.lk_crypto_settings', 'lk_crypto_settings.currency', '=', 'ct_users_balance.currency')
                ->where('ct_users_balance.user_id', $user->id)
                ->where('ct_users_balance.currency', $currency)
                ->where('ct_users_balance.status', config('constants.balance_status.valid'))
                ->select('ct_users_balance.user_id', 'ct_users_balance.currency', 'ct_users_balance.balance', 'lk_crypto_settings.rate_decimals')
                ->first();

            if (is_null($balance_info))
                return $balance;
            else {
                $balance['balance'] = $balance_info->balance;
                $balance['decimals'] = $balance_info->rate_decimals;
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return $balance;
        }

        return $balance;
    }

    /**
     * get last news
     *
     * @return array
     */
    protected function getLastNews()
    {
        $news_list = array();

        $locale = app()->getLocale();
        try {
            $news_list = News::where('lang', $locale)
                ->where('status', config('constants.news_status.valid'))
                ->orderby('updated_at', 'desc')
                ->take(config('constants.last_news_count'))
                ->get()->toArray();
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return $news_list;
        }

        for ($i = 0; $i < count($news_list); $i++)
            $news_list[$i]['updated_at'] = date('Y-m-d h:i:s', strtotime($news_list[$i]['updated_at']));

        return $news_list;
    }

    /**
     * get last notifications
     *
     * @return array
     */
    public static function getLastNotifications()
    {
        $user = Auth::user();

        $notification_list = array();
        try {
            $notification_list = Notifications::leftjoin('ct_users_notifications_detail', 'ct_users_notifications.id', '=', 'ct_users_notifications_detail.notify_id')
                ->where('ct_users_notifications_detail.user_id', $user->id)
                ->orderby('ct_users_notifications.updated_at', 'desc')
                ->select('ct_users_notifications.*', 'ct_users_notifications_detail.status', 'ct_users_notifications_detail.user_id')
                ->take(config('constants.last_notification_count'))
                ->get()->toArray();
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return $notification_list;
        }

        for ($i = 0; $i < count($notification_list); $i++)
            $notification_list[$i]['updated_at'] = date('Y-m-d h:i:s', strtotime($notification_list[$i]['updated_at']));

        return $notification_list;
    }

    /**
     * get deposit status
     *
     * @param $status
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    protected function getDepositStatue($status)
    {
        $deposit_status = config('constants.deposit_status');
        if ($status == $deposit_status['confirmed'])
            return trans('common.deposit_status.confirmed');
        elseif ($status == $deposit_status['completed'])
            return trans('common.deposit_status.completed');
        elseif ($status == $deposit_status['processing'])
            return trans('common.deposit_status.processing');
        elseif ($status == $deposit_status['failed'])
            return trans('common.deposit_status.failed');

        return '';
    }

    /**
     * get withdraw status label
     *
     * @param $status
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    protected function getWithdrawStatue($status)
    {
        $withdraw_status = config('constants.withdraw_status');
        if ($status == $withdraw_status['requested'])
            return trans('common.withdraw_status.requested');
        elseif ($status == $withdraw_status['completed'])
            return trans('common.withdraw_status.completed');
        elseif ($status == $withdraw_status['processing'])
            return trans('common.withdraw_status.processing');
        elseif ($status == $withdraw_status['failed'])
            return trans('common.withdraw_status.failed');
        elseif ($status == $withdraw_status['canceled'])
            return trans('common.withdraw_status.canceled');

        return '';
    }

    /**
     * get trade type label
     *
     * @param $type
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    protected function getTradeType($type)
    {
        $trade_type = config('constants.trade_type');
        if ($type == $trade_type['trade'])
            return trans('common.trade_type.trade');
        elseif ($type == $trade_type['Buy/Sell Crypto'])
            return trans('common.trade_type.Buy/Sell Crypto');

        return '';
    }

    /**
     * get order type label
     *
     * @param $type
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    protected function getOrderType($type)
    {
        $order_type = config('constants.order_type');
        if ($type == $order_type['sell'])
            return trans('common.order_type.sell');
        elseif ($type == $order_type['buy'])
            return trans('common.order_type.buy');

        return '';
    }

    /**
     * get trade status label
     *
     * @param $status
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    protected function getTradeStatue($status)
    {
        $trade_status = config('constants.trade_status');
        if ($status == $trade_status['settled'])
            return trans('common.trade_status.settled');
        elseif ($status == $trade_status['canceled'])
            return trans('common.trade_status.canceled');

        return '';
    }
}
