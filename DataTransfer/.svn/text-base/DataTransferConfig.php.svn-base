<?php
/**
* DataTransferConfig.php
*
* This is config file for Data Transfer system.
* This file has the entire mapping arrays.
*/
define("VIC_PID", "ParticipantID");
define("NSW_PID", "PID");


// If the quries are passed not from web-browser, 
// This tag need to be changed to ' '(blank)
define("BRtag", "<br>");

// Condition to get list of ParticipantIDs
$participantCondition = 
"SELECT DISTINCT participantid
FROM participant WHERE (regid in 
(SELECT DISTINCT regid FROM evolutionone.debitline
WHERE paymentid LIKE 'JV10%') OR applicationstatus='Submitted')
AND withdrawn='N' ORDER BY participantID";

// Country, State, Branch ID in NSW db
define("CnID",    "1");
define("SID",     "76");
define("BID",     "2");

/**
Currently 
DistrictID 
105
RegionID
39

Currently 104 different groups in NSW db
*/

// Adult experience is removed from mapping process, to use this, include this into
// $listTables, $listPart2
//"adultexperience"                => "sn_adultexperience",

// List of tables and snapshot tables in Victoria DB
$listTables = array(
"participant"                    => "sn_participant",
"participantmedicaldetails2"     => "sn_participantmedicaldetails2",
"activityauthority"              => "sn_activityauthority",
"adultcertificateheld"           => "sn_adultcertificateheld",
"adultdetail"                    => "sn_adultdetail",
"adultskill"                     => "sn_adultskill",
"adultworkpreference"            => "sn_adultworkpreference",
"directfamilymember"             => "sn_directfamilymember",
"emergencycontact"               => "sn_emergencycontact",
"leaderactivities"               => "sn_leaderactivities",
"participantallergy"             => "sn_participantallergy",
"participantdietary"             => "sn_participantdietary",
"participantmedicalaid"          => "sn_participantmedicalaid",
"participantmedicalalert"        => "sn_participantmedicalalert",
"participantmedicalcondition"    => "sn_participantmedicalcondition",
"participantprivatehealthfund"   => "sn_participantprivatehealthfund",
"participantregularmedication"   => "sn_participantregularmedication",
"participantuniform"             => "sn_participantuniform"
);

// To save their PID after insert participant records, 
// table participant and the rest tables need to be separated
$listPart1 = array(
"participant"                    => "sn_participant",
);

$listPart2 = array(
"participantmedicaldetails2"     => "sn_participantmedicaldetails2"
);


$listPart3 = array(
"activityauthority"              => "sn_activityauthority",
"adultcertificateheld"           => "sn_adultcertificateheld",
"adultdetail"                    => "sn_adultdetail",
"adultskill"                     => "sn_adultskill",
"adultworkpreference"            => "sn_adultworkpreference"
);

$listPart4 = array(
"directfamilymember"             => "sn_directfamilymember",
"emergencycontact"               => "sn_emergencycontact",
"leaderactivities"               => "sn_leaderactivities",
"participantallergy"             => "sn_participantallergy",
"participantdietary"             => "sn_participantdietary"
);

$listPart5 = array(
"participantmedicalaid"          => "sn_participantmedicalaid",
"participantmedicalalert"        => "sn_participantmedicalalert",
"participantmedicalcondition"    => "sn_participantmedicalcondition",
"participantprivatehealthfund"   => "sn_participantprivatehealthfund",
"participantregularmedication"   => "sn_participantregularmedication",
"participantuniform"             => "sn_participantuniform"
);

