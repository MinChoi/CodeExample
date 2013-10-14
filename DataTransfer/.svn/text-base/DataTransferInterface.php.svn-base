<?php
if (empty($APPLICATION_SETTING_EXECUTED))
   require_once('../../../SettingFile.php');
require_once("DataTransfer.php");
if($_SESSION['USERID']!='min.choi' && $_SESSION['USERID']!='alvin.santoso' &&
$_SESSION['USERID']!='janali.perera'
)
{
   print('Sorry. You do not have permission to use this page');
   exit;
}
?>

<html>
<head>
<title>Data Transfer</title>
<script language=javascript>
function submitForm(tempAction)
{
   if (confirm("Are you sure to run this? This is a critical script handling JOC db"))
   {
      if (tempAction!="")
      {
         document.frmDataTransfer.paramValue.value=tempAction;
         document.frmDataTransfer.submit();
      }
   }
}
</script>
</head>
<body>
<form method=POST target='new' name='frmDataTransfer' action='DataTransfer.php'>
This is for Data transfer to NSW db
<br><br>
It will take around 5 minutes. Please make sure the browser keep opening.<br>
As this function directly updates records in NSW database, make sure this script <br>
is run by right person and time.
<br><br>
1. Click 'Run Update' button
<ul>
   <li>Insert and update tblParticipant in NSW db</li>
   <li>Once insert new participant, save its PID (NSW primary key) into our db</li>
   <li>Insert and update tblMedicalDetails for NSW db</li>
   <li>Generate the SQLs for the rest tables</li>
</ul>
This is to run update functions.<br>
<input type=button onclick="submitForm('runUpdate')" value="Run Update">
<br><br><br>
2. Click 'Create Snapshot WITH records' to create snapshot tables<br>
<font color=red><b>
WARNNING!!! MAKE SURE 'RUN UPDATE' HAS BEEN<br>EXECUTED BEFORE YOU CREATE SNAPSHOT
</b></font>

<br><br>
Create Snapshot Tables and Populate records<br>
<input type=button onclick="submitForm('createSnapshotWithRecord')" value="Create Snapshot WITH records">
<input type=hidden name=paramValue id=paramValue value=''>
<?php
/*
Create Snapshot Tables (Name ex. sn_participant)<br>
<input type=button onclick="submitForm('createSnapshotWithoutRecord')" value="Create Snapshot WITHOUT record">
<br><br>


Deleting ALL existing records in NSW db except for tblParticipant and tblMedicalDetails<br>
<input type=button onclick="submitForm('deleteExisting')" value="Delete Existing Record">
<br><br>

<b>RDG SQL</b>
<br>Region<br>
<input type=button onclick="submitForm('insertRegion')" value="SQL Region">
<br><br>
District<br>
<input type=button onclick="submitForm('insertDistrict')" value="SQL District">
<br><br>
Group<br>
<input type=button onclick="submitForm('insertGroup')" value="SQL Group">
<br><br><br>
This is to set Index for the directfamilymember, regularmedication and experience<br>
<input type=button onclick="submitForm('setIndex')" value="Update Index">
<br><br>

This is to generate SQL statements to send NSW<br>
Part1 is for participant and medicaldetail table<br>
Part2, Part3, Part4 and Part5 are for the rest.<br>
<input type=button onclick="submitForm('generateSQLPart1')" value="Generate SQL Part 1">
<br><br>
<input type=button onclick="submitForm('generateSQLPart2')" value="Generate SQL Part 2">
<br><br>
<input type=button onclick="submitForm('generateSQLPart3')" value="Generate SQL Part 3">
<br><br>
<input type=button onclick="submitForm('generateSQLPart4')" value="Generate SQL Part 4">
<br><br>
<input type=button onclick="submitForm('generateSQLPart5')" value="Generate SQL Part 5">
<br><br>

Update victoria AJ2010 participant table.<br>
Update all PID (NSW primary key) in participant table (AJ2010)<br>
<input type=button onclick="submitForm('updatePID')" value="Update PID">
<br><br>
*/
?>


<br><br>
<br>
</form>
</body>
</html>
