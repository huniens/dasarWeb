<?php
// Step 1: Define a two-dimensional array with students' names and grades
$students = [
    ["name" => "Alice", "grade" => 85],
    ["name" => "Bob", "grade" => 92],
    ["name" => "Charlie", "grade" => 78],
    ["name" => "David", "grade" => 64],
    ["name" => "Eva", "grade" => 90]
];

// Step 2: Calculate the total grades and class average
$totalGrades = 0;
foreach ($students as $student) {
    $totalGrades += $student["grade"];
}
$classAverage = $totalGrades / count($students);

// Step 3: Display the students who have grades above the class average
echo "Class Average: " . $classAverage . "<br><br>";
echo "Students with grades above the class average:<br>";

foreach ($students as $student) {
    if ($student["grade"] > $classAverage) {
        echo "Name: " . $student["name"] . ", Grade: " . $student["grade"] . "<br>";
    }
}
?>