/**
This is to map from our record to their record
Key = tblParticipant Field name
Value = Array of our record detail
Table: Table name (p:participant, d:directfamilymember, aa:activityauthority)
Field: Field name in p, d and aa
Type: DataType
Size: Size of the field
*/
$listTblParticipant = array(
"Surname"               => array("Table"=>"p", "Field"=>"Surname", "Type"=>"Text", "Size"=>25),
"GivenName"             => array("Table"=>"p", "Field"=>"Firstname",
"Type"=>"Text", "Size"=>25),
"OtherNames"            => array("Table"=>"p", "Field"=>"OtherName",
"Type"=>"Text", "Size"=>25),
"PreferredName"         => array("Table"=>"p", "Field"=>"PreferedName",
"Type"=>"Text", "Size"=>25),
"Leader"                => array("Table"=>"","Field"=>"IF(participanttype='Scout', 'S', 
                                             IF(participanttype='Venturer', 'V',
                                             IF(participanttype='Rover', 'R',
                                             IF(participanttype='Leader', 'L', 'O'))))",
"Type"=>"Text", "Size"=>25),
"dob"                   => array("Table"=>"p", "Field"=>"DOB",
"Type"=>"Date", "Size"=>10),
"Sex"                   => array("Table"=>"p", "Field"=>"Gender",
"Type"=>"Text", "Size"=>1),
"Address"               => array("Table"=>"p", "Field"=>"HomeAddress", "Type"=>"Text", "Size"=>50),
"Suburb"                => array("Table"=>"p", "Field"=>"HomeSuburb", "Type"=>"Text", "Size"=>30),
"Postcode"              => array("Table"=>"p", "Field"=>"HomePostcode", "Type"=>"Text", "Size"=>8),
"PostalAddress"         => array("Table"=>"p", "Field"=>"PostalAddress", "Type"=>"Text", "Size"=>50),
"PostalSuburb"          => array("Table"=>"p", "Field"=>"PostalSuburb", "Type"=>"Text", "Size"=>30),
"PostalPostCode"        => array("Table"=>"p", "Field"=>"PostalPostcode",
"Type"=>"Text", "Size"=>8),
"PostalSID"             => array("Table"=>"p", "Field"=>"DONT KNOW", "Type"=>"Number", "Size"=>100),
"Phone"                 => array("Table"=>"p", "Field"=>"HomePhone", "Type"=>"Text", "Size"=>20),
"Email"                 => array("Table"=>"", "Field"=>"if(ParentEmail='' or ParentEmail=null, (if(Email='' or Email=null, 'viccon@vicscouts.asn.au', Email)), ParentEmail)", "Type"=>"Text", "Size"=>50),
"Religion"              => array("Table"=>"p", "Field"=>"DONT KNOW", "Type"=>"Text", "Size"=>30),
"MemberNumber"          => array("Table"=>"p", "Field"=>"RegID", "Type"=>"Text",
"Size"=>10),
"PaperPhoto"            => array("Table"=>"p", "Field"=>"DONT KNOW", "Type"=>"Text", "Size"=>1),
"ExpIndemnityRecd"      => array("Table"=>"p", "Field"=>"DONT KNOW", "Type"=>"Text", "Size"=>1),
"WhiteWaterRecd"        => array("Table"=>"p", "Field"=>"DONT KNOW", "Type"=>"Text", "Size"=>1),
"EasternCreekRecd"      => array("Table"=>"p", "Field"=>"DONT KNOW", "Type"=>"Text", "Size"=>1),
"HangDogRecd"           => array("Table"=>"p", "Field"=>"DONT KNOW", "Type"=>"Text", "Size"=>1),
"GeneralRecd"           => array("Table"=>"p", "Field"=>"DONT KNOW", "Type"=>"Text", "Size"=>1),
"CourtOrder"            => array("Table"=>"p", "Field"=>"CourtOrder",
"Type"=>"Text", "Size"=>1),
"CourtOrderDetails"     => array("Table"=>"p", "Field"=>"DONT KNOW", "Type"=>"Text", "Size"=>4000),
"FamilyAtJamboree"      => array("Table"=>"d", "Field"=>"DONT KNOW", "Type"=>"Text", "Size"=>1),
"FamilyNotes"           => array("Table"=>"d", "Field"=>"DONT KNOW", "Type"=>"Text", "Size"=>4000),
"PhoneWork"             => array("Table"=>"p", "Field"=>"WorkPhone", "Type"=>"Text", "Size"=>20),
"PhoneMobile"           => array("Table"=>"p", "Field"=>"Mobile", "Type"=>"Text", "Size"=>20),
"Comments"              => array("Table"=>"p", "Field"=>"Comments", "Type"=>"Text", "Size"=>4000),
"Swimming"              => array("Table"=>"aa", "Field"=>"AuthSwimming", "Type"=>"Text", "Size"=>1),
"Swim50"                => array("Table"=>"aa", "Field"=>"Swim25Metres",
"Type"=>"Text", "Size"=>1),
"Swim50Clothed"         => array("Table"=>"aa", "Field"=>"Swim25MetresDressed", "Type"=>"Text", "Size"=>1),
"Boating"               => array("Table"=>"aa", "Field"=>"AuthBoating", "Type"=>"Text", "Size"=>1),
"Air"                   => array("Table"=>"aa", "Field"=>"AuthAir", "Type"=>"Text", "Size"=>1),
"Motor"                 => array("Table"=>"aa", "Field"=>"AuthMotor", "Type"=>"Text", "Size"=>1),
"TravelToJamboree"      => array("Table"=>"p", "Field"=>"TravelToEvent", "Type"=>"Text", "Size"=>1),
"TravelFromJamboree"    => array("Table"=>"p", "Field"=>"TravelFromEvent", "Type"=>"Text", "Size"=>1),
"TravelNotes"           => array("Table"=>"p", "Field"=>"DONT KNOW", "Type"=>"Text", "Size"=>2000),
"TravelTour"            => array("Table"=>"p", "Field"=>"DONT KNOW", "Type"=>"Text", "Size"=>1), 
"TravelApproval"        => array("Table"=>"p", "Field"=>"DONT KNOW", "Type"=>"Text", "Size"=>10), 
"LastUpdate"            => array("Table"=>"p", "Field"=>"RegDate", "Type"=>"Date", "Size"=>10));

