<?php

/**
* This is to add records into tblParticipant.
* participant, directfamilymember and activityauthority details will be added
* This function effects to ONE participant at one call
*/
function updateTable_participant($pID, $arrChange)
{
   global $listTblParticipant;
   global $listTblMedicalDetails;
   $isNewRecord = false;
   $sql = "";
   $tempNSWPID = getPID($pID);
   $changeEmail = false;
   $haveRegDate=false;

   if(restrictedMember($pID))
      return "";

   foreach($arrChange as $arrItem)
   {
      if ($arrItem["Field"]==VIC_PID)
         $isNewRecord = true;

      // First insert is related to participant, directfamilymember and 
      if($isNewRecord && $tempNSWPID==null)
      {   
         $tempGID   = getGID_usingParticipantID($pID);
         $vicValues = getValueFor_tblParticipant($pID);

         $sql.= getInsertStatement($vicValues, "tblParticipant", $listTblParticipant, array('GID'=>$tempGID, 'BID'=>BID, 'SID'=>SID, 'PostalSID'=>SID), $pID);
         $sql.= BRtag;

         return $sql;         
      }
      else  // This is run after we receive the key
            // Also if the member already exists, we save our data into theirs
      {

         foreach($listTblParticipant as $nswValue=>$vicValue)
         {
            if($vicValue["Field"]==$arrItem["Field"] && $vicValue["Table"]=="p")
            {
               if ($sql!="") $sql.=", ";

               $sql.=$nswValue."=";

               if ($vicValue['Field']=='RegDate')
                  $haveRegDate=true;

               if ($vicValue['Field']=='Surname')
                  $sql.="'".getCapitalisedName(getValidString($arrItem["NewValue"]), true)."'";
               else if ($vicValue['Field']=='Firstname' || $vicValue['Field']=='PreferedName' || $vicValue['Field']=='HomeSuburb' || $vicValue['Field']=='PostalSuburb')
                  $sql.="'".ucwords(getCapitalisedName(getValidString($arrItem["NewValue"]), false))."'";
               else if ($nswValue=="Phone")
                  $sql.="'".getContactNumber($pID)."'";
               else if ($nswValue=="PhoneWork" || $nswValue=="PhoneMobile")
                  $sql.="'".getPhoneNumberFormatted($arrItem["NewValue"])."'";
               else if ($nswValue=="Email")
                  $sql.="'".getValidString(getEmailAddress($pID))."'";
               else if ($vicValue['Type']=="Text")
                  $sql.="'".getValidString($arrItem["NewValue"])."'";
               else if ($vicValue['Type']=="Date")
                  $sql.="'".$arrItem["NewValue"]."'";
               else
                  $sql.=$arrItem["NewValue"];
               break;
            }

            if ($arrItem["Field"]=='GroupName')
            {
               $newGID = getGID($arrItem["NewValue"]);

               if($newGID!=null && $newGID!='')
               {
                  if ($sql!="") $sql.=", ";
                  $sql.="GID=".$newGID;
               }
               break;
            }
            if (!$haveChangedEmail && ($arrItem["Field"]=='Email' || $arrItem["Field"]=='ParentEmail'))
            {
               if ($sql!="") $sql.=", ";
               $sql.="Email='".getValidString(getEmailAddress($pID))."'";
               $haveChangedEmail = true;
               break;
            }
         }
      }   
   }

   if($sql=="")
      return "";

   if(!$haveRegDate)
   {
      if ($sql!="") $sql.=", ";
      $sql.="LastUpdate='".date("Y-m-d",strtotime("today"))."'";
   }
   $sql = "UPDATE tblParticipant SET ".$sql." WHERE PID=".$tempNSWPID."; ";
   $sql.= BRtag;
   $sql.=BRtag;
   return $sql;
}

function updateTable_participantmedicaldetails2($pID, $arrChange)
{
   global $listTblMedicalDetails;
   $sql = "";

   // GET PID
   $tempNSWPID = getPID($pID);
   if($tempNSWPID=="")
      return "";

   $tempMDID = getMDID($tempNSWPID);

   // Member who have PID but not MDID
   if (trim($tempMDID)=='' || $tempMDID==null)
   {
      $vicMedicalValues = getValueFor_tblMedicalDetails($pID);
      $sql = getInsertStatement($vicMedicalValues, "tblMedicalDetails", $listTblMedicalDetails);
      $sql.="UPDATE tblParticipant SET MDID=(SELECT MAX(MDID) FROM tblMedicalDetails) WHERE PID=".$tempNSWPID.";";
      $sql.=BRtag;
      $sql.=BRtag;
      return $sql;
   }
   else
   {
      foreach($arrChange as $arrItem)
      {
         foreach($listTblMedicalDetails as $nswValue=>$vicValue)
         {
            if($vicValue["Field"]==$arrItem["Field"] && $vicValue["Table"]=="pm")
            {
               if ($sql!="") $sql.=", ";
               $sql.=$nswValue."=";

               if ($nswValue=="MedicareNumber")
                  $sql.="'".getMedicalNumberFormatted(getValidString($arrItem["NewValue"]))."'";
               else if ($vicValue['Type']=="Text")
                  $sql.="'".getValidString($arrItem["NewValue"])."'";
               else if ($vicValue['Type']=="Date")
                  $sql.="'".$arrItem["NewValue"]."'";
               else
                  $sql.=$arrItem["NewValue"];
               break;
            }
         }
      }
   
      if($sql=="")
         return "";
      $sql = "UPDATE tblMedicalDetails SET ".$sql." WHERE MDID=".$tempMDID."; ";
      $sql.= BRtag;
      return $sql;
   }
}

