<?php
/**
  * wechat php test
  */
//define your token
define("TOKEN", "weixin");
$wechatObj = new wechatCallbackapiTest();
//$wechatObj->valid();
$wechatObj->responseMsg();
class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);//这个是发送过来的内容
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
                $MsgType=$postObj->MsgType;//定义变量接收传递过来的类型
                switch ($MsgType)
                {
                    case "text":
                        if($keyword=="?"){ $msgType="text";
//                        '\r'是回车，'\n'是换行，前者使光标到行首，后者使光标下移一格，通常敲一个回车键，即是回车，又是换行（\r\n）。Unix中每行结尾只有“<换行>”，即“\n”；Windows中每行结尾是“<换行><回车>”，即“\n\r”；Mac中每行结尾是“<回车>”。
                            $contentStr =  "【1】特种服务号码\r\n【2】通讯服务号码\r\n【3】银行服务号码\r\n【4】用户反馈\r\n";
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            echo $resultStr;}else if($keyword=="1"){ $msgType="text";
//
                            $contentStr = "常用特种服务号码：
匪警：110
火警：119
急救中心：120";
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            echo $resultStr;}else if($keyword=="2"){ $msgType="text";
//
                            $contentStr = "常用通讯服务号码：
中移动：10086
中电信：10000
中联通：10010";
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            echo $resultStr;}else if($keyword=="3"){ $msgType="text";
//
                            $contentStr = "银行服务号码
建设银行：95533
工商银行：99588
农业银行：95599";
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            echo $resultStr;}else if($keyword=="4"){ $msgType="text";
//
                            $contentStr = "尊敬的用户，为了更好的为您服务，请将系统的不足之处反馈给我们。
反馈格式：@+建议内容";
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            echo $resultStr;}else if($keyword=="@"){ $msgType="text";
//
                            $contentStr = "感谢您的宝贵建议，我们会努力为您提供更好的服务！";
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            echo $resultStr;}

                    break;
//                        图片格式
                    case "image":
                        $msgType="text";
                        $contentStr = "这个图片貌似还阔以";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                        break;



                    case "voice":
                        $msgType="text";
                        $contentStr = "这个声音在颤抖";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                        break;

                    case "video":
                        $msgType="text";
                        $contentStr = "额,上传了一个视频吗?";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                        break;

                    case "shortvideo":
                        $msgType="text";
                        $contentStr = "小视频,更清新";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                        break;

                    case "location":
                        $msgType="text";
                        $contentStr = "纵里寻她,不如发个位置给她";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                        break;

                    case "link":
                        $msgType="text";
                        $contentStr = "点击这个链接,或许你可以看到世界";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                        break;

                case "event":
                    if($postObj->Event=="subscribe"){
                        $msgType="text";
                        $contentStr = "所有的坚持,只为遇见你";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;}

                    break;

                }




//                以下是源代码,上面是开代码
//				if(!empty( $keyword ))
//				{
//
//
//              		$msgType = "text";
//                	$contentStr = "终于见到你了";
//                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
//                	echo $resultStr;
//                }else{
//                	echo "Input something...";
//                }

        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>