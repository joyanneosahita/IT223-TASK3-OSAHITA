<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYSQL Function</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --w3-green: #04AA6D; }
        .header-bg { background-color: var(--w3-green); color: white; position: sticky; top: 0; z-index: 1000; }
        .category-row { background-color: #f1f1f1; font-weight: bold; color: #333; border-left: 6px solid var(--w3-green); }
        .table-container { background: white; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); padding: 20px; }
        code { color: #d63384; font-weight: bold; font-size: 0.85rem; }
        .btn-view { border: 1px solid var(--w3-green); color: var(--w3-green); font-size: 0.85rem; }
        .btn-view:hover { background-color: var(--w3-green); color: white; }
    </style>
</head>
<body class="bg-light">

<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-lg-11 table-container">
            <h2 class="mb-4 text-center">MYSQL Functions</h2>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="header-bg">
                        <tr>
                            <th style="width: 20%;">Function Name</th>
                            <th style="width: 30%;">Description</th>
                            <th style="width: 40%;">Example Query</th>
                            <th style="width: 10%;">Example Output</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr class="category-row"><td colspan="4">STRING FUNCTIONS</td></tr>
                        <?php
                        $string = [
                            'ASCII' => ['desc' => 'Returns numeric value of character', 'sql' => "SELECT first_name, ASCII(first_name) FROM employees"],
                            'CHAR_LENGTH' => ['desc' => 'Length of string in characters', 'sql' => "SELECT first_name, CHAR_LENGTH(first_name) FROM employees"],
                            'CHARACTER_LENGTH' => ['desc' => 'Length of string in characters', 'sql' => "SELECT first_name, CHARACTER_LENGTH(first_name) FROM employees"],
                            'CONCAT' => ['desc' => 'Joins two or more strings', 'sql' => "SELECT CONCAT(first_name, ' ', last_name) FROM employees"],
                            'CONCAT_WS' => ['desc' => 'Joins strings with separator', 'sql' => "SELECT CONCAT_WS(' - ', first_name, department) FROM employees"],
                            'FIELD' => ['desc' => 'Index of value in list', 'sql' => "SELECT first_name, FIELD(first_name, 'Joy Anne', 'Elvie') FROM employees"],
                            'FIND_IN_SET' => ['desc' => 'Position of string in comma list', 'sql' => "SELECT FIND_IN_SET('Finance', 'HR,Finance,Marketing')"],
                            'FORMAT' => ['desc' => 'Formats number to format', 'sql' => "SELECT salary, FORMAT(salary, 2) FROM employees"],
                            'INSERT' => ['desc' => 'Inserts substring into string', 'sql' => "SELECT first_name, INSERT(first_name, 1, 3, '*') FROM employees"],
                            'INSTR' => ['desc' => 'Position of first occurrence', 'sql' => "SELECT first_name, INSTR(first_name, 'a') FROM employees"],
                            'LCASE' => ['desc' => 'Converts to lower case', 'sql' => "SELECT first_name, LCASE(first_name) FROM employees"],
                            'LEFT' => ['desc' => 'Returns left-most chars', 'sql' => "SELECT first_name, LEFT(first_name, 3) FROM employees"],
                            'LENGTH' => ['desc' => 'Length of string in bytes', 'sql' => "SELECT first_name, LENGTH(first_name) FROM employees"],
                            'LOCATE' => ['desc' => 'Position of first occurrence', 'sql' => "SELECT first_name, LOCATE('a', first_name) FROM employees"],
                            'LOWER' => ['desc' => 'Converts to lower case', 'sql' => "SELECT first_name, LOWER(first_name) FROM employees"],
                            'LPAD' => ['desc' => 'Left-pads string', 'sql' => "SELECT first_name, LPAD(first_name, 20, '.') FROM employees"],
                            'LTRIM' => ['desc' => 'Removes leading spaces', 'sql' => "SELECT LTRIM('   text')"],
                            'MID' => ['desc' => 'Extracts substring', 'sql' => "SELECT first_name, MID(first_name, 2, 3) FROM employees"],
                            'POSITION' => ['desc' => 'Position of substring', 'sql' => "SELECT first_name, POSITION('a' IN first_name) FROM employees"],
                            'REPEAT' => ['desc' => 'Repeats string', 'sql' => "SELECT first_name, REPEAT(first_name, 2) FROM employees"],
                            'REPLACE' => ['desc' => 'Replaces occurrences', 'sql' => "SELECT first_name, REPLACE(first_name, 'a', '@') FROM employees"],
                            'REVERSE' => ['desc' => 'Reverses string', 'sql' => "SELECT first_name, REVERSE(first_name) FROM employees"],
                            'RIGHT' => ['desc' => 'Returns right-most chars', 'sql' => "SELECT first_name, RIGHT(first_name, 3) FROM employees"],
                            'RPAD' => ['desc' => 'Right-pads string', 'sql' => "SELECT first_name, RPAD(first_name, 20, '.') FROM employees"],
                            'RTRIM' => ['desc' => 'Removes trailing spaces', 'sql' => "SELECT RTRIM('text   ')"],
                            'SPACE' => ['desc' => 'Returns number of spaces', 'sql' => "SELECT CONCAT('A', SPACE(10), 'B')"],
                            'STRCMP' => ['desc' => 'Compares two strings', 'sql' => "SELECT STRCMP(first_name, last_name) FROM employees"],
                            'SUBSTR' => ['desc' => 'Extracts substring', 'sql' => "SELECT first_name, SUBSTR(first_name, 2, 3) FROM employees"],
                            'SUBSTRING' => ['desc' => 'Extracts substring', 'sql' => "SELECT first_name, SUBSTRING(first_name, 2, 3) FROM employees"],
                            'SUBSTRING_INDEX' => ['desc' => 'Returns a substring from a string before a specified number of occurrences of a delimiter', 'sql' => "SELECT first_name, SUBSTRING_INDEX(first_name, ' ', 1) FROM employees"],
                            'TRIM' => ['desc' => 'Removes spaces', 'sql' => "SELECT TRIM('  abc  ')"],
                            'UCASE' => ['desc' => 'Converts to upper case', 'sql' => "SELECT first_name, UCASE(first_name) FROM employees"],
                            'UPPER' => ['desc' => 'Converts to upper case', 'sql' => "SELECT first_name, UPPER(first_name) FROM employees"]
                        ];
                        foreach($string as $name => $data) {
                            echo "<tr><td><strong>$name()</strong></td><td>{$data['desc']}</td><td><code>{$data['sql']}</code></td>
                                  <td><a href='outputs/".strtolower($name).".php' class='btn btn-view btn-sm'>View Output</a></td></tr>";
                        }
                        ?>

                        <tr class="category-row"><td colspan="4">NUMERIC FUNCTIONS</td></tr>
                        <?php
                        $numeric = [
                            'ABS' => ['desc' => 'Absolute value', 'sql' => "SELECT ABS(-25.5)"],
                            'ACOS' => ['desc' => 'Arc cosine', 'sql' => "SELECT ACOS(0.5)"],
                            'ASIN' => ['desc' => 'Arc sine', 'sql' => "SELECT ASIN(0.5)"],
                            'ATAN' => ['desc' => 'Arc tangent', 'sql' => "SELECT ATAN(0.5)"],
                            'ATAN2' => ['desc' => 'Arc tangent of 2 vars', 'sql' => "SELECT ATAN2(0.5, 1)"],
                            'AVG' => ['desc' => 'Average value', 'sql' => "SELECT AVG(salary) FROM employees"],
                            'CEIL' => ['desc' => 'Smallest integer value', 'sql' => "SELECT salary, CEIL(salary) FROM employees"],
                            'CEILING' => ['desc' => 'Smallest integer value', 'sql' => "SELECT salary, CEILING(salary) FROM employees"],
                            'COS' => ['desc' => 'Cosine', 'sql' => "SELECT COS(PI())"],
                            'COT' => ['desc' => 'Cotangent', 'sql' => "SELECT COT(1)"],
                            'COUNT' => ['desc' => 'Number of records', 'sql' => "SELECT COUNT(id) FROM employees"],
                            'DEGREES' => ['desc' => 'Radians to degrees', 'sql' => "SELECT DEGREES(PI())"],
                            'DIV' => ['desc' => 'Integer division', 'sql' => "SELECT salary, salary DIV 1000 FROM employees"],
                            'EXP' => ['desc' => 'e raised to power', 'sql' => "SELECT EXP(1)"],
                            'FLOOR' => ['desc' => 'Largest integer value', 'sql' => "SELECT salary, FLOOR(salary) FROM employees"],
                            'GREATEST' => ['desc' => 'Greatest value in list', 'sql' => "SELECT GREATEST(10, 20, 50, 5)"],
                            'LEAST' => ['desc' => 'Smallest value in list', 'sql' => "SELECT LEAST(10, 20, 50, 5)"],
                            'LN' => ['desc' => 'Natural logarithm', 'sql' => "SELECT LN(salary) FROM employees"],
                            'LOG' => ['desc' => 'Natural logarithm', 'sql' => "SELECT LOG(salary) FROM employees"],
                            'LOG10' => ['desc' => 'Base-10 logarithm', 'sql' => "SELECT LOG10(salary) FROM employees"],
                            'LOG2' => ['desc' => 'Base-2 logarithm', 'sql' => "SELECT LOG2(salary) FROM employees"],
                            'MAX' => ['desc' => 'Maximum value', 'sql' => "SELECT MAX(salary) FROM employees"],
                            'MIN' => ['desc' => 'Minimum value', 'sql' => "SELECT MIN(salary) FROM employees"],
                            'MOD' => ['desc' => 'Remainder', 'sql' => "SELECT MOD(salary, 1000) FROM employees"],
                            'PI' => ['desc' => 'Value of PI', 'sql' => "SELECT PI()"],
                            'POW' => ['desc' => 'Power', 'sql' => "SELECT POW(2, 3)"],
                            'POWER' => ['desc' => 'Power', 'sql' => "SELECT POWER(2, 3)"],
                            'RADIANS' => ['desc' => 'Degrees to radians', 'sql' => "SELECT RADIANS(180)"],
                            'RAND' => ['desc' => 'Random number', 'sql' => "SELECT RAND()"],
                            'ROUND' => ['desc' => 'Rounds number', 'sql' => "SELECT ROUND(salary, 1) FROM employees"],
                            'SIGN' => ['desc' => 'Sign of number', 'sql' => "SELECT SIGN(-15)"],
                            'SIN' => ['desc' => 'Sine', 'sql' => "SELECT SIN(1)"],
                            'SQRT' => ['desc' => 'Square root', 'sql' => "SELECT SQRT(salary) FROM employees"],
                            'SUM' => ['desc' => 'Sum of values', 'sql' => "SELECT SUM(salary) FROM employees"],
                            'TAN' => ['desc' => 'Tangent', 'sql' => "SELECT TAN(1)"],
                            'TRUNCATE' => ['desc' => 'Truncates number', 'sql' => "SELECT TRUNCATE(salary, 0) FROM employees"]
                        ];
                        foreach($numeric as $name => $data) {
                            echo "<tr><td><strong>$name()</strong></td><td>{$data['desc']}</td><td><code>{$data['sql']}</code></td>
                                  <td><a href='outputs/".strtolower($name).".php' class='btn btn-view btn-sm'>View Output</a></td></tr>";
                        }
                        ?>

                        <tr class="category-row"><td colspan="4">DATE FUNCTIONS</td></tr>
                        <?php
                        $date = [
                            'ADDDATE' => ['desc' => 'Add dates', 'sql' => "SELECT hire_date, ADDDATE(hire_date, 10) FROM employees"],
                            'ADDTIME' => ['desc' => 'Add time', 'sql' => "SELECT ADDTIME('2023-12-31 23:59:59', '0:0:1')"],
                            'CURDATE' => ['desc' => 'Current date', 'sql' => "SELECT CURDATE()"],
                            'CURRENT_DATE' => ['desc' => 'Current date', 'sql' => "SELECT CURRENT_DATE()"],
                            'CURRENT_TIME' => ['desc' => 'Current time', 'sql' => "SELECT CURRENT_TIME()"],
                            'CURRENT_TIMESTAMP' => ['desc' => 'Current timestamp', 'sql' => "SELECT CURRENT_TIMESTAMP()"],
                            'CURTIME' => ['desc' => 'Current time', 'sql' => "SELECT CURTIME()"],
                            'DATE' => ['desc' => 'Extract date part', 'sql' => "SELECT DATE(NOW())"],
                            'DATEDIFF' => ['desc' => 'Difference in days', 'sql' => "SELECT DATEDIFF(NOW(), hire_date) FROM employees"],
                            'DATE_ADD' => ['desc' => 'Add time to date', 'sql' => "SELECT hire_date, DATE_ADD(hire_date, INTERVAL 1 YEAR) FROM employees"],
                            'DATE_FORMAT' => ['desc' => 'Format date', 'sql' => "SELECT hire_date, DATE_FORMAT(hire_date, '%W, %M %Y') FROM employees"],
                            'DATE_SUB' => ['desc' => 'Subtract time', 'sql' => "SELECT hire_date, DATE_SUB(hire_date, INTERVAL 1 MONTH) FROM employees"],
                            'DAY' => ['desc' => 'Day of month', 'sql' => "SELECT hire_date, DAY(hire_date) FROM employees"],
                            'DAYNAME' => ['desc' => 'Name of weekday', 'sql' => "SELECT hire_date, DAYNAME(hire_date) FROM employees"],
                            'DAYOFMONTH' => ['desc' => 'Day of month', 'sql' => "SELECT hire_date, DAYOFMONTH(hire_date) FROM employees"],
                            'DAYOFWEEK' => ['desc' => 'Index of weekday', 'sql' => "SELECT hire_date, DAYOFWEEK(hire_date) FROM employees"],
                            'DAYOFYEAR' => ['desc' => 'Day of year', 'sql' => "SELECT hire_date, DAYOFYEAR(hire_date) FROM employees"],
                            'EXTRACT' => ['desc' => 'Extract part of date', 'sql' => "SELECT hire_date, EXTRACT(YEAR FROM hire_date) FROM employees"],
                            'FROM_DAYS' => ['desc' => 'Numeric date to date', 'sql' => "SELECT FROM_DAYS(730000)"],
                            'HOUR' => ['desc' => 'Hour part', 'sql' => "SELECT HOUR(NOW())"],
                            'LAST_DAY' => ['desc' => 'Last day of month', 'sql' => "SELECT hire_date, LAST_DAY(hire_date) FROM employees"],
                            'LOCALTIME' => ['desc' => 'Current local time', 'sql' => "SELECT LOCALTIME()"],
                            'LOCALTIMESTAMP' => ['desc' => 'Current local timestamp', 'sql' => "SELECT LOCALTIMESTAMP()"],
                            'MAKEDATE' => ['desc' => 'Create date', 'sql' => "SELECT MAKEDATE(2023, 31)"],
                            'MAKETIME' => ['desc' => 'Create time', 'sql' => "SELECT MAKETIME(12, 0, 0)"],
                            'MICROSECOND' => ['desc' => 'Microseconds', 'sql' => "SELECT MICROSECOND(NOW())"],
                            'MINUTE' => ['desc' => 'Minute part', 'sql' => "SELECT MINUTE(NOW())"],
                            'MONTH' => ['desc' => 'Month index', 'sql' => "SELECT hire_date, MONTH(hire_date) FROM employees"],
                            'MONTHNAME' => ['desc' => 'Month name', 'sql' => "SELECT hire_date, MONTHNAME(hire_date) FROM employees"],
                            'NOW' => ['desc' => 'Current datetime', 'sql' => "SELECT NOW()"],
                            'PERIOD_ADD' => ['desc' => 'Add months to period', 'sql' => "SELECT PERIOD_ADD(202301, 2)"],
                            'PERIOD_DIFF' => ['desc' => 'Difference in periods', 'sql' => "SELECT PERIOD_DIFF(202303, 202301)"],
                            'QUARTER' => ['desc' => 'Quarter of year', 'sql' => "SELECT hire_date, QUARTER(hire_date) FROM employees"],
                            'SECOND' => ['desc' => 'Second part', 'sql' => "SELECT SECOND(NOW())"],
                            'SEC_TO_TIME' => ['desc' => 'Seconds to time', 'sql' => "SELECT SEC_TO_TIME(5000)"],
                            'STR_TO_DATE' => ['desc' => 'String to date', 'sql' => "SELECT STR_TO_DATE('01,5,2013','%d,%m,%Y')"],
                            'SUBDATE' => ['desc' => 'Subtract date', 'sql' => "SELECT hire_date, SUBDATE(hire_date, 1) FROM employees"],
                            'SUBTIME' => ['desc' => 'Subtract time', 'sql' => "SELECT SUBTIME('12:00:00', '01:00:00')"],
                            'SYSDATE' => ['desc' => 'System date', 'sql' => "SELECT SYSDATE()"],
                            'TIME' => ['desc' => 'Extract time', 'sql' => "SELECT TIME(NOW())"],
                            'TIME_FORMAT' => ['desc' => 'Format time', 'sql' => "SELECT TIME_FORMAT(NOW(), '%H:%i:%s')"],
                            'TIME_TO_SEC' => ['desc' => 'Time to seconds', 'sql' => "SELECT TIME_TO_SEC(NOW())"],
                            'TIMEDIFF' => ['desc' => 'Difference in times', 'sql' => "SELECT TIMEDIFF('12:00:00', '10:00:00')"],
                            'TIMESTAMP' => ['desc' => 'Timestamp', 'sql' => "SELECT TIMESTAMP(NOW())"],
                            'TO_DAYS' => ['desc' => 'Date to days', 'sql' => "SELECT hire_date, TO_DAYS(hire_date) FROM employees"],
                            'WEEK' => ['desc' => 'Week number', 'sql' => "SELECT hire_date, WEEK(hire_date) FROM employees"],
                            'WEEKDAY' => ['desc' => 'Weekday index', 'sql' => "SELECT hire_date, WEEKDAY(hire_date) FROM employees"],
                            'WEEKOFYEAR' => ['desc' => 'Week of year', 'sql' => "SELECT hire_date, WEEKOFYEAR(hire_date) FROM employees"],
                            'YEAR' => ['desc' => 'Year part', 'sql' => "SELECT hire_date, YEAR(hire_date) FROM employees"],
                            'YEARWEEK' => ['desc' => 'Year and week', 'sql' => "SELECT hire_date, YEARWEEK(hire_date) FROM employees"]
                        ];
                        foreach($date as $name => $data) {
                            echo "<tr><td><strong>$name()</strong></td><td>{$data['desc']}</td><td><code>{$data['sql']}</code></td>
                                  <td><a href='outputs/".strtolower($name).".php' class='btn btn-view btn-sm'>View Output</a></td></tr>";
                        }
                        ?>

                        <tr class="category-row"><td colspan="4">ADVANCED FUNCTIONS</td></tr>
                        <?php
                        $advanced = [
                            'BIN' => ['desc' => 'Binary string', 'sql' => "SELECT BIN(10)"],
                            'BINARY' => ['desc' => 'Binary string', 'sql' => "SELECT BINARY 'Hello'"],
                            'CASE' => ['desc' => 'Conditional logic', 'sql' => "SELECT first_name, CASE WHEN salary > 50000 THEN 'High' ELSE 'Low' END FROM employees"],
                            'CAST' => ['desc' => 'Convert type', 'sql' => "SELECT CAST(salary AS CHAR) FROM employees"],
                            'COALESCE' => ['desc' => 'First non-null', 'sql' => "SELECT COALESCE(NULL, 'Default')"],
                            'CONNECTION_ID' => ['desc' => 'Connection ID', 'sql' => "SELECT CONNECTION_ID()"],
                            'CONV' => ['desc' => 'Convert bases', 'sql' => "SELECT CONV(10, 10, 2)"],
                            'CONVERT' => ['desc' => 'Convert type', 'sql' => "SELECT CONVERT('2023-01-01', DATE)"],
                            'CURRENT_USER' => ['desc' => 'Authenticated user', 'sql' => "SELECT CURRENT_USER()"],
                            'DATABASE' => ['desc' => 'Current database', 'sql' => "SELECT DATABASE()"],
                            'IF' => ['desc' => 'If condition', 'sql' => "SELECT first_name, IF(salary > 50000, 'Sr', 'Jr') FROM employees"],
                            'IFNULL' => ['desc' => 'Return if null', 'sql' => "SELECT first_name, IFNULL(department, 'N/A') FROM employees"],
                            'ISNULL' => ['desc' => 'Check if null', 'sql' => "SELECT first_name, ISNULL(department) FROM employees"],
                            'LAST_INSERT_ID' => ['desc' => 'Last inserted ID', 'sql' => "SELECT LAST_INSERT_ID()"],
                            'NULLIF' => ['desc' => 'Return null if equal', 'sql' => "SELECT NULLIF(first_name, 'Joy Anne') FROM employees"],
                            'SESSION_USER' => ['desc' => 'Session user', 'sql' => "SELECT SESSION_USER()"],
                            'SYSTEM_USER' => ['desc' => 'System user', 'sql' => "SELECT SYSTEM_USER()"],
                            'USER' => ['desc' => 'Current user', 'sql' => "SELECT USER()"],
                            'VERSION' => ['desc' => 'DB Version', 'sql' => "SELECT VERSION()"]
                        ];
                        foreach($advanced as $name => $data) {
                            echo "<tr><td><strong>$name()</strong></td><td>{$data['desc']}</td><td><code>{$data['sql']}</code></td>
                                  <td><a href='outputs/".strtolower($name).".php' class='btn btn-view btn-sm'>View Output</a></td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>