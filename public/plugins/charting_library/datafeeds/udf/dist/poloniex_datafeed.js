'use strict';
/*
 This class implements interaction with UDF-compatible datafeed.

 See UDF protocol reference at
 https://github.com/tradingview/charting_library/wiki/UDF
 */

var historyURL;
var bBithumbJisu = false;
function parseJSONorNot(mayBeJSON) {
	if (typeof mayBeJSON === 'string') {
		return JSON.parse(mayBeJSON);
	} else {
		return mayBeJSON;
	}
}

var Datafeeds = {};

Datafeeds = function(datafeedURL) {
	this._datafeedURL = datafeedURL;
	this._configuration = undefined;

	this._symbolSearch = null;
	this._symbolsStorage = null;
	this._barsPulseUpdater = new Datafeeds.DataPulseUpdater(this);

	this._initializationFinished = false;
	this._callbacks = {};

	this._initialize();
};

Datafeeds.prototype.defaultConfiguration = function() {
	//console.log('*defaultConfiguration.');
	return {
		supports_search: false,
		supports_group_request: true,
		supported_resolutions: ['1', '5', '15', '30', '60', '1D', '1W', '1M'],
		supports_marks: false,
		supports_timescale_marks: false
	};
};

Datafeeds.prototype.getServerTime = function(callback) {
	//console.log('*getServerTime. callback :'+callback);
	if (this._configuration.supports_time) {
		this._send(this._datafeedURL + '/time', {})
		.done(function(response) {
			callback(+response);
		})
		.fail(function() {
		});
	}
};

Datafeeds.prototype.on = function(event, callback) {
	//console.log('*on. event:'+event+', callback :'+callback);
	if (!this._callbacks.hasOwnProperty(event)) {
		this._callbacks[event] = [];
	}

	this._callbacks[event].push(callback);
	return this;
};

Datafeeds.prototype._fireEvent = function(event, argument) {
	//console.log('*_fireEvent. event:'+event+', argument :'+argument);
	if (this._callbacks.hasOwnProperty(event)) {
		var callbacksChain = this._callbacks[event];
		for (var i = 0; i < callbacksChain.length; ++i) {
			callbacksChain[i](argument);
		}

		this._callbacks[event] = [];
	}
};

Datafeeds.prototype.onInitialized = function() {
	//console.log('*onInitialized.');
	this._initializationFinished = true;
	this._fireEvent('initialized');
};

Datafeeds.prototype._send = function(url, params) {
	//console.log('*_send. url:'+url+', params :'+params);
	var request = url;
	if (params) {
		for (var i = 0; i < Object.keys(params).length; ++i) {
			var key = Object.keys(params)[i];
			var value = encodeURIComponent(params[key]);
			request += (i === 0 ? '?' : '&') + key + '=' + value;
		}
	}

	return $.ajax({
		type: 'GET',
		url: request,
		contentType: 'text/plain'
	});
};

Datafeeds.prototype._initialize = function() {
	//console.log('*initialize.');
	var that = this;

	var configurationData = {
		"supports_search": true,
		"supports_group_request": false,
		"supports_marks": false,
		"symbolsTypes":
			[
				{"name":"bitcoin", "value":"bitcoin"}
			],
		"supported_resolutions": ["1","3","5","10","30","60","360", "720", "D", "W", "M"]
	};
	that._setupWithConfiguration(configurationData);
};

Datafeeds.prototype.onReady = function(callback) {
	//console.log('*onReady. callback:'+callback);
	var that = this;
	if (this._configuration) {
		setTimeout(function() {
			callback(that._configuration);
		}, 0);
	} else {
		this.on('configuration_ready', function() {
			callback(that._configuration);
		});
	}
};

Datafeeds.prototype._setupWithConfiguration = function(configurationData) {
	//console.log('*_setupWithConfiguration. configurationData:'+configurationData);
	this._configuration = configurationData;

	if (!configurationData.exchanges) {
		configurationData.exchanges = [];
	}

	//	@obsolete; remove in 1.5
	var supportedResolutions = configurationData.supported_resolutions || configurationData.supportedResolutions;
	configurationData.supported_resolutions = supportedResolutions;

	//	@obsolete; remove in 1.5
	var symbolsTypes = configurationData.symbols_types || configurationData.symbolsTypes;
	configurationData.symbols_types = symbolsTypes;

	if (!configurationData.supports_search && !configurationData.supports_group_request) {
		throw new Error('Unsupported datafeed configuration. Must either support search, or support group request');
	}

	if (!configurationData.supports_search) {
		this._symbolSearch = new Datafeeds.SymbolSearchComponent(this);
	}

	if (configurationData.supports_group_request) {
		//	this component will call onInitialized() by itself
		this._symbolsStorage = new Datafeeds.SymbolsStorage(this);
	} else {
		this.onInitialized();
	}

	this._fireEvent('configuration_ready');
};

