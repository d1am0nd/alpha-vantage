# Simplified Laravel Alpha Vantage API client

This is a Laravel package for simplified fetching of finance data from Alpha Vantage API. It's an abstraction layer over Guzzle that aims to remove complexity in connecting it to Alpha Vantage API.

### Docs

* [Demo](#demo)
* [Installation](#installation)
* [Usage](#usage)
* [Licence](#user-content-license)

## Demo

**Getting historical data**

```php
// Daily historical data for Bitcoin to USD
$res = \AlphaVantage\Api::digitalCurrency()->daily('BTC', 'USD');
/* Returns
[
    "Meta Data": [
        "1. Information": "Daily Prices and Volumes for Digital Currency", ...
    ],
    "Time Series (Digital Currency Daily)": [
        "2018-01-03": [
            "1a. open (USD)": "14782.09572045", ...
        ],
        "2018-01-02": [
            "1a. open (USD)": "13514.39967186", ...
        ], ...
    ],
]
*/
```

## Installation

1. Run composer `composer require d1am0nd/alpha-vantage`
2. Add your Alpha Vantage API key to .env as `AV_KEY={your key}`
3. Create a config file `alphavantage.php` with the following:
```
<?php

return [
    'key' => env('AV_KEY')
];
```

## Usage

API calls are grouped into 5 different groups:
* `Api::stock()` - [Stock Time Series](#stock-time-series)
* `Api::currency()` - [Foreign Exchange](#foreign-exchange)
* `Api::digitalCurrency()` - [Digital & Crypto Currencies](#digital--crypto-currencies)
* `Api::sector()` - [Sector Performances](#sector-performances)
* `Api::general()` - [Technical Indicators & Other](#technical-indicators--other)

Each function described below is called from their respective group as shown in examples.

Functions described below also take an additional parameter `array $params = []`, which can be used to pass any optional parameters if needed.

### Stock Time Series
Documented - https://www.alphavantage.co/documentation/#currency-exchange

#### Example - Microsoft's historical monthly stock data
```php
use AlphaVantage\Api;
// ...
public function monthlyData()
{
    return Api::stock()->monthly('MSFT');
}
```

#### Methods available
* `intraday($symbol)` - https://www.alphavantage.co/documentation/#intraday
* `daily($symbol)` - https://www.alphavantage.co/documentation/#daily
* `dailyAdjusted($symbol)` - https://www.alphavantage.co/documentation/#dailyadj
* `weekly($symbol)` - https://www.alphavantage.co/documentation/#weekly
* `weeklyAdjusted($symbol)` - https://www.alphavantage.co/documentation/#weeklyadj
* `monthly($symbol)` - https://www.alphavantage.co/documentation/#monthly
* `monthlyAdjusted($symbol)` - https://www.alphavantage.co/documentation/#monthlyadj
* `batchStockQuotes(array $symbols)` - https://www.alphavantage.co/documentation/#batchquotes
* `quote($symbol)` - https://www.alphavantage.co/documentation/#latestprice
* `search($keywords)` - https://www.alphavantage.co/documentation/#symbolsearch


### Foreign Exchange
Documented - https://www.alphavantage.co/documentation/#currency-exchange

#### Example - Euro to US Dollar
```php
use AlphaVantage\Api;
// ...
public function currencyExchangeRate()
{
    return Api::currency()->currencyExchangeRate('EUR', 'USD');
}
```

#### Methods available
* `currencyExchangeRate($from, $to)` - https://www.alphavantage.co/documentation/#currency-exchange
* `intraday($from, $to, $interval)` - https://www.alphavantage.co/documentation/#fx-intraday
* `daily($from, $to)` - https://www.alphavantage.co/documentation/#fx-daily
* `weekly($from, $to)` - https://www.alphavantage.co/documentation/#fx-weekly
* `monthly($from, $to)` - https://www.alphavantage.co/documentation/#fx-monthly

### Digital & Crypto Currencies
Documented - https://www.alphavantage.co/documentation/#digital-currency

#### Example - Bitcoin historical monthly stock data
```php
use AlphaVantage\Api;
// ...
public function monthlyData()
{
    return Api::digitalCurrency()->monthly('BTC', 'USD');
}
```

#### Methods available
* `intraday($symbol, $market)` - https://www.alphavantage.co/documentation/#currency-intraday
* `daily($symbol, $market)` - https://www.alphavantage.co/documentation/#currency-daily
* `weekly($symbol, $market)` - https://www.alphavantage.co/documentation/#currency-weekly
* `monthly($symbol, $market)` - https://www.alphavantage.co/documentation/#currency-monthly

### Sector Performances
Documented - https://www.alphavantage.co/documentation/#sector-information

#### Example - Sector peformances
```php
use AlphaVantage\Api;
// ...
public function sectorPerformances()
{
    return Api::sector()->sectors();
}
```
#### Methods available
* `sectors()` - https://www.alphavantage.co/documentation/#sector

### Technical Indicators & Other
Documented - https://www.alphavantage.co/documentation/#technical-indicators

Technical methods are not implemented as separate functions. There is a `Api::general()->query($funcName, array $params)` method which allows for custom queries.

#### Example - MACDEXT
This will query function 'MACDEXT' with additional parameters `symbol`, `interval` and `series_type` as described in the documentation https://www.alphavantage.co/documentation/#macdext

```php
use AlphaVantage\Api;
// ...
public function technicalIndicators()
{
    return Api::general()->query('MACDEXT', [
        'symbol' => 'MSFT',
        'interval' => '15min',
        'series_type' => 'high',
    ]);
}
```

#### Methods available
* `query($functionName, array $parameters)`


## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
