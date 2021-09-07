<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * get rate
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_rate(Request $request) {
        $params = $request->all();
        $type = isset($params['type']) ? $params['type'] : 0;
        $currency = isset($params['currency_val']) ? $params['currency_val'] : 0;
        $currency_pair = isset($params['currency_pair']) ? $params['currency_pair'] : '';
        $period = isset($params['period']) ? $params['period'] : 0;
        $limit = isset($params['limit']) ? $params['limit'] : 0;

        if (empty($currency)) {
            if (!empty($currency_pair)) {
                $CurrencyLists = $this->getCurrencyList();
                $key = array_search($currency_pair, array_column($CurrencyLists, 'currency'));
                $currency = $CurrencyLists[$key]['id'];
            }
        }
        $start = isset($params['start']) ? $params['start'] : '';
        $end = isset($params['end']) ? $params['end'] : '';

        $RateTypeLists = config('constants.rate_timeline_list');
        if (!in_array($type, $RateTypeLists) || empty($currency)) {
            return response()->json([]);
        }

        $model = DB::connection('mysql2')->table("ct_rate_{$type}");
        $model->where('currency', $currency);
        if (!empty($start)) {
            $model->where('time', '>=', $start);
        } else {
            $timeStamp = 0; //time() - 1 * 30 * 24 * 60 * 60; //Before 1 month
            $model->where('time', '>=', $timeStamp);
        }

        if (!empty($end)) {
            $model->where('time', '<=', $end);
        } else {
            if (!empty($start) && !empty($period)) {
                $model->where('time', '<=', (intVal($start) + intVal($period)));
            }
        }
        if (!empty($limit)) {
            $model->limit($limit);
        }
        $ret = $model->select('time', 'ask_open', 'ask_high', 'ask_low', 'ask_close', 'bid_open', 'bid_high', 'bid_low', 'bid_close', 'volume')->get();

        $rateLists = [];
        //$settingCached = cache(CACHE_KEY_SETTING);

        foreach($ret as $record) {
            $tmp = [];

            $tmp['date'] = intVal($record->time);
            $tmp['ask_open'] = doubleVal($record->ask_open); //sprintf("%0." . $settingCached[PRICE_DECIMALS] . "f", doubleVal($record->ask_open));
            $tmp['ask_high'] = doubleVal($record->ask_high); //sprintf("%0." . $settingCached[PRICE_DECIMALS] . "f", doubleVal($record->ask_high));
            $tmp['ask_low'] = doubleVal($record->ask_low); //sprintf("%0." . $settingCached[PRICE_DECIMALS] . "f", doubleVal($record->ask_low));
            $tmp['ask_close'] = doubleVal($record->ask_close); //sprintf("%0." . $settingCached[PRICE_DECIMALS] . "f", doubleVal($record->ask_close
            $tmp['open'] = doubleVal($record->bid_open); //sprintf("%0." . $settingCached[PRICE_DECIMALS] . "f", doubleVal($record->ask_open));
            $tmp['high'] = doubleVal($record->bid_high); //sprintf("%0." . $settingCached[PRICE_DECIMALS] . "f", doubleVal($record->ask_high));
            $tmp['low'] = doubleVal($record->bid_low); //sprintf("%0." . $settingCached[PRICE_DECIMALS] . "f", doubleVal($record->ask_low));
            $tmp['close'] = doubleVal($record->bid_close); //sprintf("%0." . $settingCached[PRICE_DECIMALS] . "f", doubleVal($record->ask_close));
            $tmp['volume'] = doubleVal($record->volume); //sprintf("%0." . $settingCached[AMOUNT_DECIMALS] . "f", doubleVal($record->volume));

            $rateLists[] = $tmp;
        }
        return response()->json($rateLists);
    }

    /**
     * get dealer rate
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_dealer_rate(Request $request) {
        $params = $request->all();
        $type = isset($params['type']) ? $params['type'] : 0;
        $currency = isset($params['currency_val']) ? $params['currency_val'] : 0;
        $currency_pair = isset($params['currency_pair']) ? $params['currency_pair'] : '';
        $period = isset($params['period']) ? $params['period'] : 0;
        $limit = isset($params['limit']) ? $params['limit'] : 0;

        if (empty($currency)) {
            if (!empty($currency_pair)) {
                $CurrencyLists = $this->getCurrencyList();
                $key = array_search($currency_pair, array_column($CurrencyLists, 'currency'));
                $currency = $CurrencyLists[$key]['id'];
            }
        }
        $start = isset($params['start']) ? $params['start'] : '';
        $end = isset($params['end']) ? $params['end'] : '';

        $RateTypeLists = config('constants.rate_timeline_list');
        if (!in_array($type, $RateTypeLists) || empty($currency)) {
            return response()->json([]);
        }

        $model = DB::connection('mysql2')->table("ct_ss_rate_{$type}");
        $model->where('currency', $currency);
        if (!empty($start)) {
            $model->where('time', '>=', $start);
        } else {
            $timeStamp = 0; //time() - 1 * 30 * 24 * 60 * 60; //Before 1 month
            $model->where('time', '>=', $timeStamp);
        }

        if (!empty($end)) {
            $model->where('time', '<=', $end);
        } else {
            if (!empty($start) && !empty($period)) {
                $model->where('time', '<=', (intVal($start) + intVal($period)));
            }
        }
        if (!empty($limit)) {
            $model->limit($limit);
        }
        $ret = $model->select('time', 'ask_open', 'ask_high', 'ask_low', 'ask_close', 'bid_open', 'bid_high', 'bid_low', 'bid_close', 'volume')->get();

        $rateLists = [];
        //$settingCached = cache(CACHE_KEY_SETTING);

        foreach($ret as $record) {
            $tmp = [];

            $tmp['date'] = intVal($record->time);
            $tmp['ask_open'] = doubleVal($record->ask_open); //sprintf("%0." . $settingCached[PRICE_DECIMALS] . "f", doubleVal($record->ask_open));
            $tmp['ask_high'] = doubleVal($record->ask_high); //sprintf("%0." . $settingCached[PRICE_DECIMALS] . "f", doubleVal($record->ask_high));
            $tmp['ask_low'] = doubleVal($record->ask_low); //sprintf("%0." . $settingCached[PRICE_DECIMALS] . "f", doubleVal($record->ask_low));
            $tmp['ask_close'] = doubleVal($record->ask_close); //sprintf("%0." . $settingCached[PRICE_DECIMALS] . "f", doubleVal($record->ask_close
            $tmp['open'] = doubleVal($record->bid_open); //sprintf("%0." . $settingCached[PRICE_DECIMALS] . "f", doubleVal($record->ask_open));
            $tmp['high'] = doubleVal($record->bid_high); //sprintf("%0." . $settingCached[PRICE_DECIMALS] . "f", doubleVal($record->ask_high));
            $tmp['low'] = doubleVal($record->bid_low); //sprintf("%0." . $settingCached[PRICE_DECIMALS] . "f", doubleVal($record->ask_low));
            $tmp['close'] = doubleVal($record->bid_close); //sprintf("%0." . $settingCached[PRICE_DECIMALS] . "f", doubleVal($record->ask_close));
            $tmp['volume'] = doubleVal($record->volume); //sprintf("%0." . $settingCached[AMOUNT_DECIMALS] . "f", doubleVal($record->volume));

            $rateLists[] = $tmp;
        }
        return response()->json($rateLists);
    }
}