//	===============================================================================================================================
//	The functions set below is the implementation of JavaScript API.

Datafeeds.prototype.getMarks = function(symbolInfo, rangeStart, rangeEnd, onDataCallback, resolution) {
	//console.log('*getMarks. symbolInfo:'+symbolInfo+', rangeStart:'+rangeStart+', rangeEnd:'+rangeEnd+', onDataCallback:'+onDataCallback+', resolution:'+resolution);
	if (this._configuration.supports_marks) {
		this._send(this._datafeedURL + '/marks', {
			symbol: symbolInfo.ticker.toUpperCase(),
			from: rangeStart,
			to: rangeEnd,
			resolution: resolution
		})
		.done(function(response) {
			onDataCallback(parseJSONorNot(response));
		})
		.fail(function() {
			onDataCallback([]);
		});
	}
};

Datafeeds.prototype.getTimescaleMarks = function(symbolInfo, rangeStart, rangeEnd, onDataCallback, resolution) {
	//console.log('*getTimescaleMarks. symbolInfo:'+symbolInfo+', rangeStart:'+rangeStart+', rangeEnd:'+rangeEnd+', onDataCallback:'+onDataCallback+', resolution:'+resolution);
	if (this._configuration.supports_timescale_marks) {
		this._send(this._datafeedURL + '/timescale_marks', {
			symbol: symbolInfo.ticker.toUpperCase(),
			from: rangeStart,
			to: rangeEnd,
			resolution: resolution
		})
		.done(function(response) {
			onDataCallback(parseJSONorNot(response));
		})
		.fail(function() {
			onDataCallback([]);
		});
	}
};

var isCoin = false;
Datafeeds.prototype.searchSymbols = function(searchString, exchange, type, onResultReadyCallback) {
	//console.log('*searchSymbols. searchString:'+searchString+', exchange:'+exchange+', type:'+type+', onResultReadyCallback:'+onResultReadyCallback);
	var MAX_SEARCH_RESULTS = 30;

	if (!this._configuration) {
		onResultReadyCallback([]);
		return;
	}

	if (this._configuration.supports_search) {
		this._send('/tradingview/search', {
			limit: MAX_SEARCH_RESULTS,
			query: searchString.toUpperCase(),
			type: type,
			exchange: exchange
		})
		.done(function(response) {
			if(response =='' || response == null) return;
			var data = parseJSONorNot(response);

			for (var i = 0; i < data.length; ++i) {
				if (!data[i].params) {
					data[i].params = [];
				}

				data[i].exchange = data[i].exchange || '';
			}
			isCoin = false;
			$.each(COIN , function(i){
				if(i == searchString.toUpperCase()){isCoin = true;}
			});

			if (typeof data.s == 'undefined' || data.s !== 'error') {
				onResultReadyCallback(data);
			} else {
				onResultReadyCallback([]);
			}
		})
		.fail(function(reason) {
			isCoin = false;
			onResultReadyCallback([]);
		});
	} else {

		if (!this._symbolSearch) {
			throw new Error('Datafeed error: inconsistent configuration (symbol search)');
		}

		var searchArgument = {
			searchString: searchString,
			exchange: exchange,
			type: type,
			onResultReadyCallback: onResultReadyCallback
		};

		if (this._initializationFinished) {
			this._symbolSearch.searchSymbols(searchArgument, MAX_SEARCH_RESULTS);
		} else {
			var that = this;

			this.on('initialized', function() {
				that._symbolSearch.searchSymbols(searchArgument, MAX_SEARCH_RESULTS);
			});
		}
	}
};


