<?php
/**
  * wechat php test
  */
//define your token
define("TOKEN", "weixin");
require './common.php';
$wechatObj = new wechatCallbackapiTest();
//$wechatObj->valid();//验证功能，在对接时，要开启，对接成功后，要关闭。
//开启回复功能
$wechatObj->responseMsg();//该方法是开启回复功能
class wechatCallbackapiTest
{
    //验证的方法，
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }
    //回复的方法
    public function responseMsg()
    {
		//get post data, May be due to the different environments
        //接收手机端发送的数据
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        global $tpl;//使用global,声明一下该函数内要使用全局的遍历
      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);//为了安全过滤实体中嵌入的一些代码。
                //simplexml_load_string函数是把xml数据解析成一个对象
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                //发送者（手机端微信）
                $fromUsername = $postObj->FromUserName;
                //接收者（微信公众平台）
                $toUsername = $postObj->ToUserName;
                 //发送者发送的内容
                $keyword = trim($postObj->Content);
                $Recognition = $postObj->Recognition;//接收语音识别接口
                $time = time();
                //接收消息的类型
                $MsgType = $postObj->MsgType;
                //接收节点的值
                //$event = $postObj->Event;
                //$msgType值可以是text  image  voice  video shortvideo  location  link
                switch ($MsgType) {
                    case 'text':
                       if($keyword=='?' || $keyword=='？'  ){
                             $contentStr = "【1】特种服务号码\r\n【2】通讯服务号码\r\n【3】银行服务号码\r\n【4】用户反馈";
                             $msgType = "text";//回复消息的类型
                             $resultStr = sprintf($tpl['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                             echo $resultStr;         
                       }else if($keyword=='1'){
                             $contentStr = "常用特种服务号码：\r\n匪警：110\r\n火警：119\r\n急救中心：120";
                             $msgType = "text";
                             $resultStr = sprintf($tpl['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                             echo $resultStr;  
                       }else if($keyword=='2'){
                             $contentStr = "常用通讯服务号码：\r\n中移动：10086\r\n中电信：10000\r\n中联通：10010";
                             $msgType = "text";
                             $resultStr = sprintf($tpl['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                             echo $resultStr;  
                       }else if($keyword=='图片'){
                             //发送图片消息
                            $msgType = 'image';//定义回复的类型
                            $mediaId  = 'JwhTdHsXbbxxZl3K_ex4EIn9EGkSU0Xmzizl2MMJD9K40QGkm8442p9fHKpPZZUr';
                            $resultStr = sprintf($tpl['imageTpl'], $fromUsername, $toUsername, $time, $msgType, $mediaId);
                            echo $resultStr;
                       }else if($keyword=='音乐'){
                             $msgType = 'music';//定义回复的类型
                             $title = '原声大碟';
                             $desc = '非常优美动听的音乐';
                             $url = "http://weiweixin.applinzi.com/music.mp3";
                             $resultStr = sprintf($tpl['musicTpl'], $fromUsername, $toUsername, $time, $msgType, $title,$desc,$url,$url);
                             echo $resultStr;
                       }else if($keyword=='单图文'){
                            //发送单图文消息
                            $msgType = 'news';//定义回复的类型
                            $count  =   '1';
                            $item = "<item>
                                        <Title><![CDATA[一起学习微信]]></Title> 
                                        <Description><![CDATA[本课程是微信基础课程]]></Description>
                                        <PicUrl><![CDATA[http://weiweixin.applinzi.com/image/1.jpg]]></PicUrl>
                                        <Url><![CDATA[http://www.baidu.com]]></Url>
                                        </item>";
                            $resultStr = sprintf($tpl['newsTpl'], $fromUsername, $toUsername, $time, $msgType, $count,$item);
                            echo $resultStr;
                       }else if($keyword=='多图文'){
                            //发送多图文消息
                            $msgType = 'news';//定义回复的类型
                            $count  =   '4';
                            $item = "";
                            for($i=1;$i<=4;$i++){
                                $item.="<item>
                                        <Title><![CDATA[一起学习微信{$i}]]></Title> 
                                        <Description><![CDATA[本课程是微信基础课程{$i}]]></Description>
                                        <PicUrl><![CDATA[http://weiweixin.applinzi.com/image/{$i}.jpg]]></PicUrl>
                                        <Url><![CDATA[http://www.baidu.com]]></Url>
                                        </item>";
                            
                            $resultStr = sprintf($tpl['newsTpl'], $fromUsername, $toUsername, $time, $msgType, $count,$item);
                            echo $resultStr;
                            }
                       } else {
                            //接入图灵机器人
                            $key = "170c1efcecae888e2c20348750584714";
                            //$keyword = "北京天气";
                            $url = "http://www.tuling123.com/openapi/api?key={$key}&info={$keyword}";
                            //请求该url,可以使用file_get_contents()来get请求。
                            $info =  file_get_contents($url);//返回的数据是json格式，
                            //可以使用json_decode函数，把一个 json格式转换成对象
                            $res = json_decode($info);
                            $content = $res->text;
                            $msgType = "text";
                            //发送文本消息到用户的手机端
                            $resultStr = sprintf($tpl['textTpl'], $fromUsername, $toUsername, $time, $msgType, $content);
                            echo $resultStr;
                       }
                    break;
                    case 'image':
                        //用户发的消息是文本
                        $msgType = "text";
                        $contentStr = "你发的是图片消息，图片很漂亮";
                        $resultStr = sprintf($tpl['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                    break;
                    case 'voice':
                        //用户发的消息是文本
                        $msgType = "text";
                        $contentStr = "你发的是语音消息，内容是{$Recognition}";
                        $resultStr = sprintf($tpl['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                    break;
                    case 'shortvideo':
                        //用户发的消息是文本
                        $msgType = "text";
                        $contentStr = "你发的是小视频消息，小视频很精彩";
                        $resultStr = sprintf($tpl['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                    break;
                    case 'video':
                        //用户发的消息是文本
                        $msgType = "text";
                        $contentStr = "你发的是视频消息，不会是大片吧";
                        $resultStr = sprintf($tpl['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                    break;
                    case 'location':
                        //用户发的消息是文本
                        //接收经纬度信息
                        $Location_Y = $postObj->Location_Y;
                        $Location_X = $postObj->Location_X;
                        $msgType = "text";
                        $contentStr = "我知道你在哪里了，纬度是{$Location_X},经度是{$Location_Y}，你跑不了了";
                        $resultStr = sprintf($tpl['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                    break;
                    case 'link':
                        //用户发的消息是文本
                        $msgType = "text";
                        $contentStr = "你发的是链接消息，不会是病毒吧";
                        $resultStr = sprintf($tpl['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                    break;
                    case 'event':
                        if($postObj->Event=='subscribe'){
                            //关注事件,发送一个文本消息
                            $msgType = "text";
                            $contentStr = "盼星星，盼月亮，终于盼到你了";
                            $resultStr = sprintf($tpl['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            echo $resultStr;
                        }else if($postObj->Event=='CLICK'){
                            //单击菜单触发的
                            if($postObj->EventKey=='V1001_TODAY_MUSIC'){
                                //单击的是‘今日歌曲’，发送一个音乐消息
                                 $msgType = 'music';//定义回复的类型
                                 $title = '原声大碟';
                                 $desc = '非常优美动听的音乐';
                                 $url = "http://weiweixin.applinzi.com/music.mp3";
                                 $resultStr = sprintf($tpl['musicTpl'], $fromUsername, $toUsername, $time, $msgType, $title,$desc,$url,$url);
                                 echo $resultStr;

                            }else if($postObj->EventKey=='V1001_GOOD'){
                                //单击时赞一下我们，发送一个文本消息
                                $msgType = "text";
                                $contentStr = "感谢你的点赞，我们会做的更好";
                                $resultStr = sprintf($tpl['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                                echo $resultStr;
                            }
                        }
                    break;
                }			

        }else {
        	echo "";
        	exit;
        }
    }
	//验证秘钥的一个方法
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