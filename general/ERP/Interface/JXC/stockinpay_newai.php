<?php
/*
��Ȩ����:֣�ݵ���Ƽ��������޹�˾;
��ϵ��ʽ:0371-69663266;
��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
��˾���:֣�ݵ���Ƽ��������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ������������������������������в�������ĸ�У����������������СѧУ���������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ����������ͷ���;

��������:����Ƽ��������������Լܹ�ƽ̨,�Լ��������֮����չ���κ���������Ʒ;
����Э��:���ֻ�У԰��ƷΪ��ҵ����,��������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э������,GPLV3Э�����������뵽�ٶ�����;
��������:������ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
*/

require_once( "lib.inc.php" );
$isBase64 = isbase64( );
$isBase64 == 1 ? checkbase64( ) : "";
if ( $_GET['action'] == "add_default" )
{
				header( "location:stockinpay_input_newai.php?returnAction=init" );
}
if ( $_GET['action'] == "edit_default" && $_GET['ROWID'] != "" )
{
				header( "location:stockinpay_input_newai.php?action=edit_default&ROWID=".$_GET['ROWID'] );
}
dealdatachildtable( "paydetail", "mainrowid" );
$filetablename = "paymain";
require_once( "include.inc.php" );
?>