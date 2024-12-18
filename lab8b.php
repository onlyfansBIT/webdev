<?php 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "students"; 
 
$conn = new mysqli($servername, $username, $password, $dbname); 
 
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 
 
$sql = "SELECT * FROM students"; 
$result = $conn->query($sql); 
 
$students = []; 
if ($result->num_rows > 0) { 
    while ($row = $result->fetch_assoc()) { 
        $students[] = $row; 
    } 
} 
 
function selectionSort(&$arr, $key) 
{ 
    $n = count($arr); 
    for ($i = 0; $i < $n - 1; $i++) { 
        $minIndex = $i; 
        for ($j = $i + 1; $j < $n; $j++) { 
            if ($arr[$j][$key] < $arr[$minIndex][$key]) { 
                $minIndex = $j; 
            } 
        } 
 
        $temp = $arr[$i]; 
        $arr[$i] = $arr[$minIndex]; 
        $arr[$minIndex] = $temp; 
    } 
} 
 
selectionSort($students, 'name'); 
?> 
 
<!DOCTYPE html> 
 
<head> 
    <title>Sorted Student Records </title> 
    <style> 
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #f0f2f5; 
            color: #333; 
            margin: 0; 
            padding: 20px; 
        } 
 
        h2 { 
            text-align: center; 
            color: #4A90E2; 
            margin-bottom: 20px; 
        } 
 
        table { 
            width: 100%; 
            border-collapse: collapse; 
            background-color: #fff; 
            border-radius: 10px; 
            overflow: hidden; 
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); 
            margin: 0 auto; 
        } 
 
        th, 
        td { 
            padding: 12px 15px; 
            text-align: left; 
            border-bottom: 1px solid #ddd; 
        } 
 
        th { 
            background-color: #4A90E2; 
            color: white; 
            text-transform: uppercase; 
            letter-spacing: 0.03em; 
        } 
 
        tr { 
            transition: background-color 0.3s ease; 
        } 
 
        tr:hover { 
            background-color: #f1f1f1; 
        } 
 
        td { 
            font-size: 0.9em; 
            color: #555; 
        } 
 
        @media (max-width: 768px) { 
 
            table, 
            th, 
            td { 
                display: block; 
                width: 100%; 
            } 
 
            th, 
            td { 
                box-sizing: border-box; 
            } 
 
            tr { 
                margin-bottom: 15px; 
                display: block; 
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
            } 
 
            th { 
                position: absolute; 
                top: -9999px; 
                left: -9999px; 
            } 
 
            td { 
                border: none; 
                position: relative; 
                padding-left: 50%; 
                text-align: right; 
            } 
 
            td:before { 
                content: attr(data-label); 
                position: absolute; 
                left: 0; 
                width: 50%; 
                padding-left: 15px; 
                font-weight: bold; 
                text-align: left; 
                text-transform: uppercase; 
                color: #4A90E2; 
            } 
        } 
    </style> 
</head> 
 
<body> 
 
    <h2>Sorted Student Records by Name</h2> 
 
    <table> 
        <thead> 
            <tr> 
                <th>ID</th> 
                <th>Name</th> 
                <th>USN</th> 
                <th>Branch</th> 
                <th>Email</th> 
                <th>Address</th> 
                <th>age</th>
            </tr> 
        </thead> 
        <tbody> 
            <?php foreach ($students as $student): ?> 
                <tr> 
                    <td data-label="ID"><?php echo htmlspecialchars($student['id']); ?></td> 
                    <td data-label="Name"><?php echo htmlspecialchars($student['name']); ?></td> 
                    <td data-label="USN"><?php echo htmlspecialchars($student['usn']); ?></td> 
                    <td data-label="Branch"><?php echo htmlspecialchars($student['branch']); 
?></td> 
                    <td data-label="Address"><?php echo htmlspecialchars($student['address']); 
?></td> 
                    <td data-label="Email"><?php echo htmlspecialchars($student['email']); ?></td> 
                    <td data-label="age"><?php echo htmlspecialchars($student['age']); ?></td> 
                </tr> 
            <?php endforeach; ?> 
        </tbody> 
    </table> 

<!-- http://localhost/phpmyadmin/index.php?route=/table/sql&db=students&table=students -->
 
</body> 
 
</html>

<!-- // SQL COMMAND
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    usn VARCHAR(20),
    branch VARCHAR(50),
    email VARCHAR(100),
    address VARCHAR(255),
    age INT

    INSERT INTO students (name, usn, branch, email, address, age) VALUES
('Rahul Sharma', 'USN001', 'Computer Science', 'rahul@example.com', 'Delhi, India', 21),
('Alisha Singh', 'USN002', 'Electronics', 'alisha@example.com', 'Mumbai, India', 22),
('Karan Malhotra', 'USN003', 'Mechanical', 'karan@example.com', 'Chennai, India', 20),
('Sneha Verma', 'USN004', 'Civil', 'sneha@example.com', 'Pune, India', 23),
('Deepak Reddy', 'USN005', 'Information Technology', 'deepak@example.com', 'Hyderabad, India', 24),
('Priya Gupta', 'USN006', 'Computer Science', 'priya@example.com', 'Lucknow, India', 21),
('Amit Patel', 'USN007', 'Mechanical', 'amit@example.com', 'Ahmedabad, India', 22),
('Rohit Agarwal', 'USN008', 'Electrical', 'rohit@example.com', 'Jaipur, India', 23),
('Megha Das', 'USN009', 'Chemical', 'megha@example.com', 'Kolkata, India', 20),
('Anjali Mishra', 'USN010', 'Electronics', 'anjali@example.com', 'Bangalore, India', 22);

); -->
