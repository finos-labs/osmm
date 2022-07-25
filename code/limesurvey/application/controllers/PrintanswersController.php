<?php

/*
 * LimeSurvey
 * Copyright (C) 2007-2011 The LimeSurvey Project Team / Carsten Schmitz
 * All rights reserved.
 * License: GNU/GPL License v2 or later, see LICENSE.php
 * LimeSurvey is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 *
 */

/**
 * printanswers
 *
 * @package LimeSurvey
 * @copyright 2011
 * @access public
 */
class PrintanswersController extends LSYii_Controller
{
    /* @var string : Default layout when using render : leave at bare actually : just send content */
    public $layout = 'survey';
    /* @var string the template name to be used when using layout */
    public $sTemplate;
    /* @var string[] Replacement data when use templatereplace function in layout, @see templatereplace $replacements */
    public $aReplacementData = array();
    /* @var array Global data when use templatereplace function  in layout, @see templatereplace $redata */
    public $aGlobalData = array();

    /**
     * printanswers::view()
     * View answers at the end of a survey in one place. To export as pdf, set 'usepdfexport' = 1 in lsconfig.php and $printableexport='pdf'.
     * @param mixed $surveyid
     * @param bool $printableexport
     * @return
     */
    public function actionView($surveyid, $printableexport = false)
    {
        Yii::app()->loadHelper("frontend");
        Yii::import('application.libraries.admin.pdf');
        $survey = Survey::model()->findByPk($surveyid);
        $iSurveyID = $survey->sid;
        $sExportType = $printableexport;

        Yii::app()->loadHelper('database');

        if (isset($_SESSION['survey_' . $iSurveyID]['sid'])) {
            $iSurveyID = $_SESSION['survey_' . $iSurveyID]['sid'];
        } else {
            //die('Invalid survey/session');
        }
        // Get the survey inforamtion
        // Set the language for dispay
        if (isset($_SESSION['survey_' . $iSurveyID]['s_lang'])) {
            $sLanguage = $_SESSION['survey_' . $iSurveyID]['s_lang'];
        } elseif ($survey) {
            // survey exist
            {
            $sLanguage = $survey->language;
            }
        } else {
            $iSurveyID = 0;
            $sLanguage = Yii::app()->getConfig("defaultlang");
        }
        SetSurveyLanguage($iSurveyID, $sLanguage);
        Yii::import('application.helpers.SurveyRuntimeHelper');
        $SurveyRuntimeHelper = new SurveyRuntimeHelper();
        $SurveyRuntimeHelper->setJavascriptVar($iSurveyID);
        $aSurveyInfo = getSurveyInfo($iSurveyID, $sLanguage);
        $oTemplate = Template::model()->getInstance(null, $iSurveyID);
        /* Need a Template function to replace this line */
        //Yii::app()->clientScript->registerPackage( 'survey-template' );

        //Survey is not finished or don't exist
        if (!isset($_SESSION['survey_' . $iSurveyID]['srid'])) {
            //display "sorry but your session has expired"
            $this->sTemplate = $oTemplate->sTemplateName;
            $error = $this->renderPartial("/survey/system/errorWarning", array(
                'aErrors' => array(
                    gT("We are sorry but your session has expired."),
                ),
            ), true);
            $message = $this->renderPartial("/survey/system/message", array(
                'aMessage' => array(
                    gT("Either you have been inactive for too long, you have cookies disabled for your browser, or there were problems with your connection."),
                ),
            ), true);
            /* Set the data for templatereplace */
            $aReplacementData['title'] = 'session-timeout';
            $aReplacementData['message'] = $error . "<br/>" . $message;

            $aData = array();
            $aData['aSurveyInfo'] = getSurveyInfo($iSurveyID);
            $aData['aError'] = $aReplacementData;

            Yii::app()->twigRenderer->renderTemplateFromFile('layout_errors.twig', $aData, false);
            // $content=templatereplace(file_get_contents($oTemplate->pstplPath."message.pstpl"),$aReplacementData,$this->aGlobalData);
            // $this->render("/survey/system/display",array('content'=>$content));
            // App()->end();
        }
        //Fin session time out
        $sSRID = $_SESSION['survey_' . $iSurveyID]['srid']; //I want to see the answers with this id
        //Ensure script is not run directly, avoid path disclosure
        //if (!isset($rootdir) || isset($_REQUEST['$rootdir'])) {die( "browse - Cannot run this script directly");}

        //Ensure Participants printAnswer setting is set to true or that the logged user have read permissions over the responses.
        if ($aSurveyInfo['printanswers'] == 'N' && !Permission::model()->hasSurveyPermission($iSurveyID, 'responses', 'read')) {
            throw new CHttpException(401, gT('You are not allowed to print answers.'));
        }

        //CHECK IF SURVEY IS ACTIVATED AND EXISTS
        $sSurveyName = $aSurveyInfo['surveyls_title'];
        $sAnonymized = $aSurveyInfo['anonymized'];
        //OK. IF WE GOT THIS FAR, THEN THE SURVEY EXISTS AND IT IS ACTIVE, SO LETS GET TO WORK.
        //SHOW HEADER
        $oResponseRow = SurveyDynamic::model($iSurveyID);
        $printanswershonorsconditions = Yii::app()->getConfig('printanswershonorsconditions');
        $groupArray = $oResponseRow->getPrintAnswersArray($sSRID, $sLanguage, $printanswershonorsconditions);
//OSMM Customization Start
		$sOutputHTML = '<div class="row">';
		$resparray = array_slice($groupArray,0,1);
		$finalarray = array_slice($resparray[0],6,1);
		
		$allLables = array("Goals and Objectives", "Corporate Alignment","Community and Ecosystem Engagement","InnerSource","Lifecycle Management","Risk Management","Compliance and Assurance Management","Security Management","Operations Management","Consumption","Contribution","Publication","Strategy","Management","Usage");

		$alist = array(array_slice($allLables,0,4), array_slice($allLables,4,5), array_slice($allLables,9,3),array_slice($allLables,12,3));
		
		$arrayData = array(array_slice($finalarray['debug'],337,4), array_slice($finalarray['debug'],341,5), array_slice($finalarray['debug'],346,3),array_slice($finalarray['debug'],349,3));
					
			 // echo "<pre>";
			 // print_r($arrayData);
			 // echo "</pre>";
			// exit;

		// $str='';
		// foreach($arrayData as $key =>$arrayVal){
			// if($key == 3)
				// break;
			// $str.='{ data: ['. implode(",",$arrayVal).'] },';
		// }
			// // echo "<pre>";
			 // // print_r($arrayData);
			 // // echo "</pre>";
			// // echo "<pre>";
			 // // print_r($str);
			 // // echo "</pre>";
			// // exit;
			// $display = $this->displayAggrSimpleResults($outputs,$str, $rt,$alist[$cnt], $outputType='html', $surveyid, $usegraph,$cnt);			
			// $sOutputHTML .= $display['statisticsoutput'];
			
			
			
			 // echo "<pre>";
			 // print_r($arr);
			 // echo "</pre>";
			 //exit;
			 
			 $viewtype1 = "_statisticsoutput_aggregate_graphs";
			 $viewtype2 = "_statisticsoutput_aggregate_bar_graphs";
			 
			 $cnt = 0;
		foreach($arrayData as $asData){
			$colorcode = 0;
			$outputs = $this->buildAggrOutputList($cnt, $language,$alist[$cnt], $surveyid, $outputType, $sql, $oLanguage, $browse = true);
			
			$display = $this->displayAggrSimpleResults($outputs,$asData, $rt,$alist[$cnt], $outputType='html', $surveyid, $usegraph,$cnt,$viewtype1,$colorcode);			
			$cnt = $cnt + 1;
			// if ($count % 2 == 0) {
			// //$sOutputHTML .= '<div class="clearfix visible-lg-block"></div>';
			// }
			$sOutputHTML .= $display['statisticsoutput'];
			//print($cnt);
		}
		$colorarray = [];
		$path = dirname(__FILE__);
		$path .= "\colorcodes.csv";
		//echo $path;
		
		$handle = fopen($path, 'r');

		if ($handle !== FALSE) { // Check the resource is valid
		// echo $handle, file_exists($handle)? 'exists': getcwd(),"";
			$colorarray = fgetcsv($handle, 1000, ",");
			// while (($colorarray = fgetcsv($handle, 1000, ",")) !== FALSE) { // Check opening the file is OK!

		 }
			
		fclose($handle);
		
			// echo "<pre>";
			// print_r($colorarray); // Array
			// echo "</pre>";
		//	
		 
		 $sOutputHTML .= '<div class="row"><table cellspacing="3" border="5"; style="width:100%; "background-color:#00FBD0"><thead><tr><th><h1>Open Source Maturity Model</h1></th></tr></thead>';
		 $alistBar = array(array_slice($allLables,0,4), array_slice($allLables,4,5), array_slice($allLables,9,3));
		
		 $arrayDataBar = array(array_slice($finalarray['debug'],337,4), array_slice($finalarray['debug'],341,5), array_slice($finalarray['debug'],346,3));
		 
		 //$colorarray = array("'#D9B8EA'","'#FEE3A1'","'#E1F5FF'");
		 
		$cnt1=0;
		foreach($arrayDataBar as $asDataBar){
			$sOutputHTML .='<tbody><tr style="height:100px"><td>';
			$outputsBar = $this->buildAggrOutputList($cnt1, $language,$alistBar[$cnt1], $surveyid, $outputType, $sql, $oLanguage, $browse = true);
			
			$display = $this->displayAggrSimpleResults($outputsBar,$asDataBar, $rt,$alistBar[$cnt1], $outputType='html', $surveyid, $usegraph,$cnt1,$viewtype2,$colorarray[$cnt1] );
			//$aData['color'] = '#D9B8EA'; //$colorarray[$cnt1];
			//$sOutputHTML .= '<div class="row">';			

			// echo "<pre>";
			// print_r($sOutputHTML);
			// echo "</pre>";
			$cnt1 = $cnt1 + 1;
			$sOutputHTML .= $display['statisticsoutput'];
			$sOutputHTML .='</td></tr></tbody><br>';
		}		
		
		$statisticsoutput .='</table>';
			
		$statisticsoutput .= $sOutputHTML;
		$statlang = returnGlobal('statlang');
        $aData['sStatisticsLanguage'] = $statlang;
        $aData['output'] = $statisticsoutput;
        $aData['summary'] = $summary;
        $aData['oStatisticsHelper'] = $helper;
        $aData['expertstats'] = true;
		$aData['chartJS'] = App()->getConfig('adminscripts').'Chart.min.js';
		$aData['chartApexJS'] = App()->getConfig('adminscripts').'/dist/apexcharts.min.js';
//OSMM Customization  Ends													
        // Remove all <script>...</script> content from result.
        Yii::import('application.helpers.viewHelper');
        foreach ($groupArray as &$group) {
            $group['description'] = viewHelper::purified($group['description']);
            foreach ($group['answerArray'] as &$answer) {
                $answer['question'] = viewHelper::purified($answer['question']);
            }
        }

        $aData['aSurveyInfo'] = $aSurveyInfo;
        $aData['aSurveyInfo']['dateFormat'] = getDateFormatData(Yii::app()->session['dateformat']);
        $aData['aSurveyInfo']['groupArray'] = $groupArray;
        $aData['aSurveyInfo']['printAnswersHeadFormUrl'] = Yii::App()->getController()->createUrl('printanswers/view/', array('surveyid' => $iSurveyID, 'printableexport' => 'pdf'));
        $aData['aSurveyInfo']['printAnswersHeadFormQueXMLUrl'] = Yii::App()->getController()->createUrl('printanswers/view/', array('surveyid' => $iSurveyID, 'printableexport' => 'quexmlpdf'));

        if (empty($sExportType)) {
            Yii::app()->setLanguage($sLanguage);
            $aData['aSurveyInfo']['include_content'] = 'printanswers';
            Yii::app()->twigRenderer->renderTemplateFromFile('layout_printanswers.twig', $aData, false);
        } elseif ($sExportType == 'pdf') {
            // Get images for TCPDF from template directory
            define('K_PATH_IMAGES', Template::getTemplatePath($aSurveyInfo['template']) . DIRECTORY_SEPARATOR);

            Yii::import('application.libraries.admin.pdf', true);
            Yii::import('application.helpers.pdfHelper');
            $aPdfLanguageSettings = pdfHelper::getPdfLanguageSettings(App()->language);

            $oPDF = new pdf();
            $oPDF->setCellMargins(1, 1, 1, 1);
            $oPDF->setCellPaddings(1, 1, 1, 1);
            $sDefaultHeaderString = $sSurveyName . " (" . gT("ID", 'unescaped') . ":" . $iSurveyID . ")";
            $oPDF->initAnswerPDF($aSurveyInfo, $aPdfLanguageSettings, Yii::app()->getConfig('sitename'), $sSurveyName, $sDefaultHeaderString);
            LimeExpressionManager::StartProcessingPage(true); // means that all variables are on the same page
            // Since all data are loaded, and don't need JavaScript, pretend all from Group 1
            LimeExpressionManager::StartProcessingGroup(1, ($aSurveyInfo['anonymized'] != "N"), $iSurveyID);
            $aData['aSurveyInfo']['printPdf'] = 1;
            $aData['aSurveyInfo']['include_content'] = 'printanswers';
            Yii::app()->clientScript->registerPackage($oTemplate->sPackageName);

            $html = Yii::app()->twigRenderer->renderTemplateFromFile('layout_printanswers.twig', $aData, true);
            //filter all scripts
            $html = preg_replace("/<script>[^<]*<\/script>/", '', $html);
            //replace fontawesome icons
            $html = preg_replace('/(<i class="fa fa-check-square-o"><\/i>|<i class="fa fa-close"><\/i>)/', '[X]', $html);
            $html = preg_replace('/<i class="fa fa-minus-square-o">\<\/i>/', '[-]', $html);
            $html = preg_replace('/<i class="fa fa-square-o"><\/i>/', '[ ]', $html);
            $html = preg_replace('/<i class="fa fa-plus"><\/i>/', '+', $html);
            $html = preg_replace('/<i class="fa fa-circle"><\/i>/', '|', $html);
            $html = preg_replace('/<i class="fa fa-minus"><\/i>/', '-', $html);

            $oPDF->writeHTML($html, true, false, true, false, '');

            header("Cache-Control: must-revalidate, no-store, no-cache"); // Don't store in cache because it is sensitive data

            $sExportFileName = sanitize_filename($sSurveyName);
            $oPDF->Output($sExportFileName . "-" . $iSurveyID . ".pdf", "D");
            LimeExpressionManager::FinishProcessingGroup();
            LimeExpressionManager::FinishProcessingPage();
        } elseif ($sExportType == 'quexmlpdf') {
            Yii::import("application.libraries.admin.quexmlpdf", true);

            $quexmlpdf = new quexmlpdf();

            // Setting the selected language for printout
            App()->setLanguage($sLanguage);

            $quexmlpdf->setLanguage($sLanguage);

            set_time_limit(120);

            Yii::app()->loadHelper('export');

            $quexml = quexml_export($iSurveyID, $sLanguage, $sSRID);

            $quexmlpdf->create($quexmlpdf->createqueXML($quexml));

            $sExportFileName = sanitize_filename($sSurveyName);
            $quexmlpdf->Output($sExportFileName . "-" . $iSurveyID . "-queXML.pdf", 'D');
        }
    }
 protected function buildAggrOutputList($rt, $language,$alist, $surveyid, $outputType, $sql, $oLanguage, $browse = true){
		$alist = array();
		
		switch($rt){
			case 0:
		$statisticsoutput = "";
        $qtitle = "Dimension::Strategy";
        $qquestion = "Strategy";
        $qtype = "";
        $qqid = "";
		$alist =$alist;
		break;	
			case 1:
		$statisticsoutput = "";
        $qtitle = "Dimension::Management";
        $qquestion = "Management";
        $qtype = "";
        $qqid = "";
		$alist =$alist;
		break;	
			case 2:
		$statisticsoutput = "";
        $qtitle = "Dimension::Usage";
        $qquestion = "Usage";
        $qtype = "";
        $qqid = "";
		$alist =$alist;
		break;	
			default:
		$statisticsoutput = "";
        $qtitle = "Open Source Maturity Model";
        $qquestion = "OSMM";
        $qtype = "";
        $qqid = "";
		$alist =$alist;
		break;	
		}
		
		
	return array("alist" => $alist, "qtitle" => $qtitle, "qquestion" => $qquestion, "qtype" => $qtype, "statisticsoutput" => $statisticsoutput, "parentqid" => (int)$qqid);
	
}

protected function displayAggrSimpleResults($outputs, $results, $rt, $labels, $outputType='html', $surveyid, $usegraph=1,$cnt,$viewtype, $colorcode)
    {
		
		$COLORS_FOR_SURVEY = array('20,130,200', '232,95,51', '34,205,33', '210,211,28', '134,179,129', '201,171,131', '251,231,221', '23,169,161', '167,187,213', '211,151,213', '147,145,246', '147,39,90', '250,250,201', '201,250,250', '94,0,94', '250,125,127', '0,96,201', '201,202,250', '0,0,127', '250,0,250', '250,250,0', '0,250,250', '127,0,127', '127,0,0', '0,125,127', '0,0,250', '0,202,250', '201,250,250', '201,250,201', '250,250,151', '151,202,250', '251,149,201', '201,149,250', '250,202,151', '45,96,250', '45,202,201', '151,202,0', '250,202,0', '250,149,0', '250,96,0', '184,230,115', '102,128,64', '220,230,207', '134,191,48', '184,92,161', '128,64,112', '230,207,224', '191,48,155', '230,138,115', '128,77,64', '230,211,207', '191,77,48', '80,161,126', '64,128,100', '207,230,220', '48,191,130', '25,25,179', '18,18,125', '200,200,255', '145,145,255', '255,178,0', '179,125,0', '255,236,191', '255,217,128', '255,255,0', '179,179,0', '255,255,191', '255,255,128', '102,0,153', '71,0,107', '234,191,255', '213,128,255');

		$iMaxLabelLength = 1;
		$bShowGraph = true;
        //close table/output
        if ($outputType == 'html') {
            // show this block only when we show graphs and are not in the public statics controller
			
           // if ($usegraph == 1 && $bShowGraph && get_class(Yii::app()->getController())== 'PrintanswersController') {


                $iCanvaHeight = $iMaxLabelLength * 3;
                $aData['iCanvaHeight'] = ($iCanvaHeight > 150) ? $iCanvaHeight : 150;
               // $qqid = str_replace('#', '_', $qqid);
                $aData['rt'] = $rt;
                $aData['qqid'] = $cnt; ////changed from '' to Test
                $aData['labels'] = $labels;
				$aData['fullLabels'] = $labels; //changed from '' to $labels
                $aData['charttype'] = 'radar';
                $aData['sChartname'] = ''; //Not required
                $aData['grawdata'] = $results; //array_slice($results1[0],0,5);
				$aData['osmcount'] = $cnt;
			    $aData['qtitle'] = $outputs['qtitle'];

                $aData['color'] = $colorcode; //"'#D9B8EA'";//0; // random truc much
                $aData['COLORS_FOR_SURVEY'] = $COLORS_FOR_SURVEY;
                // Output graph

				$statisticsoutput .= Yii::app()->getController()->renderPartial('/admin/export/generatestats/simplestats/'.$viewtype, $aData, true);
				
			  // }else{ _statisticsoutput_aggregate_heat_graphs.php ||_statisticsoutput_aggregate_graphs.php
				

               // $statisticsoutput .= Yii::app()->getController()->renderPartial('/admin/export/generatestats/simplestats/_statisticsoutput_nograph', array(), true);
				//}

            $statisticsoutput .= "</div><br>\n";
        }
		//return array("statisticsoutput" => $statisticsoutput, "pdf" => $this->pdf, "astatdata" => $astatdata);
		return array("statisticsoutput" => $statisticsoutput, "astatdata" => $astatdata);
		
		
	}	
	
}