/**
* activityautority records are stored in tblParticipant
* So this function is only to updating purpose
*/
function updateTable_activityauthority($pID, $arrChange)
{
   global $listTblParticipant;
   $sql = "";

   // GET PID
   $tempNSWPID = getPID($pID);
   if($tempNSWPID=="")
      return "";

   foreach($arrChange as $arrItem)
   {
      if ($arrItem["Field"]==VIC_PID)
         $isNewRecord = true;

      foreach($listTblParticipant as $nswValue=>$vicValue)
      {
         if($vicValue["Field"]==$arrItem["Field"] && $vicValue["Table"]=="aa")
         {
            if ($sql!="") $sql.=", ";
            $sql.=$nswValue."=";

            if ($vicValue['Type']=="Text")
            {
               if ($arrItem["NewValue"]=='N' || $arrItem["NewValue"]=='')
                  $sql.="'N'";
               else
                  $sql.="'".getValidString($arrItem["NewValue"])."'";
            }
            break;
         }
      }
   }
   if($sql=="")
      return "";

   $sql = "UPDATE tblParticipant SET ".$sql." WHERE PID=".$tempNSWPID."; ";
   $sql.= BRtag;
   return $sql;
}

function updateTable_adultcertificateheld($pID, $arrChange)
{
   global $listCertificate;
   $sql = "";

   // GET PID
   $tempNSWPID = getPID($pID);
   if($tempNSWPID=="")
      return "";

   foreach($arrChange as $arrItem)
   {
      if ($arrItem["Field"]==VIC_PID)
         $isNewRecord = true;

      foreach($listCertificate as $vicFieldName=>$nswKey)
      {
         if($vicFieldName==$arrItem["Field"])
         {
            if($arrItem["NewValue"]=='Y')
            {
               $sql.="INSERT INTO tblParticipantCertificate (PID, CID) VALUES";
               $sql.="(".$tempNSWPID.", ".$nswKey['CID'].");";
               $sql.=BRtag;
            }
            else if (($arrItem["NewValue"]=='N' || $arrItem["NewValue"]=='')
                     && !$isNewRecord)
            {
               $sql.="DELETE FROM tblParticipantCertificate ";
               $sql.="WHERE PID=$tempNSWPID AND CID=".$nswKey['CID'].";";
               $sql.=BRtag;
            }
            break;
         }
      }
   }
   if($sql=="")
      return "";
   else
      return $sql;
}

function updateTable_adultdetail($pID, $arrChange)
{
   global $listLeader;
   
   $isNewRecord = false;
   $sql = "";

   $tempNSWPID = getPID($pID);
   if($tempNSWPID=="")
      return "";

   $tempLID = getLID($tempNSWPID);

   foreach($arrChange as $arrItem)
   {
      if ($arrItem["Field"]==VIC_PID)
         $isNewRecord = true;

      // First insert is related to participant, directfamilymember, 
      if($isNewRecord && (!$tempLID || $tempLID==null))
      {         
         $tempAPID = getApID($pID);
         $vicValues = getValueFor_tblLeader($pID);
         $sql.= getInsertStatement($vicValues, "tblLeader", $listLeader, array('PID'=>$tempNSWPID, 'ApID'=>$tempAPID));
         return $sql;
      }
      else  // This is implemented after we receive the key
      {
         foreach($listLeader as $nswValue=>$vicValue)
         {
            if($vicValue["Field"]==$arrItem["Field"] && $vicValue["Table"]=="ad")
            {
               if ($sql!="") $sql.=", ";
               $sql.=$nswValue."=";

               if ($vicValue['Type']=="Text")
                  $sql.="'".getValidString($arrItem["NewValue"])."'";
               else if ($vicValue['Type']=="Date")
                  $sql.="'".$arrItem["NewValue"]."'";
               else
                  $sql.=$arrItem["NewValue"];
               break;
            }
            else if($arrItem["Field"]=="ScoutAppointment")
            {
               $tempApID = getApID($pID);
               if($tempApID!='')
               {
                  if ($sql!="") $sql.=", ";
                  $sql.="ApID=".$tempApID;
               }
               break;
            }
         }
      }   
   }

   if($sql=="")
      return "";

   $sql = "UPDATE tblLeader SET ".$sql." WHERE LID=".$tempLID."; ";
   $sql.= BRtag;
   return $sql;
}

// Not import any data as not match...
function updateTable_adultexperience($pID, $arrChange)
{
   return "";
}

