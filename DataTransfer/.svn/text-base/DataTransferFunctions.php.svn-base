<?php
/**
* This file is combination of functions
*
* @author   Min Choi <min.choi@vicscouts.asn.au>
* @package  Viccon
* @version  1.0
*/
if (empty($APPLICATION_SETTING_EXECUTED))
   require_once('../../../SettingFile.php');
require_once("DataTransferConfig.php");
require_once("DataTransferDB.php");
require_once("DataTransferDBStatic.php");
require_once("DataTransferOtherFunction.php");
require_once("NSW_DB_connect.php");

/**
* Function to create snapshot in aj2010 database
* @param populateRecord if true, populate records in the snapshot tables
*/
function createSnapshot($populateRecord=false)
{
   global $listTables;
   global $db_aj2007;
   global $participantCondition;
   $strReturn = "";
   foreach($listTables as $table=>$sn_table)
   {
      $sqlDrop = "DROP TABLE $sn_table";
      mysql_query($sqlDrop, $db_aj2007);

      $sqlCreate = "CREATE TABLE $sn_table LIKE $table";

      if(mysql_query($sqlCreate, $db_aj2007)) 
      {
         $strReturn.= "$table.' table is created.<br>";
         if($populateRecord) 
         {         
            $sqlCreate = "INSERT INTO $sn_table SELECT * FROM $table WHERE participantid IN ($participantCondition) OR participantID IN (SELECT participantID FROM participant WHERE PID is not null) ";
            if(mysql_query($sqlCreate, $db_aj2007)) 
               $strReturn.=$table.' table population is done.<br>';
            else 
               return 'Could not insert the record. Transfer HAS TO be abort.';
         }
      }
      else
         return 'Could not make the table. Transfer HAS TO be abort.';
   }
   return $strReturn;
}

/**
* This is the function to generate all queries gone through
* each tables in the system
*/
function findChanges($part=null)
{
   global $listTables;
   global $listPart1;
   global $listPart2;
   global $listPart3;
   global $listPart4;
   global $listPart5;
   global $db_aj2007;

   if ($part=='Part1')
      $tempList = $listPart1;
   else if ($part=='Part2')
      $tempList = $listPart2;
   else if ($part=='Part3')
      $tempList = $listPart3;
   else if ($part=='Part4')
      $tempList = $listPart4;
   else if ($part=='Part5')
      $tempList = $listPart5;
   else
      $tempList = $listTables;

   if($part=='Part3')
      $arrAddEditValue[] = updateTable_applicationStatus();
   foreach($tempList as $table=>$sn_table)
   {
      //$arrDeleteValue[] = getDeleteDetails($sn_table, $table, 'D')
      $editResult = getTableEditSQL($table, $sn_table, 'AE');
      if($editResult || $editResult=="")
         $arrAddEditValue[] = $editResult;
      else
         die("'".$table."' Snapshot and original database are not same");
   }
   return $arrAddEditValue;
}

// Function to save NSW PID into our DB
function updatePID()
{
   $objNSW = new NSW_DB_connect();
   global $db_aj2007;
   $returnString = "";
   $errorMessage = "";

   $nswVicMembers = $objNSW->selectNSW("tblParticipant", NSW_PID.", MemberNumber", "BID=".BID);

   if($nswVicMembers)
   {
      foreach($nswVicMembers as $nswVicMemberNo)
      {
         $nswRegID = $nswVicMemberNo["MemberNumber"];
         $nswPID = $nswVicMemberNo[NSW_PID];
         $tmpInsertResult = insertPIDintoParticipant($nswRegID,$nswPID);
         if ($tmpInsertResult['success'])
            $returnString.=$tmpInsertResult['message'];
         else
            $errorMessage.=$tmpInsertResult['message'];
      }      
      return array("message"=>$returnString, "errorMessage"=>$errorMessage);
   }      
   else
      return false;
}