/// As NSW save one record for this, the system find medicalfund details insert at first
$listTblMedicalDetails = array(
"FundName"              => array("Table"=>"NONE", "Field"=>"' '", "Type"=>"Text", "Size"=>100),
"FundNumber"            => array("Table"=>"phf", "Field"=>"DONT", "Type"=>"Text", "Size"=>100),
"MedicareNumber"        => array("Table"=>"pm", "Field"=>"MedicareNumber", "Type"=>"Text", "Size"=>100),
"HealthCardNumber"      => array("Table"=>"pm", "Field"=>"HealthCareCardNo", "Type"=>"Text", "Size"=>100),
"MedicareExpiryDate"    => array("Table"=>"", "Field"=>"DATE_FORMAT(expirydate,'%m/%y')", "Type"=>"Text", "Size"=>5),
"HealthCardExpiryDate"  => array("Table"=>"", "Field"=>"DATE_FORMAT(HealthCareCardExpiryDate, '%m/%y')", "Type"=>"Text", "Size"=>5),
"AmbulanceCover"        => array("Table"=>"pm", "Field"=>"AmbulanceMember", "Type"=>"Text", "Size"=>10),
"TetanusDate"           => array("Table"=>"pm", "Field"=>"LastTetanus", "Type"=>"Date", "Size"=>10),
"AmbulanceNumber"       => array("Table"=>"pm", "Field"=>"AmbulanceNumber", "Type"=>"Text", "Size"=>100)
);

/// adultdetail table and tblLeader table.
$listLeader = array(
"ScoutName"    => array("Table"=>"ad", "Field"=>"DONT", "Type"=>"Text", "Size"=>20),
"Occupation"   => array("Table"=>"ad", "Field"=>"Occupation", "Type"=>"Text", "Size"=>50),
"PreRole"      => array("Table"=>"ad", "Field"=>"Role", "Type"=>"Text", "Size"=>50),
"PreActivity"  => array("Table"=>"ad", "Field"=>"DONT", "Type"=>"Text", "Size"=>100),
"DayWorker"    => array("Table"=>"ad", "Field"=>"DONT", "Type"=>"Text", "Size"=>1),
"PDEReceived"  => array("Table"=>"ad", "Field"=>"DONT", "Type"=>"Text", "Size"=>1),
"WAWWCCNumber" => array("Table"=>"ad", "Field"=>"DONT", "Type"=>"Text", "Size"=>50),
"WAWWCCReqd"   => array("Table"=>"ad", "Field"=>"DONT", "Type"=>"Text", "Size"=>1)
);


/**
**********************************************************************************
**********************************************************************************
List from this point is to save NSW primary keys and records into config file
And make the system easy to identify what key to use to connect participant and
Other tables               
**********************************************************************************
**********************************************************************************/

/**
* Array
* 'VicFieldName' =>  array(
*/
$listCertificate = array(
"Canoe"           => array("CID"=>2),
"Sailing"         => array("CID"=>6),
"Power"           => array("CID"=>3),
"FirstAid"        => array("CID"=>4),
"Abseiling"       => array("CID"=>1),
"RockClimbing"    => array("CID"=>5),
"SubAqua"         => array("CID"=>7)
);

$listHat = array(
"S 54cm"          => array("HID"=>1),
"M 56cm"          => array("HID"=>2),
"L 58cm"          => array("HID"=>3),
"XL 60cm"         => array("HID"=>4)
);