function updateTable_adultskill($pID, $arrChange)
{
   global $listSkills;
   $sql = "";

   // GET PID
   $tempNSWPID = getPID($pID);
   if($tempNSWPID=="")
      return "";

   // Get Max Skill Index
   $existMaxIndex = getMaxSkillIndex($tempNSWPID);
   if($existMaxIndex)
      $tempSkillIndex = $existMaxIndex+1;
   else
      $tempSkillIndex = 0;

   $haveDriverRecord = false;
   $haveInterpretRecord = false;
   $haveOtherRecord = false;
   $deletingDriverRecord = false;
   $deletingInterpretRecord = false;
   $deletingOtherRecord = false;


   foreach($arrChange as $arrItem)
   {
      if ($arrItem["Field"]==VIC_PID)
         $isNewRecord = true;
      
      foreach($listSkills as $vicFieldName=>$nswKey)
      {
         if($vicFieldName==$arrItem["Field"])
         {
            // Add new records
            if($arrItem["NewValue"]=='Y')
            {
               // Check if it is either DriversLicence, Interpreter and OtherDetail
               // if so, set flag Text.
               if($arrItem["Field"]=="DriversLicence")
               {
                  $tempOtherText = "DRIVERLICENCEDETAIL";
                  $haveDriverRecord = true;
               }
               else if($arrItem["Field"]=="Interpreter")
               {
                  $tempOtherText = "INTERPRETERDETAIL";
                  $haveInterpretRecord = true;
               }
               else if($arrItem["Field"]=="Other")
               {
                  $tempOtherText = "OTHERDETAIL";
                  $haveOtherRecord = true;
               }
               else
                  $tempOtherText = "";

               // Set insert Text
               $sql.="INSERT INTO tblParticipantSkill (PID, SID, SkillIndex, ";
               $sql.="OtherText) VALUES";
               $sql.="(".$tempNSWPID.", ".$nswKey['SID'].", ".$tempSkillIndex;
               $sql.=", '".$tempOtherText."');";
               $sql.=BRtag;
               $tempSkillIndex++;
               break;
            }
            else if (($arrItem["NewValue"]=='N' || $arrItem["NewValue"]=='')
                     && !$isNewRecord) // Delete value
            {
               if($arrItem["Field"]=="DriversLicence")
                  $deletingDriverRecord = true;
               else if($arrItem["Field"]=="Interpreter")
                  $deletingInterpretRecord = true;
               else if($arrItem["Field"]=="Other")
                  $deletingOtherRecord = true;

               $sql.="DELETE FROM tblParticipantSkill ";
               $sql.="WHERE PID=$tempNSWPID AND SID=".$nswKey['SID'].";";
               $sql.=BRtag;
            }
         }
      }

      if ($arrItem["Field"]=="Comments")
      {
         if($haveOtherRecord)
            $validOtherComment=$arrItem["NewValue"];
         else if (!$deletingOtherRecord && $arrItem["NewValue"]!='')
         {
            // This is the case when Comments is changed not selection
            $sql.="UPDATE tblParticipantSkill SET OtherText='".getValidString($arrItem["NewValue"]);
            $sql.="' WHERE PID=$tempNSWPID AND SID=20;";
            $sql.=BRtag;
         }
      }
      else if ($arrItem["Field"]=="DriversLicenceClass")
      {
         if($haveDriverRecord)
            $validDriverComment=$arrItem["NewValue"];
         else if (!$deletingDriverRecord && $arrItem["NewValue"]!='')
         {
            // This is the case when DriverLicenceClass is changed not selection
            $sql.="UPDATE tblParticipantSkill SET OtherText='".getValidString($arrItem["NewValue"]);
            $sql.="' WHERE PID=$tempNSWPID AND SID=4;";
            $sql.=BRtag;
         }
      }
      else if ($arrItem["Field"]=="InterpreterLanguage")
      {
         if($haveInterpretRecord)
            $validInterComment=$arrItem["NewValue"];
         else if (!$deletingInterpretRecord && $arrItem["NewValue"]!='')
         {
            // This is the case when InterpreterLanguage is changed not selection
            $sql.="UPDATE tblParticipantSkill SET OtherText='".getValidString($arrItem["NewValue"]);
            $sql.="' WHERE PID=$tempNSWPID AND SID=7;";
            $sql.=BRtag;
         }
      }
   }

   $sql = ereg_replace("DRIVERLICENCEDETAIL", getValidString($validDriverComment), $sql);
   $sql = ereg_replace("INTERPRETERDETAIL", getValidString($validInterComment), $sql);
   $sql = ereg_replace("OTHERDETAIL", getValidString($validOtherComment), $sql);

   if($sql=="")
      return "";
   else
      return $sql;
}

function updateTable_adultworkpreference($pID, $arrChange)
{
   global $listJobPreference;
   global $db_aj2007;

   $sql = "";
   $tempSqlJID = null;
   $tempSqlLevel = null;
   $tempSqlOtherText = "";
   // GET PID
   $tempNSWPID = getPID($pID);
   if($tempNSWPID=="")
      return "";

   foreach($arrChange as $arrItem)
   {
      if ($arrItem["Field"]==VIC_PID)
         $isInsert = true;         
      
      if($isInsert)
      {
         if($arrItem["Field"]=="WorkName")
         {
            $tempSqlJID = $listJobPreference[$arrItem["NewValue"]]["JID"];
            if($tempSqlJID==null)
            {
               $tempSqlJID = OtherJobJID;
               $tempSqlOtherText = $arrItem["NewValue"];
            }
         }
         else if($arrItem["Field"]=="LevelOfPreference")
            $tempSqlLevel=$arrItem["NewValue"];

         if($tempSqlJID!=null && $tempSqlLevel!=null)
         {
            $tempSqlLevel--;
            $sql.= "INSERT INTO tblParticipantJobPref VALUES ";
            $sql.= "($tempNSWPID, $tempSqlJID, $tempSqlLevel, '$tempSqlOtherText');";
            $sql.= BRtag;
            $isInsert=false;
         }
      }
      else
      {
         if($arrItem["Field"]=="WorkName")
         {
            $tempSqlJID = $listJobPreference[$arrItem["NewValue"]]["JID"];
            if($tempSqlJID==null)
            {
               $tempSqlJID = OtherJobJID;
               $tempSqlOtherText = $arrItem["NewValue"];
            }

            $tempSearchPrefSQL = 
            "SELECT LevelOfPreference FROM adultworkpreference WHERE ParticipantID='".$pID."' AND WorkName='".$arrItem["NewValue"]."'";
            $tempSqlLevel = mysql_fetch_object(mysql_query($tempSearchPrefSQL, $db_aj2007));
            $tempSqlLevel = $tempSqlLevel->LevelOfPreference;
            if($tempSqlLevel)
            {
               $tempSqlLevel--;
               $sql.= "UPDATE tblParticipantJobPref SET JID=".$tempSqlJID.", ";
               $sql.= "OtherText='".$tempSqlOtherText."' WHERE PID=".$tempNSWPID." ";
               $sql.= "AND Preference=".$tempSqlLevel.";";
               $sql.= BRtag;
            }
         }
      }
   }

   if($sql=="")
      return "";
   else
      return $sql;
}

