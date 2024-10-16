<?php
function checkIfPrimeNumber($num) {
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function getPrimeNumbers($n) {
    $primes = [];
    $num = 2; // Start checking for prime numbers from 2
    while (count($primes) < $n) {
        if (checkIfPrimeNumber($num)) {
            $primes[] = $num;
        }
        $num++;
    }
    return $primes;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $N = intval($_POST['n']);
    if ($N > 0) {
        $primes = getPrimeNumbers($N);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assesment : Write an application that takes numeric input (N) from a user and outputs a multiplication table of (N) prime numbers</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<h4>Assesment : Write an application that takes numeric input (N) from a user and outputs a multiplication table of (N) prime numbers</h4>

<h4>Solution : </h4>
<form method="POST">
    <label for="n">Enter the number of prime numbers:</label>
    <input type="number" id="n" name="n" required min="1">
    <input type="submit" value="Generate Table">
</form>

<?php if (isset($primes)) { ?>
    <h2>Multiplication Table of the First <?php echo $N ?> Prime Numbers:</h2>
    <table>
        <tr>
            <th>×</th>
            <?php foreach ($primes as $prime) { ?>
                <th><?php echo $prime ?></th>
            <?php }; ?>
        </tr>
        <?php foreach ($primes as $i) { ?>
            <tr>
                <td><?php echo $i ?></td>
                <?php foreach ($primes as $p) { ?>
                    <td><?php echo $i * $p ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
<?php } ?>
</body>
</html>
