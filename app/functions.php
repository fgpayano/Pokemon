<?php

if (! function_exists('show'))
{
    function show ($content)
    {
        echo "<p>{$content}</p>";
    }
}

if (! function_exists('avoidNegative'))
{
    function avoidNegative($number)
    {
        return max($number, 0);
    }
}