function updateTable_directfamilymember($arrChange)
{
   global $db_aj2007;
   $sql="";
   $sqlSub="";

   foreach($arrChange as $pID=>$arrChangeSub)
   {
      $tempNSWPID = getPID($pID);
      if($tempNSWPID=="")
         continue;

      $sqlSelect = "SELECT * FROM directfamilymember WHERE ParticipantID=";
      $sqlSelect.= "'$pID' ORDER BY OrderIndex";
      $result = mysql_query($sqlSelect, $db_aj2007);
      $familyNote = "";
      while($tempRow = mysql_fetch_object($result))
      {
         $familyNote.=$tempRow->FamilyMemberName." (".$tempRow->FamilyMemberRelation.") ";
      }
      if($familyNote=="")
         $sqlSub.="UPDATE tblParticipant SET FamilyAtJamboree='N', FamilyNotes='' WHERE PID=$tempNSWPID; ".BRtag;
      else
         $sqlSub.="UPDATE tblParticipant SET FamilyAtJamboree='Y', FamilyNotes='".getValidString($familyNote)."' WHERE PID=$tempNSWPID; ".BRtag;
   }
   return $sqlSub;
}

function updateTable_emergencycontact($arrChange)
{
   global $db_aj2007;
   $sql="";
   $sqlSub="";
   foreach($arrChange as $pID=>$arrChangeSub)
   {
      $tempCondition="AND Contact_Index NOT IN (SELECT Contact_Index FROM sn_emergencycontact WHERE participantid='$pID')";
      $tempNSWPID = getPID($pID);
      if($tempNSWPID=="")
         continue;

      $haveUpdate = false;

      $numFields = count(getFields('emergencycontact'));
      // For one member
      foreach ($arrChangeSub as $arrChangeSubSub)
      {
         if($numFields>count($arrChangeSubSub))
         {
            $sqlSub.="DELETE FROM tblEmergencyContact WHERE PID=$tempNSWPID;".BRtag;
            $tempCondition="";
         }
      }

      $sqlSelect = "SELECT * FROM emergencycontact WHERE ParticipantID=";
      $sqlSelect.= "'$pID' ".$tempCondition;
      $result = mysql_query($sqlSelect, $db_aj2007);

      while($tempRow = mysql_fetch_object($result))
      {
         $sqlSub.="INSERT INTO tblEmergencyContact (SID, PID, Surname, GivenName, ";
         $sqlSub.="Relationship, Address, Suburb, PostCode, PhoneHome, PhoneWork, ";
         $sqlSub.="PhoneMobile) VALUES ";
         $sqlSub.="(".SID.", ".$tempNSWPID.", '".ucwords(getCapitalisedName(getValidString(($tempRow->Surname), true)))."', '";
         $sqlSub.=ucwords(getCapitalisedName(getValidString($tempRow->Firstname)))."', '";
         $sqlSub.=getValidString($tempRow->RelationshipToParticipant);
         $sqlSub.="', '".ucwords(getCapitalisedName(getValidString($tempRow->Address)))."', '".ucwords(getCapitalisedName(getValidString($tempRow->Suburb)))."', '";
         $sqlSub.=$tempRow->Postcode."', '".getPhoneNumberFormatted($tempRow->Homephone)."', '";
         $sqlSub.=getPhoneNumberFormatted($tempRow->Workphone)."', '".getPhoneNumberFormatted($tempRow->Mobilephone)."');".BRtag;
      }
   }

   return $sqlSub;
}

// Leave it for the moment as we do not store INDEX
function updateTable_leaderactivities($pID, $arrChange)
{
   //var_dump($pID, $arrChange);
   //print('<br>');

   //return "one change found<br>";
   return "";
}

function updateTable_participantallergy($pID, $arrChange)
{
   global $listAllergy;
   $sql = "";

   // GET PID
   $tempNSWPID = getPID($pID);
   if($tempNSWPID=="")
      return "";

   foreach($arrChange as $arrItem)
   {
      $validCommend = "";
      if ($arrItem["Field"]==VIC_PID)
         $isNewRecord = true;

      foreach($listAllergy as $vicFieldName=>$nswKey)
      {
         if($vicFieldName==$arrItem["Field"])
         {
            if($arrItem["NewValue"]=='Y')
            {
               $sql.="INSERT INTO tblParticipantAllergies (PID, ALID, AllergyDetails) VALUES";
               $sql.="(".$tempNSWPID.", ".$nswKey['ALID'].", 'TEXTFORALLERGYDETAIL');";
               $sql.=BRtag;
            }
            else if (($arrItem["NewValue"]=='N' || $arrItem["NewValue"]=='')
                     && !$isNewRecord)
            {
               $sql.="DELETE FROM tblParticipantAllergies ";
               $sql.="WHERE PID=$tempNSWPID AND ALID=".$nswKey['ALID'].";";
               $sql.=BRtag;
            }
            break;
         }
         if($arrItem["Field"]=='Comment' && $arrItem["NewValue"]!="")
            $validComment = $arrItem["NewValue"];
      }
   }
   $sql = ereg_replace("TEXTFORALLERGYDETAIL", getValidString($validComment), $sql);

   if($sql=="")
      return "";
   else
      return $sql;
}

