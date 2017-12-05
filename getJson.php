<?php
$file = 'schools.json';
if(file_exists($file)){
  $filedata = file_get_contents($file);
  $objson = json_decode($filedata, true);

  /*echo"<hr><code><pre>";
  print_r($objson);
  echo"</pre></code><hr>";
*/
}
else echo $file . " does not exist";

//test output
/*echo($objson['school']["Mediacollege"]["category"]);
echo("<br>");
echo($objson["school"]["HVA"]["courses"]["SD"]);
*/

//make new school
/*$objson["school"]["HorizonCollege"]["nr_students"] = 25000;
writeJson($objson, "schools.json");
*/
//test the new school
/*echo("<br>");
echo($objson["school"]["HorizonCollege"]["nr_students"]);
*/
if(isset($_POST["submit"])){
  echo("<h1>post successfull</h1>");
  $objson["school"][$_POST["School"]]["nr_students"] = $_POST["students"];
  writeJson($objson, "schools.json");
  echo("<br>");
  echo("<h3>The numer of students in your new school is: ");
  echo($objson["school"][$_POST["School"]]["nr_students"]);
  echp("</h3>");
}

function writeJson($objson, $fileOutput){
  $saveJson = json_encode($objson);
  $file = fopen($fileOutput, "w") or die("Can't open file");
  fwrite($file, $saveJson);
  fclose($file);
}
?>
