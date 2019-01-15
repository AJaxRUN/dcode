<?php
//include connection file 
include("connection.php");
$link=Connection();
include_once('fpdf.php');
$count = 0;
$count1=0;
$from = $_POST['fromDate'];
$to = $_POST['toDate'];
$pf = explode('-',$from);
$pt = explode('-',$to);
$pi[0] = $pf[2].'/'.$pf[1].'/'.$pf[0];
$pi[1] = $pt[2].'/'.$pt[1].'/'.$pt[0];
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
   // $this->Image('logo.png',10,-1,70);
    $this->SetFont('Arial','BU',13);
    // Move to the right
    $this->Cell(55);
    // Title
    $this->Cell(80,10,'Student List',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// $db = new dbObj();
// $connString =  $db->getConnstring();
//$display_heading = array('regno'=>'Reg No.', 'student_name'=> 'Name', 'batch'=> 'Batch','dept'=> 'Dept','section'=> 'Section','late'=> 'Late\DressCode','achieve'=> 'Achievement',);

//$result = mysqli_query($connString, "SELECT id, employee_name, employee_age, employee_salary FROM employee") or die("database error:". mysqli_error($connString));
$header = mysqli_query($link, "SHOW columns FROM log");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,'From Date:',0,'C');
$pdf->Cell(40,10,$pi[0],0);
$pdf->Cell(40);
$pdf->Cell(40,10,'To Date:',0,'C');
$pdf->Cell(40,10,$pi[1],0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$flag = 0;
  $lag = 0;
  $existingdate = array();
  $i = 0;
  $datestr = "";
  $sd = explode("/", $pi[0]);
  $ed  = explode("/", $pi[1]);
  $qu = "SELECT * FROM log";
  $result = mysqli_query($link , $qu);
  // foreach($display_heading as $heading) {
    $pdf->Cell(40,10,'Reg No',1,'C');
    $pdf->Cell(60,10,'Name',1);
    $pdf->Cell(12,10,'Batch',1);
    $pdf->Cell(12,10,'Dept',1);
    $pdf->Cell(15,10,'Section',1);
    $pdf->Cell(30,10,'Late\DressCode',1);
    $pdf->Cell(25,10,'Achievement',1);
    $pdf->SetFont('Arial','',10);
        // }
  while($row = $result->fetch_assoc()) {
    $fd = explode("/", $row['date']);
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
                  $pdf->Ln();
                $pdf->Cell(40,12,$ro['regno'],1);
                $pdf->Cell(60,12,$ro['name'],1);
                $pdf->Cell(12,12,$ro['batch'],1);
                $pdf->Cell(12,12,$ro['dept'],1);
                $pdf->Cell(15,12,$ro['section'],1);
                $pdf->Cell(30,12,$count,1);
                $pdf->Cell(25,12,$count1,1);
              //echo $ro['regno'].";". $ro['name'].";". $ro['batch'].";". $ro['dept'].";". $ro['section'].";".$count.";".$count1.":";
              $count=0;$count1=0;
            }  
        }
        }
    }
    } 
// foreach($header as $heading) {
//     $pdf->Cell(40,12,$display_heading[$heading['Field']],1);
//     }
    // foreach($result as $row) {
    // $pdf->Ln();
    // foreach($row as $column)
    // $pdf->Cell(40,12,$column,1);
    // }
    $pdf->Output();
?>