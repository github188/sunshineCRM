<?php
function returnsystemprivateconfig($LIST,$FILTER,$NULL,$action_model='',$row_element='',$bottom_element='',$systemorder='',$action_search='')			{
global $_GET,$_POST,$db,$_SESSION;
global $parse_filename,$tablename;
if($parse_filename=="")		$parse_filename = $tablename;
$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
$FILE_SELF_NAME = array_pop($PHP_SELF_ARRAY);
$FileDirName = array_pop($PHP_SELF_ARRAY);
$是否是接口目录 = array_pop($PHP_SELF_ARRAY);
$action_array = explode('_',$_GET['action']);
if(sizeof($action_array)>=3)	{
	$action = $action_array[0]."_".$action_array[1];
}else	{
	$action = $_GET['action'];
}

$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
$FILE_SELF_NAME = array_pop($PHP_SELF_ARRAY);
$FileDirName = array_pop($PHP_SELF_ARRAY);
//用于PGSQL下面不进行数据较验
//print $_SESSION['LOGIN_USER_ID'];
//if($FileDirName!="PGSQL")				{
//	$sql	= "select 字段,其它 from systemprivateconfig
//				where 目录='$FileDirName' and 表='$tablename' and 对象='$parse_filename' and 视图='$action'";
////	if($_SESSION['LOGIN_USER_ID']!="admin")
////		$rs		= $db->CacheExecute(150,$sql);//print_R($rs_select);
////	else
////		$rs		= $db->Execute($sql);//print_R($rs_select);
//	$rs_a	= $rs->GetArray();
//	$字段Array	= explode(',',$rs_a[0]['字段']);
//}
//else	{
//	//支持PGSQL
//}

//$其它信息 = unserialize($rs_a[0]['其它']);
//print_R($其它信息);

if($rs_a[0]['其它']!="")			{
	$其它信息 = unserialize($rs_a[0]['其它']);
	//print_R($其它信息);
	$NewArrayTEXT['action_model']	= $其它信息['action_model'];
	$NewArrayTEXT['row_element']	= $其它信息['row_element'];
	$NewArrayTEXT['bottom_element']	= $其它信息['bottom_element'];
	$NewArrayTEXT['pagenums_model']	= $其它信息['每页显示记录条数'];
	$NewArrayTEXT['systemorder']	= $其它信息['systemorder'];
	$NewArrayTEXT['action_search']	= $其它信息['action_search'];
	if($其它信息['systemorder']=="")	$NewArrayTEXT['systemorder']	= $systemorder;
	if($其它信息['action_search']=="")	$NewArrayTEXT['action_search']	= $action_search;
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

if($rs_a[0]['字段']!="")			{
	//print $字段;exit;
	//用户自定义序列
	$原装序列Array = explode(',',$LIST);
	$原装序列Array反序 = array_flip($原装序列Array);

	$LISTArray = explode(',',$rs_a[0]['字段']);
	$FILTERArray = explode(',',$FILTER);
	$NULLArray = explode(',',$NULL);
	$NewArray = array();
	for($i=0;$i<sizeof($LISTArray);$i++)			{
		//得到用户自定义序列的值
		$FieldIndex  = $LISTArray[$i];
		//本次判断是重复且绝对判断
		if(in_array($FieldIndex,$字段Array))	{
			//用户自定义类型,得到
			$本次字段在原装序列中的索引位置 = $原装序列Array反序[$FieldIndex];
			$FieldFilter = $FILTERArray[$本次字段在原装序列中的索引位置];
			$NewArray['LIST'][]		= $FieldIndex;
			$NewArray['FILTER'][]	= $FieldFilter;
			$NewArray['NULL'][]		= $NULLArray[$本次字段在原装序列中的索引位置];
		}

	}
	$NewArrayTEXT['LIST']	= join(',',$NewArray['LIST']);;
	$NewArrayTEXT['FILTER'] = join(',',$NewArray['FILTER']);;
	$NewArrayTEXT['NULL']	= join(',',$NewArray['NULL']);;
	$NewArrayTEXT['已配置信息'] = "[本页面已有自定义信息]";
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

        $_SESSION['SYSTEM_INITVIEW_SEARCH_VALUE_DEFAULT'] = '';//存入session
        if (sizeof($action_array) >= 3) {//=2
            $action = $action_array[0] . "_" . $action_array[1];
            $action_add = $action_array[2];
        }
        $location_title = 'sunshine_inside';
//        var_dump($file_ini);//by cwf
        $tablename = $file_ini[$action]['tablename'];//unit
        $SYTEM_CONFIG_TABLE != "" ? $tablename = $SYTEM_CONFIG_TABLE : '';//为空
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
        $已配置信息 = $returnsystemprivateconfig['已配置信息'];
        ;



        //专业科科长,以及副科长权限时进行生成,所有系统只能有查看权限
        //2010-4-3加入分管校长的查看权限,并行使用SUNSHINE_BANJI_LIST属性
        //在INI文件由系统进行对action_model row_element bottom_element等几个变量进行重新定义
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
            $_GET['系统说明'] = "备注:以下仅是针对" . $_SESSION['SUNSHINE_BANJI_LIST'] . "相关的信息,仅用于综合信息查询模块.";
        }

        //session_register("指定人员");
        //session_register("指定人员_FILENAME");
        $PHP_SELF_ARRAY = explode('/', $_SERVER['PHP_SELF']);
        $PHP_SELF_FILE = array_pop($PHP_SELF_ARRAY);
        if ($_GET['指定人员'] != "") {
            $_SESSION['指定人员'] = $_GET['指定人员'];
            $_SESSION['指定人员_FILENAME'] = $PHP_SELF_FILE;
        } elseif ($_SESSION['指定人员_FILENAME'] == $PHP_SELF_FILE) {
            //$_SESSION['指定人员'] = '';
        } else {
            $_SESSION['指定人员'] = '';
            $_SESSION['指定人员_FILENAME'] = '';
        }
        if ($_SESSION['指定人员'] != "") {
            $row_element_array = explode(',', $row_element);
            if (in_array("view:view_default", $row_element_array)) {
                $row_element = 'view:view_default';
            }
            if (in_array("view:view_customer", $row_element_array)) {
                $row_element = 'view:view_customer';
            }
            $action_model = '';
            $bottom_element = '';
            $_GET['系统说明'] = "备注:以下仅是针对 " . returntablefield("user", "USER_ID", $_SESSION['指定人员'], "USER_NAME") . " 相关的信息,仅用于综合信息查询模块.";
        }

        //session_register("指定班号");
        //session_register("指定班号_FILENAME");
        $PHP_SELF_ARRAY = explode('/', $_SERVER['PHP_SELF']);
        $PHP_SELF_FILE = array_pop($PHP_SELF_ARRAY);
        if ($_GET['指定班号'] != "") {
            $_SESSION['指定班号'] = $_GET['指定班号'];
            $_SESSION['指定班号_FILENAME'] = $PHP_SELF_FILE;
        } elseif ($_SESSION['指定班号_FILENAME'] == $PHP_SELF_FILE) {
            //$_SESSION['指定班号'] = '';
        } else {
            $_SESSION['指定班号'] = '';
            $_SESSION['指定班号_FILENAME'] = '';
        }
        //print_R($_SESSION);
        if ($_SESSION['指定班号'] != "") {
            $row_element_array = explode(',', $row_element);
            if (in_array("view:view_default", $row_element_array)) {
                $row_element = 'view:view_default';
            }
            if (in_array("view:view_customer", $row_element_array)) {
                $row_element = 'view:view_customer';
            }
            $action_model = '';
            $bottom_element = '';
            $_GET['系统说明'] = "备注:以下仅是针对 " . $_SESSION['指定班号'] . " 相关的信息,仅用于综合信息查询模块.";
        }
        //$columns=returntablecolumn($tablename);//print_R($SYTEM_CONFIG_TABLE);
        //$html_etc=returnsystemlang($tablename,$SYTEM_CONFIG_TABLE);
        //用户自定义SQL语句时的虚拟表字段获取
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
                //过滤' '
                $Element = explode(' ', $Element);
                $Array_index = sizeof($Element);
                if (TRIM($Element[$Array_index - 1]) == "")
                    $Element = TRIM($Element[0]);
                else
                    $Element = TRIM($Element[$Array_index - 1]);
                //print $Element."<BR>";
                //过滤'.'
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

        //自开始

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
        //在显示弹出明细窗口时下面出现的关闭按钮
        if ($_GET['action_close'] == "close") {
            print "<BR><div align=center><INPUT class=SmallButton onclick=self.close(); type=button value='" . $common_html['common_html']['close'] . "'</div>";
        }
        //用户自定义设计部分,此部分允许自己定义某些显示特性
        $允许自定义的类型列表 = array("init_default", "init_customer", "add_default", "edit_default", "view_default");
        if (in_array($_GET['action'], $允许自定义的类型列表) && $_SESSION['LOGIN_USER_ID'] == 'admin') {
            if ($parse_filename == "")
                $parse_filename = $tablename;
            $PHP_SELF_ARRAY = explode('/', $_SERVER['PHP_SELF']);
            //print_R($PHP_SELF_ARRAY);
            $FILE_SELF_NAME = array_pop($PHP_SELF_ARRAY);
            $FileDirName = array_pop($PHP_SELF_ARRAY);
            $是否是接口目录 = array_pop($PHP_SELF_ARRAY);
            $现在时间 = time();
            $执行时间 = ($现在时间 - $SYSTEM_EXEC_TIME) * 1000 / 60;
            $执行时间 = number_format($执行时间, 2, '.', '');
            $执行时间TEXT = "执行:" . $执行时间 . "MS";
            ;
            if ($是否是接口目录 == "Interface" && $FileDirName != "PGSQL") {
                //print "<BR><div align=center><a href=\"../CONFIG/config.php?".base64_encode("XX=XX&action=".$_GET['action']."&Tablename=$tablename&FileIniname=$parse_filename&FileDirName=$FileDirName&actionconfig=config&GOBACKFILENAME=$FILE_SELF_NAME")."\" title='配置当前页面显示参数 $执行时间TEXT (此信息只在admin用户下面显示)'>定制当前页面的字段显示及界面布局[".$执行时间TEXT."]".$已配置信息."</a>&nbsp;<a href=\"http://edu.tongda2000.com/book/index.php\" target=_blank title='将问题反馈给开发商进行解决(此信息只在admin用户下面显示)'>反馈问题及提出需求</a></div>";
                //print "<BR><div align=center>$执行时间TEXT</div>";
            } else if ($是否是接口目录 == "Interface" && $FileDirName == "PGSQL") {
                //print "<BR><div align=center>$执行时间TEXT</div>";
            }
        }

        //显示系统设计接口
        //print $parse_filename;
        $总角色数组 = explode(',', $_SESSION['LOGIN_USER_PRIV'] . "," . $_SESSION['LOGIN_USER_PRIV_OTHER']);
        if ($SYSTEM_MODE == "1" && $FileDirName != "PGSQL" && in_array('1', $总角色数组)) {
            if ($parse_filename == "") {
                $parse_filename = $tablename;
            }
            $SCRIPT_FILENAME = ereg_replace('/', '\\', $_SERVER['SCRIPT_FILENAME']);
            $SCRIPT_FILENAME_ARRAY = explode('\\', $SCRIPT_FILENAME);
            $MODULE_ARRAY_NAME = array_pop($SCRIPT_FILENAME_ARRAY);
            $MODULE_ARRAY_NAME = array_pop($SCRIPT_FILENAME_ARRAY);
            print "<BR><div align=center><a href=\"../../Development/main.php?MakeSystemModel=$MODULE_ARRAY_NAME&userdb=$userdb&Tablename=$tablename&FileIniname=$parse_filename\" target=_blank><font color=red>点击配置</font></a><BR>
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