//	BEWARE: this function does not consider symbol's exchange
Datafeeds.prototype.resolveSymbol = function(symbolName, onSymbolResolvedCallback, onResolveErrorCallback) {
	//console.log('*resolveSymbol. symbolName:'+symbolName+', onSymbolResolvedCallback:'+onSymbolResolvedCallback+', onResolveErrorCallback:'+onResolveErrorCallback);
	var that = this;

	if (!this._initializationFinished) {
		this.on('initialized', function() {
			that.resolveSymbol(symbolName, onSymbolResolvedCallback, onResolveErrorCallback);
		});

		return;
	}

	var resolveRequestStartTime = Date.now();

	function onResultReady(data) {
		//console.log('*onResultReady. data: ' + JSON.stringify(data));
		var postProcessedData = data;
		if (that.postProcessSymbolInfo) {
			postProcessedData = that.postProcessSymbolInfo(postProcessedData);
		}
		onSymbolResolvedCallback(postProcessedData);
	}

	if (!this._configuration.supports_group_request) {
		//console.log('*resolveSymbol if (!this._configuration.supports_group_request)');
		var targetSymbol = sCoinType;
		if(bBithumbJisu){
			targetSymbol = window.US180.type || 'BTMI';
		}
		var data = {
			"name" : targetSymbol,
			"timezone" : "Asia/Seoul",
			"minmov" : 1,
			"minmov2" : 0,
			"pointvalue" : 1,
			"session" : "24x7",
			"has_empty_bars" : false,
			"has_intraday" : true,
			"intraday_multipliers" : ["0.5"],
			"has_daily" : false,
			"has_weekly_and_monthly" : false,
			"has_no_volume" : false,
			"description" : targetSymbol+"/KRW",
			"type" : "coin",
			"supported_resolutions": ["1","3","5","10","30","60","360","720","D","W","M"],
			"pricescale" : 1,
			"data_status" : "streaming",
			"ticker" : targetSymbol
		};

		if(!bBithumbJisu) {
			//dev-64 소수점 자리표기
			var iChartRealData = typeof bithumbRealInfo !== 'undefined' ? bithumbRealInfo[data.name] : realData[data.name];
			iChartRealData = iChartRealData.closing_price ? iChartRealData.closing_price : iChartRealData['24H'].closing_price;
			if (iChartRealData >= 0 && iChartRealData < 100) {
				data.pricescale = 100;
			}
		}
		if (data.s && data.s !== 'ok') {
			onResolveErrorCallback('unknown_symbol');
		} else {
			onResultReady(data);
		}
	} else {
		if (this._initializationFinished) {
			this._symbolsStorage.resolveSymbol(symbolName, onResultReady, onResolveErrorCallback);
		} else {
			this.on('initialized', function() {
				that._symbolsStorage.resolveSymbol(symbolName, onResultReady, onResolveErrorCallback);
			});
		}
	}
};
function getHisrotyURL(tradingviewCoinName, resolution){
	if( COIN[tradingviewCoinName] == undefined && !bBithumbJisu){return;}

	if(bBithumbJisu && ( tradingviewCoinName === 'BTMI' || tradingviewCoinName === 'BTAI')){
		switch (resolution) {
			case "30":
				historyURL = "/resources/chart/INDEX_" + tradingviewCoinName + "_10M.json";
				break;
			case "60":
				historyURL = "/resources/chart/INDEX_" + tradingviewCoinName + "_1H.json";
				break;
			case "360":
				historyURL = "/resources/chart/INDEX_" + tradingviewCoinName + "_6H.json";
				break;
			case "D":
			case "W":
			case "M":
				historyURL = "/resources/chart/INDEX_" + tradingviewCoinName + "_1D.json";
				break;
			default:
				historyURL = "/resources/chart/INDEX_" + tradingviewCoinName + "_1M.json";

		}
	}
	else {
		switch (resolution) {
			case "D":
			case "W":
			case "M":
				historyURL = "/resources/chart/" + tradingviewCoinName + "_xcoinTrade_24H.json";
				break;
			default:
				var res;
				if (resolution < 60) {
					res = resolution;
					if (res < 10) {
						res = '0' + res;
					}
					res = res + 'M';
				} else {
					res = resolution / 60;
					if (resolution < 600) {
						res = '0' + res;
					}
					res = res + 'H';
				}
				historyURL = "/resources/chart/" + tradingviewCoinName + "_xcoinTrade_" + res + ".json";
		}
	}
	return historyURL;
}
var oldHistoryURL = '';
var iOldChartInterval = 1;
var bUpdate = false;
var lastChartDate = 0;
Datafeeds.prototype.getBars = function(symbolInfo, resolution, rangeStartDate, rangeEndDate, onDataCallback, onErrorCallback) {
	//console.log('*getBars. resolution:'+resolution+', rangeStartDate:'+rangeStartDate+', rangeEndDate:'+rangeEndDate+', onDataCallback:'+onDataCallback);

	if (rangeStartDate > 0 && (rangeStartDate + '').length > 10) {
		throw new Error(['Got a JS time instead of Unix one.', rangeStartDate, rangeEndDate]);
	}
	var date	= new Date(),
		strTime	= date.getTime();
	var historyURL = getHisrotyURL(symbolInfo.ticker.toUpperCase(), iChartInterval);
	var nodata = false;
	//같은 데이터를 호출할때 리턴
	if(oldHistoryURL === historyURL && iOldChartInterval === iChartInterval && !bUpdate){
		nodata = true;
	}
	this._send( historyURL, {
		symbol: symbolInfo.ticker.toUpperCase(),
		resolution: resolution,
		from: rangeStartDate,
		to: rangeEndDate,
		strTime : strTime
	})
	.done(function(response) {
		oldHistoryURL = historyURL;
		iOldChartInterval = iChartInterval;
		var bars = [];
		var data = {
			's': 'ok',
			'v': [],
			't': [],
			'o': [],
			'h': [],
			'l': [],
			'c': []
		};

		if(bBithumbJisu){
			var barsCount = nodata ? 0 : response.times.length;
			for (var i = 0; i < barsCount; ++i) {
				var barValue = {
					time: response.times[i] * 1000,
					close: parseFloat(response.values[i]),
					open: parseFloat(response.values[i]),
					high: parseFloat(response.values[i]),
					low: parseFloat(response.values[i]),
					volume: 0
				};
				bars.push(barValue);
			}
		}
		else{
			var barsCount = nodata ? 0 : response.length;
			for (i = 0; i < barsCount; i++) {
				data.t.push(response[i][0]); // times
				data.o.push(parseFloat(response[i][1])); // opens
				data.h.push(parseFloat(response[i][3])); // highs
				data.l.push(parseFloat(response[i][4])); // lows
				data.c.push(parseFloat(response[i][2])); // closes
				data.v.push(parseFloat(response[i][5])); // volumes
				lastChartDate = parseFloat(response[i][0]);
			}

			var volumePresent = typeof data.v != 'undefined';
			var ohlPresent = typeof data.o != 'undefined';

			for (var i = 0; i < barsCount; ++i) {
				var barValue = {
					time: data.t[i],
					close: data.c[i]
				};

				if (volumePresent) {
					barValue.volume = data.v[i];
				}
				var valueCheck = data.o[i] === 0 || data.h[i] === 0 || data.l[i] === 0 || data.c[i] === 0;//가끔 데이터가 0으로 들어옴
				if (ohlPresent && !valueCheck) {
					barValue.open = data.o[i];
					barValue.high = data.h[i];
					barValue.low = data.l[i];
				} else {
					barValue.open = barValue.high = barValue.low = barValue.close = data.c[i - 1];
					barValue.volume = 0;
				}

				bars.push(barValue);
			}
		}

		onDataCallback(bars, { noData: nodata, nextTime: data.nb || data.nextTime });
		bUpdate = false;
	})
	.fail(function(arg) {
		console.warn(['getBars(): HTTP error', arg]);

		if (!!onErrorCallback) {
			onErrorCallback('network error: ' + JSON.stringify(arg));
		}
	});
};
var update = function() {
	bUpdate = true;
	chartBarUpdateResetCache();
	widget.activeChart().resetData();
};
if(!bBithumbJisu){
	setInterval(update, 1000 * 60 * 10);
}