$listShirt = array(
"Size08 80cm"     => array("TID"=>10),
"Size10 84cm"     => array("TID"=>9),
"Size12 88cm"     => array("TID"=>8),
"Size14 92cm"     => array("TID"=>1),
"Size16 98cm"     => array("TID"=>2),
"Small 104cm"     => array("TID"=>3),
"Medium 110cm"    => array("TID"=>4),
"Large 116cm"     => array("TID"=>5),
"XL 124cm"        => array("TID"=>6),
"2XL 130cm"       => array("TID"=>7),
"3XL 142cm"       => array("TID"=>11),
"4XL 150cm"       => array("TID"=>12),
"5XL 158cm"       => array("TID"=>13),
"6XL 166cm"       => array("TID"=>14),
"7XL 174cm"       => array("TID"=>15)
);


/**
NSW Other dietary is DID: 17
*/
$listDietary = array(
"Celiac"             => array("DID"=>17),
"Diabetic"           => array("DID"=>5),
"LowFat"             => array("DID"=>6),
"LactoseFree"        => array("DID"=>17),
"Vegan"              => array("DID"=>7),
"Vegetarian"         => array("DID"=>7),
"Kosher"             => array("DID"=>13),
"Halal"              => array("DID"=>17),
"OtherReligious"     => array("DID"=>17),
"OtherHealth"        => array("DID"=>17),
"SpecificFood"       => array("DID"=>17),
);



$listAllergy = array(
"Antibiotics"        => array("ALID"=>1),
"Foods"              => array("ALID"=>2),
"FoodDyes"           => array("ALID"=>3),
"Nuts"               => array("ALID"=>4),
"Bandages"           => array("ALID"=>5),
"Bee"                => array("ALID"=>6),
"AnimalHair"         => array("ALID"=>7),
"Drugs"              => array("ALID"=>8),
"DustMites"          => array("ALID"=>9),
"Other"              => array("ALID"=>10)
);

$listMedicalAids = array(
"AsthmaPump"         => array("MAID"=>36),
"BackBrace"          => array("MAID"=>37),
"DentalBraces"       => array("MAID"=>43),
"Wheelchair"         => array("MAID"=>38),
"Pacemaker"          => array("MAID"=>39),
"CPAPPump"           => array("MAID"=>40),
"IncontinenceAids"   => array("MAID"=>41),
"InsulinPump"        => array("MAID"=>42),
"Other"              => array("MAID"=>44)
);

// 18 means other 
$listMedicalConditions = array(
"M_ADD"              => array("MCID"=>31, "DESC"=>"ADD or ADHD"),
"Angina"             => array("MCID"=>1, "DESC"=>"Angina"),
"Arthritis"          => array("MCID"=>2, "DESC"=>"Arthritis"),
"Asthma"             => array("MCID"=>3, "DESC"=>"Asthma"),
"BackProblem"        => array("MCID"=>4, "DESC"=>"Back Problem"),
"BedWetting"         => array("MCID"=>5, "DESC"=>"Bed Wetting"),
"BleedingDisorders"  => array("MCID"=>7, "DESC"=>"Bleeding Disorders"),
"BloodPressure"      => array("MCID"=>8, "DESC"=>"Blood Pressure"),
"Bronchitis"         => array("MCID"=>9, "DESC"=>"Bronchitis"),
"Diabetes"           => array("MCID"=>10, "DESC"=>"Diabetes"),
"Epilepsy"           => array("MCID"=>"12,6", "DESC"=>"Epilepsy or Blackouts"),
"HayFever"           => array("MCID"=>13, "DESC"=>"Hay Fever"),
"HeartTrouble"       => array("MCID"=>15, "DESC"=>"Heart Trouble"),
"Migraine"           => array("MCID"=>19, "DESC"=>"Migraine"),
"SleepWalks"         => array("MCID"=>22, "DESC"=>"Sleep Walks"),
"Spasticity"         => array("MCID"=>23, "DESC"=>"Spasticity"),
"Stroke"             => array("MCID"=>24, "DESC"=>"Stroke"),
"TravelSickness"     => array("MCID"=>25, "DESC"=>"Travel Sickness"),
"UrinaryProblem"     => array("MCID"=>"28,29", "DESC"=>"Urinary Problems"),
"VisualImpairment"   => array("MCID"=>30, "DESC"=>"Visual Impairment")
);

define("OtherJobJID", "16");

