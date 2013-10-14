<?php
require_once(ROOT_DIR."/Interface/aj2007/Common/GetGroupContact.php");

function getPID($participantID)
{
   global $db_aj2007;
   $sql = "SELECT PID FROM participant WHERE ParticipantID= '".$participantID."'";
   $result = mysql_fetch_object(mysql_query($sql, $db_aj2007));
   return $result->PID;
}

function getMDID($PID)
{
   global $db_aj2007;
   $objNSW = new NSW_DB_connect();
   $returnString = "";
   $errorMessage = "";

   $result = $objNSW->selectNSW("tblParticipant", "MDID", "PID=".$PID);
   if ($result)
      return $result[0]['MDID'];
   else 
      return false;
}

function getMaxSkillIndex($PID)
{
   global $db_aj2007;
   $objNSW = new NSW_DB_connect();
   $returnString = "";
   $errorMessage = "";

   $result = $objNSW->selectNSW("tblParticipantSkill", 
             "MAX(SkillIndex) AS SkillIndex", "PID=".$PID);

   if ($result)
      return $result[0]['SkillIndex'];
   else 
      return false;
}

function getApID($pID)
{
   global $listAppointment;
   global $db_aj2007;

   $sql="SELECT rank FROM participant WHERE participantid=$pID";
   $result = mysql_fetch_object(mysql_query($sql, $db_aj2007));
   if($result!=null && $result!="")
      return $listAppointment[$result->rank]['ApID'];
   else
      return "";   
}

function getLID($pID)
{
   $objNSW = new NSW_DB_connect();
   $returnString = "";
   $errorMessage = "";

   $result = $objNSW->selectNSW("tblLeader", 
             "LID", "PID=".$pID);
   if ($result)
      return $result[0]['LID'];
   else 
      return false;
}

function getMemberBID($pID)
{
   $objNSW = new NSW_DB_connect();
   $returnString = "";
   $errorMessage = "";

   $result = $objNSW->selectNSW("tblParticipant", 
             "BID", "PID=".$pID);
   if ($result)
      return $result[0]['BID'];
   else 
      return false;
}


function getDeleteExistingRecordQuery()
{
   global $db_aj2007;
   $sql = "SELECT PID FROM participant WHERE PID is not null";
   $result = mysql_query($sql, $db_aj2007);
   $IDs = "(";

   while ($result2 = mysql_fetch_object($result))
   {
      if($result2->PID!=null && $result2->PID!="")
      {
         if ($IDs!="(")
            $IDs.=", ";
         $IDs.=$result2->PID;
      }
   }
   $IDs.=")";

   $NSWtableList = array(
      "tblParticipantCertificate",
      "tblParticipantSkill",
      "tblParticipantJobPref",
      "tblEmergencyContact",
      "tblParticipantAllergies",
      "tblParticipantDiet",
      "tblParticipantMedicalAids",
      "tblMedicalBracelet",
      "tblParticipantMedCond",
      "tblMedication",
      "tblParticipantHat",
      "tblParticipantTShirt");
   $returnSQL = "";

   foreach ($NSWtableList as $tempTableName)
   {
      $returnSQL.="DELETE FROM $tempTableName WHERE PID IN ".$IDs."; ";
      $returnSQL.=BRtag;
   }

   return $returnSQL;
}

function restrictedMember($tempPartID)
{
   global $restrictMem;

   if(in_array($tempPartID,$restrictMem))
      return true;
   else
      return false;
}

function getRegionID($regionCondition)
{
   global $db_aj2007;
   $objNSW = new NSW_DB_connect();
   $errorMessage = "";

   $result = $objNSW->selectNSW("tblRegion", "RegionID", $regionCondition);

   if ($result)
      return $result[0]['RegionID'];
   else 
      return false;
}

function getDistrictID($districtName)
{
   global $db_aj2007;
   $objNSW = new NSW_DB_connect();
   $errorMessage = "";
   $result = $objNSW->selectNSW("tblDistrict, tblRegion", "DistrictID", "tblDistrict.RegionID=tblRegion.RegionID AND DistrictName='$districtName' AND BID=".BID);

   if ($result)
      return $result[0]['DistrictID'];
   else 
      return false;
}

function getGID($groupName)   
{
   global $db_aj2007;
   $objNSW = new NSW_DB_connect();
   $errorMessage = "";
   $result = $objNSW->selectNSW("tblGroup", "GID", "GroupName='".getValidString($groupName)."' AND BID=".BID);

   if ($result)
      return $result[0]['GID'];
   else 
      return false;
}

function getGID_usingParticipantID($pID)
{
   global $db_aj2007;
   $sqlGroup = "SELECT GroupName FROM participant WHERE ParticipantID=$pID";
   $objGroupName = mysql_fetch_object(mysql_query($sqlGroup, $db_aj2007));

   $objNSW = new NSW_DB_connect();
   $errorMessage = "";
   $result = $objNSW->selectNSW("tblGroup", "GID", "GroupName='".getValidString($objGroupName->GroupName)."' AND BID=".BID." ORDER BY GID DESC");

   if ($result)
      return $result[0]['GID'];
   else 
      return null;

}

