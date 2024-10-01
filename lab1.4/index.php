<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Sequence with PHP</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Number Sequence</h1>
    <p><?php $numbers = [5, 25, 13, 8, 45, 6, 11]; echo implode(", ", $numbers); ?></p>

    <form method="post">
        <button name="action" value="max">Show Max</button>
        <button name="action" value="min">Show Min</button>
        <button name="action" value="sort_min_max">Sort Min to Max</button>
        <button name="action" value="sort_max_min">Sort Max to Min</button>
    </form>

    <div class="result">
        <p>
        <?php
        function sortNumbers($numbers, $ascending = true) {
            for ($i = 0; $i < count($numbers); $i++) {
                for ($j = $i + 1; $j < count($numbers); $j++) {
                    if ($ascending && $numbers[$i] > $numbers[$j]) {
                        $temp = $numbers[$i];
                        $numbers[$i] = $numbers[$j];
                        $numbers[$j] = $temp;
                    } elseif (!$ascending && $numbers[$i] < $numbers[$j]) {
                        $temp = $numbers[$i];
                        $numbers[$i] = $numbers[$j];
                        $numbers[$j] = $temp;
                    }
                }
            }
            return $numbers;
        }

        function showMax($numbers) {
            $sorted = sortNumbers($numbers, false); // Sort in descending order
            return $sorted[0]; // First element is the max
        }

        function showMin($numbers) {
            $sorted = sortNumbers($numbers); // Sort in ascending order
            return $sorted[0]; // First element is the min
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'];
            if ($action === 'max') {
                echo "Max: " . showMax($numbers);
            } elseif ($action === 'min') {
                echo "Min: " . showMin($numbers);
            } elseif ($action === 'sort_min_max') {
                $sorted = sortNumbers($numbers);
                echo "Sorted Min to Max: " . implode(", ", $sorted);
            } elseif ($action === 'sort_max_min') {
                $sorted = sortNumbers($numbers, false);
                echo "Sorted Max to Min: " . implode(", ", $sorted);
            }
        }
        ?>
        </p>
    </div>
</body>
</html>