function getTableEditSQL($table1, $table2)
{
   global $db_aj2007;
   $arrChanges = array();
   $tempPID = "tempParticipantID";
   $sqlStatement = "SELECT t1.ParticipantID as $tempPID";
   $tempFields = getFields($table1);
   $sql = "";

   $arrRMD = array();
   $arrEGC = array();
   $arrDFM = array();

   foreach($tempFields as $key=>$attribute)
   {
      $sqlStatement.= ", IF(t1.$attribute=t2.$attribute OR (t1.$attribute IS NULL AND t2.$attribute IS NULL),'same', t1.$attribute) as $attribute";
   }

   $sqlStatement.= " FROM $table1 t1 LEFT JOIN $table2 t2 ";
   $sqlStatement.= getJoinCondition($table1);
   $sqlStatement.= " ORDER BY t1.participantid";
   $result = mysql_query($sqlStatement, $db_aj2007);

   if ($result)
   {   
      while($memberDetail = mysql_fetch_object($result))
      {
         $changedDetail = array();

         foreach($memberDetail as $attName=>$attValue)
         {
            if($attValue!='same' && $attName!=$tempPID)
            {
               $changedDetail[] = array(
                        "Field"           => $attName,
                        "NewValue"        => $attValue);
            }
         }
         
         if(count($changedDetail)>0)
         {
            $funName = "updateTable_".$table1;

            // Because emergencycontact, participantregularmedication, directfamilymember
            // and participantprivatehealthfund stores more than one records for one 
            // participant, run separately
            if($table1=="emergencycontact")
               $arrEGC[$memberDetail->$tempPID][] = $changedDetail;
            elseif($table1=="participantregularmedication")
               $arrRMD[$memberDetail->$tempPID][] = $changedDetail;
            elseif($table1=="directfamilymember")
               $arrDFM[$memberDetail->$tempPID][] = $changedDetail;
            elseif($table1=="participantprivatehealthfund")
               $arrPMH[$memberDetail->$tempPID][] = $changedDetail;
            else
               $sql.= $funName($memberDetail->$tempPID, $changedDetail);
         }
      }
      if(count($arrRMD)>0)
         $sql.=updateTable_participantregularmedication($arrRMD);
      if(count($arrEGC)>0)
         $sql.=updateTable_emergencycontact($arrEGC);
      if(count($arrDFM)>0)
         $sql.=updateTable_directfamilymember($arrDFM);
      if(count($arrPMH)>0)
         $sql.=updateTable_participantprivatehealthfund($arrPMH);

      return $sql;
   }
   else
      return false;
}
// This is not used
function getDeleteDetails($table1, $table2)
{
   global $db_aj2007;
   $arrChanges = array();
   $tempPID = "tempParticipantID";
   $sqlStatement = "SELECT t1.ParticipantID as $tempPID";
   $tempFields = getFields($table1);

   foreach($tempFields as $key=>$attribute)
   {
      $sqlStatement.= ", IF(t2.$attribute IS NULL AND t1.$attribute IS NOT NULL, 'Removed', '') as $attribute";
   }

   $sqlStatement.= " FROM $table1 t1 LEFT JOIN $table2 t2 ";
   $sqlStatement.= getJoinCondition($table1);
   $result = mysql_query($sqlStatement, $db_aj2007);

   while($memberDetail = mysql_fetch_object($result))
   {
      foreach($memberDetail as $attName=>$attValue)
      {
         if($attValue=='Removed' && $attName!=$tempPID)
         {
            $arrChanges[] = array(
               "TableName"       => $table1, 
               "ParticipantID"   => $memberDetail->$tempPID,
               "Field"           => $attName,
               "NewValue"        => $attValue);            
         }
      }
   }
   return $arrChanges;
}

function getStaticSql()
{
   $staticSql = "";

   $staticSql.=insertInto_tblRegion();
   $staticSql.=insertInto_tblDistrict();
   $staticSql.=insertInto_tblGroup();
   return $staticSql;
}

function getRegionSQL()
{
   return insertInto_tblRegion();
}

function getDistrictSQL()
{
   return insertInto_tblDistrict();
}

function getGroupSQL()
{
   return insertInto_tblGroup();

}

function getJoinCondition($tName)
{
   global $participantCondition;
   $joinCondition = "";

   if ($tName=="emergencycontact" || $tName=="sn_emergencycontact")
      $joinCondition = " ON (t1.ParticipantID=t2.ParticipantID AND t1.Contact_Index=t2.Contact_Index)";

   else if ($tName=="adultworkpreference" || $tName=="sn_adultworkpreference")
      $joinCondition = " ON (t1.ParticipantID=t2.ParticipantID AND t1.LevelOfPreference=t2.LevelOfPreference)";

   else if ($tName=="participantprivatehealthfund" || $tName=="sn_participantprivatehealthfund")
      $joinCondition = " ON (t1.ParticipantID=t2.ParticipantID AND t1.MedicalFund=t2.MedicalFund)";

   else if ($tName=="adultexperience" || $tName=="directfamilymember" || $tName=="participantregularmedication" || $tName=="sn_adultexperience" || $tName=="sn_directfamilymember" || $tName=="sn_participantregularmedication")
      $joinCondition = " ON (t1.ParticipantID=t2.ParticipantID AND t1.OrderIndex=t2.OrderIndex)";

   else
      $joinCondition = " ON (t1.ParticipantID=t2.ParticipantID)";
   $joinCondition.= " WHERE t1.participantID in ($participantCondition)";
   return $joinCondition;
}