function insertPIDintoParticipant($nswRegID, $nswPID)
{
   global $db_aj2007;
   $errorMessage="";
   $returnString="";

   if(trim($nswRegID)=='')
      $errorMessage="NSW PID '".$nswPID."' does not have VIC RegID<br>";
   else if (strlen($nswRegID)!=7)
      $errorMessage="NSW PID '".$nswPID."'(RegID:$nswRegID) have incorrect VIC RegID<br>";
   else
   {
      $sql = "SELECT * FROM participant WHERE RegID='".$nswRegID."' AND PID IS NULL";

      $tempResult = mysql_fetch_object(mysql_query($sql, $db_aj2007));
      if($tempResult)
      {
         if(mysql_query("UPDATE participant SET PID=".$nswPID." WHERE RegID='".$nswRegID."'", $db_aj2007))
            $returnString= "NSW PID '".$nswPID."' for member '".$nswRegID.") is saved into participant table<br>";               
         else
            $errorMessage="Couldn't update PID for Member $nswRegID<br>";            
      }
      else
         $errorMessage="NSW PID '".$nswPID."' / RegID '".$nswRegID."' is not in our participant table or already have PID<br>";            
   }
   if($returnString!="")
      return array('success'=>true, 'message'=>$returnString);
   else
      return array('success'=>false, 'message'=>$errorMessage);
}

function searchValue($tablelist, $arItem)
{
   $returnValue = "";

   foreach($tablelist as $nswValue=>$vicValue)
   {
      if($vicValue["Field"]==$arItem["Field"] && $vicValue["Table"]=="p")
      {
         $tempSql=$arItem["Field"]."=";

         if ($vicValue['Type']=="Text")
            $tempSql.="'".getValidString(stripslashes($arItem["NewValue"]))."'";
         else if ($vicValue['Type']=="Date")
            $tempSql.="'".$arItem["NewValue"]."'";
         else
            $tempSql.=$arItem["NewValue"];

         return $tempSql;
      }
   }
   return false;
}

function getInsertStatement($vicValues, $nswTableName, $listValues, $arrIntKey=null, $pID=null)
{
   $sql= "INSERT INTO $nswTableName (";
   $sqlValues = "";
   $isFirst=true;

   foreach($listValues as $nswField=>$vicField)
   {
      if($vicValues->$nswField!=null)
      {
         if (!$isFirst)
            $sql.= ", ";
         $sql.= $nswField;
      
         if (!$isFirst) $sqlValues.=", ";

         if ($vicField['Field']=='Surname')
            $sqlValues.="'".getCapitalisedName(getValidString(stripslashes($vicValues->$nswField)), true)."'";
         else if ($vicField['Field']=='Firstname' || $vicField['Field']=='PreferedName' || $vicField['Field']=='HomeSuburb' || $vicField['Field']=='PostalSuburb')
            $sqlValues.="'".ucwords(getCapitalisedName(getValidString(stripslashes($vicValues->$nswField)), false))."'";
         else if ($nswField=="Phone")
            $sqlValues.="'".getContactNumber($pID)."'";
         else if ($nswField=="PhoneWork" || $nswField=="PhoneMobile" || $nswField=='Fax')
            $sqlValues.="'".getPhoneNumberFormatted(getValidString(stripslashes($vicValues->$nswField)))."'";
         else if ($nswField=="MedicareNumber")
            $sqlValues.="'".getMedicalNumberFormatted(getValidString(stripslashes($vicValues->$nswField)))."'";
         else if ($nswField=="Email")
            $sqlValues.="'".getEmailAddress($pID)."'";
         else if ($vicField['Type']=="Text")           
            $sqlValues.="'".getValidString(stripslashes($vicValues->$nswField))."'";
         else if ($vicField['Type']=="Date")
            $sqlValues.="'".$vicValues->$nswField."'";
         else
            $sqlValues.=$vicValues->$nswField;

         $isFirst=false;
      }
   }         
   if($arrIntKey!=null)
   {
      foreach($arrIntKey as $exKey=>$exValue)
      {
         if($exValue!="")
         {
            if (!$isFirst)
               $sql.= ", ";
            $sql.= $exKey;
            if (!$isFirst) $sqlValues.=", ";
               $sqlValues.=$exValue;
            $isFirst=false;
         }         
      }
   }
   $sql.=") VALUES ( ";
   $sql.=$sqlValues;
   $sql.="); ";
   $sql.=BRtag;
   return $sql;
}

function getValidString($inputString)
{
   $inputString = stripslashes($inputString);
   $inputString = ereg_replace("'","&#8217;", $inputString);
   return $inputString;
}

