#!/usr/bin/php
<?php
$directions = ['North', 'East', 'South', 'West'];

$position = [
  'x' => 0,
  'y' => 0,
  'd' => 0,
];

function iterate($callable, $steps)
{
  preg_replace_callback('/\w\d*/', $callable, $steps);
}

function walk($position, $length)
{
  switch ($position['d']) {
    case 0:
      $position['y'] += $length;
      break;
    case 1:
      $position['x'] += $length;
      break;
    case 2:
      $position['y'] -= $length;
      break;
    case 3:
      $position['x'] -= $length;
      break;
  }

  return $position;
};

iterate(function ($matches) use (&$position) {
  // echo $matches[0] . "\n";
  switch ($matches[0]) {
    case 'R':
      $position['d'] = ($position['d'] + 5) % 4;
      break;
    case 'L':
      $position['d'] = ($position['d'] + 3) % 4;
      break;
    default:
      preg_match_all('/\d+/', $matches[0], $matches2);
      $number = $matches2[0][0];
      $position = walk($position, (int)$number);
      break;
  }
}, $argv[1]);

echo("X: ".$position['x']." Y: ".$position['y']." Direction: ".$directions[$position['d']]."\n");