var chartBarUpdate,chartBarUpdateResetCache;
var chartVolume = 0;
var lastCountNum = 0;
function chartDataUpdate(r, amt){
	if($.isEmptyObject(r)){return;}
	var data = r.reverse();
	$.each(data, function(i, v){
		var cCountNum = v.cont_no ? v.cont_no : 0;
		var cDate = v.transaction_date ? v.transaction_date : v.DAT;
		var dateSplit = cDate.split('-');
		var secondSplit = dateSplit[2].split(' ');
		var milliSplit = secondSplit[1].split('.');
		var replaceDate = dateSplit[1] + '/' + secondSplit[0] + '/' + dateSplit[0] + ' ' + milliSplit[0]; // mm/dd/yyyy hh:mm:ss;
		cDate = new Date(replaceDate);
		cDate = parseInt(cDate.getTime())+ parseInt(milliSplit[1].slice(0,3));
		var cPrice = v.price ? v.price : v.PRC;
		var cUnits = v.units_traded ? v.units_traded : v.UNT;
		if(lastCountNum < cCountNum && lastChartDate < cDate){
			chartVolume = parseFloat(cUnits + amt);
			lastChartDate = cDate;
			try
			{
				chartBarUpdate({time: cDate,close: parseFloat(cPrice),open: parseFloat(cPrice),high: parseFloat(cPrice),low: parseFloat(cPrice),volume: chartVolume});
			}
			catch(e){console.log(e);}
			lastCountNum = cCountNum;
		}
	});
}
Datafeeds.prototype.subscribeBars = function(symbolInfo, resolution, onRealtimeCallback, listenerGUID, onResetCacheNeededCallback) {
	chartBarUpdate = onRealtimeCallback;
	chartBarUpdateResetCache = onResetCacheNeededCallback;
};

