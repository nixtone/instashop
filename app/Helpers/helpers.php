<?php

use Illuminate\Support\Carbon;

if (! function_exists('yesNo')) {
    function yesNo($bool)
    {
        return $bool ? 'Да' : 'Нет';
    }
}

if (! function_exists('dateRu')) {
    function dateRu($date)
    {
        return Carbon::parse($date)->translatedFormat('d F Y'.PHP_EOL.' в H:i');
    }
}
