<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>
</head>
<body>
    <?php
        # Put your commentS here
        $name = "Long Nguyen";   //student name
        $year = 1;
 
        define("Pi", 3.14);
        echo "<h1>Hello World! </h1>";
 
        echo "<p>My name is $name. I am a year $year student</p>";
        echo '<p>My name is $name. </p>';
        echo Pi;
 
        $helloworld = "Hello " . "World.";
        echo "<p>$helloworld </p>";
 
        $year++;
        $year+=1;
        echo "$year";
 
        echo "</br>";
 
        if(5 !=  5.0) echo "Not equal";
        if(5 !== 5.0) echo "Not identical";
        
        echo "</br>";
 
        $array = ['A', 'B', 'C'];
        for ($i =0; $i<count($array); $i++) {
            echo "$array[$i] ";
        }
 
        $array1 = ['A'=> 'Apple', 'B'=> 'Bear', 'C'=>'Car' ];
 
        foreach ($array1 as $key => $value) {
            echo "<p> Element " . $key . " has the value " . $value . " or " . $array1[$key] . "</p>";
        }
 
        $thankyou = 'Arigatou';
        $greeting1 = 'Hello World,\n$thankyou';
        $greeting2 = "Hello World,\n$thankyou";

        echo $greeting1;
        echo "<br>";
        echo $greeting2;
 
        $meta=<<<"YOLO"
            <p>This is a multi-line string</p>
            <p>That renders line breaks</p>
            <p>And to be clear, the value of \$love is $love</p>
        YOLO;
 
        echo $meta;
 
        function hello($name1, $year1) {
            echo "<p>My name is $name1. I am a year $year1 student</p>";           
        }
 
        hello($name, $year);
 
        function divide($num, $den) {
            return ($den == 0) ?
              "Denominator can't be zero" :
              ($num / $den);
        }
 
        $result = divide(10,0);
        echo "$result";
 
    ?>
 
</body>
</html>