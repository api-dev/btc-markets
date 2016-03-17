<?php 
/**
* Application route deifinitions for Klien
**/

// Get the current ticker price from the API
$klein->respond('GET', '/current-price', function () 
{
	$btcApp = new \btcMarkets\btcApp();
	$apiResp = $btcApp->updatePrice();		

    return json_encode($apiResp);
});

$klein->respond('GET', '/current-price/[:targetUnit]', function ($request) 
{
	$btcApp = new \btcMarkets\btcApp();

	if (isset($request->targetUnit)) {
		if ( strtoupper($request->targetUnit) === 'BTC' || strtoupper($request->targetUnit) === 'LTC' || strtoupper($request->targetUnit) === 'ETH' ) {
			$apiResp = $btcApp->updatePrice( strtoupper($request->targetUnit) );

 			return json_encode($apiResp);
		} else {
			return 'Ticker unit invalid';			
		}
	}

   	return 'Ticker unit not found';
});

// Get the latest trades from the API
$klein->respond('GET', '/latest-trades', function () 
{
	$btcApp = new \btcMarkets\btcApp();
	$apiResp = $btcApp->latestTrades();		

    return json_encode($apiResp);
});

$klein->respond('GET', '/latest-trades/[:targetUnit]', function ($request) 
{
	$btcApp = new \btcMarkets\btcApp();

	if (isset($request->targetUnit)) {
		if ( strtoupper($request->targetUnit) === 'BTC' || strtoupper($request->targetUnit) === 'LTC' || strtoupper($request->targetUnit) === 'ETH' ) {

			$apiResp = $btcApp->latestTrades( 
												strtoupper($request->targetUnit) 
											);

 			return json_encode($apiResp);
		} else {
			return 'Ticker unit invalid';			
		}
	}

   	return 'Ticker unit not found';
});

// Get the order book from the API
$klein->respond('GET', '/order-book', function () 
{
	$btcApp = new \btcMarkets\btcApp();

	$apiResp = $btcApp->orderBook();

	return json_encode($apiResp);
});

$klein->respond('GET', '/order-book/[:targetUnit]', function ($request) 
{
	$btcApp = new \btcMarkets\btcApp();

	if (isset($request->targetUnit)) {
		if ( strtoupper($request->targetUnit) === 'BTC' || strtoupper($request->targetUnit) === 'LTC' ) {

			$apiResp = $btcApp->orderBook( 
											strtoupper($request->targetUnit) 
										 );

 			return json_encode($apiResp);
		} else {
			return 'Ticker unit invalid';			
		}
	}

   	return 'Ticker unit not found';
});

// Get the average ticker price from the API
$klein->respond('GET', '/average-price', function () {	
	$btcApp = new \btcMarkets\btcApp();

	$apiResp = json_encode($btcApp->averagePrice());
    return $apiResp;
});

$klein->respond('GET', '/average-price/[:targetUnit]', function ($request) 
{
	$btcApp = new \btcMarkets\btcApp();

	if (isset($request->targetUnit)) {
		if ( strtoupper($request->targetUnit) === 'BTC' || strtoupper($request->targetUnit) === 'LTC' ) {
			$apiResp = $btcApp->averagePrice( strtoupper($request->targetUnit) );

 			return json_encode($apiResp);
		} else {
			return 'Ticker unit invalid';			
		}
	}

   	return 'Ticker unit not found';
});