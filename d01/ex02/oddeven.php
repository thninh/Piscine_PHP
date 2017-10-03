#!/usr/bin/php
<?php
  $stdin = fopen('php://stdin', 'r');
  while ($stdin && !feof($stdin))
  {
    echo "Entrez un nombre: ";
    $answer = fgets($stdin);
    // $answer = trim(fgets($stdin));
    if ($answer)
    {
      $answer = str_replace("\n", "", "$answer");
      if (is_numeric($answer))
      {
        echo "Le chiffre " . $answer . " est ";
        if ($answer % 2 == 0)
          echo "Pair\n";
        else
          echo "Impair\n";
      }
      else
        echo "'" . $answer . "' n'est pas un chiffre\n";
    }
  }
  fclose($stdin);
  echo "\n";
?>
