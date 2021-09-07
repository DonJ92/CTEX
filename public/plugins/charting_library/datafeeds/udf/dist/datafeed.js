class UniexchangeDatafeed {
    constructor(options) {
        this.debug = options.debug || false;
        this.pulse = 0;
        this._subs = [];
        this.history = [];
    }

    getLatestBars(sub) {
        console.log("getLatestBars:", this._subs);
        //const sub = this._subs.find(e => e.uid == uid);
        console.log('get LastestBars CurrentSub:', sub);

        this.pulse = setInterval(function(uniexchangeKlines, history, updateBar, updateCurrencyPriceAndChange) {
            let _currencyPair = sub.symbolInfo.name;
            let _start = sub.lastBar != null ? sub.lastBar.time / 1000 : 0;
            let _resolution = sub.resolution, chartResolution= 300; 
            if (_start == 0) {
                if (history.hasOwnProperty(_currencyPair)) {
                    sub.lastBar = history[_currencyPair].lastBar;
                }
                return;
            }
            
            switch (_resolution) {
                case '1': 
                    chartResolution = 300; // 5 minutes
                    break;
                case '60': 
                    chartResolution = 7200; // 2 hours
                    break;
                case 'D': 
                case '1D': 
                    chartResolution = 86400; // 1 day
                    break;
                default: 
                    chartResolution = 300;
            }

            uniexchangeKlines(g_rateUrl, _currencyPair, _resolution, _start, _start + chartResolution, 0).then(klines => {
                var latest = klines.map(function(el) {
                    g_bid_price = el.close;
                    g_ask_price = el.ask_close;

                    return {
                        time: el.date * 1000,
                        low: el.low,
                        high: el.high,
                        open: el.open,
                        close: el.close,
                        volume: el.volume
                    }
                });

                if (latest.length >= 1) {
                    for (var i = 0; i < latest.length; i++) {
                        if (latest[i].time < sub.lastBar.time) {
                            continue;
                        }
                        var _lastBar = updateBar(latest[i], sub);
                        // send the most recent bar back to TV's realtimeUpdate callback
                        sub.listener(_lastBar);
                        // update our own record of lastBar
                        sub.lastBar = _lastBar;
                        updateCurrencyPriceAndChange(_lastBar.close);
                    }
                }
                //console.log(data);
            }).catch(err => {
                console.error(err);
            });   
        }, 500, this.uniexchangeKlines, this.history, this.updateBar, this.updateCurrencyPriceAndChange);
    }

    
    updateCurrencyPriceAndChange(curPrice) {
        $("#lblRate").text(curPrice);
        let changeVal = 0;
        g_lastPrice = parseFloat(g_lastPrice);
        curPrice = parseFloat(curPrice);
        if (g_lastPrice != 0) {
            changeVal = (curPrice - g_lastPrice) / g_lastPrice * 100;
            changeVal = changeVal.toFixed(2);
        }
        $("#lblChange").text(changeVal + "%");
    }

    updateBar(data, sub) {
        var lastBar = sub.lastBar;
        let resolution = sub.resolution;
        if (resolution.includes('D')) {
            // 1 day in minutes === 1440
            resolution = 1440;
        } else if (resolution.includes('W')) {
            // 1 week in minutes === 10080
            resolution = 10080;
        }

        var coeff = resolution * 60;
        // console.log({coeff})

        var rounded = Math.floor(data.time / coeff) * coeff;
        var lastBarSec = lastBar.time;
        var _lastBar;

        if (rounded > lastBarSec) {
            // create a new candle, use last close as open **PERSONAL CHOICE**
            _lastBar = {
                time: rounded,
                open: lastBar.close,
                high: lastBar.close,
                low: lastBar.close,
                close: data.close,
                volume: data.volume
            }
        } else {

            // update lastBar candle!
            if (data.close < lastBar.low) {
                lastBar.low = data.close;
            } else if (data.close > lastBar.high) {
                lastBar.high = data.close;
            }
         
            lastBar.volume = data.volume;
            lastBar.close = data.close;
            _lastBar = lastBar;
        }

        return _lastBar
    }

    uniexchangeKlines(paramUrl, symbol, resolution, startTime, endTime, limit) {
        var type = resolution;
        if (type == 'D' || type == '1D') {
            type = "m1440";
        } else {
            type = "m".concat(resolution);
        }

        const url = paramUrl +
            "?currency_pair=".concat(symbol) +
            "&type=".concat(type) +
            "&limit=".concat(limit) +
            "&start=".concat(startTime) +
            "&end=".concat(endTime)

        return fetch(url).then(res => {
            return res.json()
        }).then(json => {
            return json
        })
    }

    onReady(callback) {
        setTimeout(function() {
            callback(config);
        }, 0);
    }

    resolveSymbol(symbolName, onSymbolResolvedCallback, onResolveErrorCallback) {
        this.debug && console.log('👉 resolveSymbol:', symbolName);

        setTimeout(() => {
            onSymbolResolvedCallback({
                name: symbolName,
                description: symbolName,
                ticker: symbolName,
                type: 'crypto',
                session: '24x7',
                minmov: 1,
                timezone: 'UTC',
                has_intraday: true,
                has_daily: true,
                has_weekly_and_monthly: true,
                pricescale: 100000000000,
                intraday_multipliers: ['1', '60'],
                data_status: 'streaming',
            })
        }, 0);

        //onResolveErrorCallback('not found');
    }

    getBars(symbolInfo, resolution, from, to, onHistoryCallback, onErrorCallback, firstDataRequest) {
        if (this.debug) {
            console.log('👉 getBars:', symbolInfo.name, resolution)
            console.log('First:', firstDataRequest)
            console.log('From:', from, '(' + new Date(from * 1000).toGMTString() + ')')
            console.log('To:  ', to, '(' + new Date(to * 1000).toGMTString() + ')')
        }

        const interval = {
            '1': '1m',
            '3': '3m',
            '5': '5m',
            '15': '15m',
            '30': '30m',
            '60': '1h',
            '120': '2h',
            '240': '4h',
            '360': '6h',
            '480': '8h',
            '720': '12h',
            'D': '1d',
            '1D': '1d',
            '3D': '3d',
            'W': '1w',
            '1W': '1w',
            'M': '1M',
            '1M': '1M',
        }[resolution];

        if (!interval) {
            console.log('getbars error:', interval);
            onErrorCallback('Invalid interval')
        }

        this.uniexchangeKlines(g_rateUrl, symbolInfo.name, resolution, from, to, 0).then(klines => {
            if (this.debug) {
                console.log('📊:', klines.length);
            }

            if (klines.length == 0) {
                onHistoryCallback([], { noData: true });
            } else {
                var bars = klines.map(kline => {
                    return {
                        time: kline.date * 1000,
                        close: parseFloat(kline.close),
                        open: parseFloat(kline.open),
                        high: parseFloat(kline.high),
                        low: parseFloat(kline.low),
                        volume: parseFloat(kline.volume)
                    }
                });

                onHistoryCallback(bars, {noData: false });
                //if (firstDataRequest) {
                    var lastBar = bars[bars.length - 1];
                    this.history[symbolInfo.name] = {lastBar: lastBar};
                    console.log("history:", this.history);

                    this.updateCurrencyPriceAndChange(lastBar.close);
                //}
            }
        }).catch(err => {
            console.error(err);
            onErrorCallback(err);
        })
    }

    subscribeBars(symbolInfo, resolution, onRealtimeCallback, subscriberUID, onResetCacheNeededCallback) {
        this.debug && console.log('👉 subscribeBars:', subscriberUID)

        if (this.pulse) {
            clearInterval(this.pulse);
        }

        var newSub = {
            uid: subscriberUID,
            resolution: resolution,
            symbolInfo: symbolInfo,
            lastBar: this.history.length < 1 ? null : this.history[symbolInfo.name].lastBar,
            listener: onRealtimeCallback
        }
        console.log('newSub', newSub);
        this._subs.push(newSub);
        this.getLatestBars(newSub);

        /*
        var sub = this._subs.find(function(el) {
            return el.uid === subscriberUID;
        });       
        */ 
    }

    unsubscribeBars(subscriberUID) {
        this.debug && console.log('👉 unsubscribeBars:', subscriberUID)

        var subIndex = this._subs.findIndex(function(el) {
            return el.uid === subscriberUID
        });
      
        if (subIndex === -1) {
            return;
        }
      
        clearInterval(this.pulse);
        this._subs.splice(subIndex, 1);
    }
}
