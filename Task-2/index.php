<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Processor</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
    <div class="container">
        <h1>Student Information Processor</h1>
        <p class="subtitle">Comprehensive student performance analysis and reporting</p>
        
        <?php
        // Include the processing logic
        include 'student_processor.php';
        
        // Process all students
        foreach ($students as &$student) {
            $student = processStudentData($student);
        }
        unset($student); // Break the reference
        
        // Count students by status for summary
        $statusCount = [
            'Excellent' => 0,
            'Good' => 0,
            'Pass' => 0,
            'Fail' => 0
        ];
        
        foreach ($students as $student) {
            $statusCount[$student['status']]++;
        }
        ?>
        
        <table class="student-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Marks</th>
                    <th>Average</th>
                    <th>Status</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($student['name']); ?></strong></td>
                    <td><?php echo $student['age']; ?></td>
                    <td class="marks-display"><?php echo implode(', ', $student['marks']); ?></td>
                    <td class="average"><?php echo $student['average']; ?>%</td>
                    <td>
                        <span class="status-<?php echo strtolower($student['status']); ?>">
                            <?php echo $student['status']; ?>
                        </span>
                    </td>
                    <td class="message"><?php echo $student['message']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="summary">
            <div class="summary-card">
                <h3>Excellent Students</h3>
                <div class="count"><?php echo $statusCount['Excellent']; ?></div>
            </div>
            <div class="summary-card">
                <h3>Good Students</h3>
                <div class="count"><?php echo $statusCount['Good']; ?></div>
            </div>
            <div class="summary-card">
                <h3>Passing Students</h3>
                <div class="count"><?php echo $statusCount['Pass']; ?></div>
            </div>
            <div class="summary-card">
                <h3>Failing Students</h3>
                <div class="count"><?php echo $statusCount['Fail']; ?></div>
            </div>
        </div>
    </div>
    
    <div class="footer">
        &copy; <?php echo date('Y'); ?> Student Information System | PHP Dynamic Data Processor
    </div>
</body>
</html>