function getFields($tableName)
{
   global $db_aj2007;
   $result = mysql_query("DESC ".$tableName, $db_aj2007);
   $returnField = array();
   while($fields = mysql_fetch_object($result))
      $returnField[] = $fields->Field;
   return $returnField;
}


/**
* This is to create index in adultexperience, directfamilymember and
* regular medication to easily differenciate any changes made for a week
*/
function setIndex()
{
   global $listTables;
   global $db_aj2007;

   // Add index in adultexperience  
   $sqlSelect = "SELECT * FROM adultexperience ORDER BY ParticipantID, Year DESC";
   $result = mysql_query($sqlSelect);
   $index = 1;
   $previousPID = "";

   while($theRow = mysql_fetch_object($result))
   {
      if ($previousPID!=$theRow->ParticipantID || $previousPID=="")
         $index=1;
      else
         $index++;

      $sqlUpdate = "UPDATE adultexperience SET OrderIndex=".$index." WHERE ParticipantID='".addslashes($theRow->ParticipantID)."' AND Event='".getValidString($theRow->Event)."' AND Year='".$theRow->Year."' AND Role='".getValidString($theRow->Role)."'";
      print("SQL:".$sqlUpdate."<br><br>");
      var_dump(mysql_query($sqlUpdate, $db_aj2007));
      $previousPID = $theRow->ParticipantID;
   }
   // Add index in directfamilymember
   $sqlSelect = "SELECT * from directfamilymember ORDER BY participantid, familymembername";
   $result = mysql_query($sqlSelect);
   $index = 1;
   $previousPID = "";

   while($theRow = mysql_fetch_object($result))
   {
      if ($previousPID!=$theRow->ParticipantID || $previousPID=="")
         $index=1;
      else
         $index++;

      $sqlUpdate = "UPDATE directfamilymember SET OrderIndex=".$index." WHERE ParticipantID='".$theRow->ParticipantID."' AND FamilyMemberName='".getValidString($theRow->FamilyMemberName)."' AND FamilyMemberRelation='".getValidString($theRow->FamilyMemberRelation)."'";
      print("SQL:".$sqlUpdate."<br><br>");
      var_dump(mysql_query($sqlUpdate, $db_aj2007));
      $previousPID = $theRow->ParticipantID;
   }
   
   // Add index in participantregularmedication
   $sqlSelect = "SELECT * from participantregularmedication ORDER BY participantid, DrugName";
   $result = mysql_query($sqlSelect);
   $index = 1;
   $previousPID = "";

   while($theRow = mysql_fetch_object($result))
   {
      if ($previousPID!=$theRow->ParticipantID || $previousPID=="")
         $index=1;
      else
         $index++;

      $sqlUpdate = "UPDATE participantregularmedication SET OrderIndex=".$index." WHERE ParticipantID='".$theRow->ParticipantID."' AND DrugName='".getValidString($theRow->DrugName)."' AND Dose='".getValidString($theRow->Dose)."' AND AdministrationMethod='".getValidString($theRow->AdministrationMethod)."'";
      print("SQL:".$sqlUpdate."<br><br>");
      var_dump(mysql_query($sqlUpdate, $db_aj2007));
      $previousPID = $theRow->ParticipantID;
   }
}

function splitStrings($pString, $delimiter)
{
    $pString = trim($pString);

    if (!empty($pString))
    {
        $quit = false;
        $listString[0] = strtok($pString, $delimiter);
        for($x = 1;(!$quit);$x++) {
            $tempString = strtok($delimiter);
            if (strlen($tempString) == 0)
                $quit = true;
            else
                $listString[$x] = $tempString;
        }
        return $listString;
    } else
        return null;
}

function testingConnection()
{
   $objNSW = new NSW_DB_connect();
   global $db_aj2007;
   $returnString = "";
   $errorMessage = "";

   $nswVicMembers = $objNSW->selectNSW("tblParticipant", "top 10 ".NSW_PID.", MemberNumber", "BID=".BID);

   if($nswVicMembers)
   {
      print('Query Successfully run<br><br>');
      var_dump($nswVicMembers);   
   }
   else
   {
      print('Query failed');
   }

}

?>