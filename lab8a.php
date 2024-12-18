<?php 
$count_file = 'count.txt'; 
if (!file_exists($count_file))  
{ 
    file_put_contents($count_file, 0);  
} 
$count = (int)file_get_contents($count_file); 
$count++; 
file_put_contents($count_file, $count);  
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Visitor counter</title> 
    <link rel="stylesheet" href="style.css"> 
</head> 
<body> 
    <div class="container"> 
        <h1>Welcome to Our Website!</h1> 
        <h2>Visitor Count</h2> 
        <p>Number of visitors: <strong> 
                <?php echo $count; ?> 
            </strong></p> 
    </div> 
</body> 
</html>