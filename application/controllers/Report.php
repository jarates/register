<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Report extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('other_model','other');
		$this->load->model('register_model','reg');
		$this->load->model('period_model','period');
	}

	public function print_register(){

		if(!empty($this->uri->segment(3))){
			$id = $this->uri->segment(3);
			$reg = $this->reg->search_print_register($id);
			$programe = $this->other->get_programe();
			$info = $this->other->get_info_school();

			$rs = $reg['rs'];

			$tumbon = $this->other->get_districts_byId($rs[0]->reg_addr_tumbon);
			$tumbon = $tumbon->result();
			$reg_addr_tumbon = $tumbon[0]->name_th;

			$aum = $this->other->get_amphures_byId($rs[0]->reg_addr_district);
			$aum = $aum->result();
			$reg_addr_district = $aum[0]->name_th;

			$pro = $this->other->get_province_byId($rs[0]->reg_addr_province);
			$pro = $pro->result();
			$reg_addr_province = $pro[0]->name_th;

			$from_aum = $this->other->get_amphures_byId($rs[0]->reg_from_school_district);
			$from_aum = $from_aum->result();
			$reg_from_school_district = $from_aum[0]->name_th;

			$from_pro = $this->other->get_province_byId($rs[0]->reg_from_school_province);
			$from_pro = $from_pro->result();
			$reg_from_school_province = $from_pro[0]->name_th;
			
			if($reg['row'] <= 0){
				echo 'ไม่พบข้อมูล';
				exit();
			}

			if($rs[0]->reg_gender == 'ชาย'){
				$gender_male = "checked='checked'";
				$gender_female = "";
			}

			if($rs[0]->reg_gender == 'หญิง'){
				$gender_female = "checked='checked'";
				$gender_male = "";
			}

			if($rs[0]->reg_level == 1){
				$txt_level = 'ป.6';
			}else if($rs[0]->reg_level == 4){
				$txt_level = 'ม.3';
			}

			header('Content-Type: text/html; charset=utf-8');
			require_once('MPDF57/mpdf.php');

			$html = "

					<div style='border: 0px #333; border-style: dotted; padding: 5px;'>

						<div style='float: left; width: 150px;'>
							<img width='125' src='".base_url('uploadFile/info-school/'.$info['logo_pdf'])."'>
						</div>

						<div style='float: left; width: 430px; text-align: center;'>
							
							<div style='font-size: 25px; font-weight: bold; border: 1px solid #333;'>&nbsp; ใบสมัครเรียน ปีการศึกษาที่ ".($rs[0]->period_year+543)." &nbsp;</div>

							<div style='font-size: 24px; margin-top: 5px;'>".$info['school_name']."</div>

							<div style='font-size: 24px;'>
								....................................................................................
							</div>

							<div style='font-size: 22px; margin-top: 5px;'>
								<b>ยื่นใบสมัครวันที่</b> 
								&nbsp;".date('d', strtotime($rs[0]->reg_date_create))."&nbsp;
								<b>เดือน</b>
								&nbsp;".convert_month(date('m', strtotime($rs[0]->reg_date_create)),'full')."&nbsp;
								<b>พ.ศ.</b>
								&nbsp;".(date('Y', strtotime($rs[0]->reg_date_create))+543)."&nbsp;
							</div>

						</div>

						<div style='font-size: 19px; border: 1px solid #333; width: 150px; float: right; vertical-align: top;'>
							&nbsp; เลขที่ใบสมัคร &nbsp;".$rs[0]->reg_id ."&nbsp;
						</div>

						<div style='font-size: 19px; border: 2px solid #333; width: 120px; float: right; vertical-align: top; margin-top: 20px; border-style: dotted; text-align: center; height: 130px;'>
							ติดรูปถ่าย
						</div>

					</div>

					<div style='padding-left: 35px;padding-right: 35px; padding-top: 10px;'>

						<div>

							<div style='float: left; width: 120px;'>
								<b>1.</b> ระบบการเรียน
							</div>

							<div style='float: left; width: 245px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->learning_name."
							</div>

							<div style='float: left; width: 60px;'>
								ระดับ
							</div>

							<div style='float: left; width: 245px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->education_name."
							</div>

						</div>

						<div>

							<div style='float: left; width: 55px; margin-left: 18px;'>
								สาขา
							</div>

							<div style='float: left; width: 260px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->majoring_name."
							</div>

							<div style='float: left; width: 55px; margin-left: 20px;'>
								คณะ
							</div>

							<div style='float: left; width: 260px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->faculty_name."
							</div>

						</div>

						<div style='margin-top: 15px;'>

							<div style='float: left; width: 80px;'>
								<b>2.</b> ชื่อผู้สมัคร
							</div>

							<div style='float: left; width: 182px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_name_prefix." ".$rs[0]->reg_fname."
							</div>

							<div style='float: left; width: 60px;'>
								นามสกุล
							</div>

							<div style='float: left; width: 182px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_lname."
							</div>

							<div style='float: left; width: 40px;'>
								เพศ
							</div>

							<div style='float: left; width: 130px; text-align: center;'>
								<input type='checkbox' ".$gender_male."> ชาย
								&nbsp;&nbsp;
								<input type='checkbox' ".$gender_female."> หญิง
							</div>

						</div>

						<div>

							<div style='float: left; width: 55px; margin-left: 18px;'>
								เชื้อชาติ
							</div>

							<div style='float: left; width: 70px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_race."
							</div>

							<div style='float: left; width: 55px; margin-left: 20px;'>
								สัญชาติ
							</div>

							<div style='float: left; width: 70px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_nationality."
							</div>

							<div style='float: left; width: 55px; margin-left: 20px;'>
								ศาสนา
							</div>

							<div style='float: left; width: 80px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_religion."
							</div>

							<div style='float: left; width: 55px; margin-left: 20px;'>
								เกิดวันที่
							</div>

							<div style='float: left; width: 155px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".date('d', strtotime($rs[0]->reg_birthday))."
								&nbsp;
								".convert_month(date('m', strtotime($rs[0]->reg_birthday)),'m')."
								&nbsp;
								".(date('Y', strtotime($rs[0]->reg_birthday))+543)."
							</div>

						</div>

						<div style='margin-top: 15px;'>

							<div style='float: left; width: 135px;'>
								<b>3.</b> ที่อยู่ปัจจุบัน &nbsp; เลขที่
							</div>

							<div style='float: left; width: 40px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_addr_number."
							</div>

							<div style='float: left; width: 50px; margin-left: 20px;'>
								หมู่บ้าน
							</div>

							<div style='float: left; width: 130px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_addr_village."
							</div>

							<div style='float: left; width: 35px; margin-left: 20px;'>
								หมู่ที่
							</div>

							<div style='float: left; width: 60px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_addr_moo."
							</div>

							<div style='float: left; width: 35px; margin-left: 20px;'>
								ตำบล
							</div>

							<div style='float: left; width: 130px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$reg_addr_tumbon."
							</div>

						</div>

						<div>

							<div style='float: left; width: 55px; margin-left: 18px;'>
								อำเภอ
							</div>

							<div style='float: left; width: 140px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$reg_addr_district."
							</div>

							<div style='float: left; width: 55px; margin-left: 20px;'>
								จังหวัด
							</div>

							<div style='float: left; width: 140px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$reg_addr_province."
							</div>

							<div style='float: left; width: 70px; margin-left: 20px;'>
								เบอร์ติดต่อ
							</div>

							<div style='float: left; width: 155px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_tel."
							</div>

						</div>

						<div style='margin-top: 15px;'>

							<div style='float: left; width: 100px;'>
								<b>4.</b> ชื่อ-สกุล บิดา
							</div>

							<div style='float: left; width: 180px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_name_father."
							</div>

							<div style='float: left; width: 50px; margin-left: 20px;'>
								อายุ
							</div>

							<div style='float: left; width: 40px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_age_father." ปี
							</div>

							<div style='float: left; width: 35px; margin-left: 20px;'>
								อาชีพ
							</div>

							<div style='float: left; width: 228px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_career_father."
							</div>

						</div>

						<div>

							<div style='float: left; width: 90px; margin-left: 18px;'>
								สถานที่ทำงาน
							</div>

							<div style='float: left; width: 320px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_office_father."
							</div>

							<div style='float: left; width: 70px; margin-left: 20px;'>
								เบอร์ติดต่อ
							</div>

							<div style='float: left; width: 155px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_tel_father."
							</div>

						</div>

						<div>

							<div style='float: left; width: 100px; margin-left: 18px;'>
								ชื่อ-สกุล มารดา
							</div>

							<div style='float: left; width: 164px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_name_mother."
							</div>

							<div style='float: left; width: 50px; margin-left: 20px;'>
								อายุ
							</div>

							<div style='float: left; width: 40px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_age_mother." ปี
							</div>

							<div style='float: left; width: 35px; margin-left: 20px;'>
								อาชีพ
							</div>

							<div style='float: left; width: 228px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_career_mother."
							</div>

						</div>

						<div>

							<div style='float: left; width: 90px; margin-left: 18px;'>
								สถานที่ทำงาน
							</div>

							<div style='float: left; width: 320px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_office_mother."
							</div>

							<div style='float: left; width: 70px; margin-left: 20px;'>
								เบอร์ติดต่อ
							</div>

							<div style='float: left; width: 155px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_tel_mother."
							</div>

						</div>

						<div style='margin-top: 15px;'>

							<div style='float: left; width: 300px;'>
								<b>5.</b> สถานภาพทางการศึกษา ข้าพเจ้าจบชั้น ม.6 จาก
							</div>

							<div style='float: left; width: 374px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_from_school."
							</div>

						</div>

						<div>

							<div style='float: left; width: 55px; margin-left: 18px;'>
								อำเภอ
							</div>

							<div style='float: left; width: 140px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$reg_from_school_district."
							</div>

							<div style='float: left; width: 55px; margin-left: 20px;'>
								จังหวัด
							</div>

							<div style='float: left; width: 140px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$reg_from_school_province."
							</div>

							<div style='float: left; width: 100px; margin-left: 20px;'>
								เกรดเฉลี่ยสะสม
							</div>

							<div style='float: left; width: 126px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
								".$rs[0]->reg_from_grade."
							</div>

						</div>

						<div style='margin-top: 15px;'>

							<div style='float: left; width: 400px;'>
								<b>5.</b> การศึกษา โปรแกรมวิชาที่จบมา
							</div>

						</div>

						<div>

							<div style='float: left; margin-left: 50px; margin-top: 5px;'>
								
								";
								foreach($programe->result() as $k => $v){

									$input_checkbox = "";
									if($rs[0]->reg_programe == $v->programe_id){
										$input_checkbox = "checked='checked'";
									}

								$html .= "

									<div style='width: 300px; float: left;'>
										<input type='checkbox' ".$input_checkbox."> ".$v->programe_name."
									</div>

								";
								}
								$html .= "

							</div>

							<div style='float: left; margin-left: 24%; margin-top: 20px;'>

								<div>
									ลงชื่อ........................................................นักเรียนผู้สมัคร
								</div>
								<div style='margin-top: 12px;'>
									ลงชื่อ........................................................ผู้ปกครองนักเรียน
								</div>

							</div>

						</div>

						<div style='margin-top: 20px;'>

							<div style='float: left; width: 600px;'>
								<b>7.</b> ผลการตรวจสอบหลักฐานการสมัครของเจ้าหน้าที่ (เอกสารไม่ครบ ไม่รับสมัคร)
							</div>

						</div>

						<div>

							<div style='float: left; margin-left: 50px; margin-top: 5px;'>

								<div style='width: 500px; float: left;'>
									<input type='checkbox'> ใบรับรองผลการศึกษาที่ระบุเกรดเฉลี่ย 2.0 ขึ้นไป จึงจะรับสมัคร
								</div>

								<div style='width: 300px; float: left;'>
									<input type='checkbox'> ระเบียนแสดงผลการเรียน ปพ.1
								</div>

								<div style='width: 300px; float: left;'>
									<input type='checkbox'> รูปถ่าย 1 นิ้ว 2 รูป
								</div>

								<div style='width: 140px; float: left;'>
									สำเนาทะเบียนบ้าน
								</div>

								<div style='width: 160px; float: left;'>
									<input type='checkbox'> นักเรียน
								</div>

								<div style='width: 160px; float: left;'>
									<input type='checkbox'> บิดา
								</div>

								<div style='width: 160px; float: left;'>
									<input type='checkbox'> มารดา
								</div>

							</div>

							<div style='float: left; margin-left: 24%; margin-top: 30px;'>

								<div>
									ลงชื่อ........................................................เจ้าหน้าที่ผู้รับสมัคร
								</div>

								<div style='margin-left: 10%; margin-top: 8px;'>
									วันที่.............../............................./&nbsp;".(date('Y')+543)."
								</div>
								

							</div>

						</div>
						

					</div>

					";


			@$mpdf = new mPDF('th_sarabun','', 0, '', 6, 6, 10, 6, 0, 0);
			@$style = file_get_contents('MPDF57/css/style.css');

			@$mpdf->SetWatermarkText('Register');
			@$mpdf->watermarkTextAlpha = 0.04;
			@$mpdf->showWatermarkText = true;

			@$mpdf->WriteHTML($style,1);
			@$mpdf->WriteHTML($html);
			@$mpdf->Output();
			//echo $html;

		}

	}

	public function print_payment(){

		if(!empty($this->uri->segment(3))){
			$id = $this->uri->segment(3);
			$reg = $this->reg->search_print_register($id);
			$programe = $this->other->get_programe();
			$info = $this->other->get_info_school();

			$rs = $reg['rs'];

			$fee = $rs[0]->learning_fee;

			header('Content-Type: text/html; charset=utf-8');
			require_once('MPDF57/mpdf.php');

			$html = "


					<div style='border: 0px #333; border-style: dotted; padding: 5px;'>

						<div style='float: left; width: 150px;'>
							<img width='125' src='".base_url('uploadFile/info-school/'.$info['logo_pdf'])."'>
						</div>

						<div style='float: left; width: 300px; margin-top: 5%;'>
							
							<div style='font-size: 30px; font-weight: bold;'>
								ใบแจ้งชำระเงิน
							</div>

							<div style='font-size: 24px; margin-top: 1px;'>".$info['school_name']."</div>

						</div>

						<div style='font-size: 23px; border: 1px solid #333; width: 280px; float: right; vertical-align: top; text-align: center; font-weight: bold; background-color: #eee; padding-bottom: 5px;'>
							Service Code
						</div>
						
						<div style='font-size: 19px; border: 1px solid #333; width: 280px; float: right; vertical-align: top; padding-bottom: 5px; margin-top: 0px;'>
							
							<div>
								&nbsp;
								<b>ชื่อนักเรียน (Name)</b> 
								".$rs[0]->reg_fname."
								".$rs[0]->reg_lname."
							</div>
							<div>
								&nbsp;
								<b>รหัสอ้างอิง Ref 1 (NumberCode)</b> 
								".$rs[0]->reg_id."
							</div>
							<div>
								&nbsp;
								<b>ระบบ</b> ".$rs[0]->learning_name." (".$rs[0]->education_name.")
							</div>
							<div>
								&nbsp;
								<b>สาขา</b> ".$rs[0]->majoring_name." (".$rs[0]->faculty_name.")
							</div>

						</div>


					</div>

					<div style='margin-top: 10px;'>

						<table width='100%' border='1' style='border-collapse: collapse;'>

							<tr bgcolor='#eee' style='font-weight: bold;'>
								<td align='center' width='15%'>
									<div>หมายเลขเช็ค</div>
									<div>Cheque No.</div>
								</td>
								<td align='center' width='15%'>
									<div>เช็ควันที่</div>
									<div>Date</div>
								</td>
								<td align='center' width='50%'>
									<div>ชื่อธนาคาร/สาขา</div>
									<div>Bank/Branch</div>
								</td>
								<td align='center' width='20%'>
									<div>จำนวนเงิน (บาท)</div>
									<div>Amount (Baht)</div>
								</td>
							</tr>

							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td align='center'>ธนาคารกรุงไทย</td>
								<td>&nbsp;</td>
							</tr>

							<tr>
								<td colspan='1' rowspan='2' align='center'>
									<div>เงินสด</div>
									<div>Cash</div>
								</td>
								<td colspan='2' rowspan='1' align='center'>
									(".m2t(number_format($fee,2)).")
								</td>
								<td colspan='1' rowspan='2' align='center'>
									".number_format($fee,2)."
								</td>
							</tr>

							<tr>
								<td colspan='2' rowspan='1' align='center'>
									โปรดเขียนจำนวนเงินเป็นตัวหนังสือ/Please write amount in words
								</td>
							</tr>

						</table>

					</div>

					<div style='margin-top: 5px;'>

						<div style='float: right; width: 148px;'>
							<div style='text-align: center; font-size: 16px;'>
								*ชำระตามยอดจำนวนเต็มเท่านั้น*
							</div>
							<div style='border: 1px solid #333; height: 35px;'>
								
							</div>
							<div style='border: 1px solid #333; height: 20px; text-align: center; font-size: 18px;'>
								ผู้รับเงิน / Collector
							</div>
						</div>

						<div style='font-size: 18px;'>
							<div style='float: left; width: 70px;'>
								*หมายเหตุ :
							</div>
							<div style='float: left; width: 350px;'>
								<div>
									รับชำระเป็นเงินสดเท่านั้น (ที่เค้าเตอร์เซอร์วิส)
								</div>
								<div>
									ชำระได้ที่ธนาคาร ตั้งแต่วันนี้ จนถึงวันที่
									".$rs[0]->report_date."
								</div>
							</div>
							  
						</div>

					</div>


					";

			@$mpdf = new mPDF('th_sarabun','', 0, '', 6, 6, 7, 6, 0, 0);
			@$style = file_get_contents('MPDF57/css/style.css');

			@$mpdf->SetWatermarkText('Payment');
			@$mpdf->watermarkTextAlpha = 0.04;
			@$mpdf->showWatermarkText = true;

			@$mpdf->WriteHTML($style,1);
			@$mpdf->WriteHTML($html);
			@$mpdf->Output();


		}

	}

	public function print_card_student(){

		if(!empty($this->uri->segment(3))){
			$id = $this->uri->segment(3);
			$reg = $this->reg->search_print_register($id);
			$programe = $this->other->get_programe();
			$info = $this->other->get_info_school();

			$rs = $reg['rs'];

			header('Content-Type: text/html; charset=utf-8');
			require_once('MPDF57/mpdf.php');

			$html = "


					<div style='border: 0px #333; border-style: dotted; padding: 5px;'>

						<div style='float: left; width: 150px;'>
							<img width='125' src='".base_url('uploadFile/info-school/'.$info['logo_pdf'])."'>
						</div>

						<div style='float: left; width: 430px; text-align: center;'>
							
							<div style='font-size: 23px; font-weight: bold; border: 1px solid #333;'>&nbsp; บัตรประจำตัวนักศึกษา ".$rs[0]->reg_level." ปีการศึกษา ".($rs[0]->period_year+543)." &nbsp;</div>

							<div style='font-size: 22px; margin-top: 5px;'>".$info['school_name']."</div>

							<div style='font-size: 20px; margin-top: 5px;'>

								<div style='float: left; width: 140px;'>
									รหัสประจำตัวประชาชน
								</div>

								<div style='float: left; width: 280px; border-bottom: 1px solid #333; border-style: dotted; text-align: left;'>
									&nbsp;&nbsp;&nbsp;".$rs[0]->reg_code."
								</div>
								
								<div style='float: left; width: 70px;'>
									ชื่อนักศึกษา
								</div>

								<div style='float: left; width: 140px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
									".$rs[0]->reg_name_prefix." ".$rs[0]->reg_fname."
								</div>

								<div style='float: left; width: 70px;'>
									นามสกุล
								</div>

								<div style='float: left; width: 140px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
									".$rs[0]->reg_lname."
								</div>



								<div style='float: left; width: 90px;'>
									ระบบการเรียน
								</div>

								<div style='float: left; width: 130px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
									".$rs[0]->learning_name."
								</div>

								<div style='float: left; width: 60px;'>
									ระดับ
								</div>

								<div style='float: left; width: 140px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
									".$rs[0]->education_name."
								</div>

								<div style='float: left; width: 60px;'>
									สาขาวิชา
								</div>

								<div style='float: left; width: 150px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
									".$rs[0]->majoring_name."
								</div>

								<div style='float: left; width: 70px;'>
									สังกัดคณะ
								</div>

								<div style='float: left; width: 140px; border-bottom: 1px solid #333; border-style: dotted; text-align: center;'>
									".$rs[0]->faculty_name."
								</div>

								<div style='margin-left: 5%; margin-top: 20px; font-size: 18px;'>

									<div style='float: left;'>
										*หมายเหตุ : กรุณาปริ้น แล้วนำมายืนยันตัวตนที่มหาลัย เพื่อรับอุปกรณ์ / เอกสาร
									</div>

								</div>

							</div>

						</div>

						<div style='font-size: 19px; border: 1px solid #333; width: 150px; float: right; vertical-align: top; text-align: center;'>
							&nbsp; No. &nbsp;".$rs[0]->reg_id ."&nbsp;
						</div>

						<div style='font-size: 19px; border: 2px solid #333; width: 120px; float: right; vertical-align: top; margin-top: 25px; border-style: dotted; text-align: center; height: 130px;'>
							ติดรูปถ่าย
						</div>

					</div>


					";

			@$mpdf = new mPDF('th_sarabun','', 0, '', 6, 6, 11, 6, 0, 0);
			@$style = file_get_contents('MPDF57/css/style.css');

			@$mpdf->SetWatermarkText('Student Card');
			@$mpdf->watermarkTextAlpha = 0.04;
			@$mpdf->showWatermarkText = true;

			@$mpdf->WriteHTML($style,1);
			@$mpdf->WriteHTML($html);
			@$mpdf->Output();

		}

	}

}