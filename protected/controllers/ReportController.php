<?php

class ReportController extends CController
{

    public $layout = '_main';

    private $_model;

    public function actionReport01()
    {
        // Authen Login
        if (! UserLoginUtils::isLogin()) {
            $this->redirect(Yii::app()->createUrl('Site/login'));
        }
        
        if (isset($_POST['Pathogen'])) {
            $_SESSION['ReportNotFound'] = 0;
            $model = new Pathogen();
            $model->attributes = $_POST['Pathogen'];
            $criteria = new CDbCriteria();
            $criteria->with = array(
                'department'
            );
            $criteria->condition = " department.id = " . $model->department_id;
            
            $datas = Pathogen::model()->findAll($criteria);
            if (isset($datas)) {
                
                // //<img src="http://www.iconarchive.com/show/100-flat-icons-by-graphicloads/home-icon.html" height="5" width="5">
                
                foreach ($datas as $grpItem) {
                    $grpDept = $grpItem->department->name;
                    if (strcmp($grpDept, $grpItem->department->name) == 0) {
                        
                        // HEADER//
                        $dept = $grpItem->department->name;
                        $inform_month = date_parse_from_format("Y-m-d", $grpItem->inform_date)["month"];
                        $inform_year = ((int) date_parse_from_format("Y-m-d", $grpItem->inform_date)["year"]) + 543;
                        $inform_name = $grpItem->inform_name;
                        $addr = $grpItem->address;
                        $pathogen_code = $grpItem->pathogen_no;
                        $tel = $grpItem->phone_number;
                        $fax = $grpItem->fax_number;
                        $email = $grpItem->email;
                        
                        // END HEADER
                        $str = '<br>';
                        $str .= '<table style="text-align:left;font-family:arial;font-size:12px; width: 100%">';
                        $str .= '<tr>' . '<td style="text-align: right" colspan="4">แบบ จจ.ช ๑</td>' . '</tr>';
                        $str .= '<tr>' . '<td style="text-align: center" colspan="4">บัญชีจดแจ้งเชื้อโรคและพิษจากสัตว์<br>(ผลิต ครอบครอง จำหน่าย นำเข้า ส่งออก นำผ่าน)</td>' . '</tr>';
                        $str .= '<tr>' . '<td style="text-align: right" colspan="4">ประจำเดือน ' . $inform_month . ' พ.ศ.' . $inform_year . '</td>' . '</tr>';
                        $str .= '</table>';
                        $str .= '<table style="text-align:left;font-family:arial;font-size:10px; width: 100%">';
                        $str .= '<tr>' . '<td>' . 'ชื่อหน่วยงาน' . '</td>' . '<td>' . $dept . '</td>' . '<td>' . 'หมายเลขจดแจ้ง' . '</td>' . '<td>' . $pathogen_code . '</td>' . '</tr>';
                        $str .= '<tr>' . '<td>' . 'ที่อยู่' . '</td>' . '<td>' . $addr . '</td>' . '</tr>';
                        $str .= '<tr>' . '<td>' . 'โทรศัพท์' . '</td>' . '<td>' . $tel . '</td>' . '<td>' . 'โทรสาร' . '</td>' . '<td>' . $fax . '</td>' . '</tr>';
                        $str .= '<tr>' . '<td>' . 'e-mail address' . '</td>' . '<td>' . $email . '</td>' . '</tr>';
                        $str .= '</table>';
                        $str .= '<br><br>';
                        
                        // TABLE
                        $str .= '<table style="text-align:left;font-family:arial;font-size:10px;" border="1" cellpadding="1" cellspacing="1" id="cssTable">
                        <thead>
                        <tr>
                        <th style="text-align: center; vertical-align: middle;" rowspan="2">ลำดับที่</th>
                        <th style="text-align: center; vertical-align: middle;" rowspan="2">ชื่อเชื้อโรค/<br>พิษจากสัตว์<br>(๑)</th>
                        <th style="text-align: center; vertical-align: middle;" rowspan="2">รหัสเชื้อโรค/<br>พิษจากสัตว์<br>(๒)</th>
                        <th style="text-align: center; vertical-align: middle;" rowspan="2">ชื่อผู้ควบคุม<br>(๓)</th>
                        <th style="text-align: center; vertical-align: middle;" rowspan="2">รูปแบบการ<br>จัดเก็บ</th>
                        <th style="text-align: center; vertical-align: middle;" rowspan="2">รวม<br>จำนวน<br>ทั้งหมด<br>ของเดือน<br>นี้</th>
                        <th style="text-align: center; vertical-align: middle;" colspan="6">จำนวน/ปริมาณที่ผลิต (๕)</th>
                        <th style="text-align: center; vertical-align: middle;" rowspan="2">ครอบ<br>ครอง</th>
                        <th style="text-align: center; vertical-align: middle;" colspan="6">จำนวน/ปริมาณที่จำหน่าย (๖)</th>
                        <th style="text-align: center; vertical-align: middle;" colspan="3">จำนวน/ปริมาณ (๗)</th>
                        </tr>
                        <tr>
                        <th style="text-align: center; vertical-align: middle;">เพาะ</th>
                        <th style="text-align: center; vertical-align: middle;">ผสม</th>
                        <th style="text-align: center; vertical-align: middle;">ปรุง</th>
                        <th style="text-align: center; vertical-align: middle;">แปร<br>สภาพ</th>
                        <th style="text-align: center; vertical-align: middle;">แบ่ง<br>บรร<br>จุ</th>
                        <th style="text-align: center; vertical-align: middle;">รวม<br>บรร<br>จุ</th>
                        <th style="text-align: center; vertical-align: middle;">ขาย</th>
                        <th style="text-align: center; vertical-align: middle;">จ่าย<br>แจก<br>ให้</th>
                        <th style="text-align: center; vertical-align: middle;">แลก<br>เปลี่ยน</th>
                        <th style="text-align: center; vertical-align: middle;">สูญ<br>หาย</th>
                        <th style="text-align: center; vertical-align: middle;">เสีย<br>หาย</th>
                        <th style="text-align: center; vertical-align: middle;">ทิ้ง<br>ทำ<br>ลาย</th>
                        <th style="text-align: center; vertical-align: middle;">นำเข้า<br>จาก<br>ต่าง<br>ประเทศ</th>
                        <th style="text-align: center; vertical-align: middle;">ส่งออก<br>ไป<br>ต่าง<br>ประเทศ</th>
                        <th style="text-align: center; vertical-align: middle;">นำผ่าน<br>ประเทศ<br>ไทยไปยัง<br>ประเทศ<br>อื่น</th>
                        </tr>
                        </thead>
                        <tbody>';
                        // BODY
                        $order = 1;
                        foreach ($datas as $item) {
                            if (strcmp($grpDept, $item->department->name) == 0) {
                                $str .= '<tr>';
                                $str .= '<td style="text-align: center">' . $order . '</td>';
                                $str .= '<td style="text-align: center">' . $item->pathogen_name . '</td>';
                                $str .= '<td style="text-align: center">' . $item->pathogen_code . '</td>';
                                $str .= '<td style="text-align: center">' . $item->pathogen_volume . '</td>';
                                $str .= '<td style="text-align: center">' . $item->supervisor . '</td>';
                                $str .= '<td style="text-align: center">' . $item->manufacture_plant . '</td>';
                                $str .= '<td style="text-align: center">' . $item->manufacture_fuse . '</td>';
                                $str .= '<td style="text-align: center">' . $item->manufacture_prepare . '</td>';
                                $str .= '<td style="text-align: center">' . $item->manufacture_transform . '</td>';
                                $str .= '<td style="text-align: center">' . $item->manufacture_packing . '</td>';
                                $str .= '<td style="text-align: center">' . $item->manufacture_total_packing . '</td>';
                                $str .= '<td style="text-align: center">' . $item->distribute_sell . '</td>';
                                $str .= '<td style="text-align: center">' . $item->distribute_pay . '</td>';
                                $str .= '<td style="text-align: center">' . $item->distribute_give . '</td>';
                                $str .= '<td style="text-align: center">' . $item->distribute_exchange . '</td>';
                                $str .= '<td style="text-align: center">' . $item->distribute_donate . '</td>';
                                $str .= '<td style="text-align: center">' . $item->distribute_lost . '</td>';
                                $str .= '<td style="text-align: center">' . $item->distribute_discard . '</td>';
                                $str .= '<td style="text-align: center">' . $item->distribute_destroy . '</td>';
                                $str .= '<td style="text-align: center">' . $item->import . '</td>';
                                $str .= '<td style="text-align: center">' . $item->export . '</td>';
                                $str .= '<td style="text-align: center">' . $item->import_to_other . '</td>';
                                $str .= '</tr>';
                                $order ++;
                            }
                        }
                        // END TABLE
                        $str .= '</tbody></table>';
                        
                        $str .= '<br>';
                        $str .= '<table style="text-align:left;font-family:arial;font-size:10px; width: 100%" border="0" cellpadding="1" cellspacing="1">';
                        $str .= '<tr><td>คำอธิบาย</td><td></td></tr>';
                        $str .= '<tr><td style="width: 10%"></td><td style="text-align: left;width: 90%">(๑) ชื่อเชื้อโรค/ผลิตผลจากเชื้อโรค/พิษจากสัตว์ ให้ระบุ ชื่อหรือชื่อทางวิทยาศาสตร์ของเชื้อโรค ผลิตผลจากเชื้อโรค หรือพิษจากสัตว์ที่ใช้ในภาษาอังกฤษ</td></tr>';
                        $str .= '<tr><td style="width: 10%"></td><td style="text-align: left;width: 90%">(๒) รหัสเชื้อโรค/ผลิตผลจากเชื้อโรค/พิษจากสัตว์ ให้ระบุ รหัสอ้างอิงที่มาของเชื้อโรค ผลิตผลจากเชื้อโรค หรือพิษจากสัตว์</td></tr>';
                        $str .= '<tr><td style="width: 10%"></td><td style="text-align: left;width: 90%">(๓) ผู้ควบคุม ให้ระบุชื่อของบุคคลที่หน่วยงานมอบหมายให้เป็นผู้ควบคุมดูแลเชื้อโรค ผลิตผลจากเชื้อโรค หรือพิษจากสัตว์ โดยต้องมีคุณสมบัติตามที่กฎหมายกำหนด</td></tr>';
                        $str .= '<tr><td style="width: 10%"></td><td style="text-align: left;width: 90%">(๔) วันที่ เดือน ปี ที่จัดทำบัญชีจดแจ้ง</td></tr>';
                        $str .= '<tr><td style="width: 10%"></td><td style="text-align: left;width: 90%">(๕) (๖) และ (๗) จำนวน/ปริมาณ ให้ระบุจำนวนหรือปริมาณพร้อมหน่วยนับ กรณีจำหน่ายให้ระบุปลายทางของการจำหน่า</td></tr>';
                        $str .= '<tr><td style="text-align: right" colspan="2">ผู้จดแจ้ง ' . $inform_name . '</td></tr>';
                        
                        $str .= '</table>';
                        
                        // create new PDF document
                        
                        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                        // set document information
                        $pdf->SetCreator(PDF_CREATOR);
                        $pdf->SetAuthor('');
                        $pdf->SetTitle('');
                        $pdf->SetSubject('');
                        $pdf->SetKeywords('');
                        
                        // set default header data
                        // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);
                        
                        // set header and footer fonts
                        $pdf->setHeaderFont(Array(
                            PDF_FONT_NAME_MAIN,
                            '',
                            PDF_FONT_SIZE_MAIN
                        ));
                        $pdf->setFooterFont(Array(
                            PDF_FONT_NAME_DATA,
                            '',
                            PDF_FONT_SIZE_DATA
                        ));
                        
                        // set default monospaced font
                        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                        
                        // set margins
                        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                        // Set font
                        $pdf->SetFont('thsarabun', '', 14);
                        $pdf->AddPage();
                        // Print text using writeHTMLCell()
                        $pdf->writeHTMLCell(0, 0, '', '', $str, 0, 1, 0, true, '', true);
                        
                        $grpDept = $item->department->name;
                    }
                }
                // Close and output PDF document
                // $dir = dirname(__FILE__) . '../../../uploads/tmp/' . date("Y-m-d") . '/' . UserLoginUtils::getUsersLoginId();
                $dir = dirname(__FILE__) . '../../../uploads';
                
                $tmp_pdf_file = $dir . '/rpt_' . date("Y-m-d") . '_' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT) . '.pdf';
                if (! file_exists($dir)) {
                    // mkdir($dir, 0777, true);
                }
                // Not found data.
                if (count($datas) > 0) {
                    $_SESSION['ReportNotFound'] = 0;
                    ob_end_clean();
                    $pdf->Output($tmp_pdf_file, 'D');
                } else {
                    $_SESSION['ReportNotFound'] = 1;
                    $this->render('//report/report01');
                }
            }
        } else {
            $this->render('//report/report01');
        }
    }

    public function actionReport02()
    {
        // Authen Login
        if (! UserLoginUtils::isLogin()) {
            $this->redirect(Yii::app()->createUrl('Site/login'));
        }
        
        if (isset($_POST['Pathogen'])) {
            
            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('');
            $pdf->SetTitle('');
            $pdf->SetSubject('');
            $pdf->SetKeywords('');
            
            // set default header data
            // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);
            
            // set header and footer fonts
            $pdf->setHeaderFont(Array(
                PDF_FONT_NAME_MAIN,
                '',
                PDF_FONT_SIZE_MAIN
            ));
            $pdf->setFooterFont(Array(
                PDF_FONT_NAME_DATA,
                '',
                PDF_FONT_SIZE_DATA
            ));
            
            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
            
            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            // Set font
            $pdf->SetFont('thsarabun', '', 14);
            $pdf->AddPage();
            
            $pdf->Cell(40, 5, ' ', 'LTR', 0, 'L', 0); // empty cell with left,top, and right borders
            $pdf->Cell(50, 5, '111 Here', 1, 0, 'L', 0);
            $pdf->StartTransform();
            // $pdf->Rotate(90);
            // $pdf->Ln();
            $pdf->Cell(50, 5, '222 Here', 1, 0, 'L', 0);
            
            $pdf->Ln();
            
            $pdf->Cell(40, 5, 'Solid Here', 'LR', 0, 'C', 0); // cell with left and right borders
            $pdf->Cell(50, 5, '[ o ] che1', 'LR', 0, 'L', 0);
            $pdf->Cell(50, 5, '[ x ] che2', 'LR', 0, 'L', 0);
            
            $pdf->Ln();
            
            $pdf->Cell(40, 5, '', 'LBR', 0, 'L', 0); // empty cell with left,bottom, and right borders
            $pdf->Cell(50, 5, '[ x ] def3', 'LRB', 0, 'L', 0);
            $pdf->Cell(50, 5, '[ o ] def4', 'LRB', 0, 'L', 0);
            
            $pdf->Ln();
            $pdf->Ln();
            $pdf->Ln();
            
            // $pdf->Ln();
            // $pdf->Cell(90, 12, "DATA1", 1);
            // $pdf->Cell(90, 12, "DATA2", 1);
            // $pdf->Ln();
            // $pdf->Cell(90, 12, "DATA1", 1);
            // $pdf->Cell(90, 12, "DATA2", 1);
            
            ob_end_clean();
            $pdf->Output($tmp_pdf_file, 'I');
        } else {
            // $dataProvider = new CActiveDataProvider("Pathogen", array(
            // 'criteria' => $criteria
            // ));
            
            // $this->render('//report/report01', array(
            // 'dataProvider' => $dataProvider
            // ));
            $this->render('//report/report02');
        }
    }

    public function actionReport03()
    {
        // Authen Login
        if (! UserLoginUtils::isLogin()) {
            $this->redirect(Yii::app()->createUrl('Site/login'));
        }
        
        if (isset($_POST['Pathogen'])) {
            
            // $model = new Pathogen();
            // $model->attributes = $_POST['Form1'];
            // $criteria = new CDbCriteria();
            
            // $datas = Pathogen::model()->findAll($criteria);
            // if (isset($datas)) {
            
            // // HEADER//
            // $dept = $datas[0]->department->name;
            // $inform_month = $datas[0]->inform_date;
            // $inform_year = $datas[0]->inform_date;
            // $inform_name = $datas[0]->inform_name;
            // $addr = $datas[0]->address;
            // $pathogen_code = $datas[0]->pathogen_code;
            // $tel = $datas[0]->phone_number;
            // $fax = $datas[0]->fax_number;
            // $email = $datas[0]->email;
            // // END HEADER
            // $str = '<br>';
            // $str .= '<table style="text-align:left;font-family:arial;font-size:12px; width: 100%">';
            // $str .= '<tr>' . '<td style="text-align: right" colspan="4">แบบ จจ.ช ๑</td>' . '</tr>';
            // $str .= '<tr>' . '<td style="text-align: center" colspan="4">บัญชีจดแจ้งเชื้อโรคและพิษจากสัตว์<br>(ผลิต ครอบครอง จำหน่าย นำเข้า ส่งออก นำผ่าน)</td>' . '</tr>';
            // $str .= '<tr>' . '<td style="text-align: right" colspan="4">ประจำเดือน ' . $inform_month . ' พ.ศ.' . $inform_year . '</td>' . '</tr>';
            // $str .= '</table>';
            // $str .= '<table style="text-align:left;font-family:arial;font-size:10px; width: 100%">';
            // $str .= '<tr>' . '<td>' . 'ชื่อหน่วยงาน' . '</td>' . '<td>' . $dept . '</td>' . '<td>' . 'หมายเลขจดแจ้ง' . '</td>' . '<td>' . $pathogen_code . '</td>' . '</tr>';
            // $str .= '<tr>' . '<td>' . 'ที่อยู่' . '</td>' . '<td>' . $addr . '</td>' . '</tr>';
            // $str .= '<tr>' . '<td>' . 'โทรศัพท์' . '</td>' . '<td>' . $tel . '</td>' . '<td>' . 'โทรสาร' . '</td>' . '<td>' . $fax . '</td>' . '</tr>';
            // $str .= '<tr>' . '<td>' . 'e-mail address' . '</td>' . '<td>' . $email . '</td>' . '</tr>';
            // $str .= '</table>';
            // $str .= '<br><br>';
            
            // // TABLE
            // $str .= '<table style="text-align:left;font-family:arial;font-size:10px;" border="1" cellpadding="1" cellspacing="1" id="cssTable">
            // <thead>
            // <tr>
            // <th style="text-align: center; vertical-align: middle;" rowspan="2">ลำดับที่</th>
            // <th style="text-align: center; vertical-align: middle;" rowspan="2">ชื่อเชื้อโรค/<br>พิษจากสัตว์<br>(๑)</th>
            // <th style="text-align: center; vertical-align: middle;" rowspan="2">รหัสเชื้อโรค/<br>พิษจากสัตว์<br>(๒)</th>
            // <th style="text-align: center; vertical-align: middle;" rowspan="2">ชื่อผู้ควบคุม<br>(๓)</th>
            // <th style="text-align: center; vertical-align: middle;" rowspan="2">รูปแบบการ<br>จัดเก็บ</th>
            // <th style="text-align: center; vertical-align: middle;" rowspan="2">รวม<br>จำนวน<br>ทั้งหมด<br>ของเดือน<br>นี้</th>
            // <th style="text-align: center; vertical-align: middle;" colspan="6">จำนวน/ปริมาณที่ผลิต (๕)</th>
            // <th style="text-align: center; vertical-align: middle;" rowspan="2">ครอบ<br>ครอง</th>
            // <th style="text-align: center; vertical-align: middle;" colspan="6">จำนวน/ปริมาณที่จำหน่าย (๖)</th>
            // <th style="text-align: center; vertical-align: middle;" colspan="3">จำนวน/ปริมาณ (๗)</th>
            // </tr>
            // <tr>
            // <th style="text-align: center; vertical-align: middle;"><img src="http://www.iconarchive.com/show/100-flat-icons-by-graphicloads/home-icon.html" height="5" width="5">เพาะ</th>
            // <th style="text-align: center; vertical-align: middle;">ผสม</th>
            // <th style="text-align: center; vertical-align: middle;">ปรุง</th>
            // <th style="text-align: center; vertical-align: middle;">แปร<br>สภาพ</th>
            // <th style="text-align: center; vertical-align: middle;">แบ่ง<br>บรร<br>จุ</th>
            // <th style="text-align: center; vertical-align: middle;">รวม<br>บรร<br>จุ</th>
            // <th style="text-align: center; vertical-align: middle;">ขาย</th>
            // <th style="text-align: center; vertical-align: middle;">จ่าย<br>แจก<br>ให้</th>
            // <th style="text-align: center; vertical-align: middle;">แลก<br>เปลี่ยน</th>
            // <th style="text-align: center; vertical-align: middle;">สูญ<br>หาย</th>
            // <th style="text-align: center; vertical-align: middle;">เสีย<br>หาย</th>
            // <th style="text-align: center; vertical-align: middle;">ทิ้ง<br>ทำ<br>ลาย</th>
            // <th style="text-align: center; vertical-align: middle;">นำเข้า<br>จาก<br>ต่าง<br>ประเทศ</th>
            // <th style="text-align: center; vertical-align: middle;">ส่งออก<br>ไป<br>ต่าง<br>ประเทศ</th>
            // <th style="text-align: center; vertical-align: middle;">นำผ่าน<br>ประเทศ<br>ไทยไปยัง<br>ประเทศ<br>อื่น</th>
            // </tr>
            // </thead>
            // <tbody>';
            // // BODY
            // $order = 1;
            // foreach ($datas as $item) {
            // $str .= '<tr>';
            // $str .= '<td style="text-align: center">' . $order . '</td>';
            // $str .= '<td style="text-align: center">' . $item->pathogen_name . '</td>';
            // $str .= '<td style="text-align: center">' . $item->pathogen_code . '</td>';
            // $str .= '<td style="text-align: center">' . $item->pathogen_volume . '</td>';
            // $str .= '<td style="text-align: center">' . $item->supervisor . '</td>';
            // $str .= '<td style="text-align: center">' . $item->manufacture_plant . '</td>';
            // $str .= '<td style="text-align: center">' . $item->manufacture_fuse . '</td>';
            // $str .= '<td style="text-align: center">' . $item->manufacture_prepare . '</td>';
            // $str .= '<td style="text-align: center">' . $item->manufacture_transform . '</td>';
            // $str .= '<td style="text-align: center">' . $item->manufacture_packing . '</td>';
            // $str .= '<td style="text-align: center">' . $item->manufacture_total_packing . '</td>';
            // $str .= '<td style="text-align: center">' . $item->distribute_sell . '</td>';
            // $str .= '<td style="text-align: center">' . $item->distribute_pay . '</td>';
            // $str .= '<td style="text-align: center">' . $item->distribute_give . '</td>';
            // $str .= '<td style="text-align: center">' . $item->distribute_exchange . '</td>';
            // $str .= '<td style="text-align: center">' . $item->distribute_donate . '</td>';
            // $str .= '<td style="text-align: center">' . $item->distribute_lost . '</td>';
            // $str .= '<td style="text-align: center">' . $item->distribute_discard . '</td>';
            // $str .= '<td style="text-align: center">' . $item->distribute_destroy . '</td>';
            // $str .= '<td style="text-align: center">' . $item->import . '</td>';
            // $str .= '<td style="text-align: center">' . $item->export . '</td>';
            // $str .= '<td style="text-align: center">' . $item->import_to_other . '</td>';
            // $str .= '</tr>';
            // $order ++;
            // }
            // // END TABLE
            // $str .= '</tbody></table>';
            
            // $str .= '<br>';
            // $str .= '<table style="text-align:left;font-family:arial;font-size:10px; width: 100%" border="0" cellpadding="1" cellspacing="1">';
            // $str .= '<tr><td>คำอธิบาย</td><td></td></tr>';
            // $str .= '<tr><td style="width: 10%"></td><td style="text-align: left;width: 90%">(๑) ชื่อเชื้อโรค/ผลิตผลจากเชื้อโรค/พิษจากสัตว์ ให้ระบุ ชื่อหรือชื่อทางวิทยาศาสตร์ของเชื้อโรค ผลิตผลจากเชื้อโรค หรือพิษจากสัตว์ที่ใช้ในภาษาอังกฤษ</td></tr>';
            // $str .= '<tr><td style="width: 10%"></td><td style="text-align: left;width: 90%">(๒) รหัสเชื้อโรค/ผลิตผลจากเชื้อโรค/พิษจากสัตว์ ให้ระบุ รหัสอ้างอิงที่มาของเชื้อโรค ผลิตผลจากเชื้อโรค หรือพิษจากสัตว์</td></tr>';
            // $str .= '<tr><td style="width: 10%"></td><td style="text-align: left;width: 90%">(๓) ผู้ควบคุม ให้ระบุชื่อของบุคคลที่หน่วยงานมอบหมายให้เป็นผู้ควบคุมดูแลเชื้อโรค ผลิตผลจากเชื้อโรค หรือพิษจากสัตว์ โดยต้องมีคุณสมบัติตามที่กฎหมายกำหนด</td></tr>';
            // $str .= '<tr><td style="width: 10%"></td><td style="text-align: left;width: 90%">(๔) วันที่ เดือน ปี ที่จัดทำบัญชีจดแจ้ง</td></tr>';
            // $str .= '<tr><td style="width: 10%"></td><td style="text-align: left;width: 90%">(๕) (๖) และ (๗) จำนวน/ปริมาณ ให้ระบุจำนวนหรือปริมาณพร้อมหน่วยนับ กรณีจำหน่ายให้ระบุปลายทางของการจำหน่า</td></tr>';
            // $str .= '<tr><td style="text-align: right" colspan="2">ผู้จดแจ้ง ' . $inform_name . '</td></tr>';
            
            // $str .= '</table>';
            
            // // create new PDF document
            // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            // // set document information
            // $pdf->SetCreator(PDF_CREATOR);
            // $pdf->SetAuthor('');
            // $pdf->SetTitle('');
            // $pdf->SetSubject('');
            // $pdf->SetKeywords('');
            
            // // set default header data
            // // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);
            
            // // set header and footer fonts
            // $pdf->setHeaderFont(Array(
            // PDF_FONT_NAME_MAIN,
            // '',
            // PDF_FONT_SIZE_MAIN
            // ));
            // $pdf->setFooterFont(Array(
            // PDF_FONT_NAME_DATA,
            // '',
            // PDF_FONT_SIZE_DATA
            // ));
            
            // // set default monospaced font
            // $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
            
            // // set margins
            // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            // // Set font
            // $pdf->SetFont('thsarabun', '', 14);
            // $pdf->AddPage();
            // // Print text using writeHTMLCell()
            // $pdf->writeHTMLCell(0, 0, '', '', $str, 0, 1, 0, true, '', true);
            
            // // Close and output PDF document
            // $dir = dirname(__FILE__) . '../../../uploads/tmp/' . date("Y-m-d") . '/' . UserLoginUtils::getUsersLoginId();
            // $tmp_pdf_file = $dir . '/rpt_' . date("Y-m-d") . '_' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT) . '.pdf';
            // if (! file_exists($dir)) {
            // mkdir($dir, 0777, true);
            // }
            // ob_end_clean();
            // $pdf->Output($tmp_pdf_file, 'I');
            // }
        } else {
            // $dataProvider = new CActiveDataProvider("Pathogen", array(
            // 'criteria' => $criteria
            // ));
            
            // $this->render('//report/report01', array(
            // 'dataProvider' => $dataProvider
            // ));
            $this->render('//report/report03');
        }
    }

    public function actionReport04()
    {
        // Authen Login
        if (! UserLoginUtils::isLogin()) {
            $this->redirect(Yii::app()->createUrl('Site/login'));
        }
        
        if (isset($_POST['Rpt'])) {
            
            $_SESSION['ReportNotFound'] = 0;
            $startDate = CommonUtil::getDate(array_values($_POST['Rpt'])[0]);
            $endDate = CommonUtil::getDate(array_values($_POST['Rpt'])[1]);
            $criteria = new CDbCriteria();
            $criteria->addCondition("t.create_date between '" . $startDate . "' AND '" . $endDate . "'");
            
            $datas = PersonSpecialList::model()->findAll($criteria);
            if (isset($datas)) {
                
                $str = '<br>';
                $str .= '<table style="text-align:left;font-family:arial;font-size:12px; width: 100%">';
                $str .= '<tr>' . '<td style="text-align: center" colspan="4">มูลผู้เชี่ยวชาญด้านความปลอดภัยทางชีวภาพในสาขาต่าง ๆ </td>' . '</tr>';
                $str .= '</table>';
                $str .= '<br><br>';
                
                // TABLE
                $str .= '<table style="text-align:left;font-family:arial;font-size:10px;" border="1" cellpadding="1" cellspacing="1" id="cssTable">
            <thead>
                <tr>
					<th style="text-align: center;width: 5%">ลำดับ</th>
					<th style="text-align: center;width: 20%">ชื่อ</th>
					<th style="text-align: center;width: 20%">นามสกุล</th>
					<th style="text-align: center;width: 20%">ตำแหน่ง</th>
					<th style="text-align: center;width: 35%">ความเชี่ยวชาญ</th>
                </tr>
            </thead>
            <tbody>';
                // BODY
                $order = 1;
                foreach ($datas as $item) {
                    $str .= '<tr>';
                    $str .= '<td style="text-align: center;width: 5%">' . $order . '</td>';
                    $str .= '<td style="text-align: center;width: 20%">' . $item->firstname . '</td>';
                    $str .= '<td style="text-align: center;width: 20%">' . $item->surname . '</td>';
                    $str .= '<td style="text-align: center;width: 20%">' . $item->position->name . '</td>';
                    $str .= '<td style="text-align: center;width: 35%">' . $item->desc . '</td>';
                    $str .= '</tr>';
                    $order ++;
                }
                // END TABLE
                $str .= '</tbody></table>';
                
                // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('');
                $pdf->SetTitle('');
                $pdf->SetSubject('');
                $pdf->SetKeywords('');
                
                // set default header data
                // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);
                
                // set header and footer fonts
                $pdf->setHeaderFont(Array(
                    PDF_FONT_NAME_MAIN,
                    '',
                    PDF_FONT_SIZE_MAIN
                ));
                $pdf->setFooterFont(Array(
                    PDF_FONT_NAME_DATA,
                    '',
                    PDF_FONT_SIZE_DATA
                ));
                
                // set default monospaced font
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                
                // set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                // Set font
                $pdf->SetFont('thsarabun', '', 14);
                $pdf->AddPage();
                // Print text using writeHTMLCell()
                $pdf->writeHTMLCell(0, 0, '', '', $str, 0, 1, 0, true, '', true);
                
                // Close and output PDF document
                $dir = dirname(__FILE__) . '../../../uploads';
                
                $tmp_pdf_file = $dir . '/rpt_' . date("Y-m-d") . '_' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT) . '.pdf';
                if (! file_exists($dir)) {
                    // mkdir($dir, 0777, true);
                }
                // Not found data.
                if (count($datas) > 0) {
                    ob_end_clean();
                    $pdf->Output($tmp_pdf_file, 'D');
                    $_SESSION['ReportNotFound'] = 0;
                } else {
                    $_SESSION['ReportNotFound'] = 1;
                    $this->render('//report/report04');
                }
            }
        } else {
            // $dataProvider = new CActiveDataProvider("Pathogen", array(
            // 'criteria' => $criteria
            // ));
            
            // $this->render('//report/report01', array(
            // 'dataProvider' => $dataProvider
            // ));
            $this->render('//report/report04');
        }
    }

    public function actionReport05()
    {
        // Authen Login
        if (! UserLoginUtils::isLogin()) {
            $this->redirect(Yii::app()->createUrl('Site/login'));
        }
        
        if (isset($_POST['Rpt'])) {
            $_SESSION['ReportNotFound'] = 0;
            
            $startDate = CommonUtil::getDate(array_values($_POST['Rpt'])[0]);
            $endDate = CommonUtil::getDate(array_values($_POST['Rpt'])[1]);
            $criteria = new CDbCriteria();
            $criteria->addCondition("t.create_date between '" . $startDate . "' AND '" . $endDate . "'");
            
            $datas = PersonLecturer::model()->findAll($criteria);
            if (isset($datas)) {
                
                $str = '<br>';
                $str .= '<table style="text-align:left;font-family:arial;font-size:12px; width: 100%">';
                $str .= '<tr>' . '<td style="text-align: center" colspan="4">ข้อมูลด้านวิทยากร</td>' . '</tr>';
                $str .= '</table>';
                $str .= '<br><br>';
                
                // TABLE
                $str .= '<table style="text-align:left;font-family:arial;font-size:10px;" border="1" cellpadding="1" cellspacing="1" id="cssTable">
            <thead>
                <tr>
					<th style="text-align: center;width: 5%">ลำดับ</th>
					<th style="text-align: center;width: 20%">ชื่อ</th>
					<th style="text-align: center;width: 20%">นามสกุล</th>
					<th style="text-align: center;width: 20%">ตำแหน่ง</th>
					<th style="text-align: center;width: 35%">วิทยากรทางด้าน</th>
                </tr>
            </thead>
            <tbody>';
                // BODY
                $order = 1;
                foreach ($datas as $item) {
                    $str .= '<tr>';
                    $str .= '<td style="text-align: center;width: 5%">' . $order . '</td>';
                    $str .= '<td style="text-align: center;width: 20%">' . $item->firstname . '</td>';
                    $str .= '<td style="text-align: center;width: 20%">' . $item->surname . '</td>';
                    $str .= '<td style="text-align: center;width: 20%">' . $item->position->name . '</td>';
                    $str .= '<td style="text-align: center;width: 35%">' . $item->desc . '</td>';
                    $str .= '</tr>';
                    $order ++;
                }
                // END TABLE
                $str .= '</tbody></table>';
                
                // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('');
                $pdf->SetTitle('');
                $pdf->SetSubject('');
                $pdf->SetKeywords('');
                
                // set default header data
                // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);
                
                // set header and footer fonts
                $pdf->setHeaderFont(Array(
                    PDF_FONT_NAME_MAIN,
                    '',
                    PDF_FONT_SIZE_MAIN
                ));
                $pdf->setFooterFont(Array(
                    PDF_FONT_NAME_DATA,
                    '',
                    PDF_FONT_SIZE_DATA
                ));
                
                // set default monospaced font
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                
                // set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                // Set font
                $pdf->SetFont('thsarabun', '', 14);
                $pdf->AddPage();
                // Print text using writeHTMLCell()
                $pdf->writeHTMLCell(0, 0, '', '', $str, 0, 1, 0, true, '', true);
                
                // Close and output PDF document
                $dir = dirname(__FILE__) . '../../../uploads';
                
                $tmp_pdf_file = $dir . '/rpt_' . date("Y-m-d") . '_' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT) . '.pdf';
                if (! file_exists($dir)) {
                    // mkdir($dir, 0777, true);
                }
                // Not found data.
                if (count($datas) > 0) {
                    $_SESSION['ReportNotFound'] = 0;
                    ob_end_clean();
                    $pdf->Output($tmp_pdf_file, 'D');
                } else {
                    $_SESSION['ReportNotFound'] = 1;
                    $this->render('//report/report05');
                }
            }
        } else {
            // $dataProvider = new CActiveDataProvider("Pathogen", array(
            // 'criteria' => $criteria
            // ));
            
            // $this->render('//report/report01', array(
            // 'dataProvider' => $dataProvider
            // ));
            $this->render('//report/report05');
        }
    }

    public function actionReport06()
    {
        // Authen Login
        if (! UserLoginUtils::isLogin()) {
            $this->redirect(Yii::app()->createUrl('Site/login'));
        }
        
        if (isset($_POST['Rpt'])) {
            
            $_SESSION['ReportNotFound'] = 0;
            $startDate = CommonUtil::getDate(array_values($_POST['Rpt'])[0]);
            $endDate = CommonUtil::getDate(array_values($_POST['Rpt'])[1]);
            $criteria = new CDbCriteria();
            $criteria->addCondition("t.create_date between '" . $startDate . "' AND '" . $endDate . "'");
            
            $datas = PersonTraining::model()->findAll($criteria);
            if (isset($datas)) {
                
                $str = '<br>';
                $str .= '<table style="text-align:left;font-family:arial;font-size:12px; width: 100%">';
                $str .= '<tr>' . '<td style="text-align: center" colspan="4">ข้อมูลผู้ผ่านการอบรม</td>' . '</tr>';
                $str .= '</table>';
                $str .= '<br><br>';
                
                // TABLE
                $str .= '<table style="text-align:left;font-family:arial;font-size:10px;" border="1" cellpadding="1" cellspacing="1" id="cssTable">
            <thead>
                <tr>
					<th style="text-align: center;width: 5%">ลำดับ</th>
					<th style="text-align: center;width: 20%">ชื่อ</th>
					<th style="text-align: center;width: 20%">นามสกุล</th>
					<th style="text-align: center;width: 55%">หลักสูตรที่อบรม</th>
                </tr>
            </thead>
            <tbody>';
                // BODY
                $order = 1;
                foreach ($datas as $item) {
                    $str .= '<tr>';
                    $str .= '<td style="text-align: center;width: 5%">' . $order . '</td>';
                    $str .= '<td style="text-align: center;width: 20%">' . $item->firstname . '</td>';
                    $str .= '<td style="text-align: center;width: 20%">' . $item->surname . '</td>';
                    $str .= '<td style="text-align: left;width: 55%">' . $item->course->name . '</td>';
                    $str .= '</tr>';
                    $order ++;
                }
                // END TABLE
                $str .= '</tbody></table>';
                
                // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('');
                $pdf->SetTitle('');
                $pdf->SetSubject('');
                $pdf->SetKeywords('');
                
                // set default header data
                // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);
                
                // set header and footer fonts
                $pdf->setHeaderFont(Array(
                    PDF_FONT_NAME_MAIN,
                    '',
                    PDF_FONT_SIZE_MAIN
                ));
                $pdf->setFooterFont(Array(
                    PDF_FONT_NAME_DATA,
                    '',
                    PDF_FONT_SIZE_DATA
                ));
                
                // set default monospaced font
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                
                // set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                // Set font
                $pdf->SetFont('thsarabun', '', 14);
                $pdf->AddPage();
                // Print text using writeHTMLCell()
                $pdf->writeHTMLCell(0, 0, '', '', $str, 0, 1, 0, true, '', true);
                
                // Close and output PDF document
                $dir = dirname(__FILE__) . '../../../uploads';
                
                $tmp_pdf_file = $dir . '/rpt_' . date("Y-m-d") . '_' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT) . '.pdf';
                if (! file_exists($dir)) {
                    // mkdir($dir, 0777, true);
                }
                // Not found data.
                if (count($datas) > 0) {
                    $_SESSION['ReportNotFound'] = 0;
                    ob_end_clean();
                    $pdf->Output($tmp_pdf_file, 'D');
                } else {
                    $_SESSION['ReportNotFound'] = 1;
                    $this->render('//report/report05');
                }
            }
        } else {
            // $dataProvider = new CActiveDataProvider("Pathogen", array(
            // 'criteria' => $criteria
            // ));
            
            // $this->render('//report/report01', array(
            // 'dataProvider' => $dataProvider
            // ));
            $this->render('//report/report06');
        }
    }

    public function actionReport07()
    {
        // Authen Login
        if (! UserLoginUtils::isLogin()) {
            $this->redirect(Yii::app()->createUrl('Site/login'));
        }
        
        if (isset($_POST['Rpt'])) {
            
            $_SESSION['ReportNotFound'] = 0;
            $startDate = CommonUtil::getDate(array_values($_POST['Rpt'])[0]);
            $endDate = CommonUtil::getDate(array_values($_POST['Rpt'])[1]);
            $criteria = new CDbCriteria();
            $criteria->addCondition("t.create_date between '" . $startDate . "' AND '" . $endDate . "'");
            
            $datas = PersonCredit::model()->findAll($criteria);
            if (isset($datas)) {
                
                $str = '<br>';
                $str .= '<table style="text-align:left;font-family:arial;font-size:12px; width: 100%">';
                $str .= '<tr>' . '<td style="text-align: center" colspan="4">ข้อมูล Credit การสอบของผู้ผ่านหลักสูตรอบรม Training for the trainer <br>สำหรับเป็นวิยากรประจำมหาวิทยาลัยมหิดลและส่วนงานต่าง ๆ </td>' . '</tr>';
                $str .= '</table>';
                $str .= '<br><br>';
                
                // TABLE
                $str .= '<table style="text-align:left;font-family:arial;font-size:10px;" border="1" cellpadding="1" cellspacing="1" id="cssTable">
            <thead>
                <tr>
					<th style="text-align: center;width: 5%">ลำดับ</th>
					<th style="text-align: center;width: 20%">ชื่อ</th>
					<th style="text-align: center;width: 20%">นามสกุล</th>
					<th style="text-align: center;width: 55%">Credit</th>
                </tr>
            </thead>
            <tbody>';
                // BODY
                $order = 1;
                foreach ($datas as $item) {
                    $str .= '<tr>';
                    $str .= '<td style="text-align: center;width: 5%">' . $order . '</td>';
                    $str .= '<td style="text-align: center;width: 20%">' . $item->firstname . '</td>';
                    $str .= '<td style="text-align: center;width: 20%">' . $item->surname . '</td>';
                    $str .= '<td style="text-align: center;width: 55%">' . $item->credit . '</td>';
                    $str .= '</tr>';
                    $order ++;
                }
                // END TABLE
                $str .= '</tbody></table>';
                
                // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('');
                $pdf->SetTitle('');
                $pdf->SetSubject('');
                $pdf->SetKeywords('');
                
                // set default header data
                // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);
                
                // set header and footer fonts
                $pdf->setHeaderFont(Array(
                    PDF_FONT_NAME_MAIN,
                    '',
                    PDF_FONT_SIZE_MAIN
                ));
                $pdf->setFooterFont(Array(
                    PDF_FONT_NAME_DATA,
                    '',
                    PDF_FONT_SIZE_DATA
                ));
                
                // set default monospaced font
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                
                // set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                // Set font
                $pdf->SetFont('thsarabun', '', 14);
                $pdf->AddPage();
                // Print text using writeHTMLCell()
                $pdf->writeHTMLCell(0, 0, '', '', $str, 0, 1, 0, true, '', true);
                
                // Close and output PDF document
                $dir = dirname(__FILE__) . '../../../uploads';
                
                $tmp_pdf_file = $dir . '/rpt_' . date("Y-m-d") . '_' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT) . '.pdf';
                if (! file_exists($dir)) {
                    // mkdir($dir, 0777, true);
                }
                // Not found data.
                if (count($datas) > 0) {
                    $_SESSION['ReportNotFound'] = 0;
                    ob_end_clean();
                    $pdf->Output($tmp_pdf_file, 'D');
                } else {
                    $_SESSION['ReportNotFound'] = 1;
                    $this->render('//report/report05');
                }
            }
        } else {
            // $dataProvider = new CActiveDataProvider("Pathogen", array(
            // 'criteria' => $criteria
            // ));
            
            // $this->render('//report/report01', array(
            // 'dataProvider' => $dataProvider
            // ));
            $this->render('//report/report07');
        }
    }

    public function actionReport08()
    {
        // Authen Login
        if (! UserLoginUtils::isLogin()) {
            $this->redirect(Yii::app()->createUrl('Site/login'));
        }
        
        if (isset($_POST['Rpt'])) {
            
            $_SESSION['ReportNotFound'] = 0;
            $startDate = CommonUtil::getDate(array_values($_POST['Rpt'])[0]);
            $endDate = CommonUtil::getDate(array_values($_POST['Rpt'])[1]);
            $criteria = new CDbCriteria();
            $criteria->addCondition("t.create_date between '" . $startDate . "' AND '" . $endDate . "'");
            
            $datas = PersonBiosafety::model()->findAll($criteria);
            if (isset($datas)) {
                
                $str = '<br>';
                $str .= '<table style="text-align:left;font-family:arial;font-size:12px; width: 100%">';
                $str .= '<tr>' . '<td style="text-align: center" colspan="4">ข้อมูลเจ้าหน้าที่ความปลอดภัยทางชีวภาพ </td>' . '</tr>';
                $str .= '</table>';
                $str .= '<br><br>';
                
                // TABLE
                $str .= '<table style="text-align:left;font-family:arial;font-size:10px;" border="1" cellpadding="1" cellspacing="1" id="cssTable">
            <thead>
                <tr>
					<th style="text-align: center;width: 5%">ลำดับ</th>
					<th style="text-align: center;width: 20%">ชื่อ</th>
					<th style="text-align: center;width: 20%">นามสกุล</th>
					<th style="text-align: center;width: 55%">ตำแหน่ง</th>
                </tr>
            </thead>
            <tbody>';
                // BODY
                $order = 1;
                foreach ($datas as $item) {
                    $str .= '<tr>';
                    $str .= '<td style="text-align: center;width: 5%">' . $order . '</td>';
                    $str .= '<td style="text-align: center;width: 20%">' . $item->firstname . '</td>';
                    $str .= '<td style="text-align: center;width: 20%">' . $item->surname . '</td>';
                    $str .= '<td style="text-align: center;width: 55%">' . $item->position->name . '</td>';
                    $str .= '</tr>';
                    $order ++;
                }
                // END TABLE
                $str .= '</tbody></table>';
                
                // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('');
                $pdf->SetTitle('');
                $pdf->SetSubject('');
                $pdf->SetKeywords('');
                
                // set default header data
                // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);
                
                // set header and footer fonts
                $pdf->setHeaderFont(Array(
                    PDF_FONT_NAME_MAIN,
                    '',
                    PDF_FONT_SIZE_MAIN
                ));
                $pdf->setFooterFont(Array(
                    PDF_FONT_NAME_DATA,
                    '',
                    PDF_FONT_SIZE_DATA
                ));
                
                // set default monospaced font
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                
                // set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                // Set font
                $pdf->SetFont('thsarabun', '', 14);
                $pdf->AddPage();
                // Print text using writeHTMLCell()
                $pdf->writeHTMLCell(0, 0, '', '', $str, 0, 1, 0, true, '', true);
                
                // Close and output PDF document
                $dir = dirname(__FILE__) . '../../../uploads';
                
                $tmp_pdf_file = $dir . '/rpt_' . date("Y-m-d") . '_' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT) . '.pdf';
                if (! file_exists($dir)) {
                    // mkdir($dir, 0777, true);
                }
                // Not found data.
                if (count($datas) > 0) {
                    $_SESSION['ReportNotFound'] = 0;
                    ob_end_clean();
                    $pdf->Output($tmp_pdf_file, 'D');
                } else {
                    $_SESSION['ReportNotFound'] = 1;
                    $this->render('//report/report06');
                }
            }
        } else {
            // $dataProvider = new CActiveDataProvider("Pathogen", array(
            // 'criteria' => $criteria
            // ));
            
            // $this->render('//report/report01', array(
            // 'dataProvider' => $dataProvider
            // ));
            $this->render('//report/report08');
        }
    }
}