// leave it for the moment. 
function updateTable_participantdietary($pID, $arrChange)
{
   global $listDietary;
   global $db_aj2007;
   $sql = "";
   // GET PID
   $tempNSWPID = getPID($pID);
   if($tempNSWPID=="")
      return "";

   $haveOther = false;
   $haveVegi = false;

   foreach($arrChange as $arrItem)
   {
      if ($arrItem["Field"]==VIC_PID)
         $isNewRecord = true;

      foreach($listDietary as $vicFieldName=>$nswKey)
      {
         if($vicFieldName==$arrItem["Field"])
         {
            if($arrItem["NewValue"]=='Y')
            {
               if($vicFieldName=="SpecificFood" || $vicFieldName=="OtherHealth" || $vicFieldName=="OtherReligious" || $vicFieldName=="Celiac" || $vicFieldName=="Halal" || $vicFieldName=="LactoseFree")
                  $haveOther=true;
               else if ($vicFieldName=="Vegan" || $vicFieldName=="Vegetarian")
                  $haveVegi=true;
               else
               {
                  $sql.="INSERT INTO tblParticipantDiet (DID, PID, OtherText) VALUES ";
                  $sql.="(".$nswKey['DID'].", $tempNSWPID, ''); ";
                  $sql.=BRtag;
               }
            }
            else if (($arrItem["NewValue"]=='N' || $arrItem["NewValue"]=='')
                     && !$isNewRecord)
            {
               if($vicFieldName=="SpecificFood" || $vicFieldName=="OtherHealth" || $vicFieldName=="OtherReligious" || $vicFieldName=="Celiac" || $vicFieldName=="Halal" || $vicFieldName=="LactoseFree")
                  $haveOther=true;
               else if ($vicFieldName=="Vegan" || $vicFieldName=="Vegetarian")
                  $haveVegi=true;
               else
               {
                  // Implementing after first initial db transfer is done
                  $sql.="DELETE FROM tblParticipantMedCond ";
                  $sql.="WHERE PID=$tempNSWPID AND MCID=".$nswKey['MCID']."; ";
                  $sql.=BRtag;
               }
            }
            break;
         }

         if($arrItem["Field"]=='Comments' && $arrItem["NewValue"]!="")
            $validComment = "(".$arrItem["NewValue"].")";
      }
   }

   if ($haveOther)
   {
      $tempComment = "";
      $sql.="DELETE FROM tblParticipantDiet WHERE DID=17 AND PID=$tempNSWPID;";
      $sql.=BRtag;

      $tempOtherSQL = "SELECT SpecificFood, OtherHealth, OtherReligious, Celiac, Halal, LactoseFree, Comments FROM participantdietary WHERE participantid='$pID';";
      $tempOtherResult = mysql_fetch_object(mysql_query($tempOtherSQL, $db_aj2007));

      if($tempOtherResult->SpecificFood=='Y')
         $tempComment.="SpecificFood, ";
      if($tempOtherResult->OtherHealth=='Y')
         $tempComment.="OtherHealth, ";
      if($tempOtherResult->OtherReligious=='Y')
         $tempComment.="OtherReligious, ";
      if($tempOtherResult->Celiac=='Y')
         $tempComment.="Celiac, ";
      if($tempOtherResult->Halal=='Y')
         $tempComment.="Halal, ";
      if($tempOtherResult->LactoseFree=='Y')
         $tempComment.="LactoseFree, ";

      if($tempOtherResult->Comments!="")
         $tempComment.="(".getValidString($tempOtherResult->Comments).")";

      if($tempComment!='')
      {
         $sql.="INSERT INTO tblParticipantDiet (DID, PID, OtherText) VALUES ";
         $sql.="(17, $tempNSWPID, '".$tempComment."'); ";
         $sql.=BRtag;
      }
   }

   if ($haveVegi)
   {
      $tempComment = "";
      $sql.="DELETE FROM tblParticipantDiet WHERE DID=7 AND PID=$tempNSWPID;";
      $sql.=BRtag;

      $tempOtherSQL = "SELECT Vegetarian, Vegan FROM participantdietary WHERE participantid='$pID';";
      $tempOtherResult = mysql_fetch_object(mysql_query($tempOtherSQL, $db_aj2007));

      if($tempOtherResult->Vegetarian=='Y')
         $tempComment.="Vegetarian, ";
      if($tempOtherResult->Vegan=='Y')
         $tempComment.="Vegan, ";

      if($tempComment!='')
      {
         $sql.="INSERT INTO tblParticipantDiet (DID, PID, OtherText) VALUES ";
         $sql.="(7, $tempNSWPID, '".getValidString($tempComment)."'); ";
         $sql.=BRtag;
      }
   }

   if($sql=="")
      return "";
   else
      return $sql;
}

function updateTable_participantmedicalaid($pID, $arrChange)
{
   global $listMedicalAids;
   $sql = "";
   // GET PID
   $tempNSWPID = getPID($pID);
   if($tempNSWPID=="")
      return "";

   $validCommend = "";

   foreach($arrChange as $arrItem)
   {
      if ($arrItem["Field"]==VIC_PID)
         $isNewRecord = true;

      foreach($listMedicalAids as $vicFieldName=>$nswKey)
      {
         if($vicFieldName==$arrItem["Field"])
         {
            if($arrItem["NewValue"]=='Y')
            {
               $sql.="INSERT INTO tblParticipantMedicalAids (PID, MAID, AidDescription, ExtraDetails) VALUES ";
               $sql.="(".$tempNSWPID.", ".$nswKey['MAID'].", 'TEXTFORMDDETAIL', 'TEXTFORMDEXTRADETAIL');";
               $sql.=BRtag;
            }
            else if (($arrItem["NewValue"]=='N' || $arrItem["NewValue"]=='')
                     && !$isNewRecord)
            {
               $sql.="DELETE FROM tblParticipantMedicalAids ";
               $sql.="WHERE PID=$tempNSWPID AND MAID=".$nswKey['MAID']."; ";
               $sql.=BRtag;
            }
            break;
         }

         if($arrItem["Field"]=='Comments' && $arrItem["NewValue"]!="")
            $validComment = $arrItem["NewValue"];
      }
   }
   if(strlen($validComment)>50)
   {
      $sql = ereg_replace("TEXTFORMDDETAIL", "", $sql);
      $sql = ereg_replace("TEXTFORMDEXTRADETAIL", getValidString($validComment), $sql);
   }
   else
   {
      $sql = ereg_replace("TEXTFORMDDETAIL", getValidString($validComment), $sql);
      $sql = ereg_replace("TEXTFORMDEXTRADETAIL", "", $sql);
   }
      
   if($sql=="")
      return "";
   else
      return $sql;
}

