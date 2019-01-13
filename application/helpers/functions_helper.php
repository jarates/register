<?php
	
	function form_name_prefix(){
		$data = ['นาย','นาง','นางสาว','อื่นๆ'];
		return $data;
	}

	function form_name_gender(){
		$data = ['ชาย','หญิง','อื่นๆ'];
		return $data;
	}

	function form_name_race(){
		$data = ['ไทย','จีน','อังกฤษ','สหรัฐอเมริกา','ออสเตรเลีย','นิวซีแลนด์','ฝรั่งเศส','ฟิลิปปินส์','ญี่ปุ่น','ลาว','อื่นๆ'];
		return $data;
	}

	function form_name_nationality(){
		$data = ['ไทย','จีน','อังกฤษ','สหรัฐอเมริกา','ออสเตรเลีย','นิวซีแลนด์','ฝรั่งเศส','ฟิลิปปินส์','ญี่ปุ่น','ลาว','อื่นๆ'];
		return $data;
	}

	function form_name_religion(){
		$data = ['พุทธ','คริสต์ โปรเตสแตนต์','คริสต์ คาทอลิก','อิสลาม','ฮินดู','ซิกข์','อื่นๆ'];
		return $data;
	}

	function form_name_career(){
		$data = ['รับราชการ','พนักงานบริษัท','พนักงานโรงงาน','ธุรกิจส่วนตัว','ทำนา','เกษตรกร','อื่นๆ'];
		return $data;
	}

	function date_now(){
		return date("Y-m-d");
	}

	function datetime_now(){
		return date("Y-m-d H:i:s");
	}

	function status_register($status){
		$txt = '';
		if($status == 0){
			$txt = '<i class="fa fa-hourglass-half"></i> รอชำระเงิน';
		}else if($status == 1){
			$txt = '<i class="fa fa-check"></i> ชำระเงินแล้ว';
		}else if($status == 2){
			$txt = '<i class="fa fa-check"></i> ยืนยันสิทธิ์เรียบร้อย';
		}else if($status == 10){
			$txt = '';
		}
		return $txt;
	}

	function convert_month($month,$type){
		$txt = '';
		if($month == 01 || $month == 1){
			$txt = 'ม.ค.';
			if($type == 'full'){
				$txt = 'มกราคม';
			}
		}else if($month == 02 || $month == 2){
			$txt = 'ก.พ.';
			if($type == 'full'){
				$txt = 'กุมภาพันธ์';
			}
		}else if($month == 03 || $month == 3){
			$txt = 'มี.ค.';
			if($type == 'full'){
				$txt = 'มีนาคม';
			}
		}else if($month == 04 || $month == 4){
			$txt = 'เม.ย.';
			if($type == 'full'){
				$txt = 'เมษายน';
			}
		}else if($month == 05 || $month == 5){
			$txt = 'พ.ค.';
			if($type == 'full'){
				$txt = 'พฤษภาคม';
			}
		}else if($month == 06 || $month == 6){
			$txt = 'มิ.ย.';
			if($type == 'full'){
				$txt = 'มิถุนายน';
			}
		}else if($month == 07 || $month == 7){
			$txt = 'ก.ค.';
			if($type == 'full'){
				$txt = 'กรกฎาคม';
			}
		}else if($month == 08 || $month == 8){
			$txt = 'ส.ค.';
			if($type == 'full'){
				$txt = 'สิงหาคม';
			}
		}else if($month == 09 || $month == 9){
			$txt = 'ก.ย.';
			if($type == 'full'){
				$txt = 'กันยายน';
			}
		}else if($month == 10){
			$txt = 'ต.ค.';
			if($type == 'full'){
				$txt = 'ตุลาคม';
			}
		}else if($month == 11){
			$txt = 'พ.ย.';
			if($type == 'full'){
				$txt = 'พฤศจิกายน';
			}
		}else if($month == 12){
			$txt = 'ธ.ค.';
			if($type == 'full'){
				$txt = 'ธันวาคม';
			}
		}
		return $txt;
	}

	function m2t($number){
		$number = number_format($number, 2, '.', '');
		$numberx = $number;
		$txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ'); 
		$txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน'); 
		$number = str_replace(",","",$number); 
		$number = str_replace(" ","",$number); 
		$number = str_replace("บาท","",$number); 
		$number = explode(".",$number); 
		if(sizeof($number)>2){ 
		return 'ทศนิยมหลายตัวนะจ๊ะ'; 
		exit; 
		} 
		$strlen = strlen($number[0]); 
		$convert = ''; 
		for($i=0;$i<$strlen;$i++){ 
			$n = substr($number[0], $i,1); 
			if($n!=0){ 
				if($i==($strlen-1) AND $n==1){ $convert .= 'เอ็ด'; } 
				elseif($i==($strlen-2) AND $n==2){  $convert .= 'ยี่'; } 
				elseif($i==($strlen-2) AND $n==1){ $convert .= ''; } 
				else{ $convert .= $txtnum1[$n]; } 
				$convert .= $txtnum2[$strlen-$i-1]; 
			} 
		} 

		$convert .= 'บาท'; 
		if($number[1]=='0' OR $number[1]=='00' OR 
		$number[1]==''){ 
		$convert .= 'ถ้วน'; 
		}else{ 
		$strlen = strlen($number[1]); 
		for($i=0;$i<$strlen;$i++){ 
		$n = substr($number[1], $i,1); 
			if($n!=0){ 
			if($i==($strlen-1) AND $n==1){$convert 
			.= 'เอ็ด';} 
			elseif($i==($strlen-2) AND 
			$n==2){$convert .= 'ยี่';} 
			elseif($i==($strlen-2) AND 
			$n==1){$convert .= '';} 
			else{ $convert .= $txtnum1[$n];} 
			$convert .= $txtnum2[$strlen-$i-1]; 
			} 
		} 
		$convert .= 'สตางค์'; 
		}
		//แก้ต่ำกว่า 1 บาท ให้แสดงคำว่าศูนย์ แก้ ศูนย์บาท
		if($numberx < 1)
		{
			$convert = "ศูนย์" .  $convert;
		}

		//แก้เอ็ดสตางค์
		$len = strlen($numberx);
		$lendot1 = $len - 2;
		$lendot2 = $len - 1;
		if(($numberx[$lendot1] == 0) && ($numberx[$lendot2] == 1))
		{
			$convert = substr($convert,0,-10);
			$convert = $convert . "หนึ่งสตางค์";
		}

		//แก้เอ็ดบาท สำหรับค่า 1-1.99
		if($numberx >= 1)
		{
			if($numberx < 2)
			{
				$convert = substr($convert,4);
				$convert = "หนึ่ง" .  $convert;
			}
		}
		return $convert; 
	}

	function uploadFile($name, $path, $prefix){

		if($name != '' && $path != ''){

			$temp = explode(".", $_FILES[$name]["name"]);
			$newfilename = $prefix.'-'.date("Y-m-d").'-'.round(microtime(true)) . '.' . end($temp);
			move_uploaded_file($_FILES[$name]["tmp_name"], $path . $newfilename);
			return $newfilename;

		}

	}