function getCapitalisedName($name, $isSurname=null)
{
   // remove space
   if($isSurname)
      $name = ereg_replace(" ","", $name);
   // first make it lower case
   $name=strtolower($name);

   $realname = "";
   // okay, let's get the names cap'ed correctly...
   $startat = 0; // these vars are used for substring pulling $stoplen = 0;
   // parse 1, find funny chars and cap after them 
   for ($i = 0; $i < strlen($name); $i++) {
      $ltr = substr($name, $i, 1); // pull out letter i of name
      $stoplen = $i - $startat;  // set the stop point for substring
      // if current letter is a marker
      if ($ltr == "_" | $ltr == "-" | $ltr == "'") {  
         // add substring
         $realname .= ucfirst(substr($name, $startat, $stoplen));  
         $startat = $i + 1;  // set new start point for substring
      }
      if ($ltr == "_") {  // if space, add space
         $realname .= " ";
      }
      elseif ($ltr == "-") { // if dash, add dash
         $realname .= "-";
      }
      elseif ($ltr == "'") {
         $realname .= "'";
      }
   }
   // the last name won't be added in parse 1,
   // this piece adds the last name AFTER checking and capping for Mac/Mc
   // so this is essentially pass 2 
   $lastname = substr($name, $startat, $stoplen + 1); // find Mac/Mc $maclen = 0; // we set this to zero to make it easier to check for found 
   if (strstr($lastname, "mc") != false)
   {  // if Mc is found...
      $maclen = 2;
   }
   elseif (strstr($lastname, "mac") != false) {  // if Mac is found
      $maclen = 3;
   }
   if ($maclen > 0) {  // add the MacSomething with proper capitalization
      $realname .= ucfirst(substr($lastname, 0, $maclen));
      $realname .= ucfirst(substr($lastname, $maclen, strlen($lastname)));
   } else { // if we can't find Mac/Mc, just add the last name...
      $realname .= ucfirst($lastname);
   }
   return $realname;
}

function getPhoneNumberFormatted($tempPhone)
{
   // remove all unnecessary chars
   $tempPhone = ereg_replace(" ","", $tempPhone);
   $tempPhone = ereg_replace("-","", $tempPhone);

   if($tempPhone=='' || $tempPhone=='n/a')
      return '';
   
   if(substr($tempPhone, 0, 1)=='0')
   {
      if(substr($tempPhone, 1, 1)=='4')   // assume this is mobile number
      {
         $temp1 = substr($tempPhone, 0, 4);
         $temp2 = substr($tempPhone, 4, 3);
         $temp3 = substr($tempPhone, 7, 3);
         return $temp1.' '.$temp2.' '.$temp3;
      }
      else  // assume this is area code
      {
         $temp1 = substr($tempPhone, 0, 2);
         $temp2 = substr($tempPhone, 2, 4);
         $temp3 = substr($tempPhone, 6, 4);
         return '('.$temp1.') '.$temp2.'-'.$temp3;
      }
   }
   else     // assume phone number is without area code
   {
      $temp1 = substr($tempPhone, 0, 4);
      $temp2 = substr($tempPhone, 4, 4);
      return '(03) '.$temp1.'-'.$temp2;      
   }
}

function getMedicalNumberFormatted($tempMedNumber)
{
   $tempMedNumber = ereg_replace(" ","", $tempMedNumber);

   if($tempMedNumber=='')
      return '';

   $temp1 = substr($tempMedNumber, 0, 4);
   $temp2 = substr($tempMedNumber, 4, 5);
   $temp3 = substr($tempMedNumber, 9, 1);
   $temp4 = substr($tempMedNumber, 10, 1);
   return $temp1.' '.$temp2.' '.$temp3.' '.$temp4;
}

function getEmailAddress($pID)
{
   global $db_aj2007;   

   $sqlEmail = "SELECT Email, ParentEmail, GroupID FROM participant WHERE participantID=$pID;";
   $result = mysql_fetch_object(mysql_query($sqlEmail, $db_aj2007));

   $groupContact = getGroupContact($result->GroupID);
   $glEmail = $groupContact["Email"];


   if ($result->ParentEmail!='' && $result->ParentEmail!=null)
      return getValidString($result->ParentEmail);
   else if ($result->Email!='' && $result->Email!=null)
      return getValidString($result->Email);
   else if ($glEmail && $glEmail!='')
      return getValidString($glEmail);
   else
      return 'viccon@vicscouts.asn.au';
}

function getContactNumber($pID)
{
   global $db_aj2007;   

   $sqlEmail = "SELECT Mobile, HomePhone, WorkPhone FROM participant WHERE participantID=$pID;";
   $result = mysql_fetch_object(mysql_query($sqlEmail, $db_aj2007));

   if ($result->HomePhone!='' && $result->HomePhone!=null)
      return getPhoneNumberFormatted($result->HomePhone);
   else if ($result->Mobile!='' && $result->Mobile!=null)
      return getPhoneNumberFormatted($result->Mobile);
   else if ($result->WorkPhone!='' && $result->WorkPhone!=null)
      return getPhoneNumberFormatted($result->WorkPhone);
   else
      return '';

}

/**
 * This is the function to run SQL to NSW sql server
 * To stop running, comment execution line out
 */
function runSqlNSW($arrSQL)
{
   global $db_aj2007;
   $arrResult = array();
   foreach($arrSQL as $strSql)
   {
      $strSql = ereg_replace("<br>","\n", $strSql);
      $objNSW = new NSW_DB_connect();

      // execution line
      $arrResult[] = $objNSW->runSQL($strSql);

      insertLog($db_aj2007, $strSql);
   }

   return $arrResult;
}

?>