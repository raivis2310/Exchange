<?php

$response = file_get_contents("https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/eur.json");
$data = json_decode($response, true);

$currencies = strtolower(readline("Enter currencies which you want to exchange: "));
$toCurrencies = strtolower(readline("Enter currencies to which you want to exchange: "));
$sum = (int)readline("Enter how much you want to exchange: ");

if ($currencies === "eur") {
    foreach ($data["eur"] as $currency => $rate) {
        if ($currency === $toCurrencies) {
            echo $sum . " " . $currencies . " is " . round(($sum * $rate), 2) . " " . $toCurrencies . PHP_EOL;
            break;
        }
    }
}

if ($toCurrencies === "eur") {
    foreach ($data["eur"] as $currency => $rate) {
        if ($currency === $currencies) {
            echo $sum . " " . $currencies . " is " . round(($sum / $rate), 2) . " " . $toCurrencies . PHP_EOL;
            break;
        }
    }
}

if ($currencies !== "eur" && $toCurrencies !== "eur") {
    foreach ($data["eur"] as $currency => $rate) {
        if ($currency === $currencies) {
            foreach ($data["eur"] as $currency2 => $rate2) {
                if ($currency2 === $toCurrencies) {
                    echo $sum . " " . $currencies . " is " . round((($sum / $rate) * $rate2), 2) . " " . $toCurrencies . PHP_EOL;
                    break;
                }
            }
        }
    }
}