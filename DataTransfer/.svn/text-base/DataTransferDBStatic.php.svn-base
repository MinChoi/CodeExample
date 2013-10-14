<?php
require_once(ROOT_DIR."/Interface/aj2007/Common/GetGroupContact.php");

/// NEED TO KNOW BID
function insertInto_tblRegion()
{
   global $db_aj2007;

   $sql = "SELECT DISTINCT RegionID, RegionName
         FROM participant
         ORDER BY RegionID";
   $result = mysql_query($sql, $db_aj2007);
   $sqlReturn = "";
   while($currRow = mysql_fetch_object($result))
   {
      $sqlReturn.= "INSERT INTO tblRegion (BID, RegionName) VALUES
                  (".BID.", '".ucwords(strtolower(getValidString($currRow->RegionName)))."'); ";
      $sqlReturn.= BRtag;
   }
   return $sqlReturn;
}

/// NEED TO KNOW RegionID
function insertInto_tblDistrict()
{
   global $db_aj2007;

   $sql = "SELECT DISTINCT RegionName, DistrictID, DistrictName
         FROM participant
         ORDER BY DistrictID";
   $result = mysql_query($sql, $db_aj2007);

   $sqlReturn = "";
   while($currRow = mysql_fetch_object($result))
   {
      $tempRegionID = getRegionID("RegionName='".$currRow->RegionName."' AND BID=".BID);
   
      if($tempRegionID)
      {
         $sqlReturn.= "INSERT INTO tblDistrict (RegionID, DistrictName) VALUES
                       ($tempRegionID, '".ucwords(strtolower(getValidString($currRow->DistrictName)))."'); ";      
         $sqlReturn.= BRtag;
      }
   }
   return $sqlReturn;
}

/// Need to know District, Updated, BID
function insertInto_tblGroup()
{
   global $db_aj2007;

   $sql = "SELECT DISTINCT DistrictName, GroupID, GroupName
         FROM participant
         ORDER BY GroupID";
   $result = mysql_query($sql, $db_aj2007);

   $sqlReturn = "";
   while($currRow = mysql_fetch_object($result))
   {
      $groupContact = getGroupContact($currRow->GroupID);

      if($groupContact)
      {
         if($groupContact->PreferedName=="")
            $ContactName = getValidString(getCapitalisedName($groupContact["Firstname"])." ".getCapitalisedName($groupContact["Surname"]));
         else
            $ContactName = getValidString(getCapitalisedName($groupContact["PreferedName"])." ".getCapitalisedName($groupContact["Surname"]));

         if($groupContact["Mobile"]!="")
            $ContactPhone = getPhoneNumberFormatted($groupContact["Mobile"]);
         else if ($groupContact["HomePhone"]!="")
            $ContactPhone = getPhoneNumberFormatted($groupContact["HomePhone"]);
         else if ($groupContact["WorkPhone"]!="")
            $ContactPhone = getPhoneNumberFormatted($groupContact["WorkPhone"]);

         $ContactEmail = $groupContact["Email"];
      }
      else
      {
         $ContactName="";
         $ContactPhone="";
         $ContactEmail="";
      }

      $tempDistrictID = getDistrictID($currRow->DistrictName);
      if($tempDistrictID)
      {
         $sqlReturn.= "INSERT INTO tblGroup (BID, DistrictID, GroupName, ContactName, Phone, Email) VALUES (".BID.", $tempDistrictID, '".ucwords(strtolower($currRow->GroupName))."', '".$ContactName."', '".$ContactPhone."', '".$ContactEmail."'); ";
         $sqlReturn.= BRtag;
      }
   }
   return $sqlReturn;
}
?>