<?php
header('Content-type:text/html;charset=utf-8');
include '/Classes/PHPExcel.php';
include '/Classes/PHPExcel/Writer/Excel2007.php';
include '/Classes/PHPExcel/Writer/Excel5.php'; //用于输出.xls的

//$mysqli= new MySQLi("localhost","root","","empirecms");
$mysqli=new mysqli('localhost','root','huang123','jicai');

$mysqli->query("set names utf8");


$session = $_REQUEST['id'];

$sql="select g.goods_id,g.goods_name,g.market_price,g.goods_price,b.goods_thumb,g.goods_number from ecs_cart as g left join ecs_goods as b  on g.goods_id = b.goods_id where session_id ='".$session."'";

$shuju=$mysqli->query($sql);

/*$count=count($shuju);
echo $count;*/

$objPHPExcel = new PHPExcel();

//合并单元格
//$objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
//设置文字大小

$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(14);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setSize(14);
$objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setSize(14);
$objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setSize(14);
$objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setSize(14);
$objPHPExcel->getActiveSheet()->getStyle('F1')->getFont()->setSize(14);
 
 //居中显示
$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

 
$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);

//设置单元格格式
$objPHPExcel->getActiveSheet()->getStyle('G1')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

 
//设置背景颜色
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('f0f72d');
 
$objPHPExcel->getActiveSheet()->setCellValue('A1',"序号");
$objPHPExcel->getActiveSheet()->setCellValue('B1',"商品名称");
$objPHPExcel->getActiveSheet()->setCellValue('C1',"市场价");
$objPHPExcel->getActiveSheet()->setCellValue('D1',"吉采价");
$objPHPExcel->getActiveSheet()->setCellValue('E1',"数量");
$objPHPExcel->getActiveSheet()->setCellValue('F1',"单品总价");
 
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(80);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);



//设置自动换行
$i=2;
while($rel=$shuju->fetch_assoc()){
 
 //设置行高 getRowDimension('9') 这个里面写数字是行数
 
 //设置内容居中
 $objPHPExcel->getActiveSheet()->getStyle('A'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('C'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('D'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('E'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('F'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


//处理数据
$dan_zong = floor($rel['goods_price']) * floor($rel['goods_number']);

$objPHPExcel->getActiveSheet()->setCellValueExplicit("A" . $i, $i-1,PHPExcel_Cell_DataType::TYPE_STRING);//商品序号
$objPHPExcel->getActiveSheet()->setCellValueExplicit("B" . $i, $rel['goods_name'],PHPExcel_Cell_DataType::TYPE_STRING);//下单日期
$objPHPExcel->getActiveSheet()->setCellValueExplicit("C" . $i, $rel['market_price']."元",PHPExcel_Cell_DataType::TYPE_STRING);//市场价
$objPHPExcel->getActiveSheet()->setCellValueExplicit("D" . $i, $rel['goods_price']."元",PHPExcel_Cell_DataType::TYPE_STRING);//吉采价
$objPHPExcel->getActiveSheet()->setCellValueExplicit("E" . $i, $rel['goods_number'],PHPExcel_Cell_DataType::TYPE_STRING);//数量
$objPHPExcel->getActiveSheet()->setCellValueExplicit("F" . $i, $dan_zong."元",PHPExcel_Cell_DataType::TYPE_STRING);//单品总价
 
$objPHPExcel->getActiveSheet()->getStyle('d'.$i)->getAlignment()->setWrapText(true);


//加图片
/*$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Paid');
$objDrawing->setDescription('Paid');
$objDrawing->setPath('C:/server/jicai/'.$rel['goods_thumb']);
$objDrawing->setCoordinates('C'.$i);
$objDrawing->setHeight(60);
$objDrawing->setOffsetX(40);
$objDrawing->setOffsetY(10);
$objDrawing->getShadow()->setVisible(true);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());*/

	$sum_price=$sum_price+$dan_zong;
$i++;
}

$objPHPExcel->getActiveSheet()->setCellValueExplicit("E" .$i, '商品总价：',PHPExcel_Cell_DataType::TYPE_STRING);
$objPHPExcel->getActiveSheet()->getStyle("E" .$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle("F" .$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->setCellValueExplicit("F" .$i, $sum_price."元",PHPExcel_Cell_DataType::TYPE_STRING);


$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);//2007格式

//或者$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel); //非2007格式

$filename="order.xlsx";

$sc=$objWriter->save($filename);


header("Location:".$filename);

echo '<script>window.close();</script>'; 



//echo gettype($sc);


/*$db = new Mysql($dbconfig);
$sql = "SELECT * FROM  表名";
$row = $db->GetAll($sql);  // $row 为二维数组
$count = count($row);
for ($i = 2; $i <= $count+1; $i++) {
 $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, convertUTF8($row[$i-2][1]));
 $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, convertUTF8($row[$i-2][2]));
 $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, convertUTF8($row[$i-2][3]));
 $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, convertUTF8($row[$i-2][4]));
 $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, convertUTF8(date("Y-m-d", $row[$i-2][5])));
 $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, convertUTF8($row[$i-2][6]));
 $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, convertUTF8($row[$i-2][7]));
 $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, convertUTF8($row[$i-2][8]));
}
 
//在默认sheet后，创建一个worksheet
echo date('H:i:s') . " Create new Worksheet object\n";
$objPHPExcel->createSheet();
$objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel5');
$objWriter-save('php://output');*/

?>