<?php
function getCSVdata($filename) {
	$row = 1; //第一行开始
	if (($handle = fopen($filename, "r")) !== false) {
		while (($dataSrc = fgetcsv($handle)) !== false) {
			$num = count($dataSrc);
			for ($c = 1; $c < $num; $c++) //列 column
			{
				if ($row === 1) //第一行作为字段
				{
					$dataName[] = $dataSrc[$c]; //字段名称
				} else {
					foreach($dataName as $k = > $v) {
						if ($k == $c) //对应的字段
						{
							$data[$v] = $dataSrc[$c];
						}
					}
				}
			}
			if (!empty($data)) {
				$dataRtn[] = $data;
				unset($data);
			}
			$row++;
		}
		fclose($handle);
		return $dataRtn;
	}
}
$aData = getCSVdata('Matrix.csv');
echo json_encode($aData);

?>