function updateTable_participantmedicalalert($pID, $arrChange)
{
   global $db_aj2007;
   $sql = "";
   // GET PID
   $tempNSWPID = getPID($pID);
   if($tempNSWPID=="")
      return "";

   $arrNewValue = array();

   $validCommend = "";

   foreach($arrChange as $arrItem)
   {
      if ($arrItem["Field"]==VIC_PID)
         $isNewRecord = true;
      $arrNewValue[$arrItem['Field']]=$arrItem['NewValue'];
   }

   if($isNewRecord)
   {
      $sql.= "INSERT INTO tblMedicalBracelet (PID, Details, Style) VALUES ";
      $sql.= "($tempNSWPID, '";

      if($arrNewValue["MedicalAlertType"]=="Both")
         $sql.= "OR NECKLACE. ".getValidString($arrNewValue["MedicalAlertDetails"])."', 'Bracelet')";
      else
         $sql.= getValidString($arrNewValue["MedicalAlertDetails"])."', '".$arrNewValue["MedicalAlertType"]."')";      
      $sql.= "; ";
      $sql.=BRtag;
   }
   else
   {
      $tempSelectSQL = "SELECT * FROM participantmedicalalert WHERE ParticipantID='$pID'";
      $result = mysql_fetch_object(mysql_query($tempSelectSQL, $db_aj2007));

      if($result)
      {
         $sql.= "UPDATE tblMedicalBracelet SET ";
         if($result->MedicalAlertType=="Both")
            $sql.= "Details='OR NECKLACE. ".getValidString($result->MedicalAlertDetails)."', Style='Bracelet' ";
         else
            $sql.= "Details='".getValidString($result->MedicalAlertDetails)."', Style='".$result->MedicalAlertType."' ";
         $sql.= "WHERE PID=$tempNSWPID;";
      }
   }
   
   if($sql=="")
      return "";
   else
      return $sql;
}

function updateTable_participantmedicalcondition($pID, $arrChange)
{
   global $listMedicalConditions;

   $sql = "";
   // GET PID
   $tempNSWPID = getPID($pID);
   if($tempNSWPID=="")
      return "";
   $validCommend = "";
   $haveInsert=false;
   $haveOther    = false;
   
   foreach($arrChange as $arrItem)
   {
      if ($arrItem["Field"]==VIC_PID)
         $isNewRecord = true;

      foreach($listMedicalConditions as $vicFieldName=>$nswKey)
      {
         if($vicFieldName==$arrItem["Field"])
         {
            if($arrItem["NewValue"]=='Y')
            {            
               if(is_numeric($nswKey['MCID']))
               {
                  $sql.="INSERT INTO tblParticipantMedCond (PID, MCID, OtherText) VALUES ";
                  $sql.="(".$tempNSWPID.", ".$nswKey['MCID'].", 'TEXTFORMCDETAIL');";
                  $sql.=BRtag;
               }
               else // Epilepsy, Urinary problems
               {
                  $IDs = splitStrings($nswKey['MCID'], ',');
                  foreach ($IDs as $tempID)
                  {
                     $sql.="INSERT INTO tblParticipantMedCond (PID, MCID, OtherText) VALUES ";
                     $sql.="(".$tempNSWPID.", ".$tempID.", 'TEXTFORMCDETAIL');";
                     $sql.=BRtag;
                  }
               }               
               $haveInsert=true;
            }
            else if (($arrItem["NewValue"]=='N' || $arrItem["NewValue"]=='')
                     && !$isNewRecord)
            {
               $sql.="DELETE FROM tblParticipantMedCond ";
               $sql.="WHERE PID=$tempNSWPID AND ";

               if(is_numeric($nswKey['MCID']))
                  $sql.=" MCID=".$nswKey['MCID']."; ";
               else
               {
                  $IDs = splitStrings($nswKey['MCID'], ',');
                  $otherCondition = "";
                  foreach ($IDs as $tempID)
                  {
                     if ($otherCondition=='')
                        $otherCondition.=" (MCID=$tempID ";
                     else
                        $otherCondition.=" OR MCID=$tempID";
                  }
                  $otherCondition.="); ";
                  $sql.=$otherCondition;
               }
               $sql.=BRtag;
            }
            break;
         }

         if($arrItem["Field"]=='Comments' && $arrItem["NewValue"]!="")
            $validComment = $arrItem["NewValue"];
      }
   }

   if($validComment!='' && !$haveInsert)
   {
      $sql.="DELETE FROM tblParticipantMedCond ";
      $sql.="WHERE PID=$tempNSWPID AND MCID=18; ";
      $sql.=BRtag;
      $sql.=BRtag;
      $sql.="INSERT INTO tblParticipantMedCond (PID, MCID, OtherText) VALUES ";
      $sql.="(".$tempNSWPID.", 18, 'TEXTFORMCDETAIL'); ";
      $sql.=BRtag;
      $sql.=BRtag;
   }

   $sql = ereg_replace("TEXTFORMCDETAIL", getValidString($validComment), $sql);

   if($sql=="")
      return "";
   else
      return $sql;
}

