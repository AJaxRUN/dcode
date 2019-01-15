<?php
$flag = 0;
  $lag = 0;
  $existingdate = array();
  $i = 0;
  $pi[0] = $_POST['fromDate'];
  $pi[1] = $_POST['toDate'];
  $datestr = "";
  $sd = split("/", $pi[0]);
  $ed  = split("/", $pi[1]);
  $qu = "SELECT * FROM log";
  $result = mysqli_query($link , $qu);
  while($row = $result->fetch_assoc()) {
    $fd = split("/", $row['date']);
    $flag = 0;$lag = 0;
    if($fd[2]>= $sd[2] && $fd[2]<= $ed[2])
    { 
      if($fd[1]>$sd[1])
        {$flag = 1;}
      else if($fd[1]==$sd[1])
        {if($fd[0]>=$sd[0])
          {$flag = 1;}}
      else
        {$flag= 0;}
      if($fd[1]<$ed[1])
        {$lag = 1;}
      else if($fd[1]==$ed[1])
        {if($fd[0]<=$ed[0])
          {$lag = 1;}}
      else
        {$lag= 0;}
    }
    if($lag==1 && $flag==1)
      $datestr .= $row['regno'].",";
  }
   $datearray = array_unique(explode(",", $datestr));
  for($iter=0;$iter<4;$iter++) {
    switch ($iter) {
      case 0: $year = "I_year";break;
      case 1: $year = "II_year";break;
      case 2: $year = "III_year";break;
      case 3: $year = "IV_year";break;
      default: $year = "III_year";break;
    }
     $result = mysqli_query($link , $qu);
      while($row = $result->fetch_assoc()) {
          $te = $row['regno'];
          if(in_array($te, $datearray)&&!in_array($te,$existingdate)) {
            $pu = "SELECT * FROM $year WHERE regno = '$te'";
            $re = mysqli_query($link , $pu);
            if(mysqli_num_rows($re))
            {
              $ro = mysqli_fetch_array($re);
              $existingdate[$i++] = $te;
              $x = $ro['regno'];
              $lu = "SELECT * FROM log WHERE regno LIKE '$x'";
              $y = mysqli_query($link, $lu);  
              if (mysqli_num_rows($y)) {
              $y = mysqli_query($link , $lu);
              $pow = "";
              while($pow = $y->fetch_assoc())
                  if(strcmp($pow['late'],"1")==0||strcmp($pow['dress'],"1")==0)
                    $count++;
              $y = mysqli_query($link , $lu);
              $pow = "";
              while($pow = $y->fetch_assoc())
                if(strcmp($pow['achieve'],"1")==0)
                  $count1++;
              echo $ro['regno'].";". $ro['name'].";". $ro['batch'].";". $ro['dept'].";". $ro['section'].";".$count.";".$count1.":";
              $count=0;$count1=0;
            }  
        }
        }
    }
    }
?>