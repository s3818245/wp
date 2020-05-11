<?php
   $filename = "..\Week 9\processing.php";
    $line = file($filename);
    echo "<ol>";
    $linesOrBigString = '';
    foreach($line as $i => $line){
        $linesOrBigString .= $line;
        echo "<li> $line </li>";
    }
        
    echo "</ol>";

    $filename = "processing.php";
    if ($numBytes = file_put_contents($filename, $linesOrBigString))
        echo "File Saved, $numBytes written.";
    else
        echo "File Access Error. Does $filename exist and have 606 permissions?";

    $filename = "..\Week 9\index.php";
    echo "<ol>";
    $fp = fopen($filename, "r");
    flock($fp, LOCK_SH);
    while ($line = fgets($fp)){
        $line = htmlspecialchars($line);
        echo "<li>$line</li>";
    }
        
    flock($fp, LOCK_UN);
    fclose($fp);
    echo "</ol>";

    $filename = "text.txt";
    $fp = fopen($filename,"w");\
    flock($fp, LOCK_EX);
    fwrite($fp, "Here is the first line\n");
    fwrite($fp, "Here is the second line\n");
    flock($fp, LOCK_UN);
    fclose($fp);

    $filename = "student.csv";
    $fp = fopen($filename, "r");
    flock($fp, LOCK_SH);
    $headings = fgetcsv($fp);
    while ($aLineOfCells = fgetcsv($fp)) {
        $records[] = $aLineOfCells;
      }

    flock($fp, LOCK_UN);
    fclose($fp);
    echo "<p>{$headings[2]}</p>";
    echo "<p>{$records[2][0]}</p>";

    $filename = "student_new.csv";
    $fp = fopen($filename, "w");
    flock($fp, LOCK_EX);
    fputcsv($fp, $headings);
    foreach ($records as $record)
        fputcsv($fp, $record);
    flock($fp, LOCK_UN);
    fclose($fp);


?>