Datafeeds.prototype.unsubscribeBars = function(listenerGUID) {
	//console.log('*unsubscribeBars. listenerGUID:'+listenerGUID);
	this._barsPulseUpdater.unsubscribeDataListener(listenerGUID);
};

Datafeeds.prototype.calculateHistoryDepth = function(period, resolutionBack, intervalBack) {
	//console.log('*calculateHistoryDepth. period : ' + period + ', resolutionBack: '+resolutionBack+", intervalBack :"+intervalBack);
};


//	==================================================================================================================================================
//	==================================================================================================================================================
//	==================================================================================================================================================

/*
 It's a symbol storage component for ExternalDatafeed. This component can
 * interact to UDF-compatible datafeed which supports whole group info requesting
 * do symbol resolving -- return symbol info by its name
 */
Datafeeds.SymbolsStorage = function(datafeed) {
	//console.log('*SymbolsStorage. datafeed :'+datafeed);
	this._datafeed = datafeed;

	this._exchangesList = ['Bithumb', 'ETH'];
	this._exchangesWaitingForData = {};
	this._exchangesDataCache = {};

	this._symbolsInfo = {};
	this._symbolsList = [];

	this._requestFullSymbolsList();
};

Datafeeds.SymbolsStorage.prototype._requestFullSymbolsList = function() {
	//console.log('*SymbolsStorage._requestFullSymbolsList');
	var that = this;

	for (var i = 0; i < this._exchangesList.length; ++i) {
		var exchange = this._exchangesList[i];

		if (this._exchangesDataCache.hasOwnProperty(exchange)) {
			continue;
		}

		this._exchangesDataCache[exchange] = true;

		this._exchangesWaitingForData[exchange] = 'waiting_for_data';

		this._datafeed._send('/tradingview/symbol', {
			group: exchange
		})
		.done((function(exchange) {
			return function(response) {
				that._onExchangeDataReceived(exchange, parseJSONorNot(response));
				that._onAnyExchangeResponseReceived(exchange);
			};
		})(exchange))
		.fail((function(exchange) {
			return function(reason) {
				that._onAnyExchangeResponseReceived(exchange);
			};
		})(exchange));
	}
};