function updateTable_participantprivatehealthfund($arrChange)
{
   global $db_aj2007;
   $sql="";
   $sqlSub="";

   foreach($arrChange as $pID=>$arrChangeSub)
   {
      $tempNSWPID = getPID($pID);
      if($tempNSWPID=="")
         continue;
      $tempNSWMDID = getMDID($tempNSWPID);
      if($tempNSWMDID=="")
         continue;

      $sqlSelect = "SELECT participantid, max(medicalfund) as MedicalFund, PrivateFundNumber FROM participantprivatehealthfund WHERE participantid='$pID' group by participantid";
      $result = mysql_fetch_object(mysql_query($sqlSelect, $db_aj2007));

      $sqlSub.="UPDATE tblMedicalDetails SET FundName='".$result->MedicalFund."', FundNumber='".getValidString($result->PrivateFundNumber)."' WHERE MDID=$tempNSWMDID;".BRtag;
   }

   $sqlSub = ereg_replace("Geelong Medical & Hospital Benefits Ass.", "GMHBA", $sqlSub);
   $sqlSub = ereg_replace("Mildura and District Hospital Fund", "MDHF", $sqlSub);
   $sqlSub = ereg_replace("R.way & T.port Employees Friendly Soc. Health Fund", "R&T Health Fund", $sqlSub);
   $sqlSub = ereg_replace("Commonwealth Bank Health Society", "CBHS", $sqlSub);
   $sqlSub = ereg_replace("Queensland Country Health Limited", "QCH", $sqlSub);
   $sqlSub = ereg_replace("Lysaght Hospital and Medical Club", "LHMC", $sqlSub);

   return $sqlSub;

}

function updateTable_participantregularmedication($arrChange)
{
   global $db_aj2007;
   $sql="";
   $sqlSub="";

   foreach($arrChange as $pID=>$arrChangeSub)
   {
      $tempNSWPID = getPID($pID);
      if($tempNSWPID=="")
         continue;

      $haveUpdate = false;

      $numFields = count(getFields('participantregularmedication'));
      // For one member
      foreach($arrChangeSub as $arrChangeSubSub)
      {
         if($numFields>count($arrChangeSubSub))
            $sqlSub.="DELETE FROM tblMedication WHERE PID=$tempNSWPID;".BRtag;
      }

      $sqlSelect = "SELECT * FROM participantregularmedication WHERE ParticipantID=";
      $sqlSelect.= "'$pID'";
      $result = mysql_query($sqlSelect, $db_aj2007);

      while($tempRow = mysql_fetch_object($result))
      {
         $sqlSub.="INSERT INTO tblMedication (PID, Drug, Dosage, Reason) VALUES ";
         $sqlSub.="($tempNSWPID, '".getValidString($tempRow->DrugName)."', '".getValidString($tempRow->Dose)."', '".getValidString($tempRow->AdministrationMethod)."');".BRtag;
      }
   }
   return $sqlSub;
}

function updateTable_participantuniform($pID, $arrChange)
{
   global $listHat;
   global $listShirt;
   $isNewRecord = false;
   $strShirts = "PoloShirtSize";
   $strHat = "HatSize";
   $sql = "";

   // GET PID
   $tempNSWPID = getPID($pID);
   if($tempNSWPID=="")
      return "";

   foreach($arrChange as $arrItem)
   {
      if ($arrItem["Field"]==VIC_PID)
         $isNewRecord = true;

      // First insert is related to participant, directfamilymember, 
      if($arrItem["Field"]==$strShirts)
      {
         if(!$isNewRecord)
         {
            $sql.="DELETE FROM tblParticipantTShirt WHERE PID=$tempNSWPID";
            $sql.=BRtag;
         }

         if($listShirt[$arrItem["NewValue"]]["TID"]!='')
         {
            $sql.="INSERT INTO tblParticipantTShirt (TID, PID) VALUES ";
            $sql.="(".$listShirt[$arrItem["NewValue"]]["TID"].", $tempNSWPID);";
            $sql.=BRtag;
         }
      }
      else if ($arrItem["Field"]==$strHat)
      {
         if(!$isNewRecord)
         {
            $sql.="DELETE FROM tblParticipantHat WHERE PID=$tempNSWPID";
            $sql.=BRtag;
         }

         if($listHat[$arrItem["NewValue"]]["HID"]!='')
         {
            $sql.="INSERT INTO tblParticipantHat (PID, HID) VALUES ";
            $sql.="($tempNSWPID, ".$listHat[$arrItem["NewValue"]]["HID"].");";
            $sql.=BRtag;
         }
      }
   }
   if($sql=="")
      return "";

   $sql.= BRtag;
   return $sql;
}

