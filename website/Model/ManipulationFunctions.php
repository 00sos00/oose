<?php
function humanize_number($number) {
    // Convert the number to a float
    $number = (float)$number;

    // Check if the number is less than 1000
    if ($number < 1000) {
        return $number;
    }

    // Define the suffixes for thousands, millions, billions, etc.
    $suffixes = ['K', 'M', 'B', 'T', 'Q', 'P', 'E'];
    $suffixIndex = 0;

    // Divide the number by 1000 until it's less than 1000
    while ($number >= 1000 && $suffixIndex < count($suffixes) - 1) {
        $number /= 1000;
        $suffixIndex++;
    }

    // Format the number to one decimal place and append the suffix
    return number_format($number, 1) . $suffixes[$suffixIndex-1];
}
?>