<?php
// Function to process student data
function processStudentData(&$student) {
    // Convert marks string to array
    if (is_string($student['marks'])) {
        $student['marks'] = explode(',', $student['marks']);
    }
    
    // Convert age to integer if it contains "years"
    if (is_string($student['age']) && strpos($student['age'], 'years') !== false) {
        $student['age'] = (int) $student['age'];
    }
    
    // Calculate total and average
    $total = array_sum($student['marks']);
    $average = $total / count($student['marks']);
    $student['average'] = round($average, 1);
    
    // Determine status based on average
    if ($average >= 80) {
        $student['status'] = 'Excellent';
    } elseif ($average >= 60) {
        $student['status'] = 'Good';
    } elseif ($average >= 40) {
        $student['status'] = 'Pass';
    } else {
        $student['status'] = 'Fail';
    }
    
    // Assign message based on status using switch statement
    switch ($student['status']) {
        case 'Excellent':
            $student['message'] = 'Awarded Scholarship';
            break;
        case 'Good':
            $student['message'] = 'Can Apply for Internship';
            break;
        case 'Pass':
            $student['message'] = 'Needs Improvement';
            break;
        case 'Fail':
            $student['message'] = 'Repeat Semester';
            break;
        default:
            $student['message'] = 'Status Pending';
    }
    
    return $student;
}

// Student data with marks as comma-separated strings
$students = [
    [
        'name' => 'Ali',
        'age' => 20,
        'marks' => '78,65,90,55,88',
        'status' => ''
    ],
    [
        'name' => 'Ayesha',
        'age' => '21 years', // This will be cast to integer
        'marks' => '90,85,92,80,88',
        'status' => ''
    ],
    [
        'name' => 'Bilal',
        'age' => 21,
        'marks' => '30,45,28,40,35',
        'status' => ''
    ],
    [
        'name' => 'Fatima',
        'age' => 22,
        'marks' => '85,78,92,88,90',
        'status' => ''
    ],
    [
        'name' => 'Hassan',
        'age' => 20,
        'marks' => '55,60,48,65,52',
        'status' => ''
    ]
];
?>