Datafeeds.SymbolsStorage.prototype._onExchangeDataReceived = function(exchangeName, data) {

	//console.log('*SymbolsStorage._onExchangeDataReceived. exchangeName :'+exchangeName+', data:'+data);
	function tableField(data, name, index) {
		//console.log('*SymbolsStorage._onExchangeDataReceived call tableField call. data :'+data+', name:'+name+', index:'+index);
		return data[name] instanceof Array ?
			data[name][index] :
			data[name];
	}

	try	{
		for (var symbolIndex = 0; symbolIndex < data.symbol.length; ++symbolIndex) {
			var symbolName = data.symbol[symbolIndex];
			var listedExchange = tableField(data, 'exchange-listed', symbolIndex);
			var tradedExchange = tableField(data, 'exchange-traded', symbolIndex);
			var fullName = tradedExchange + ':' + symbolName;

			//	This feature support is not implemented yet
			//	var hasDWM = tableField(data, "has-dwm", symbolIndex);

			var hasIntraday = tableField(data, 'has-intraday', symbolIndex);

			var tickerPresent = typeof data.ticker != 'undefined';

			var symbolInfo = {
				name: symbolName,
				base_name: [listedExchange + ':' + symbolName],
				description: tableField(data, 'description', symbolIndex),
				full_name: fullName,
				legs: [fullName],
				has_intraday: hasIntraday,
				has_no_volume: tableField(data, 'has-no-volume', symbolIndex),
				listed_exchange: listedExchange,
				exchange: tradedExchange,
				minmov: tableField(data, 'minmovement', symbolIndex) || tableField(data, 'minmov', symbolIndex),
				minmove2: tableField(data, 'minmove2', symbolIndex) || tableField(data, 'minmov2', symbolIndex),
				fractional: tableField(data, 'fractional', symbolIndex),
				pointvalue: tableField(data, 'pointvalue', symbolIndex),
				pricescale: tableField(data, 'pricescale', symbolIndex),
				type: tableField(data, 'type', symbolIndex),
				session: tableField(data, 'session-regular', symbolIndex),
				ticker: tickerPresent ? tableField(data, 'ticker', symbolIndex) : symbolName,
				timezone: tableField(data, 'timezone', symbolIndex),
				supported_resolutions: tableField(data, 'supported-resolutions', symbolIndex) || this._datafeed.defaultConfiguration().supported_resolutions,
				force_session_rebuild: tableField(data, 'force-session-rebuild', symbolIndex) || false,
				has_daily: tableField(data, 'has-daily', symbolIndex) || true,
				intraday_multipliers: tableField(data, 'intraday-multipliers', symbolIndex) || ['1', '5', '15', '30', '60'],
				has_fractional_volume: tableField(data, 'has-fractional-volume', symbolIndex) || false,
				has_weekly_and_monthly: tableField(data, 'has-weekly-and-monthly', symbolIndex) || false,
				has_empty_bars: tableField(data, 'has-empty-bars', symbolIndex) || false,
				volume_precision: tableField(data, 'volume-precision', symbolIndex) || 0
			};

			this._symbolsInfo[symbolInfo.ticker] = this._symbolsInfo[symbolName] = this._symbolsInfo[fullName] = symbolInfo;
			this._symbolsList.push(symbolName);
		}
	} catch (error) {
		throw new Error('API error when processing exchange `' + exchangeName + '` symbol #' + symbolIndex + ': ' + error);
	}
};

Datafeeds.SymbolsStorage.prototype._onAnyExchangeResponseReceived = function(exchangeName) {
	//console.log('*SymbolsStorage._onExchangeDataReceived call. exchangeName :'+exchangeName+', data:'+data);
	delete this._exchangesWaitingForData[exchangeName];

	var allDataReady = Object.keys(this._exchangesWaitingForData).length === 0;

	if (allDataReady) {
		this._symbolsList.sort();
		this._datafeed.onInitialized();
	}
};

//	BEWARE: this function does not consider symbol's exchange
Datafeeds.SymbolsStorage.prototype.resolveSymbol = function(symbolName, onSymbolResolvedCallback, onResolveErrorCallback) {
	//console.log('*SymbolsStorage.resolveSymbol. symbolName :'+symbolName+', onSymbolResolvedCallback:'+onSymbolResolvedCallback+', onResolveErrorCallback:'+onResolveErrorCallback);
	var that = this;

	setTimeout(function() {
		if (!that._symbolsInfo.hasOwnProperty(symbolName)) {
			onResolveErrorCallback('invalid symbol');
		} else {
			onSymbolResolvedCallback(that._symbolsInfo[symbolName]);
		}
	}, 0);
};

//	==================================================================================================================================================
//	==================================================================================================================================================
//	==================================================================================================================================================

/*
 It's a symbol search component for ExternalDatafeed. This component can do symbol search only.
 This component strongly depends on SymbolsDataStorage and cannot work without it. Maybe, it would be
 better to merge it to SymbolsDataStorage.
 */

Datafeeds.SymbolSearchComponent = function(datafeed) {
	//console.log('*SymbolSearchComponent call. datafeed :'+datafeed);
	this._datafeed = datafeed;
};

