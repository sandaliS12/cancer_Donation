<?php
// Define an array of dates that are already fully booked
$bookedDates = array('2023-04-01', '2023-04-03', '2023-04-05');

// Set the current date
$currentDate = new DateTime();

// Set the start and end date for the calendar
$startDate = new DateTime('+1 day');
$endDate = new DateTime('+30 days');

// Create a new DateInterval for iterating over the dates
$interval = new DateInterval('P1D');

// Create a new DatePeriod to iterate over the dates between the start and end date
$dateRange = new DatePeriod($startDate, $interval, $endDate);

// Create an array to hold the calendar days
$calendarDays = array();

// Loop over the dates and add them to the calendar days array
foreach ($dateRange as $date) {
    // Create a new array for the day
    $day = array();

    // Set the date for the day
    $day['date'] = $date;

    // Check if the date is fully booked
    $day['isBooked'] = in_array($date->format('Y-m-d'), $bookedDates);

    // Add the day to the calendar days array
    $calendarDays[] = $day;
}

// Display the calendar
echo '<table>';
echo '<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>';

// Loop over the calendar days array and display each day in the table
foreach ($calendarDays as $key => $day) {
    // If this is the first day of the week, start a new row in the table
    if ($key % 7 == 0) {
        echo '<tr>';
    }

    // If the day is fully booked, display it in red
    $style = $day['isBooked'] ? 'color: red;' : '';

    // Display the day in the table
    echo '<td style="' . $style . '">' . $day['date']->format('j') . '</td>';

    // If this is the last day of the week, end the row in the table
    if (($key + 1) % 7 == 0) {
        echo '</tr>';
    }
}

echo '</table>';
