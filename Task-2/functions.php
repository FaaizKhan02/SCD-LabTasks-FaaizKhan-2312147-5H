<?php
// Additional utility functions for student processing

/**
 * Validates student data
 */
function validateStudentData($student) {
    $errors = [];
    
    if (empty($student['name'])) {
        $errors[] = "Student name is required";
    }
    
    if (empty($student['age']) || !is_numeric($student['age'])) {
        $errors[] = "Valid age is required";
    }
    
    if (empty($student['marks'])) {
        $errors[] = "Marks are required";
    } else {
        $marks = is_string($student['marks']) ? explode(',', $student['marks']) : $student['marks'];
        foreach ($marks as $mark) {
            if (!is_numeric(trim($mark))) {
                $errors[] = "All marks must be numeric";
                break;
            }
        }
    }
    
    return $errors;
}

/**
 * Calculates grade based on average
 */
function calculateGrade($average) {
    if ($average >= 90) return 'A+';
    if ($average >= 85) return 'A';
    if ($average >= 80) return 'A-';
    if ($average >= 75) return 'B+';
    if ($average >= 70) return 'B';
    if ($average >= 65) return 'B-';
    if ($average >= 60) return 'C+';
    if ($average >= 55) return 'C';
    if ($average >= 50) return 'C-';
    if ($average >= 45) return 'D+';
    if ($average >= 40) return 'D';
    return 'F';
}

/**
 * Generates performance report
 */
function generatePerformanceReport($students) {
    $report = [
        'total_students' => count($students),
        'class_average' => 0,
        'highest_average' => 0,
        'lowest_average' => 100,
        'status_distribution' => [
            'Excellent' => 0,
            'Good' => 0,
            'Pass' => 0,
            'Fail' => 0
        ]
    ];
    
    $totalAverage = 0;
    
    foreach ($students as $student) {
        $totalAverage += $student['average'];
        $report['highest_average'] = max($report['highest_average'], $student['average']);
        $report['lowest_average'] = min($report['lowest_average'], $student['average']);
        $report['status_distribution'][$student['status']]++;
    }
    
    $report['class_average'] = $totalAverage / count($students);
    
    return $report;
}
?>