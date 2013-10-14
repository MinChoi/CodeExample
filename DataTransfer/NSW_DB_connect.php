<?php

class NSW_DB_connect
{
   protected $dbconnect;

   function __construct()
   {
      $host = $_SERVER["HTTP_HOST"];
      
      // Staging and Realsite, connectivity is different
      if(trim($host)=="www.vicscouts.asn.au")
      {
         $this->dbconnect = dbx_connect(DBX_MSSQL, 'aj2010nsw.apps:49172', 'AJ2010Registrations', 'VicScouts','lzb3wz-Sc0u7s');      
      }
      else if(trim($host)=="svnstaging.intranet.vicscouts.asn.au")
      {
         $this->dbconnect = dbx_connect(DBX_MSSQL, 'aj2010nsw.apps:49172', 'AJ2010Test', 'VicScouts','lzb3wz-Sc0u7s');            
      }
   }

   public function selectNSW($tableName, $fields, $condition=null)
   {
      $sql = "SELECT $fields FROM $tableName";
      if ($condition!=null)
         $sql.=" WHERE $condition";

      $result = dbx_query($this->dbconnect, $sql);

      if($result)
         return $result->data;
      else
         return false;
   }

   public function runSQL($sql)
   {
      $result = dbx_query($this->dbconnect, $sql);

      if($result)
         return $result->data;
      else
         return false;
   }
}

?>