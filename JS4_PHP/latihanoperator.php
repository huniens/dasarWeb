<?php
// Total number of seats
$totalSeats = 45;

// Number of occupied seats
$occupiedSeats = 28;

// Calculate the number of empty seats
$emptySeats = $totalSeats - $occupiedSeats;

// Calculate the percentage of empty seats
$percentageEmptySeats = ($emptySeats / $totalSeats) * 100;

// Display the results
echo "Number of empty seats in the restaurant: $emptySeats\n";
echo"<br>";
echo "Percentage of empty seats: " . number_format($percentageEmptySeats, 2) . "%\n";
?>
