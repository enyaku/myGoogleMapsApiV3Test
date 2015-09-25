
<?php
require_once("JpGraph/jpgraph.php");
require_once("JpGraph/jpgraph_line.php");
require_once("JpGraph/jpgraph_canvas.php");

// データ
$labelx = array("1999", "2000", "2001", "2002", "2003", "2004");
$data1  = array(  1683,   1719,   1754,   1883,   1502,   1677);
$data2  = array(  1261,    996,    875,    794,    982,   1140);
$data3  = array(   101,    230,    380,    513,    827,   1843);

// Y軸用のコールバック関数
function yScaleCallback($aVal) {
    return number_format($aVal);
}

// グラフオブジェクトの生成
$graph = new Graph(500,400,"auto");

// 画像フォーマット
$graph->img->SetImgFormat("jpeg");
$graph->img->SetQuality(80);
// マージン left, right, top, bottom
$graph->img->SetMargin(80,40,70,40);
$graph->SetScale("textint");
$graph->SetFrame(false);
$graph->SetColor('lightblue');

// タイトル
$title = mb_convert_encoding("にこにこ村交通事情","UTF-8","eucJP-win");
$graph->title->Set($title);
$graph->title->SetFont(FF_GOTHIC, FS_NORMAL, 14);

// X,Y軸
$graph->xaxis->SetTickLabels($labelx);
$graph->yaxis->SetLabelFormatCallback('yScaleCallback');
$graph->yaxis->SetTextLabelInterval(2);
$graph->yaxis->HideZeroLabel();
$graph->yaxis->SetTitleMargin(55);
$titley = mb_convert_encoding("人口","UTF-8","eucJP-win");
$graph->yaxis->title->Set($titley);
$graph->yaxis->title->SetAngle(0);
$graph->yaxis->title->SetFont(FF_GOTHIC, FS_NORMAL);
$titlex = mb_convert_encoding("年度","UTF-8","eucJP-win");
$graph->xaxis->title->Set($titlex);
$graph->xaxis->title->SetFont(FF_GOTHIC, FS_NORMAL);

// グリッド
$graph->xgrid->Show(true,false);
$graph->ygrid->SetFill(true,'#EFEFFF@0.5','#DDEEFF@0.5');

// 凡例
$graph->legend->Pos(0.5, 0.08, "center", "top");
$graph->legend->SetLayout(LEGEND_HOR);
$graph->legend->SetFont(FF_GOTHIC, FS_NORMAL);
$graph->legend->SetShadow(false);
$graph->legend->SetLineWeight(1);
$graph->legend->SetColor('black','darkgray');
$graph->legend->SetFillColor('lightblue');

// 陸の交通手段
$legend1 = mb_convert_encoding("陸","UTF-8","eucJP-win");
$p1 = new LinePlot($data1);
$p1->mark->SetType(MARK_FILLEDCIRCLE);
$p1->mark->SetFillColor("blue");
$p1->mark->SetWidth(3);
$p1->SetColor("blue");
$p1->SetCenter();
$p1->SetLegend($legend1);
$graph->Add($p1);

// 海の交通手段
$legend2 = mb_convert_encoding("海","UTF-8","eucJP-win");
$p2 = new LinePlot($data2);
$p2->mark->SetType(MARK_SQUARE);
$p2->mark->SetFillColor("red");
$p2->mark->SetWidth(4);
$p2->SetColor("red");
$p2->SetCenter();
$p2->SetLegend($legend2);
$graph->Add($p2);

// 空の交通手段
$legend3 = mb_convert_encoding("空","UTF-8","eucJP-win");
$p3 = new LinePlot($data3);
$p3->mark->SetType(MARK_DIAMOND);
$p3->mark->SetFillColor("orange");
$p3->mark->SetWidth(6);
$p3->SetColor("orange");
$p3->SetCenter();
$p3->SetLegend($legend3);
$graph->Add($p3);

// グラフの描画
$graph->Stroke();

?>

