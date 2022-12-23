<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="" method="post">
    <h1>Insertion Sort & Merge Sort</h1>
    <label for="">Insertion Sort</label>
    <input type="radio" id="html" name="insertion" value="Insertion Sort">
    <label for="">Merge Sort</label>
    <input type="radio" id="html" name="merge" value="Merge Sort">
    <br>
     <textarea name="textarea" id="" cols="15" rows="2"></textarea>
     <br>
     <button name="btn" class="btn" type="submit">sort</button>
   </form> 
</body>
</html>
<?php 
if (isset($_POST['btn'])) 
{
  $arr = isset($_POST['textarea']) ? $_POST['textarea'] : '' ;
$arr = explode(' ' , $arr);
// $arr = array_keys($arr);
 
// print_r($arr);
$str = '[';
for ($i=0; $i <count($arr) ; $i++) { 
 $str .= $arr[$i] ;  
 $str .=  $i == count($arr) -1 ? '' : ' , ' ;  
 
}
$str .= ' ]';
?>
<p>array before sorting : <br> <?php echo $str; ?></p>
 <?php
 

if (isset($_POST['insertion'])) {

  
  // function insertionsort(&$Array, $n) {
    for($i=0; $i<count($arr); $i++) {
      $curr = $arr[$i];
      $j = $i - 1;
      while($j >= 0 && $curr < $arr[$j]) {
        $arr[$j + 1] = $arr[$j];
        $arr[$j] = $curr;
        $j = $j - 1;
      }
      ?>  
      <?php
    ?> 
    <p> <?php
    echo 'pass ' . $i +1 . ' : [' ;
      for ($k=0; $k < count($arr); $k++) { 
        echo $arr[$k] ;
        echo $k == count($arr) - 1 ?  ' ' :' , ';
      }
      echo ']';
 ?>   </p>
      <?php
    }
  // }
  

  $str = '[';
 
  for ($i=0; $i <count($arr) ; $i++) { 
   $str .= $arr[$i] ;  
 if ($i == count($arr) -1) {
  $str .= ' ';
 } else 
 {
  $str .= ' , ';
 }
   
  }
  $str .= ' ]';
?>
<p>array after sorting : <br> <?php echo $str; ?></p>
<?php
 
}














else if (isset($_POST['merge'])) 
{
  

  function merge($left, $right){
    $res = array();
    while (count($left) > 0 && count($right) > 0){
      if($left[0] > $right[0]){
        $res[] = $right[0];
        $right = array_slice($right , 1);
      }else{
        $res[] = $left[0];
        $left = array_slice($left, 1);
      }
    }
    while (count($left) > 0){
      $res[] = $left[0];
      $left = array_slice($left, 1);
    }
    while (count($right) > 0){
      $res[] = $right[0];
      $right = array_slice($right, 1);
    }
    return $res;
  }

  function merge_sort($my_array){
    if(count($my_array) == 1 ) return $my_array;
    $mid = count($my_array) / 2;
      $left = array_slice($my_array, 0, $mid);
      $right = array_slice($my_array, $mid);
    $left = merge_sort($left);
    $right = merge_sort($right);
    return merge($left, $right);
    // for ($i=0; $i <count($my_array) ; $i++) { 
    //   echo 'pass ' . $i +1 .  $my_array[$i] . ' ';
    // }


  }
$arr = merge_sort($arr);

$str = '[';
for ($i=0; $i <count($arr) ; $i++) { 
 $str .= $arr[$i] ;  
 $str .=  $i == count($arr) -1 ? '' : ' , ' ;  
 
}
$str .= ' ]';
?>
<p>array after sorting : <br> <?php echo $str; ?></p>
 <?php
}
?>
<hr>
<!-- <p>array after each pass : </p> --> 
<?php
}