<?php
$view = $_GET['view'] ?? 'times';

function ints_from_csv(? string $s): ?array{
if($s === null || trim($s) === '') return null;
$part = array_map('trim', explode(',', $s));
$nums = [];
foreach($parts as $p){
if ($p === '' || !preg_match('/^-?\d+$/', $p)) return null;
$nums[] = (int)$p;
}
return $nums;
}
?>
<!doctype html>
<html>
<head>
  <meta charset ="utf-8">
  <title>Student Toolkit</title>
  <style>
    table, td, th{
      border: 1px solid;
      border-collapse: collapse;
      padding: 4px;
    }
  </style>
</head>
<body>
<h1>Student Toolkit</h1>
<nav>
  <a href = "?view = times">Times</a> |
  <a href = "?view = table">Table</a>
  <a href = "?view=stats">Stats</a>
</nav>
<hr>

<? php if ($view === 'times'): ?>
<h2>Times</h2>
<ul>
  <?php
  $t = time();
  for($i =0; $i <= 5; $i++){
  echo '<li>', date('H:i:s', $t + 60 * $i), '</li>';
  }
?>
</ul>

<?php elseif ($view === 'table'): ?>
  <h2>10x10 Multiplication Table</h2>
  <table>
    <?php for ($r=1; $r <= 10; $r++): ?>
    <tr>
      <?php for ($c = 1; $c <= 10; $c++): ?>
      <td><? = $r * $c ?></td>
      <?php endfop; ?>
    </tr>
    <?php endfor; ?>
  </table>

<?php elseif ($view === 'stats'): ?>
<h2>Stats</h2>
<form>
  <input type="hidden" name="view" value="stats">
  <label>Numbers (comma-separated):
    <input name="nums" value = "<? = htmlspecaialchars($_GET['nums'] ?? '') ?>">
  </label>
  <button>Analyze</button>
</form>

<?php
$nums = ints_from_csv($_GET['nums'] ?? null);
if($nums === null){
  echo "<p>Enter a valid comma-separated list of integers.</p>";
} else {
$count = count($nums);
$sum = array_sum($nums);
$min = min($nums);
$max = max($nums);
$avg = $count ? $sum/ $count : 0;
echo "<ul>";
  echo "<li>Count: $count"</li>;
  echo "<li>Sum: $sum</li>";
  echo "<li>Min: $min</li>";
  echo "<li>Max: $max</li>";
  echo "<li>Average: " . number_format($avg,2) . "</li>";
  echo "</ul>;
}
?>

<?php else: ?>
<p>Unkown view.</p>
<?php endif; ?>
</body>
</html>

