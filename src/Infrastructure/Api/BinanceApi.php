<?php

namespace Cryptoob\Infrastructure\Api;

use ccxt\binance;

final class BinanceApi
{
    private binance $binance;

    public function __construct(string $apiKey, string $apiSecret)
    {
        $this->binance = new binance([
            'apiKey' => $apiKey,
            'secret' => $apiSecret,
            'options' => [
                'adjustForTimeDifference' => true,
            ],
        ]);
    }

    public function getBalance()
    {
        dd($this->binance->fetch_balance()['total']);
    }
}
