<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="index.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    text-align: center;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #007BFF;
}

.btn-container {
    display: flex;
    justify-content: center;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    font-weight: bold;
}

.teacher-btn {
    background-color: #007BFF;
    color: #fff;
}

.student-btn {
    background-color: #1abc9c;
    color: #fff;
}

/* Add more CSS for styling as needed */

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    text-align: center;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #007BFF;
}

.form-group {
    margin-bottom: 10px;
}

.subject {
    margin-bottom: 20px;
}

.subject label,
.subject input {
    display: block;
}

.btn-container {
    display: flex;
    justify-content: center;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    font-weight: bold;
}

.submit-btn {
    background-color: #007BFF;
    color: #fff;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to VIT Semester Results</h1>
        <div class="btn-container">
            <a href="teacher.php" class="btn teacher-btn">Teacher</a>
            <a href="student.php" class="btn student-btn">Student</a>
        </div>
    </div>
</body>
</html>