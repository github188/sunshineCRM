<?php
function returnsystemprivateconfig($LIST,$FILTER,$NULL,$action_model='',$row_element='',$bottom_element='',$systemorder='',$action_search='')			{
global $_GET,$_POST,$db,$_SESSION;
global $parse_filename,$tablename;
if($parse_filename=="")		$parse_filename = $tablename;
$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
$FILE_SELF_NAME = array_pop($PHP_SELF_ARRAY);
$FileDirName = array_pop($PHP_SELF_ARRAY);
$�Ƿ��ǽӿ�Ŀ¼ = array_pop($PHP_SELF_ARRAY);
$action_array = explode('_',$_GET['action']);
if(sizeof($action_array)>=3)	{
	$action = $action_array[0]."_".$action_array[1];
}else	{
	$action = $_GET['action'];
}

$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
$FILE_SELF_NAME = array_pop($PHP_SELF_ARRAY);
$FileDirName = array_pop($PHP_SELF_ARRAY);
//����PGSQL���治�������ݽ���
//print $_SESSION['LOGIN_USER_ID'];
//if($FileDirName!="PGSQL")				{
//	$sql	= "select �ֶ�,���� from systemprivateconfig
//				where Ŀ¼='$FileDirName' and ��='$tablename' and ����='$parse_filename' and ��ͼ='$action'";
////	if($_SESSION['LOGIN_USER_ID']!="admin")
////		$rs		= $db->CacheExecute(150,$sql);//print_R($rs_select);
////	else
////		$rs		= $db->Execute($sql);//print_R($rs_select);
//	$rs_a	= $rs->GetArray();
//	$�ֶ�Array	= explode(',',$rs_a[0]['�ֶ�']);
//}
//else	{
//	//֧��PGSQL
//}

//$������Ϣ = unserialize($rs_a[0]['����']);
//print_R($������Ϣ);

if($rs_a[0]['����']!="")			{
	$������Ϣ = unserialize($rs_a[0]['����']);
	//print_R($������Ϣ);
	$NewArrayTEXT['action_model']	= $������Ϣ['action_model'];
	$NewArrayTEXT['row_element']	= $������Ϣ['row_element'];
	$NewArrayTEXT['bottom_element']	= $������Ϣ['bottom_element'];
	$NewArrayTEXT['pagenums_model']	= $������Ϣ['ÿҳ��ʾ��¼����'];
	$NewArrayTEXT['systemorder']	= $������Ϣ['systemorder'];
	$NewArrayTEXT['action_search']	= $������Ϣ['action_search'];
	if($������Ϣ['systemorder']=="")	$NewArrayTEXT['systemorder']	= $systemorder;
	if($������Ϣ['action_search']=="")	$NewArrayTEXT['action_search']	= $action_search;
}
else		{
	global $pagenums_model;
	if($pagenums_model=='')			$pagenums_model = 25;
	$NewArrayTEXT['pagenums_model']	= $pagenums_model;
	$NewArrayTEXT['action_model']	= $action_model;
	$NewArrayTEXT['row_element']	= $row_element;
	$NewArrayTEXT['bottom_element']	= $bottom_element;
	$NewArrayTEXT['systemorder']	= $systemorder;
	$NewArrayTEXT['action_search']	= $action_search;
}

if($rs_a[0]['�ֶ�']!="")			{
	//print $�ֶ�;exit;
	//�û��Զ�������
	$ԭװ����Array = explode(',',$LIST);
	$ԭװ����Array���� = array_flip($ԭװ����Array);

	$LISTArray = explode(',',$rs_a[0]['�ֶ�']);
	$FILTERArray = explode(',',$FILTER);
	$NULLArray = explode(',',$NULL);
	$NewArray = array();
	for($i=0;$i<sizeof($LISTArray);$i++)			{
		//�õ��û��Զ������е�ֵ
		$FieldIndex  = $LISTArray[$i];
		//�����ж����ظ��Ҿ����ж�
		if(in_array($FieldIndex,$�ֶ�Array))	{
			//�û��Զ�������,�õ�
			$�����ֶ���ԭװ�����е�����λ�� = $ԭװ����Array����[$FieldIndex];
			$FieldFilter = $FILTERArray[$�����ֶ���ԭװ�����е�����λ��];
			$NewArray['LIST'][]		= $FieldIndex;
			$NewArray['FILTER'][]	= $FieldFilter;
			$NewArray['NULL'][]		= $NULLArray[$�����ֶ���ԭװ�����е�����λ��];
		}

	}
	$NewArrayTEXT['LIST']	= join(',',$NewArray['LIST']);;
	$NewArrayTEXT['FILTER'] = join(',',$NewArray['FILTER']);;
	$NewArrayTEXT['NULL']	= join(',',$NewArray['NULL']);;
	$NewArrayTEXT['��������Ϣ'] = "[��ҳ�������Զ�����Ϣ]";
}
else	{
	$NewArrayTEXT['LIST']	= $LIST;
	$NewArrayTEXT['FILTER'] = $FILTER;
	$NewArrayTEXT['NULL']	= $NULL;
}

return $NewArrayTEXT;
}