$listJobPreference = array(
"Line Leader"                       => array("JID"=>1),
"Activities"                        => array("JID"=>2),
"Admin"                             => array("JID"=>3),
"Catering"                          => array("JID"=>4),
"Finance"                           => array("JID"=>7),
"First Aid"                         => array("JID"=>8),
"Hospital"                          => array("JID"=>9),
"Newspaper / Media"                 => array("JID"=>10),
"Public Relations"                  => array("JID"=>11),
"Sites and Services"                => array("JID"=>13),
"Transport"                         => array("JID"=>15),
"International"                     => array("JID"=>17),
"IT Support"                        => array("JID"=>18),
"Internet Cafe"                     => array("JID"=>18),
"Junior Service Leader Sub Camp."   => array("JID"=>19),
"Jnr Service Ldr Sub Camp"          => array("JID"=>19),
"Logistics"                         => array("JID"=>20),
"Retail outlet"                     => array("JID"=>21),
"Scout Shop"                        => array("JID"=>22),
"Security"                          => array("JID"=>23),
"Sub camp"                          => array("JID"=>24),
"Traffic Management"                => array("JID"=>25),
"Welfare"                           => array("JID"=>26)
);

$listSkills = array(
"ManagingTeams"         => array("SID"=>23),
"StockControl"          => array("SID"=>5),
"ComputerSkills"        => array("SID"=>21),
"MedicalDr"             => array("SID"=>12),
"Electrical"            => array("SID"=>15),
"Hospitality"           => array("SID"=>18),
"Journalism"            => array("SID"=>9),
"Accounting"            => array("SID"=>1),
"PCSetUp"               => array("SID"=>24),
"Nursing"               => array("SID"=>13),
"Plumbing"              => array("SID"=>16),
"Security"              => array("SID"=>19),
"Photography"           => array("SID"=>8),
"Clerical"              => array("SID"=>2),
"PublicRelation"        => array("SID"=>11),
"Carpentry"             => array("SID"=>17),
"Purchasing"            => array("SID"=>25),
"ForkLiftDriver"        => array("SID"=>14),
"Retail"                => array("SID"=>10),
"Dietician"             => array("SID"=>22),
"Catering"              => array("SID"=>3),
"Other"                 => array("SID"=>20),
"DriversLicence"        => array("SID"=>4),
"Interpreter"           => array("SID"=>7)
);


$listAppointment = array(
"W25"    => array("ApID"=>17),
"W119"   => array("ApID"=>5),
"W145"   => array("ApID"=>5),
"W126"   => array("ApID"=>5),
"W125"   => array("ApID"=>5),
"W104"   => array("ApID"=>5),
"W74"    => array("ApID"=>9),
"W72"    => array("ApID"=>20),
"W81"    => array("ApID"=>11),
"W34"    => array("ApID"=>5),
"W134"   => array("ApID"=>5),
"W129"   => array("ApID"=>5),
"W132"   => array("ApID"=>5),
"W131"   => array("ApID"=>5),
"W137"   => array("ApID"=>5),
"W76"    => array("ApID"=>4),
"W78"    => array("ApID"=>12),
"W16"    => array("ApID"=>17),
"W115"   => array("ApID"=>5),
"W144"   => array("ApID"=>5),
"W106"   => array("ApID"=>5),
"W152"   => array("ApID"=>5),
"W73"    => array("ApID"=>8),
"W60"    => array("ApID"=>6),
"W53"    => array("ApID"=>6),
"W59"    => array("ApID"=>6),
"W54"    => array("ApID"=>6),
"W61"    => array("ApID"=>6),
"W51"    => array("ApID"=>6),
"W57"    => array("ApID"=>6),
"W71"    => array("ApID"=>20),
"W80"    => array("ApID"=>10),
"P74"    => array("ApID"=>8),
"P72"    => array("ApID"=>20),
"P81"    => array("ApID"=>10),
"P76"    => array("ApID"=>3),
"P78"    => array("ApID"=>1),
"P71"    => array("ApID"=>20),
"P79"    => array("ApID"=>13),
"W37"    => array("ApID"=>17),
"W32"    => array("ApID"=>5),
"W79"    => array("ApID"=>13),
"W75"    => array("ApID"=>3),
"T25"    => array("ApID"=>17),
"T81"    => array("ApID"=>10),
"T76"    => array("ApID"=>3),
"T78"    => array("ApID"=>1),
"T60"    => array("ApID"=>6),
"T53"    => array("ApID"=>6),
"T54"    => array("ApID"=>6),
"T59"    => array("ApID"=>6),
"T57"    => array("ApID"=>6),
"T71"    => array("ApID"=>20),
"T37"    => array("ApID"=>17),
"T75"    => array("ApID"=>3)
);

$listApplicationStatus = array(
"Saved"        => array("StID"=>2, "Description"=>""),
"Submitted"    => array("StID"=>2, "Description"=>"Submitted"),
"Pending"      => array("StID"=>3, "Description"=>"BHQ Approved")
);

$restrictMem = array(
"3981"
);
?>