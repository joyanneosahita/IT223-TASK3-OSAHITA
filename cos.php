<?php 
include '../config.php'; 

$sql = "SELECT COS(PI())"; 

$res = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>SQL Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container bg-white p-4 shadow-sm border-top border-success border-4">
        <h3>Query Result</h3>
        <pre class="bg-light p-2"><code><?= $sql ?></code></pre>
        
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <?php if($res): while($f = $res->fetch_field()) echo "<th>{$f->name}</th>"; endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $res->fetch_assoc()): ?>
                <tr>
                    <?php foreach($row as $val) echo "<td>$val</td>"; ?>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="../index.php" class="btn btn-secondary">Back to Main</a>
    </div>
</body>
</html>