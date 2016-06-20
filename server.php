<?php
   require('analyzer.php');

   if (!$_POST || !$_POST['str']) {
     echo 'ERROR: missing text';
     die();
   }

   $analyzer = new Analyzer($_POST['str']);
   $analyzer->init();
   $analyzer->analyze();

   $grades = 5;
   $position = 1;
   $output = '';

  foreach ($analyzer->getResults() as $freq => $words) {
      foreach ($words as $word) {
            $output .= sprintf("[%s] #%d: %s - %s ".PHP_EOL, str_repeat('*',$grades), $position, $word, $freq);
            $position++;
            $grades--;
            if ($position > 5) break;
      }
   }

   echo $output;

?>