//	searchArgument = { searchString, onResultReadyCallback}
Datafeeds.SymbolSearchComponent.prototype.searchSymbols = function(searchArgument, maxSearchResults) {
	if (!this._datafeed._symbolsStorage) {
		throw new Error('Cannot use local symbol search when no groups information is available');
	}

	var symbolsStorage = this._datafeed._symbolsStorage;

	var results = []; // array of WeightedItem { item, weight }
	var queryIsEmpty = !searchArgument.searchString || searchArgument.searchString.length === 0;
	var searchStringUpperCase = searchArgument.searchString.toUpperCase();

	for (var i = 0; i < symbolsStorage._symbolsList.length; ++i) {
		var symbolName = symbolsStorage._symbolsList[i];
		var item = symbolsStorage._symbolsInfo[symbolName];

		if (searchArgument.type && searchArgument.type.length > 0 && item.type !== searchArgument.type) {
			continue;
		}

		if (searchArgument.exchange && searchArgument.exchange.length > 0 && item.exchange !== searchArgument.exchange) {
			continue;
		}

		var positionInName = item.name.toUpperCase().indexOf(searchStringUpperCase);
		var positionInDescription = item.description.toUpperCase().indexOf(searchStringUpperCase);

		if (queryIsEmpty || positionInName >= 0 || positionInDescription >= 0) {
			var found = false;
			for (var resultIndex = 0; resultIndex < results.length; resultIndex++) {
				if (results[resultIndex].item === item) {
					found = true;
					break;
				}
			}

			if (!found) {
				var weight = positionInName >= 0 ? positionInName : 8000 + positionInDescription;
				results.push({ item: item, weight: weight });
			}
		}
	}

	searchArgument.onResultReadyCallback(
		results
		.sort(function(weightedItem1, weightedItem2) {
			return weightedItem1.weight - weightedItem2.weight;
		})
		.map(function(weightedItem) {
			var item = weightedItem.item;
			return {
				symbol: item.name,
				full_name: item.full_name,
				description: item.description,
				exchange: item.exchange,
				params: [],
				type: item.type,
				ticker: item.name
			};
		})
		.slice(0, Math.min(results.length, maxSearchResults))
	);
};

//	==================================================================================================================================================
//	==================================================================================================================================================
//	==================================================================================================================================================

/*
 This is a pulse updating components for ExternalDatafeed. They emulates realtime updates with periodic requests.
 */
//Datafeeds.DataPulseUpdater = function(datafeed , updateFrequency) {
Datafeeds.DataPulseUpdater = function(datafeed) {
	//console.log('*dataUpdater call');
	this._datafeed = datafeed;
	this._subscribers = {};

	this._requestsPending = 0;
	var that = this;

};

Datafeeds.DataPulseUpdater.prototype.unsubscribeDataListener = function(listenerGUID) {
	delete this._subscribers[listenerGUID];
};

Datafeeds.DataPulseUpdater.prototype.subscribeDataListener = function(symbolInfo, resolution, newDataCallback, listenerGUID) {
	//console.log('*DataPulseUpdater.prototype.subscribeDataListener', symbolInfo, resolution,  newDataCallback,  listenerGUID);
	if (!this._subscribers.hasOwnProperty(listenerGUID)) {
		this._subscribers[listenerGUID] = {
			symbolInfo: symbolInfo,
			resolution: resolution,
			lastBarTime: NaN,
			listeners: []
		};
	}

	this._subscribers[listenerGUID].listeners.push(newDataCallback);
};

Datafeeds.DataPulseUpdater.prototype.periodLengthSeconds = function(resolution, requiredPeriodsCount) {
	//console.log('*DataPulseUpdater.prototype.periodLengthSeconds');
	var daysCount = 0;

	if (resolution === 'D') {
		daysCount = requiredPeriodsCount;
	} else if (resolution === 'M') {
		daysCount = 31 * requiredPeriodsCount;
	} else if (resolution === 'W') {
		daysCount = 7 * requiredPeriodsCount;
	} else {
		daysCount = requiredPeriodsCount * resolution / (24 * 60);
	}

	return daysCount * 24 * 60 * 60;
};

if (typeof module !== 'undefined' && module && module.exports) {
	//console.log('last line if asdfafasdf...');
	module.exports = {
		Datafeeds: Datafeeds,
	};
}