function updateTable_applicationStatus()
{
   global $db_aj2007;
   global $listApplicationStatus;

   $sql = "SELECT ";
   $tempPID = "tempParticipantID";

   $sqlStatement = "SELECT t1.ParticipantID as $tempPID";
   $sqlStatement.= ", IF(t1.ApplicationStatus=t2.ApplicationStatus OR (t1.ApplicationStatus IS NULL AND t2.ApplicationStatus IS NULL),'same', t1.ApplicationStatus) as ApplicationStatus, IF(t1.Withdrawn='Y' and t2.Withdrawn='N', 'Withdrawn', '') as Withdrawn, IF(t1.RegDate=t2.RegDate OR (t1.RegDate IS NULL AND t2.RegDate IS NULL),'same', t1.RegDate) as RegDate";
   $sqlStatement.= " FROM participant t1 LEFT JOIN sn_participant t2 ";
   $sqlStatement.= " ON (t1.ParticipantID=t2.ParticipantID) ";
   $sqlStatement.= " WHERE t1.participantID in (SELECT DISTINCT participantid FROM participant WHERE (regid in (SELECT DISTINCT regid FROM evolutionone.debitline WHERE paymentid LIKE 'JV10%') OR applicationstatus='Submitted') ORDER BY participantID) AND t1.PID is not null ";
   $sqlStatement.= " ORDER BY t1.participantid";
   $result = mysql_query($sqlStatement, $db_aj2007);

   while($tempResult = mysql_fetch_object($result))
   {
      // GET PID
      $tempNSWPID = getPID($tempResult->tempParticipantID);
      if($tempNSWPID=="")
         continue;

      // Check BranchID in tblParticipant and if the member is not VIC member
      // about further process
      $tempMemBID = getMemberBID($tempNSWPID);
      if($tempMemBID!=BID)
         continue;

      $tempStatus = $tempResult->ApplicationStatus;
      $tempWithdrawn = $tempResult->Withdrawn;
      $tempRegDate = $tempResult->RegDate;

      if($tempRegDate=='same')
         $tempRegDate=date("Y-m-d",strtotime("today"));
      
      if($tempWithdrawn=='Withdrawn')
      {
         $sqlInsert.="INSERT INTO tblApplication (StID, PID, StatusDate) VALUES (";
         $sqlInsert.="7, ".$tempNSWPID;
         $sqlInsert.=", '".$tempRegDate."');";
         $sqlInsert.=BRtag;
      }
      else if($tempStatus!='same')
      {
         if($tempStatus=='Incomplete')
            $tempStatus='Submitted';
         
         $sqlInsert.="INSERT INTO tblApplication (StID, PID, StatusDate) VALUES (";
         $sqlInsert.=$listApplicationStatus[$tempStatus]['StID'].", ".$tempNSWPID;
         $sqlInsert.=", '".$tempRegDate."');";
         $sqlInsert.=BRtag;
      }
   }
   return $sqlInsert;
}

function getValueFor_tblParticipant($pID)
{
   global $listTblParticipant;
   global $db_aj2007;

   $sql = "SELECT p.ParticipantID ";

   foreach ($listTblParticipant as $nswField=>$vicField)
   {
      // Testing purpose
      if($nswField=='Leader' || $nswField=='Email')
         $sql.=", ".$vicField["Field"]." as ".$nswField;
      else if ($nswField=="Swimming" || $nswField=="Swim50" || $nswField=="Swim50Clothed" || $nswField=="Boating" || $nswField=="Air" || $nswField=="Motor")
      {
         $sql.=", IF(".$vicField["Table"].".".$vicField["Field"]."='Y', 'Y', 'N') AS ".$nswField;
      }
      else if (substr($vicField["Field"], 0, 4)!="DONT" && 
          substr($vicField["Field"], -8)!="confirm)")
         $sql.=", ".$vicField["Table"].".".$vicField["Field"]." as ".$nswField;
      else
      {
         //print("NSW Field:".$nswField." Table: ".$vicField["Table"]." Field:".$vicField["Field"]);
         //print("<br>");
      }
   }
   $sql.= " FROM participant p";
   $sql.= " LEFT JOIN activityauthority aa ON (p.ParticipantID=aa.ParticipantID)";
   $sql.= " WHERE p.ParticipantID='$pID'";
   //print($sql."<br>");exit;
   $result = mysql_fetch_object(mysql_query($sql, $db_aj2007));
   return $result;
}

function getValueFor_tblMedicalDetails($pID)
{
   global $listTblMedicalDetails;
   global $db_aj2007;

   $sql = "SELECT pm.ParticipantID ";

   foreach ($listTblMedicalDetails as $nswField=>$vicField)
   {
      // Testing purpose
      if($nswField=='MedicareExpiryDate' || $nswField=='HealthCardExpiryDate' || $vicField["Table"]=="NONE")
      {
         $sql.=", ".$vicField["Field"]." as ".$nswField;
      }
      else if (substr($vicField["Field"], 0, 4)!="DONT" && 
          substr($vicField["Field"], -8)!="confirm)")
      {
         $sql.=", ".$vicField["Table"].".".$vicField["Field"]." as ".$nswField;
      }
      else
      {
         //print("NSW Field:".$nswField." Table: ".$vicField["Table"]." Field:".$vicField["Field"]);
         //print("<br>");
      }

   }
   $sql.= " FROM participantmedicaldetails2 pm";
   $sql.= " WHERE pm.ParticipantID='$pID'";
   $sql.= " ORDER BY pm.participantid";

   $result = mysql_fetch_object(mysql_query($sql, $db_aj2007));
   return $result;
}

function getValueFor_tblLeader($pID)
{
   global $listLeader;
   global $db_aj2007;

   $sql = "SELECT ad.ParticipantID ";

   foreach ($listLeader as $nswField=>$vicField)
   {
      if ($vicField["Table"]=="NONE")
      {
         $sql.=", ".$vicField["Field"]." as ".$nswField;
      }
      else if (substr($vicField["Field"], 0, 4)!="DONT" && 
          substr($vicField["Field"], -8)!="confirm)")
      {
         $sql.=", ".$vicField["Table"].".".$vicField["Field"]." as ".$nswField;
      }
      else
      {
         //print("NSW Field:".$nswField." Table: ".$vicField["Table"]." Field:".$vicField["Field"]);
         //print("<br>");
      }
   }
   $sql.= " FROM adultdetail ad";
   $sql.= " WHERE ad.ParticipantID='$pID'";
   $result = mysql_fetch_object(mysql_query($sql, $db_aj2007));
   return $result;
}

?>