$filetablename		=	'unit';
	$parse_filename		=	'unit';
	require_once('../Interface/Framework/include.inc.php');
        //F:\SunshineCRM\general\ERP\Interface\Framework\include.inc.php
$action =  'init_default';
$action_array = explode('_', $action);
$action_type = $action_array[0];
switch ($action_type){
    case 'init':

        $_SESSION['SYSTEM_INITVIEW_SEARCH_VALUE_DEFAULT'] = '';//����session
        if (sizeof($action_array) >= 3) {//=2
            $action = $action_array[0] . "_" . $action_array[1];
            $action_add = $action_array[2];
        }
        $location_title = 'sunshine_inside';
//        var_dump($file_ini);//by cwf
        $tablename = $file_ini[$action]['tablename'];//unit
        $SYTEM_CONFIG_TABLE != "" ? $tablename = $SYTEM_CONFIG_TABLE : '';//Ϊ��
        $tablewidth = $file_ini[$action]['tablewidth'];
        $tabletitle = $file_ini[$action]['tabletitle'];
        $ondblclick_config = $file_ini[$action]['ondblclick_config'];
        $onclick_config = $file_ini[$action]['onclick_config'];
        $init_type = $file_ini[$action]['init_type'];
        $array_show = $file_ini[$action]['array_show'];
        $returnmodel = $file_ini[$action]['returnmodel'];
        $read_type = $file_ini[$action]['read_type'];
        $nullshow = $file_ini[$action]['nullshow'];
        $systemorder = $file_ini[$action]['systemorder'];
        $row_element = $file_ini[$action]['row_element'];
        $row_userpriv = $file_ini[$action]['row_userpriv'];
        $bottom_element = $file_ini[$action]['bottom_element'];
        $departprivte = $file_ini[$action]['departprivte'];
        $pagenums_model = $file_ini[$action]['pagenums_model'];
        $pagestop_model = $file_ini[$action]['pagestop_model'];
        $export_port_arrribute = $file_ini[$action]['export_port_arrribute'];
        $merge = $file_ini[$action]['merge'];
        $UserUnitFunction = $file_ini[$action]['UserUnitFunction'];
        $ForeignKeyIndex = $file_ini[$action]['ForeignKeyIndex'];
        $UserUnitFunctionIndex = $common_html['common_html'][$UserUnitFunction];

        $action_model = $file_ini[$action]['action_model'];
        $action_search = $file_ini[$action]['action_search'];
        $group_filter = $file_ini[$action]['group_filter'];
        $child_filter = $file_ini[$action]['child_filter'];
        $UserDefineFunction = $file_ini[$action]['UserDefineFunction'];
        $UserSumFunction = $file_ini[$action]['UserSumFunction'];
        $UserSumFunctionList = explode(":", $UserSumFunction);

        $UserSumFunction = $UserSumFunctionList[0];
        $UserUnitFunction = $UserSumFunctionList[1];

        //$UserUnitFunction=$file_ini[$action]['UserUnitFunction'];
        //$UserUnitFunctionIndex = $common_html['common_html'][$UserUnitFunction];

        $email_filter = $file_ini[$action]['email_filter'];
        $sms_filter = $file_ini[$action]['sms_filter'];
        $hidden_field = $file_ini[$action]['hidden_field'];
        $group_user = $file_ini[$action]['group_user'];
        $edit_attribute = $file_ini[$action]['edit_attribute'];
        $primarykey = $file_ini[$action]['primarykey'];
        $uniquekey = $file_ini[$action]['uniquekey'];
        $childnums = $file_ini[$action]['childnums'];

        $showlistfieldlist = $file_ini[$action]['showlistfieldlist'];
        $showlistnull = $file_ini[$action]['showlistnull'];
        $showlistfieldfilter = $file_ini[$action]['showlistfieldfilter'];

        $showlistfieldstopedit = $file_ini[$action]['showlistfieldstopedit'];
        $showlistfieldstopdelete = $file_ini[$action]['showlistfieldstopdelete'];

        $returnsystemprivateconfig = returnsystemprivateconfig($showlistfieldlist, $showlistfieldfilter, $showlistnull, $action_model, $row_element, $bottom_element, $systemorder, $action_search);
        
//        var_dump($returnsystemprivateconfig);//by cwf
        $showlistfieldlist = $returnsystemprivateconfig['LIST'];
        ;
        $showlistnull = $returnsystemprivateconfig['NULL'];
        ;
        $showlistfieldfilter = $returnsystemprivateconfig['FILTER'];
        ;
        $pagenums_model = $returnsystemprivateconfig['pagenums_model'];
        ;
        $row_element = $returnsystemprivateconfig['row_element'];
        ;
        $bottom_element = $returnsystemprivateconfig['bottom_element'];
        ;
        $action_model = $returnsystemprivateconfig['action_model'];
        ;
        $action_search = $returnsystemprivateconfig['action_search'];
        ;
        $systemorder = $returnsystemprivateconfig['systemorder'];
        ;
        $��������Ϣ = $returnsystemprivateconfig['��������Ϣ'];
        ;



        //רҵ�ƿƳ�,�Լ����Ƴ�Ȩ��ʱ��������,����ϵͳֻ���в鿴Ȩ��
        //2010-4-3����ֹ�У���Ĳ鿴Ȩ��,����ʹ��SUNSHINE_BANJI_LIST����
        //��INI�ļ���ϵͳ���ж�action_model row_element bottom_element�ȼ��������������¶���
        if ($_SESSION['SUNSHINE_BANJI_LIST'] == "N") {
            $_SESSION['SUNSHINE_BANJI_LIST'] = "";
        }
        if ($_SESSION['LOGIN_PHPSESSID'] == "N") {
            $_SESSION['LOGIN_PHPSESSID'] = "";
        }
        if (STRLEN($_SESSION['SUNSHINE_BANJI_LIST']) > 4 && $_SESSION['LOGIN_USER_ID'] != "admin") {
            $row_element_array = explode(',', $row_element);
            if (in_array("view:view_default", $row_element_array)) {
                $row_element = 'view:view_default';
            }
            if (in_array("view:view_customer", $row_element_array)) {
                $row_element = 'view:view_customer';
            }
            $action_model = '';
            $bottom_element = '';
            $_GET['ϵͳ˵��'] = "��ע:���½������" . $_SESSION['SUNSHINE_BANJI_LIST'] . "��ص���Ϣ,�������ۺ���Ϣ��ѯģ��.";
        }

        //session_register("ָ����Ա");
        //session_register("ָ����Ա_FILENAME");
        $PHP_SELF_ARRAY = explode('/', $_SERVER['PHP_SELF']);
        $PHP_SELF_FILE = array_pop($PHP_SELF_ARRAY);
        if ($_GET['ָ����Ա'] != "") {
            $_SESSION['ָ����Ա'] = $_GET['ָ����Ա'];
            $_SESSION['ָ����Ա_FILENAME'] = $PHP_SELF_FILE;
        } elseif ($_SESSION['ָ����Ա_FILENAME'] == $PHP_SELF_FILE) {
            //$_SESSION['ָ����Ա'] = '';
        } else {
            $_SESSION['ָ����Ա'] = '';
            $_SESSION['ָ����Ա_FILENAME'] = '';
        }
        if ($_SESSION['ָ����Ա'] != "") {
            $row_element_array = explode(',', $row_element);
            if (in_array("view:view_default", $row_element_array)) {
                $row_element = 'view:view_default';
            }
            if (in_array("view:view_customer", $row_element_array)) {
                $row_element = 'view:view_customer';
            }
            $action_model = '';
            $bottom_element = '';
            $_GET['ϵͳ˵��'] = "��ע:���½������ " . returntablefield("user", "USER_ID", $_SESSION['ָ����Ա'], "USER_NAME") . " ��ص���Ϣ,�������ۺ���Ϣ��ѯģ��.";
        }

        //session_register("ָ�����");
        //session_register("ָ�����_FILENAME");
        $PHP_SELF_ARRAY = explode('/', $_SERVER['PHP_SELF']);
        $PHP_SELF_FILE = array_pop($PHP_SELF_ARRAY);
        if ($_GET['ָ�����'] != "") {
            $_SESSION['ָ�����'] = $_GET['ָ�����'];
            $_SESSION['ָ�����_FILENAME'] = $PHP_SELF_FILE;
        } elseif ($_SESSION['ָ�����_FILENAME'] == $PHP_SELF_FILE) {
            //$_SESSION['ָ�����'] = '';
        } else {
            $_SESSION['ָ�����'] = '';
            $_SESSION['ָ�����_FILENAME'] = '';
        }
        //print_R($_SESSION);
        if ($_SESSION['ָ�����'] != "") {
            $row_element_array = explode(',', $row_element);
            if (in_array("view:view_default", $row_element_array)) {
                $row_element = 'view:view_default';
            }
            if (in_array("view:view_customer", $row_element_array)) {
                $row_element = 'view:view_customer';
            }
            $action_model = '';
            $bottom_element = '';
            $_GET['ϵͳ˵��'] = "��ע:���½������ " . $_SESSION['ָ�����'] . " ��ص���Ϣ,�������ۺ���Ϣ��ѯģ��.";
        }
        //$columns=returntablecolumn($tablename);//print_R($SYTEM_CONFIG_TABLE);
        //$html_etc=returnsystemlang($tablename,$SYTEM_CONFIG_TABLE);
        //�û��Զ���SQL���ʱ��������ֶλ�ȡ
        global $NEWAIINIT_VALUE_SYSTEM;
        global $NEWAIINIT_VALUE_SYSTEM_NUM;
        global $NEWAIINIT_VALUE_SYSTEM_SUM;

        if (strlen($NEWAIINIT_VALUE_SYSTEM) > 10) {

            $USER_DEFINE_SQL_ARRAY = explode('from', $NEWAIINIT_VALUE_SYSTEM);
            $USER_DEFINE_SQL_ARRAY = explode('select', $USER_DEFINE_SQL_ARRAY[0]);
            $USER_DEFINE_SQL_ARRAY = explode('from', $USER_DEFINE_SQL_ARRAY[1]);
            $USER_DEFINE_SQL_ARRAY = explode(',', $USER_DEFINE_SQL_ARRAY[0]);
            for ($sql_array = 0; $sql_array < sizeof($USER_DEFINE_SQL_ARRAY); $sql_array++) {
                $Element = TRIM($USER_DEFINE_SQL_ARRAY[$sql_array]);
                //print "<font color=red>".$Element."</font><BR>";
                //����' '
                $Element = explode(' ', $Element);
                $Array_index = sizeof($Element);
                if (TRIM($Element[$Array_index - 1]) == "")
                    $Element = TRIM($Element[0]);
                else
                    $Element = TRIM($Element[$Array_index - 1]);
                //print $Element."<BR>";
                //����'.'
                $Element = explode('.', $Element);
                $Array_index = sizeof($Element);
                if (TRIM($Element[$Array_index - 1]) == "")
                    $Element = TRIM($Element[0]);
                else
                    $Element = TRIM($Element[$Array_index - 1]);
                //$Element = explode('.',$Element);
                //$Element = $Element[1];
                //print $Element."<BR>";
                $columns[$sql_array] = $Element;
            }
            //print_R($USER_DEFINE_SQL_ARRAY);
        }

        //�Կ�ʼ

        $primarykey_index = $columns[$primarykey];
        if (sizeof($action_array) >= 3) {
            //	$action_model=$action_model.",$action";
        }

        switch ($init_type) {
            case 'array_show':
                page_css($IE_TITLE);
                require_once('newai.php');
                //showpageheader_new($common_html['common_html']['set']." $tablename","person_info.gif");
                array_show();
                exit;
                break;
        }

//        page_css($IE_TITLE);
        require_once('newai.php');
        newaiinit($fields, $mode);
        //����ʾ������ϸ����ʱ������ֵĹرհ�ť
        if ($_GET['action_close'] == "close") {
            print "<BR><div align=center><INPUT class=SmallButton onclick=self.close(); type=button value='" . $common_html['common_html']['close'] . "'</div>";
        }
        //�û��Զ�����Ʋ���,�˲��������Լ�����ĳЩ��ʾ����
        $�����Զ���������б� = array("init_default", "init_customer", "add_default", "edit_default", "view_default");
        if (in_array($_GET['action'], $�����Զ���������б�) && $_SESSION['LOGIN_USER_ID'] == 'admin') {
            if ($parse_filename == "")
                $parse_filename = $tablename;
            $PHP_SELF_ARRAY = explode('/', $_SERVER['PHP_SELF']);
            //print_R($PHP_SELF_ARRAY);
            $FILE_SELF_NAME = array_pop($PHP_SELF_ARRAY);
            $FileDirName = array_pop($PHP_SELF_ARRAY);
            $�Ƿ��ǽӿ�Ŀ¼ = array_pop($PHP_SELF_ARRAY);
            $����ʱ�� = time();
            $ִ��ʱ�� = ($����ʱ�� - $SYSTEM_EXEC_TIME) * 1000 / 60;
            $ִ��ʱ�� = number_format($ִ��ʱ��, 2, '.', '');
            $ִ��ʱ��TEXT = "ִ��:" . $ִ��ʱ�� . "MS";
            ;
            if ($�Ƿ��ǽӿ�Ŀ¼ == "Interface" && $FileDirName != "PGSQL") {
                //print "<BR><div align=center><a href=\"../CONFIG/config.php?".base64_encode("XX=XX&action=".$_GET['action']."&Tablename=$tablename&FileIniname=$parse_filename&FileDirName=$FileDirName&actionconfig=config&GOBACKFILENAME=$FILE_SELF_NAME")."\" title='���õ�ǰҳ����ʾ���� $ִ��ʱ��TEXT (����Ϣֻ��admin�û�������ʾ)'>���Ƶ�ǰҳ����ֶ���ʾ�����沼��[".$ִ��ʱ��TEXT."]".$��������Ϣ."</a>&nbsp;<a href=\"http://edu.tongda2000.com/book/index.php\" target=_blank title='�����ⷴ���������̽��н��(����Ϣֻ��admin�û�������ʾ)'>�������⼰�������</a></div>";
                //print "<BR><div align=center>$ִ��ʱ��TEXT</div>";
            } else if ($�Ƿ��ǽӿ�Ŀ¼ == "Interface" && $FileDirName == "PGSQL") {
                //print "<BR><div align=center>$ִ��ʱ��TEXT</div>";
            }
        }

        //��ʾϵͳ��ƽӿ�
        //print $parse_filename;
        $�ܽ�ɫ���� = explode(',', $_SESSION['LOGIN_USER_PRIV'] . "," . $_SESSION['LOGIN_USER_PRIV_OTHER']);
        if ($SYSTEM_MODE == "1" && $FileDirName != "PGSQL" && in_array('1', $�ܽ�ɫ����)) {
            if ($parse_filename == "") {
                $parse_filename = $tablename;
            }
            $SCRIPT_FILENAME = ereg_replace('/', '\\', $_SERVER['SCRIPT_FILENAME']);
            $SCRIPT_FILENAME_ARRAY = explode('\\', $SCRIPT_FILENAME);
            $MODULE_ARRAY_NAME = array_pop($SCRIPT_FILENAME_ARRAY);
            $MODULE_ARRAY_NAME = array_pop($SCRIPT_FILENAME_ARRAY);
            print "<BR><div align=center><a href=\"../../Development/main.php?MakeSystemModel=$MODULE_ARRAY_NAME&userdb=$userdb&Tablename=$tablename&FileIniname=$parse_filename\" target=_blank><font color=red>�������</font></a><BR>
			<input type=text readonly class=SmallInput value='$SCRIPT_FILENAME' size=95/>
			</div>";
        }

        break;
}
require_once('newai.php');
        newaiinit($fields, $mode);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

