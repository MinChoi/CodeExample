<? 
App::import('Vendor', 'PHPExcel',		array('file' => 'excel/PHPExcel.php'));
App::import('Vendor', 'PHPExcelWriter',	array('file' => 'excel/PHPExcel/Writer/Excel5.php'));

class ExcelHelper extends AppHelper {

    var $xls;
	var $reader;
    var $sheet;
    var $data;
    var $blacklist = array();
    
    function excelHelper() {
        $this->xls = new PHPExcel();
        $this->sheet = $this->xls->getActiveSheet();
        $this->sheet->getDefaultStyle()->getFont()->setName('Verdana');
    }
                 
    function loadFile($file) {
        $this->reader = new PHPExcel_Reader_Excel5();
        $this->xls = $this->reader->load("{$file}");
        
        $this->xls->setActiveSheetIndex(0);
        $this->sheet = $this->xls->getActiveSheet();
        $this->sheet->getDefaultStyle()->getFont()->setName('Verdana');
    }
    
    function newFile() {
        $this->xls = new PHPExcel();
        $this->sheet = $this->xls->getActiveSheet();
        $this->sheet->getDefaultStyle()->getFont()->setName('Verdana');
    }
    
    function changeCell($value = null, $cell = null) {
        $this->sheet->setCellValue($cell, $value);   
    }
	
    function generate(&$data, $title = 'Report') {
         $this->request->data = &$data;
         $this->_title($title);
         $this->_headers();
         $this->_rows();
         $this->_output($title);
         return true;
    }
    
    function _title($title) {
        $this->sheet->setCellValue('A2', $title);
        $this->sheet->getStyle('A2')->getFont()->setSize(14);
        $this->sheet->getRowDimension('2')->setRowHeight(23);
    }

    function _headers() {
        $i=0;
        foreach ($this->request->data[0] as $field => $value) {
            if (!in_array($field, $this->blacklist)) {
                $columnName = Inflector::humanize($field);
                $this->sheet->setCellValueByColumnAndRow($i++, 4, $columnName);
            }
        }
        $this->sheet->getStyle('A4')->getFont()->setBold(true);
        $this->sheet->getStyle('A4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $this->sheet->getStyle('A4')->getFill()->getStartColor()->setRGB('969696');
        $this->sheet->duplicateStyle( $this->sheet->getStyle('A4'), 'B4:'.$this->sheet->getHighestColumn().'4');
        for ($j=1; $j<$i; $j++) {
            $this->sheet->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($j))->setAutoSize(true);
        }
    }
        
    function _rows() {
        $i=5;
        foreach ($this->request->data as $row) {
            $j=0;
            foreach ($row as $field => $value) {
                if (!in_array($field, $this->blacklist)) {
                    $this->sheet->setCellValueByColumnAndRow($j++, $i, $value);
                }
            }
            $i++;
        }
    }
            
    function _output($title) {
        header("Content-type: application/vnd.ms-excel"); 
        header('Content-Disposition: attachment;filename="'.$title.'.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = new PHPExcel_Writer_Excel5($this->xls);
        $objWriter->setTempDir(TMP);
        $objWriter->save('php://output');
    }
}
?>