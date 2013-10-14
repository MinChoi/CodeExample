<?php
/**
* This file is to create and generate DB connection and sql statements
* to transfer data from victoria Jamboree records to NSW db
*
* @author   Min Choi <min.choi@vicscouts.asn.au>
* @package  Viccon
* @version  1.0
*/
if (empty($APPLICATION_SETTING_EXECUTED))
   require_once('../../../SettingFile.php');

require_once("../JamConfig.php");
require_once('../AJ2007Class/Jamboree.php');
require_once("DataTransferConfig.php");
require_once("DataTransferFunctions.php");

global $db_aj2007;
global $db_nsw;

$passingParam = $_POST["paramValue"];
$fileType = "";
$errorMessage = "";

$printSQL = "";

if($passingParam=="updatePID")
{   
   $arrGetPID = updatePID();
   print($arrGetPID["message"]);
   print("<br><br><br><b>Other messgaes</b><br>");
   print($arrGetPID["errorMessage"]);
   $fileType = 'UpdatePID';
   exit;     
} 
else if ($passingParam=="createSnapshotWithoutRecord")
{
   $printSQL = createSnapshot(false);
   $fileType = 'CreateSnapshotWithoutRecord';
}
else if ($passingParam=="createSnapshotWithRecord")
{
   $printSQL = createSnapshot(true);
   $fileType = 'CreateSnapshotWithRecord';
}
else if ($passingParam=="generateSQLPart1" || $passingParam=="generateSQLPart2" || $passingParam=="generateSQLPart3" || $passingParam=="generateSQLPart4" || $passingParam=="generateSQLPart5")
{
   $outputString = "";

   if ($passingParam=="generateSQLPart1")
   {
      $arrSQL = findChanges('Part1');
      $fileType = 'TableParticipant';
   }
   else if ($passingParam=="generateSQLPart2")
   {
      $arrSQL = findChanges('Part2');
      $fileType = 'TableMedicalDetail';
   }
   else if ($passingParam=="generateSQLPart3")
   {
      $arrSQL = findChanges('Part3');
      $fileType = 'TableOthers1';
   }
   else if ($passingParam=="generateSQLPart4")
   {
      $arrSQL = findChanges('Part4');
      $fileType = 'TableOthers2';
   }
   else if ($passingParam=="generateSQLPart5")
   {
      $arrSQL = findChanges('Part5');
      $fileType = 'TableOthers3';
   }
   else
   {
      $arrSQL = findChanges();
   }
   $tempSQL = "";
   foreach($arrSQL as $sql)
   {
      $tempSQL.=$sql."<br><br>";
      $outputString.=$sql;
   }
   $printSQL = $tempSQL;
}
else if ($passingParam=="insertRegion")
{
   $printSQL = getRegionSQL();
   $fileType = 'TableRegion';
}
else if ($passingParam=="insertDistrict")
{
   $printSQL = getDistrictSQL();
   $fileType = 'TableDistrict';
}
else if ($passingParam=="insertGroup")
{
   $printSQL = getGroupSQL();
   $fileType = 'TableGroup';
}
else if ($passingParam=="deleteExisting")
{
   $printSQL = getDeleteExistingRecordQuery();
   $fileType = 'DeleteExistingRecord';
}
else if ($passingParam=="setIndex")
{
   setIndex();
}
else if ($passingParam=="runUpdate")
{
   $arrResult = array();
   //runSqlNSW(findChanges('Part5'));exit;
   //$arrGetPID = updatePID();
   //print($arrGetPID["message"]);
   $arrResult[] = runSqlNSW(findChanges('Part1'));
   print("<br>Part1 is done<br><br>");

   $arrGetPID = updatePID();
   print($arrGetPID["message"]);

   //print($arrGetPID["errorMessage"]);
   //$fileType = 'UpdatePID';

   $arrResult[] = runSqlNSW(findChanges('Part2'));
   print("<br>Part2 is done<br><br>");
   $arrResult[] = runSqlNSW(findChanges('Part3'));
   print("<br>Part3 is done<br><br>");
   $arrResult[] = runSqlNSW(findChanges('Part4'));
   print("<br>Part4 is done<br><br>");
   $arrResult[] = runSqlNSW(findChanges('Part5'));
   print("<br>Part5 is done<br><br>");

/*
   //print('Results for AJ2010 Data synchronization');

   foreach($arrResult as $tempResult)
   {
      //print('<br><br>');
      //var_dump($tempResult);
   }

   //createSnapshot(true);
*/
   exit;
}

if($printSQL!="")
{
   //print($printSQL);
   $tmpFilename = './Queries/DataTransfer_'.$fileType.date('Ymdhis').'.txt';
   $printSQL = ereg_replace("<br>","\n", $printSQL);

   $fp = fopen($tmpFilename, "w");
   fwrite($fp,$printSQL);
   fclose($fp);

   print('FILE '.$tmpFilename.' is created.');
   $subject = "AJ2010 Data Transfer Temp emails by Min";
   $to = "min.choi@vicscouts.asn.au";

   $printSQL = ereg_replace("\n", "<br>", $printSQL);

   $message = $printSQL;
   require(ROOT_DIR.'/Interface/aj2007/autoHTMLEmail.php');
}

?>