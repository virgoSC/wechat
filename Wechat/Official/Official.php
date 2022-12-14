<?php

namespace Wechat\Official;

class Official
{
    private $msgTypeText = 'text';
    private $msgTypeImage = 'image';
    private static $msgTypeLocation = 'location';
    private static $msgTypeLink = 'link';
    private static $msgTypeEvent = 'event';
    private $msgTypeMusic = 'music';
    private $msgTypeNews = 'news';
    private $msgTypeVoice = 'voice';
    private $msgTypeVideo = 'video';
//    private $EVENT_SUBSCRIBE = 'subscribe';       //订阅
//    private $EVENT_UNSUBSCRIBE = 'unsubscribe';   //取消订阅
//    private $EVENT_SCAN = 'SCAN';                 //扫描带参数二维码
//    private $EVENT_LOCATION = 'LOCATION';         //上报地理位置
//    private $EVENT_MENU_VIEW = 'VIEW';                     //菜单 - 点击菜单跳转链接
//    private $EVENT_MENU_CLICK = 'CLICK';                   //菜单 - 点击菜单拉取消息
//    private $EVENT_MENU_SCAN_PUSH = 'scancode_push';       //菜单 - 扫码推事件(客户端跳URL)
//    private $EVENT_MENU_SCAN_WAITMSG = 'scancode_waitmsg'; //菜单 - 扫码推事件(客户端不跳URL)
//    private $EVENT_MENU_PIC_SYS = 'pic_sysphoto';          //菜单 - 弹出系统拍照发图
//    private $EVENT_MENU_PIC_PHOTO = 'pic_photo_or_album';  //菜单 - 弹出拍照或者相册发图
//    private $EVENT_MENU_PIC_WEIXIN = 'pic_weixin';         //菜单 - 弹出微信相册发图器
//    private $EVENT_MENU_LOCATION = 'location_select';      //菜单 - 弹出地理位置选择器
//    private $EVENT_SEND_MASS = 'MASSSENDJOBFINISH';        //发送结果 - 高级群发完成
//    private $EVENT_SEND_TEMPLATE = 'TEMPLATESENDJOBFINISH';//发送结果 - 模板消息发送结果
//    private $EVENT_KF_SEESION_CREATE = 'kfcreatesession';  //多客服 - 接入会话
//    private $EVENT_KF_SEESION_CLOSE = 'kfclosesession';    //多客服 - 关闭会话
//    private $EVENT_KF_SEESION_SWITCH = 'kfswitchsession';  //多客服 - 转接会话
//    private $EVENT_CARD_PASS = 'card_pass_check';          //卡券 - 审核通过
//    private $EVENT_CARD_NOTPASS = 'card_not_pass_check';   //卡券 - 审核未通过
//    private $EVENT_CARD_USER_GET = 'user_get_card';        //卡券 - 用户领取卡券
//    private $EVENT_CARD_USER_DEL = 'user_del_card';        //卡券 - 用户删除卡券

    private $apiUrlPrefix = 'https://api.weixin.qq.com/cgi-bin';
    private $authUrl = '/token?grant_type=client_credential&';
    private $menuCreateUrl = '/menu/create?';
    private $menuGetUrl = '/menu/get?';
    private $menuDeleteUrl = '/menu/delete?';
    private $getTicketUrl = '/ticket/getticket?';
    private $callbackServerGetUrl = '/getcallbackip?';
    private $qrcodeCreateUrl = '/qrcode/create?';
    private $qrScene = 0;
    private $qrLimitScene = 1;
    private $qrcodeImgUrl = 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=';
    private $shortUrl = '/shorturl?';
    private $userGetUrl = '/user/get?';
    private $userInfoUrl = '/user/info?';
    private $userUpdateRemarkUrl = '/user/info/updateremark?';
    private $groupGetUrl = '/groups/get?';
    private $userGroupUrl = '/groups/getid?';
    private $groupCreateUrl = '/groups/create?';
    private $groupUpdateUrl = '/groups/update?';
    private $groupMemberUpdateUrl = '/groups/members/update?';
    private $groupMemberBatchUpdateUrl = '/groups/members/batchupdate?';
    private $customSendUrl = '/message/custom/send?';
    private $mediaUploadNewsUrl = '/media/uploadnews?';
    private $massSendUrl = '/message/mass/send?';
    private $templateSetIndustryUrl = '/message/template/api_set_industry?';
    private $templateAddTplUrl = '/message/template/api_add_template?';
    private $templateSendUrl = '/message/template/send?';
    private $massSendGroupUrl = '/message/mass/sendall?';
    private $massDeleteUrl = '/message/mass/delete?';
    private $massPreviewUrl = '/message/mass/preview?';
    private $massQueryUrl = '/message/mass/get?';
    private $uploadMediaUrl = 'http://file.api.weixin.qq.com/cgi-bin';
    private $mediaUploadUrl = '/media/upload?';
    private $mediaUploadImgUrl = '/media/uploadimg?';//图片上传接口
    private $mediaGetUrl = '/media/get?';
    private $mediaVideoUpload = '/media/uploadvideo?';
    private $mediaForeverUploadUrl = '/material/add_material?';
    private $mediaForeverNewsUploadUrl = '/material/add_news?';
    private $mediaForeverNewsUpdateUrl = '/material/update_news?';
    private $mediaForeverGetUrl = '/material/get_material?';
    private $mediaForeverDelUrl = '/material/del_material?';
    private $mediaForeverCountUrl = '/material/get_materialcount?';
    private $mediaForeverBatchGetUrl = '/material/batchget_material?';
    private $oauthPrefix = 'https://open.weixin.qq.com/connect/oauth2';
    private $oauthAuthorizeUrl = '/authorize?';
    ///多客服相关地址OAUTH_AUTHORIZEUrl
    private $customServiceGetRecord = '/customservice/getrecord?';
    private $customServiceGetKfList = '/customservice/getkflist?';
    private $customServiceGetOnlineKfList = '/customservice/getonlinekflist?';
    private $apiBaseurlPrefix = 'https://api.weixin.qq.com'; //以下API接口URL需要使用此前缀
    private $oauthTokenUrl = '/sns/oauth2/access_token?';
    private $oauthRefreshUrl = '/sns/oauth2/refresh_token?';
    private $oauthUserInfoUrl = '/sns/userinfo?';
    private $oauthAuthUrl = '/sns/auth?';
    ///多客服相关地址
    private $customSessionCreate = '/customservice/kfsession/create?';
    private $customSessionClose = '/customservice/kfsession/close?';
    private $customSessionSwitch = '/customservice/kfsession/switch?';
    private $customSessionGet = '/customservice/kfsession/getsession?';
    private $customSessionGetList = '/customservice/kfsession/getsessionlist?';
    private $customSessionGetWait = '/customservice/kfsession/getwaitcase?';
    private $CSKFAccountAddUrl = '/customservice/kfaccount/add?';
    private $CSKFAccountUpdateUrl = '/customservice/kfaccount/update?';
    private $CS_KFAccountDelUrl = '/customservice/kfaccount/del?';
    private $CS_KFAccountUploadHeadImgUrl = '/customservice/kfaccount/uploadheadimg?';
    ///卡券相关地址
    private $cardCreate = '/card/create?';
    private $cardDelete = '/card/delete?';
    private $cardUpdate = '/card/update?';
    private $cardGet = '/card/get?';
    private $cardBatchGet = '/card/batchget?';
    private $cardModifyStock = '/card/modifystock?';
    private $cardLocationBatchAdd = '/card/location/batchadd?';
    private $cardLocationBatchGet = '/card/location/batchget?';
    private $cardGetColors = '/card/getcolors?';
    private $cardQrcodeCreate = '/card/qrcode/create?';
    private $cardCodeConsume = '/card/code/consume?';
    private $cardCodeDecrypt = '/card/code/decrypt?';
    private $cardCodeGet = '/card/code/get?';
    private $cardCodeUpdate = '/card/code/update?';
    private $cardCodeUnavailable = '/card/code/unavailable?';
    private $cardTestWhileListSet = '/card/testwhitelist/set?';
    private $cardMemberCardActivate = '/card/membercard/activate?';      //激活会员卡
    private $cardMemberCardUpdateUser = '/card/membercard/updateuser?';    //更新会员卡
    private $cardMovieTicketUpdateUser = '/card/movieticket/updateuser?';   //更新电影票(未加方法)
    private $cardBoardingPassCheckin = '/card/boardingpass/checkin?';     //飞机票-在线选座(未加方法)
    private $cardLuckyMoneyUpdate = '/card/luckymoney/updateuserbalance?';     //更新红包金额
    private $semanticApiUrl = '/semantic/semproxy/search?'; //语义理解
    ///数据分析接口
    private $shakeAroundDeviceApplyId = '/shakearound/device/applyid?';
    ///微信摇一摇周边
    private $shakeAroundDeviceUpdate = '/shakearound/device/update?';//申请设备ID
    private $shakeAroundDeviceSearch = '/shakearound/device/search?';//编辑设备信息
    private $shakeAroundDeviceBindLocation = '/shakearound/device/bindlocation?';//查询设备列表
    private $shakeAroundDeviceBindPage = '/shakearound/device/bindpage?';//配置设备与门店ID的关系
    private $shakeAroundMaterialAdd = '/shakearound/material/add?';//配置设备与页面的绑定关系
    private $shakeAroundPageAdd = '/shakearound/page/add?';//上传摇一摇图片素材
    private $shakeAroundPageUpdate = '/shakearound/page/update?';//增加页面
    private $shakeAroundPageSearch = '/shakearound/page/search?';//编辑页面
    private $shakeAroundPageDelete = '/shakearound/page/delete?';//查询页面列表
    private $shakeAroundUserGetShakeInfo = '/shakearound/user/getshakeinfo?';//删除页面
    private $shakeAroundStatisticsDevice = '/shakearound/statistics/device?';//获取摇周边的设备及用户信息
    private $shakeAroundStatisticsPage = '/shakearound/statistics/page?';//以设备为维度的数据统计接口
    private $dataCubeUrlArr = array(        //用户分析
        'user' => array(
            'summary' => '/datacube/getusersummary?',        //获取用户增减数据（getusersummary）
            'cumulate' => '/datacube/getusercumulate?',        //获取累计用户数据（getusercumulate）
        ),
        'article' => array(            //图文分析
            'summary' => '/datacube/getarticlesummary?',        //获取图文群发每日数据（getarticlesummary）
            'total' => '/datacube/getarticletotal?',        //获取图文群发总数据（getarticletotal）
            'read' => '/datacube/getuserread?',            //获取图文统计数据（getuserread）
            'readhour' => '/datacube/getuserreadhour?',        //获取图文统计分时数据（getuserreadhour）
            'share' => '/datacube/getusershare?',            //获取图文分享转发数据（getusershare）
            'sharehour' => '/datacube/getusersharehour?',        //获取图文分享转发分时数据（getusersharehour）
        ),
        'upstreammsg' => array(        //消息分析
            'summary' => '/datacube/getupstreammsg?',        //获取消息发送概况数据（getupstreammsg）
            'hour' => '/datacube/getupstreammsghour?',    //获取消息分送分时数据（getupstreammsghour）
            'week' => '/datacube/getupstreammsgweek?',    //获取消息发送周数据（getupstreammsgweek）
            'month' => '/datacube/getupstreammsgmonth?',    //获取消息发送月数据（getupstreammsgmonth）
            'dist' => '/datacube/getupstreammsgdist?',    //获取消息发送分布数据（getupstreammsgdist）
            'distweek' => '/datacube/getupstreammsgdistweek?',    //获取消息发送分布周数据（getupstreammsgdistweek）
            'distmonth' => '/datacube/getupstreammsgdistmonth?',    //获取消息发送分布月数据（getupstreammsgdistmonth）
        ),
        'interface' => array(        //接口分析
            'summary' => '/datacube/getinterfacesummary?',    //获取接口分析数据（getinterfacesummary）
            'summaryhour' => '/datacube/getinterfacesummaryhour?',    //获取接口分析分时数据（getinterfacesummaryhour）
        )
    );//以页面为维度的数据统计接口
    public $appid;
    public $appSecret;
    public $accessToken;
    public $jsapiTicket;
    public $userToken;
    public $debug = false;
    public $errCode = 40001;
    public $errMsg = "no access";
    public $logCalback;

    protected $token;
    protected $encodingAesKey;
    protected $mchId;
    protected $mchKey;
    protected $paymentCertPath;
    private $encryptType;
    private $partnerId;
    private $partnerKey;
    private $paySignKey;
    private $postXml;
    private $_msg;
    private $_funcFlag = false;
    private $_receive;
    private $_text_filter = true;

    public function __construct(array $options)
    {
        $this->token = $options['token'] ?? '';
        $this->encodingAesKey = $options['encodingAesKey'] ?? '';
        $this->appid = $options['appId'] ?? '';
        $this->appSecret = $options['appSecret'] ?? '';
        $this->debug = $options['debug'] ?? '';
        $this->logCalback = $options['logCallback'] ?? '';
        $this->mchId = $options['mchId'] ?? '';
        $this->mchKey = $options['mchKey'] ?? '';
    }

    /**
     * 是否为微信浏览器
     *
     * @return bool
     */
    public function isWeiXin(): bool
    {
        if (isset($_SERVER['SITE_ENV']) && $_SERVER['SITE_ENV'] == 'DEV') {
            return true;
        }
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
            return true;
        }
        return false;
    }

    /**
     * 判断是否是IOS
     *
     * @return bool
     */
    public function isIOS(): bool
    {
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')) {
            return true;
        }
        return false;
    }

    /**
     * For weixin server validation
     *
     * @param bool $return 是否返回
     */
    public function valid(bool $return = false)
    {
        $encryptStr = "";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $postStr = file_get_contents("php://input");
            $array = (array)simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $this->encryptType = $_GET["encrypt_type"] ?? '';
            if ($this->encryptType == 'aes') { //aes加密
                $this->log($postStr);
                $encryptStr = $array['Encrypt'];
                $pc = new Prpcrypt($this->encodingAesKey);
                $array = $pc->decrypt($encryptStr, $this->appid);
                if (!isset($array[0]) || ($array[0] != 0)) {
                    if (!$return) {
                        die('decrypt error!');
                    } else {
                        return false;
                    }
                }
                $this->postXml = $array[1];
                if (!$this->appid) {
                    $this->appid = $array[2];
                }//为了没有appid的订阅号。
            } else {
                $this->postXml = $postStr;
            }
        } elseif (isset($_GET["echostr"])) {
            $echoStr = $_GET["echostr"];
            if ($return) {
                if ($this->checkSignature()) {
                    return $echoStr;
                } else {
                    return false;
                }
            } else {
                if ($this->checkSignature()) {
                    die($echoStr);
                } else {
                    die('no access');
                }
            }
        }

        if (!$this->checkSignature($encryptStr)) {
            if ($return) {
                return false;
            } else {
                die('no access');
            }
        }
        return true;
    }

    /**
     * 日志记录，可被重载。
     *
     * @param mixed $log 输入日志
     * @return mixed
     */
    protected function log($log)
    {
        if ($this->debug && function_exists($this->logCalback)) {
            if (is_array($log)) {
                $log = print_r($log, true);
            }
            return call_user_func($this->logCalback, $log);
        }
    }

    /**
     * For weixin server validation
     */
    private function checkSignature($str = ''): bool
    {
        $signature = $_GET["signature"] ?? '';
        $signature = $_GET["msg_signature"] ?? $signature; //如果存在加密验证则用加密验证段
        $timestamp = $_GET["timestamp"] ?? '';
        $nonce = $_GET["nonce"] ?? '';

        $token = $this->token;
        $tmpArr = array($token, $timestamp, $nonce, $str);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 设置消息的星标标志，官方已取消对此功能的支持
     */
    public function setFuncFlag($flag): Official
    {
        $this->_funcFlag = $flag;
        return $this;
    }

    /**
     * 获取微信服务器发来的信息
     */
    public function getRev(): Official
    {
        if ($this->_receive) {
            return $this;
        }
        $postStr = !empty($this->postXml) ? $this->postXml : file_get_contents("php://input");
        //兼顾使用明文又不想调用valid()方法的情况
        $this->log($postStr);
        if (!empty($postStr)) {
            $this->_receive = (array)simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        }
        return $this;
    }

    /**
     * 获取微信服务器发来的信息
     */
    public function getRevData()
    {
        return $this->_receive;
    }

    /**
     * 获取接收消息的类型
     */
    public function getRevType()
    {
        if (isset($this->_receive['MsgType'])) {
            return $this->_receive['MsgType'];
        } else {
            return false;
        }
    }

    /**
     * 获取消息ID
     */
    public function getRevID()
    {
        if (isset($this->_receive['MsgId'])) {
            return $this->_receive['MsgId'];
        } else {
            return false;
        }
    }

    /**
     * 获取消息发送时间
     */
    public function getRevCtime()
    {
        if (isset($this->_receive['CreateTime'])) {
            return $this->_receive['CreateTime'];
        } else {
            return false;
        }
    }

    /**
     * 获取接收消息内容正文
     */
    public function getRevContent()
    {
        if (isset($this->_receive['Content'])) {
            return $this->_receive['Content'];
        } else {
            if (isset($this->_receive['Recognition'])) //获取语音识别文字内容，需申请开通
            {
                return $this->_receive['Recognition'];
            } else {
                return false;
            }
        }
    }

    /**
     * 获取接收消息图片
     */
    public function getRevPic()
    {
        if (isset($this->_receive['PicUrl'])) {
            return array(
                'mediaid' => $this->_receive['MediaId'],
                'picurl' => (string)$this->_receive['PicUrl'],    //防止picurl为空导致解析出错
            );
        } else {
            return false;
        }
    }

    /**
     * 获取接收消息链接
     */
    public function getRevLink()
    {
        if (isset($this->_receive['Url'])) {
            return array(
                'url' => $this->_receive['Url'],
                'title' => $this->_receive['Title'],
                'description' => $this->_receive['Description']
            );
        } else {
            return false;
        }
    }

    /**
     * 获取接收地理位置
     */
    public function getRevGeo()
    {
        if (isset($this->_receive['Location_X'])) {
            return array(
                'x' => $this->_receive['Location_X'],
                'y' => $this->_receive['Location_Y'],
                'scale' => $this->_receive['Scale'],
                'label' => $this->_receive['Label']
            );
        } else {
            return false;
        }
    }

    /**
     * 获取上报地理位置事件
     */
    public function getRevEventGeo()
    {
        if (isset($this->_receive['Latitude'])) {
            return array(
                'x' => $this->_receive['Latitude'],
                'y' => $this->_receive['Longitude'],
                'precision' => $this->_receive['Precision'],
            );
        } else {
            return false;
        }
    }

    /**
     * 获取接收事件推送
     */
    public function getRevEvent()
    {
        if (isset($this->_receive['Event'])) {
            $array['event'] = $this->_receive['Event'];
        }
        if (isset($this->_receive['EventKey'])) {
            $array['key'] = $this->_receive['EventKey'];
        }
        if (isset($array) && count($array) > 0) {
            return $array;
        } else {
            return false;
        }
    }

    /**
     * 获取自定义菜单的扫码推事件信息
     *
     * 事件类型为以下两种时则调用此方法有效
     * Event     事件类型，scancode_push
     * Event     事件类型，scancode_waitmsg
     *
     * @return array|false : array | false
     * array (
     *     'ScanType'=>'qrcode',
     *     'ScanResult'=>'123123'
     * )
     */
    public function getRevScanInfo()
    {
        if (isset($this->_receive['ScanCodeInfo'])) {
            if (!is_array($this->_receive['ScanCodeInfo'])) {
                $array = (array)$this->_receive['ScanCodeInfo'];
                $this->_receive['ScanCodeInfo'] = $array;
            } else {
                $array = $this->_receive['ScanCodeInfo'];
            }
        }
        if (isset($array) && count($array) > 0) {
            return $array;
        } else {
            return false;
        }
    }

    /**
     * 获取自定义菜单的图片发送事件信息
     *
     * 事件类型为以下三种时则调用此方法有效
     * Event     事件类型，pic_sysphoto        弹出系统拍照发图的事件推送
     * Event     事件类型，pic_photo_or_album  弹出拍照或者相册发图的事件推送
     * Event     事件类型，pic_weixin          弹出微信相册发图器的事件推送
     *
     * array (
     *   'Count' => '2',
     *   'PicList' =>array (
     *         'item' =>array (
     *             0 =>array ('PicMd5Sum' => 'aaae42617cf2a14342d96005af53624c'),
     *             1 =>array ('PicMd5Sum' => '149bd39e296860a2adc2f1bb81616ff8'),
     *         ),
     *   ),
     * )
     *
     */
    public function getRevSendPicsInfo()
    {
        if (isset($this->_receive['SendPicsInfo'])) {
            if (!is_array($this->_receive['SendPicsInfo'])) {
                $array = (array)$this->_receive['SendPicsInfo'];
                if (isset($array['PicList'])) {
                    $array['PicList'] = (array)$array['PicList'];
                    $item = $array['PicList']['item'];
                    $array['PicList']['item'] = array();
                    foreach ($item as $key => $value) {
                        $array['PicList']['item'][$key] = (array)$value;
                    }
                }
                $this->_receive['SendPicsInfo'] = $array;
            } else {
                $array = $this->_receive['SendPicsInfo'];
            }
        }
        if (isset($array) && count($array) > 0) {
            return $array;
        } else {
            return false;
        }
    }

    /**
     * 获取自定义菜单的地理位置选择器事件推送
     *
     * 事件类型为以下时则可以调用此方法有效
     * Event     事件类型，location_select        弹出地理位置选择器的事件推送
     *
     * array (
     *   'Location_X' => '33.731655000061',
     *   'Location_Y' => '113.29955200008047',
     *   'Scale' => '16',
     *   'Label' => '某某市某某区某某路',
     *   'Poiname' => '',
     * )
     *
     */
    public function getRevSendGeoInfo()
    {
        if (isset($this->_receive['SendLocationInfo'])) {
            if (!is_array($this->_receive['SendLocationInfo'])) {
                $array = (array)$this->_receive['SendLocationInfo'];
                if (empty($array['Poiname'])) {
                    $array['Poiname'] = "";
                }
                if (empty($array['Label'])) {
                    $array['Label'] = "";
                }
                $this->_receive['SendLocationInfo'] = $array;
            } else {
                $array = $this->_receive['SendLocationInfo'];
            }
        }
        if (isset($array) && count($array) > 0) {
            return $array;
        } else {
            return false;
        }
    }

    /**
     * 获取接收语音推送
     */
    public function getRevVoice()
    {
        if (isset($this->_receive['MediaId'])) {
            return array(
                'mediaid' => $this->_receive['MediaId'],
                'format' => $this->_receive['Format'],
            );
        } else {
            return false;
        }
    }

    /**
     * 获取接收视频推送
     */
    public function getRevVideo()
    {
        if (isset($this->_receive['MediaId'])) {
            return array(
                'mediaid' => $this->_receive['MediaId'],
                'thumbmediaid' => $this->_receive['ThumbMediaId']
            );
        } else {
            return false;
        }
    }

    /**
     * 获取接收TICKET
     */
    public function getRevTicket()
    {
        if (isset($this->_receive['Ticket'])) {
            return $this->_receive['Ticket'];
        } else {
            return false;
        }
    }

    /**
     * 获取二维码的场景值
     */
    public function getRevSceneId()
    {
        if (isset($this->_receive['EventKey'])) {
            return str_replace('qrscene_', '', $this->_receive['EventKey']);
        } else {
            return false;
        }
    }

    /**
     * 获取主动推送的消息ID
     * 经过验证，这个和普通的消息MsgId不一样
     * 当Event为 MASSSENDJOBFINISH 或 TEMPLATESENDJOBFINISH
     */
    public function getRevTplMsgID()
    {
        return $this->_receive['MsgID'] ?? false;
    }

    /**
     * 获取模板消息发送状态
     */
    public function getRevStatus()
    {
        return $this->_receive['Status'] ?? false;
    }

    /**
     * 获取群发或模板消息发送结果
     * 当Event为 MASSSENDJOBFINISH 或 TEMPLATESENDJOBFINISH，即高级群发/模板消息
     */
    public function getRevResult()
    {
        if (isset($this->_receive['Status'])) //发送是否成功，具体的返回值请参考 高级群发/模板消息 的事件推送说明
        {
            $array['Status'] = $this->_receive['Status'];
        }
        if (isset($this->_receive['MsgID'])) //发送的消息id
        {
            $array['MsgID'] = $this->_receive['MsgID'];
        }

        //以下仅当群发消息时才会有的事件内容
        if (isset($this->_receive['TotalCount']))     //分组或openid列表内粉丝数量
        {
            $array['TotalCount'] = $this->_receive['TotalCount'];
        }
        if (isset($this->_receive['FilterCount']))    //过滤（过滤是指特定地区、性别的过滤、用户设置拒收的过滤，用户接收已超4条的过滤）后，准备发送的粉丝数
        {
            $array['FilterCount'] = $this->_receive['FilterCount'];
        }
        if (isset($this->_receive['SentCount']))     //发送成功的粉丝数
        {
            $array['SentCount'] = $this->_receive['SentCount'];
        }
        if (isset($this->_receive['ErrorCount']))    //发送失败的粉丝数
        {
            $array['ErrorCount'] = $this->_receive['ErrorCount'];
        }
        if (isset($array) && count($array) > 0) {
            return $array;
        } else {
            return false;
        }
    }

    /**
     * 获取多客服会话状态推送事件 - 接入会话
     * 当Event为 kfcreatesession 即接入会话
     *
     * @return string | boolean  返回分配到的客服
     */
    public function getRevKFCreate()
    {
        if (isset($this->_receive['KfAccount'])) {
            return $this->_receive['KfAccount'];
        } else {
            return false;
        }
    }

    /**
     * 获取多客服会话状态推送事件 - 关闭会话
     * 当Event为 kfclosesession 即关闭会话
     *
     * @return string | boolean  返回分配到的客服
     */
    public function getRevKFClose()
    {
        return $this->_receive['KfAccount'] ?? false;
    }

    /**
     * 获取多客服会话状态推送事件 - 转接会话
     * 当Event为 kfswitchsession 即转接会话
     *
     * {
     *     'FromKfAccount' => '',      //原接入客服
     *     'ToKfAccount' => ''            //转接到客服
     * }
     */
    public function getRevKFSwitch()
    {
        if (isset($this->_receive['FromKfAccount']))     //原接入客服
        {
            $array['FromKfAccount'] = $this->_receive['FromKfAccount'];
        }
        if (isset($this->_receive['ToKfAccount']))    //转接到客服
        {
            $array['ToKfAccount'] = $this->_receive['ToKfAccount'];
        }
        if (isset($array) && count($array) > 0) {
            return $array;
        } else {
            return false;
        }
    }

    /**
     * 获取卡券事件推送 - 卡卷审核是否通过
     * 当Event为 card_pass_check(审核通过) 或 card_not_pass_check(未通过)
     *
     * @return string|boolean  返回卡券ID
     */
    public function getRevCardPass()
    {
        return $this->_receive['CardId'] ?? false;
    }

    /**
     * 获取卡券事件推送 - 领取卡券
     * 当Event为 user_get_card(用户领取卡券)
     *
     */
    public function getRevCardGet()
    {
        if (isset($this->_receive['CardId']))     //卡券 ID
        {
            $array['CardId'] = $this->_receive['CardId'];
        }
        if (isset($this->_receive['IsGiveByFriend']))    //是否为转赠，1 代表是，0 代表否。
        {
            $array['IsGiveByFriend'] = $this->_receive['IsGiveByFriend'];
        }
        if (isset($this->_receive['UserCardCode']) && !empty($this->_receive['UserCardCode'])) //code 序列号。自定义 code 及非自定义 code的卡券被领取后都支持事件推送。
        {
            $array['UserCardCode'] = $this->_receive['UserCardCode'];
        }
        if (isset($array) && count($array) > 0) {
            return $array;
        } else {
            return false;
        }
    }

    /**
     * 获取卡券事件推送 - 删除卡券
     * 当Event为 user_del_card(用户删除卡券)
     *
     */
    public function getRevCardDel()
    {
        if (isset($this->_receive['CardId']))     //卡券 ID
        {
            $array['CardId'] = $this->_receive['CardId'];
        }
        if (isset($this->_receive['UserCardCode']) && !empty($this->_receive['UserCardCode'])) //code 序列号。自定义 code 及非自定义 code的卡券被领取后都支持事件推送。
        {
            $array['UserCardCode'] = $this->_receive['UserCardCode'];
        }
        if (isset($array) && count($array) > 0) {
            return $array;
        } else {
            return false;
        }
    }

    /**
     * 设置回复消息
     * Example: $obj->text('hello')->reply();
     *
     * @param string $text
     * @return Official
     */
    public function text(string $text = ''): Official
    {
        $FuncFlag = $this->_funcFlag ? 1 : 0;
        $msg = array(
            'ToUserName' => $this->getRevFrom(),
            'FromUserName' => $this->getRevTo(),
            'MsgType' => $this->msgTypeText,
            'Content' => $this->_auto_text_filter($text),
            'CreateTime' => time(),
            'FuncFlag' => $FuncFlag
        );
        $this->Message($msg);
        return $this;
    }

    /**
     * 获取消息发送者
     */
    public function getRevFrom()
    {
        return $this->_receive['FromUserName'] ?? false;
    }

    /**
     * 获取消息接受者
     */
    public function getRevTo()
    {
        return $this->_receive['ToUserName'] ?? false;
    }

    /**
     * 过滤文字回复\r\n换行符
     *
     * @param string $text
     * @return array|string|string[]
     */
    private function _auto_text_filter(string $text)
    {
        if (!$this->_text_filter) {
            return $text;
        }
        return str_replace("\r\n", "\n", $text);
    }

    /**
     * 设置发送消息
     *
     * @param array $msg 消息数组
     * @param bool $append 是否在原消息数组追加
     */
    public function Message($msg = '', bool $append = false)
    {
        if (is_null($msg)) {
            $this->_msg = array();
        } elseif (is_array($msg)) {
            if ($append) {
                $this->_msg = array_merge($this->_msg, $msg);
            } else {
                $this->_msg = $msg;
            }
            return $this->_msg;
        } else {
            return $this->_msg;
        }
    }

    /**
     * 设置回复消息
     * Example: $obj->image('media_id')->reply();
     *
     * @param string $mediaId
     * @return Official
     */
    public function image(string $mediaId = ''): Official
    {
        $FuncFlag = $this->_funcFlag ? 1 : 0;
        $msg = array(
            'ToUserName' => $this->getRevFrom(),
            'FromUserName' => $this->getRevTo(),
            'MsgType' => $this->msgTypeImage,
            'Image' => array('MediaId' => $mediaId),
            'CreateTime' => time(),
            'FuncFlag' => $FuncFlag
        );
        $this->Message($msg);
        return $this;
    }

    /**
     * 设置回复消息
     * Example: $obj->voice('media_id')->reply();
     *
     * @param string $mediaId
     * @return Official
     */
    public function voice(string $mediaId = ''): Official
    {
        $FuncFlag = $this->_funcFlag ? 1 : 0;
        $msg = array(
            'ToUserName' => $this->getRevFrom(),
            'FromUserName' => $this->getRevTo(),
            'MsgType' => $this->msgTypeVoice,
            'Voice' => array('MediaId' => $mediaId),
            'CreateTime' => time(),
            'FuncFlag' => $FuncFlag
        );
        $this->Message($msg);
        return $this;
    }

    /**
     * 设置回复消息
     * Example: $obj->video('media_id','title','description')->reply();
     *
     * @param string $mediaId
     * @param string $title
     * @param string $description
     * @return Official
     */
    public function video(string $mediaId = '', string $title = '', string $description = ''): Official
    {
        $FuncFlag = $this->_funcFlag ? 1 : 0;
        $msg = array(
            'ToUserName' => $this->getRevFrom(),
            'FromUserName' => $this->getRevTo(),
            'MsgType' => $this->msgTypeVideo,
            'Video' => array(
                'MediaId' => $mediaId,
                'Title' => $title,
                'Description' => $description
            ),
            'CreateTime' => time(),
            'FuncFlag' => $FuncFlag
        );
        $this->Message($msg);
        return $this;
    }

    /**
     * 设置回复音乐
     *
     * @param string $title
     * @param string $desc
     * @param string $musicUrl
     * @param string $hgMusicUrl
     * @param string $thumbmediaid 音乐图片缩略图的媒体id，非必须
     * @return Official
     */
    public function music(string $title, string $desc, string $musicUrl, string $hgMusicUrl = '', string $thumbmediaid = ''): Official
    {
        $FuncFlag = $this->_funcFlag ? 1 : 0;
        $msg = array(
            'ToUserName' => $this->getRevFrom(),
            'FromUserName' => $this->getRevTo(),
            'CreateTime' => time(),
            'MsgType' => $this->msgTypeMusic,
            'Music' => array(
                'Title' => $title,
                'Description' => $desc,
                'MusicUrl' => $musicUrl,
                'HQMusicUrl' => $hgMusicUrl
            ),
            'FuncFlag' => $FuncFlag
        );
        if ($thumbmediaid) {
            $msg['Music']['ThumbMediaId'] = $thumbmediaid;
        }
        $this->Message($msg);
        return $this;
    }

    /**
     * 设置回复图文
     *
     * @param array $newsData
     * 数组结构:
     *  array(
     *    "0"=>array(
     *        'Title'=>'msg title',
     *        'Description'=>'summary text',
     *        'PicUrl'=>'http://www.domain.com/1.jpg',
     *        'Url'=>'http://www.domain.com/1.html'
     *    ),
     *    "1"=>....
     *  )
     */
    public function news(array $newsData = array()): Official
    {
        $FuncFlag = $this->_funcFlag ? 1 : 0;
        $count = count($newsData);

        $msg = array(
            'ToUserName' => $this->getRevFrom(),
            'FromUserName' => $this->getRevTo(),
            'MsgType' => $this->msgTypeNews,
            'CreateTime' => time(),
            'ArticleCount' => $count,
            'Articles' => $newsData,
            'FuncFlag' => $FuncFlag
        );
        $this->Message($msg);
        return $this;
    }

    /**
     *
     * 回复微信服务器, 此函数支持链式操作
     * Example: $this->text('msg tips')->reply();
     *
     * @param string $msg 要发送的信息, 默认取$this->_msg
     * @param bool $return 是否返回信息而不抛出到浏览器 默认:否
     */
    public function reply($msg = array(), bool $return = false)
    {
        if (empty($msg)) {
            if (empty($this->_msg))   //防止不先设置回复内容，直接调用reply方法导致异常
            {
                return false;
            }
            $msg = $this->_msg;
        }
        $xmldata = $this->xml_encode($msg);
        $this->log($xmldata);
        if ($this->encryptType == 'aes') { //如果来源消息为加密方式
            $pc = new Prpcrypt($this->encodingAesKey);
            $array = $pc->encrypt($xmldata, $this->appid);
            $ret = $array[0];
            if ($ret != 0) {
                $this->log('encrypt err!');
                return false;
            }
            $timestamp = time();
            $nonce = rand(77, 999) * rand(605, 888) * rand(11, 99);
            $encrypt = $array[1];
            $tmpArr = array($this->token, $timestamp, $nonce, $encrypt);//比普通公众平台多了一个加密的密文
            sort($tmpArr, SORT_STRING);
            $signature = implode($tmpArr);
            $signature = sha1($signature);
            $xmldata = $this->generate($encrypt, $signature, $timestamp, $nonce);
            $this->log($xmldata);
        }
        if ($return) {
            return $xmldata;
        } else {
            echo $xmldata;
        }
    }

    /**
     * XML编码
     *
     * @param mixed $data 数据
     * @param string $root 根节点名
     * @param string $item 数字索引的子节点名
     * @param string $attr 根节点属性
     * @param string $id 数字索引子节点key转换的属性名
     * @param string $encoding 数据编码
     * @return string
     */
    public function xml_encode($data, string $root = 'xml', string $item = 'item', string $attr = '', string $id = 'id', string $encoding = 'utf-8')
    {
        if (is_array($attr)) {
            $_attr = array();
            foreach ($attr as $key => $value) {
                $_attr[] = "{$key}=\"{$value}\"";
            }
            $attr = implode(' ', $_attr);
        }
        $attr = trim($attr);
        $attr = empty($attr) ? '' : " {$attr}";
        $xml = "<{$root}{$attr}>";
        $xml .= self::data_to_xml($data, $item, $id);
        $xml .= "</{$root}>";
        return $xml;
    }

    /**
     * 数据XML编码
     *
     * @param mixed $data 数据
     * @return string
     */
    public static function data_to_xml($data): string
    {
        $xml = '';
        foreach ($data as $key => $val) {
            is_numeric($key) && $key = "item id=\"$key\"";
            $xml .= "<$key>";
            $xml .= (is_array($val) || is_object($val)) ? self::data_to_xml($val) : self::xmlSafeStr($val);
            list($key,) = explode(' ', $key);
            $xml .= "</$key>";
        }
        return $xml;
    }

    public static function xmlSafeStr($str): string
    {
        return '<![CDATA[' . preg_replace("/[\\x00-\\x08\\x0b-\\x0c\\x0e-\\x1f]/", '', $str) . ']]>';
    }

    /**
     * xml格式加密，仅请求为加密方式时再用
     */
    private function generate($encrypt, $signature, $timestamp, $nonce): string
    {
        //格式化加密信息
        $format = "<xml>
<Encrypt><![CDATA[%s]]></Encrypt>
<MsgSignature><![CDATA[%s]]></MsgSignature>
<TimeStamp>%s</TimeStamp>
<Nonce><![CDATA[%s]]></Nonce>
</xml>";
        return sprintf($format, $encrypt, $signature, $timestamp, $nonce);
    }

    /**
     * 删除验证数据
     *
     * @param string $appId
     * @return bool
     */
    public function resetAuth(string $appId = ''): bool
    {
        if (!$appId) {
            $appid = $this->appid;
        }
        $this->accessToken = '';
        $authname = 'wechat_access_token' . $appId;
        $this->removeCache($authname);
        return true;
    }

    /**
     * 清除缓存，按需重载
     *
     * @param string $cachename
     * @return boolean
     */
    protected function removeCache(string $cachename)
    {
        $redis = $this->getDi()->get('redis');
        $redis->del($cachename);
        //TODO: remove cache implementation
        return true;
    }

    /**
     * 删除JSAPI授权TICKET
     *
     * @param string $appId
     * @return bool
     */
    public function resetJsTicket(string $appId = ''): bool
    {
        if (!$appId) {
            $appId = $this->appid;
        }
        $this->jsapiTicket = '';
        $authName = 'wechat_jsapi_ticket' . $appId;
        $this->removeCache($authName);
        return true;
    }

    /**
     * 获取JsApi使用签名
     *
     * @param string $url 网页的URL，自动处理#及其后面部分
     * @param string $timestamp 当前时间戳 (为空则自动生成)
     * @param string $noncestr 随机串 (为空则自动生成)
     * @param string $appid 用于多个appid时使用,可空
     * @return array|bool 返回签名字串
     */
    public function getJsSign(string $url, $timestamp = 0, string $noncestr = '', string $appid = '')
    {
        if (!$this->jsapiTicket && !$this->getJsTicket($appid) || !$url) {
            return false;
        }
        if (!$timestamp) {
            $timestamp = time();
        }
        if (!$noncestr) {
            $noncestr = $this->generateNonceStr();
        }
        $ret = strpos($url, '#');
        if ($ret) {
            $url = substr($url, 0, $ret);
        }
        $url = trim($url);
        if (empty($url)) {
            return false;
        }
        $arrdata = array(
            "timestamp" => $timestamp,
            "noncestr" => $noncestr,
            "url" => $url,
            "jsapi_ticket" => $this->jsapiTicket
        );
        $sign = $this->getSignature($arrdata);
        if (!$sign) {
            return false;
        }
        $signPackage = array(
            "appid" => $this->appid,
            "noncestr" => $noncestr,
            "timestamp" => $timestamp,
            "url" => $url,
            "signature" => $sign
        );
        return $signPackage;
    }

    /**
     * 获取JSAPI授权TICKET
     *
     * @param string $appid 用于多个appid时使用,可空
     * @param string $jsapi_ticket 手动指定jsapi_ticket，非必要情况不建议用
     */
    public function getJsTicket($appid = '', $jsapi_ticket = '')
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        if (!$appid) {
            $appid = $this->appid;
        }
        if ($jsapi_ticket) { //手动指定token，优先使用
            $this->jsapiTicket = $jsapi_ticket;
            return $this->jsapiTicket;
        }
        $authname = 'wechat_jsapi_ticket' . $appid;
        if ($rs = $this->getCache($authname)) {
            $this->jsapiTicket = $rs;
            return $rs;
        }
        $result = $this->http_get($this->apiUrlPrefix . $this->getTicketUrl . 'access_token=' . $this->accessToken . '&type=jsapi');
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            $this->jsapiTicket = $json['ticket'];
            $expire = $json['expires_in'] ? intval($json['expires_in']) - 100 : 3600;
            $this->setCache($authname, $this->jsapiTicket, $expire);
            return $this->jsapiTicket;
        }
        return false;
    }

    /**
     * 获取access_token
     *
     * @param string $appid 如在类初始化时已提供，则可为空
     * @param string $appsecret 如在类初始化时已提供，则可为空
     * @param string $token 手动指定access_token，非必要情况不建议用
     */
    public function checkAuth($appid = '', $appsecret = ''): array
    {
        if (!$appid || !$appsecret) {
            $appid = $this->appid;
            $appsecret = $this->appSecret;
        }
        //{"errcode":40164,"errmsg":"invalid ip 222.210.72.88 ipv6 ::ffff:222.210.72.88, not in whitelist rid: 635b8770-66fc73db-5d5f9803"}

        $result = $this->http_get($this->apiUrlPrefix . $this->authUrl . 'appid=' . $appid . '&secret=' . $appsecret);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || isset($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return [];
            }

            return $json;
        }
        return [];
    }

    /**
     * GET 请求
     *
     * @param string $url
     */
    protected function http_get($url)
    {
        $oCurl = curl_init();
        if (stripos($url, "https://") !== false) {
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
        $sContent = curl_exec($oCurl);
        $aStatus = curl_getinfo($oCurl);
        curl_close($oCurl);
        if (intval($aStatus["http_code"]) == 200) {
            return $sContent;
        } else {
            return false;
        }
    }

    /**
     * 设置缓存，按需重载
     *
     * @param string $cachename
     * @param mixed $value
     * @param int $expired
     * @return boolean
     */
    protected function setCache($cachename, $value, $expired)
    {
        $redis = $this->getDi()->get('redis');
        $redis->setEx($cachename, $expired, $value);
        //TODO: set cache implementation
        return true;
    }

    /**
     * 生成随机字串
     *
     * @param number $length 长度，默认为16，最长为32字节
     * @return string
     */
    public function generateNonceStr($length = 16)
    {
        // 密码字符集，可任意添加你需要的字符
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $str;
    }

    /**
     * 获取签名
     *
     * @param array $arrdata 签名数组
     * @param string $method 签名方法
     * @return boolean|string 签名值
     */
    public function getSignature($arrdata, $method = "sha1")
    {
        if (!function_exists($method)) {
            return false;
        }
        ksort($arrdata);
        $paramstring = "";
        foreach ($arrdata as $key => $value) {
            if (strlen($paramstring) == 0) {
                $paramstring .= $key . "=" . $value;
            } else {
                $paramstring .= "&" . $key . "=" . $value;
            }
        }
        $Sign = $method($paramstring);
        return $Sign;
    }

    /**
     *    作用：生成签名
     */
    public function getSign($Obj)
    {
        foreach ($Obj as $k => $v) {
            $Parameters[$k] = $v;
        }
        //签名步骤一：按字典序排序参数
        ksort($Parameters);
        $String = $this->formatBizQueryParaMap($Parameters, false);
        //echo '【string1】'.$String.'</br>';
        //签名步骤二：在string后加入KEY
        $String = $String . "&key=" . $this->mchKey;
        //echo "【string2】".$String."</br>";
        //签名步骤三：MD5加密
        $String = md5($String);
        //echo "【string3】 ".$String."</br>";
        //签名步骤四：所有字符转为大写
        $result_ = strtoupper($String);
        //echo "【result】 ".$result_."</br>";
        return $result_;
    }

    /**
     *    作用：格式化参数，签名过程需要使用
     */
    function formatBizQueryParaMap($paraMap, $urlencode)
    {
        $buff = "";
        ksort($paraMap);
        foreach ($paraMap as $k => $v) {
            if ($urlencode) {
                $v = urlencode($v);
            }
            //$buff .= strtolower($k) . "=" . $v . "&";
            $buff .= $k . "=" . $v . "&";
        }
        $reqPar = '';
        if (strlen($buff) > 0) {
            $reqPar = substr($buff, 0, strlen($buff) - 1);
        }
        return $reqPar;
    }

    /**
     * 获取微信服务器IP地址列表
     *
     * @return array('127.0.0.1','127.0.0.1')
     */
    public function getServerIp()
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_get($this->apiUrlPrefix . $this->callbackServerGetUrl . 'access_token=' . $this->accessToken);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || isset($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json['ip_list'];
        }
        return false;
    }

    /**
     * 创建菜单(认证后的订阅号可用)
     *
     * @param array $data 菜单数组数据
     * example:
     *    array (
     *        'button' => array (
     *          0 => array (
     *            'name' => '扫码',
     *            'sub_button' => array (
     *                0 => array (
     *                  'type' => 'scancode_waitmsg',
     *                  'name' => '扫码带提示',
     *                  'key' => 'rselfmenu_0_0',
     *                ),
     *                1 => array (
     *                  'type' => 'scancode_push',
     *                  'name' => '扫码推事件',
     *                  'key' => 'rselfmenu_0_1',
     *                ),
     *            ),
     *          ),
     *          1 => array (
     *            'name' => '发图',
     *            'sub_button' => array (
     *                0 => array (
     *                  'type' => 'pic_sysphoto',
     *                  'name' => '系统拍照发图',
     *                  'key' => 'rselfmenu_1_0',
     *                ),
     *                1 => array (
     *                  'type' => 'pic_photo_or_album',
     *                  'name' => '拍照或者相册发图',
     *                  'key' => 'rselfmenu_1_1',
     *                )
     *            ),
     *          ),
     *          2 => array (
     *            'type' => 'location_select',
     *            'name' => '发送位置',
     *            'key' => 'rselfmenu_2_0'
     *          ),
     *        ),
     *    )
     * type可以选择为以下几种，其中5-8除了收到菜单事件以外，还会单独收到对应类型的信息。
     * 1、click：点击推事件
     * 2、view：跳转URL
     * 3、scancode_push：扫码推事件
     * 4、scancode_waitmsg：扫码推事件且弹出“消息接收中”提示框
     * 5、pic_sysphoto：弹出系统拍照发图
     * 6、pic_photo_or_album：弹出拍照或者相册发图
     * 7、pic_weixin：弹出微信相册发图器
     * 8、location_select：弹出地理位置选择器
     */
    public function createMenu($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiUrlPrefix . $this->menuCreateUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * POST 请求
     *
     * @param string $url
     * @param array $param
     * @param boolean $post_file 是否文件上传
     * @return string content
     */
    private function http_post($url, $param, $post_file = false)
    {
        $oCurl = curl_init();
        if (stripos($url, "https://") !== false) {
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }
        if (is_string($param) || $post_file) {
            $strPOST = $param;
        } else {
            $aPOST = array();
            foreach ($param as $key => $val) {
                $aPOST[] = $key . "=" . urlencode($val);
            }
            $strPOST = join("&", $aPOST);
        }
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($oCurl, CURLOPT_POST, true);
        curl_setopt($oCurl, CURLOPT_POSTFIELDS, $strPOST);
        $sContent = curl_exec($oCurl);
        $aStatus = curl_getinfo($oCurl);
        curl_close($oCurl);
        if (intval($aStatus["http_code"]) == 200) {
            return $sContent;
        } else {
            return false;
        }
    }

    /**
     * 微信api不支持中文转义的json结构
     *
     * @param array $arr
     */
    static function json_encode($arr)
    {
        $parts = array();
        $is_list = false;
        //Find out if the given array is a numerical array
        $keys = array_keys($arr);
        $max_length = count($arr) - 1;
        if (($keys [0] === 0) && ($keys [$max_length] === $max_length)) { //See if the first key is 0 and last key is length - 1
            $is_list = true;
            for ($i = 0; $i < count($keys); $i++) { //See if each key correspondes to its position
                if ($i != $keys [$i]) { //A key fails at position check.
                    $is_list = false; //It is an associative array.
                    break;
                }
            }
        }
        foreach ($arr as $key => $value) {
            if (is_array($value)) { //Custom handling for arrays
                if ($is_list) {
                    $parts [] = self::json_encode($value);
                } /* :RECURSION: */
                else {
                    $parts [] = '"' . $key . '":' . self::json_encode($value);
                } /* :RECURSION: */
            } else {
                $str = '';
                if (!$is_list) {
                    $str = '"' . $key . '":';
                }
                //Custom handling for multiple data types
                if (!is_string($value) && is_numeric($value) && $value < 2000000000) {
                    $str .= $value;
                } //Numbers
                elseif ($value === false) {
                    $str .= 'false';
                } //The booleans
                elseif ($value === true) {
                    $str .= 'true';
                } else {
                    $str .= '"' . addslashes($value) . '"';
                } //All other things
                // :TODO: Is there any more datatype we should be in the lookout for? (Object?)
                $parts [] = $str;
            }
        }
        $json = implode(',', $parts);
        if ($is_list) {
            return '[' . $json . ']';
        } //Return numerical JSON
        return '{' . $json . '}'; //Return associative JSON
    }

    /**
     * 获取菜单(认证后的订阅号可用)
     *
     * @return array('menu'=>array(....s))
     */
    public function getMenu()
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_get($this->apiUrlPrefix . $this->menuGetUrl . 'access_token=' . $this->accessToken);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || isset($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * JS SDK获取签名
     *
     * @param $arrdata
     * @param string $method
     * @return mixed
     */
    public function getJsSignature($arrdata, $method = "sha1")
    {
        if (!function_exists($method)) {
            return false;
        }
        sort($arrdata, SORT_STRING);
        $paramstring = "";
        foreach ($arrdata as $value) {
            $paramstring = $paramstring . (string)$value;
        }
        $Sign = $method($paramstring);
        return $Sign;
    }

    /**
     * 删除菜单(认证后的订阅号可用)
     *
     * @return boolean
     */
    public function deleteMenu()
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_get($this->apiUrlPrefix . $this->menuDeleteUrl . 'access_token=' . $this->accessToken);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * 上传临时素材，有效期为3天(认证后的订阅号可用)
     * 注意：上传大文件时可能需要先调用 set_time_limit(0) 避免超时
     * 注意：数组的键值任意，但文件名前必须加@，使用单引号以避免本地路径斜杠被转义
     * 注意：临时素材的media_id是可复用的！
     *
     * @param array $data {"media":'@Path\filename.jpg'}
     * @param type 类型：图片:image 语音:voice 视频:video 缩略图:thumb
     * @return boolean|array
     */
    public function uploadMedia($data, $type)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        //原先的上传多媒体文件接口使用 $this->uploadMediaUrl 前缀
        $result = $this->http_post($this->apiUrlPrefix . $this->mediaUploadUrl . 'access_token=' . $this->accessToken . '&type=' . $type,
            $data, true);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 获取临时素材(认证后的订阅号可用)
     *
     * @param string $media_id 媒体文件id
     * @param boolean $is_video 是否为视频文件，默认为否
     * @return raw data
     */
    public function getMedia(string $media_id, bool $is_video = false)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        //原先的上传多媒体文件接口使用 $this->uploadMediaUrl 前缀
        //如果要获取的素材是视频文件时，不能使用https协议，必须更换成http协议
        $url_prefix = $is_video ? str_replace('https', 'http', $this->apiUrlPrefix) : $this->apiUrlPrefix;
        $result = $this->http_get($url_prefix . $this->mediaGetUrl . 'access_token=' . $this->accessToken . '&media_id=' . $media_id);
        if ($result) {
            if (is_string($result)) {
                $json = json_decode($result, true);
                if (isset($json['errcode'])) {
                    $this->errCode = $json['errcode'];
                    $this->errMsg = $json['errmsg'];
                    return false;
                }
            }
            return $result;
        }
        return false;
    }

    /**
     * 上传图片，本接口所上传的图片不占用公众号的素材库中图片数量的5000个的限制。图片仅支持jpg/png格式，大小必须在1MB以下。 (认证后的订阅号可用)
     * 注意：上传大文件时可能需要先调用 set_time_limit(0) 避免超时
     * 注意：数组的键值任意，但文件名前必须加@，使用单引号以避免本地路径斜杠被转义
     *
     * @param array $data {"media":'@Path\filename.jpg'}
     *
     * @return boolean|array
     */
    public function uploadImg($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        //原先的上传多媒体文件接口使用 $this->uploadMediaUrl 前缀
        $result = $this->http_post($this->apiUrlPrefix . $this->mediaUploadImgUrl . 'access_token=' . $this->accessToken,
            $data, true);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 上传永久素材(认证后的订阅号可用)
     * 新增的永久素材也可以在公众平台官网素材管理模块中看到
     * 注意：上传大文件时可能需要先调用 set_time_limit(0) 避免超时
     * 注意：数组的键值任意，但文件名前必须加@，使用单引号以避免本地路径斜杠被转义
     *
     * @param array $data {"media":'@Path\filename.jpg'}
     * @param type 类型：图片:image 语音:voice 视频:video 缩略图:thumb
     * @param boolean $is_video 是否为视频文件，默认为否
     * @param array $video_info 视频信息数组，非视频素材不需要提供 array('title'=>'视频标题','introduction'=>'描述')
     * @return boolean|array
     */
    public function uploadForeverMedia($data, $type, $is_video = false, $video_info = array())
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        //#TODO 暂不确定此接口是否需要让视频文件走http协议
        //如果要获取的素材是视频文件时，不能使用https协议，必须更换成http协议
        //$url_prefix = $is_video?str_replace('https','http',$this->apiUrlPrefix):$this->apiUrlPrefix;
        //当上传视频文件时，附加视频文件信息
        if ($is_video) {
            $data['description'] = self::json_encode($video_info);
        }
        $result = $this->http_post($this->apiUrlPrefix . $this->mediaForeverUploadUrl . 'access_token=' . $this->accessToken . '&type=' . $type,
            $data, true);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 上传永久图文素材(认证后的订阅号可用)
     * 新增的永久素材也可以在公众平台官网素材管理模块中看到
     *
     * @param array $data 消息结构{"articles":[{...}]}
     * @return boolean|array
     */
    public function uploadForeverArticles($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiUrlPrefix . $this->mediaForeverNewsUploadUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 修改永久图文素材(认证后的订阅号可用)
     * 永久素材也可以在公众平台官网素材管理模块中看到
     *
     * @param string $media_id 图文素材id
     * @param array $data 消息结构{"articles":[{...}]}
     * @param int $index 更新的文章在图文素材的位置，第一篇为0，仅多图文使用
     * @return boolean|array
     */
    public function updateForeverArticles($media_id, $data, $index = 0)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        if (!isset($data['media_id'])) {
            $data['media_id'] = $media_id;
        }
        if (!isset($data['index'])) {
            $data['index'] = $index;
        }
        $result = $this->http_post($this->apiUrlPrefix . $this->mediaForeverNewsUpdateUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 获取永久素材(认证后的订阅号可用)
     * 返回图文消息数组或二进制数据，失败返回false
     *
     * @param string $media_id 媒体文件id
     * @param boolean $is_video 是否为视频文件，默认为否
     * @return boolean|array|raw data
     */
    public function getForeverMedia($media_id, $is_video = false)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $data = array('media_id' => $media_id);
        //#TODO 暂不确定此接口是否需要让视频文件走http协议
        //如果要获取的素材是视频文件时，不能使用https协议，必须更换成http协议
        //$url_prefix = $is_video?str_replace('https','http',$this->apiUrlPrefix):$this->apiUrlPrefix;
        $result = $this->http_post($this->apiUrlPrefix . $this->mediaForeverGetUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            if (is_string($result)) {
                $json = json_decode($result, true);
                if (isset($json['errcode'])) {
                    $this->errCode = $json['errcode'];
                    $this->errMsg = $json['errmsg'];
                    return false;
                }
                return $json;
            }
            return $result;
        }
        return false;
    }

    /**
     * 删除永久素材(认证后的订阅号可用)
     *
     * @param string $media_id 媒体文件id
     * @return boolean
     */
    public function delForeverMedia($media_id)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $data = array('media_id' => $media_id);
        $result = $this->http_post($this->apiUrlPrefix . $this->mediaForeverDelUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * 获取永久素材列表(认证后的订阅号可用)
     *
     * @param string $type 素材的类型,图片（image）、视频（video）、语音 （voice）、图文（news）
     * @param int $offset 全部素材的偏移位置，0表示从第一个素材
     * @param int $count 返回素材的数量，取值在1到20之间
     * @return boolean|array
     * 返回数组格式:
     * array(
     *  'total_count'=>0, //该类型的素材的总数
     *  'item_count'=>0,  //本次调用获取的素材的数量
     *  'item'=>array()   //素材列表数组，内容定义请参考官方文档
     * )
     */
    public function getForeverList($type, $offset, $count)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $data = array(
            'type' => $type,
            'offset' => $offset,
            'count' => $count,
        );
        $result = $this->http_post($this->apiUrlPrefix . $this->mediaForeverBatchGetUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (isset($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 获取永久素材总数(认证后的订阅号可用)
     *
     * @return boolean|array
     * 返回数组格式:
     * array(
     *  'voice_count'=>0, //语音总数量
     *  'video_count'=>0, //视频总数量
     *  'image_count'=>0, //图片总数量
     *  'news_count'=>0   //图文总数量
     * )
     */
    public function getForeverCount()
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_get($this->apiUrlPrefix . $this->mediaForeverCountUrl . 'access_token=' . $this->accessToken);
        if ($result) {
            $json = json_decode($result, true);
            if (isset($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 上传图文消息素材，用于群发(认证后的订阅号可用)
     *
     * @param array $data 消息结构{"articles":[{...}]}
     * @return boolean|array
     */
    public function uploadArticles($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiUrlPrefix . $this->mediaUploadNewsUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 上传视频素材(认证后的订阅号可用)
     *
     * @param array $data 消息结构
     * {
     *     "media_id"=>"",     //通过上传媒体接口得到的MediaId
     *     "title"=>"TITLE",    //视频标题
     *     "description"=>"Description"        //视频描述
     * }
     * @return boolean|array
     * {
     *     "type":"video",
     *     "media_id":"mediaid",
     *     "created_at":1398848981
     *  }
     */
    public function uploadMpVideo($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->uploadMediaUrl . $this->mediaVideoUpload . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 高级群发消息, 根据OpenID列表群发图文消息(订阅号不可用)
     *    注意：视频需要在调用uploadMedia()方法后，再使用 uploadMpVideo() 方法生成，
     *             然后获得的 mediaid 才能用于群发，且消息类型为 mpvideo 类型。
     *
     * @param array $data 消息结构
     * {
     *     "touser"=>array(
     *         "OPENID1",
     *         "OPENID2"
     *     ),
     *      "msgtype"=>"mpvideo",
     *      // 在下面5种类型中选择对应的参数内容
     *      // mpnews | voice | image | mpvideo => array( "media_id"=>"MediaId")
     *      // text => array ( "content" => "hello")
     * }
     * @return boolean|array
     */
    public function sendMassMessage($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiUrlPrefix . $this->massSendUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 高级群发消息, 根据群组id群发图文消息(认证后的订阅号可用)
     *    注意：视频需要在调用uploadMedia()方法后，再使用 uploadMpVideo() 方法生成，
     *             然后获得的 mediaid 才能用于群发，且消息类型为 mpvideo 类型。
     *
     * @param array $data 消息结构
     * {
     *     "filter"=>array(
     *         "is_to_all"=>False,     //是否群发给所有用户.True不用分组id，False需填写分组id
     *         "group_id"=>"2"     //群发的分组id
     *     ),
     *      "msgtype"=>"mpvideo",
     *      // 在下面5种类型中选择对应的参数内容
     *      // mpnews | voice | image | mpvideo => array( "media_id"=>"MediaId")
     *      // text => array ( "content" => "hello")
     * }
     * @return boolean|array
     */
    public function sendGroupMassMessage($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiUrlPrefix . $this->massSendGroupUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 高级群发消息, 删除群发图文消息(认证后的订阅号可用)
     *
     * @param int $msg_id 消息id
     * @return boolean|array
     */
    public function deleteMassMessage($msg_id)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiUrlPrefix . $this->massDeleteUrl . 'access_token=' . $this->accessToken,
            self::json_encode(array('msg_id' => $msg_id)));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * 高级群发消息, 预览群发消息(认证后的订阅号可用)
     *    注意：视频需要在调用uploadMedia()方法后，再使用 uploadMpVideo() 方法生成，
     *             然后获得的 mediaid 才能用于群发，且消息类型为 mpvideo 类型。
     *
     * @param array $data 消息结构
     * {
     *     "touser"=>"OPENID",
     *      "msgtype"=>"mpvideo",
     *      // 在下面5种类型中选择对应的参数内容
     *      // mpnews | voice | image | mpvideo => array( "media_id"=>"MediaId")
     *      // text => array ( "content" => "hello")
     * }
     * @return boolean|array
     */
    public function previewMassMessage($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiUrlPrefix . $this->massPreviewUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 高级群发消息, 查询群发消息发送状态(认证后的订阅号可用)
     *
     * @param int $msg_id 消息id
     * @return boolean|array
     * {
     *     "msg_id":201053012,     //群发消息后返回的消息id
     *     "msg_status":"SEND_SUCCESS" //消息发送后的状态，SENDING表示正在发送 SEND_SUCCESS表示发送成功
     * }
     */
    public function queryMassMessage($msg_id)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiUrlPrefix . $this->massQueryUrl . 'access_token=' . $this->accessToken,
            self::json_encode(array('msg_id' => $msg_id)));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 创建二维码ticket
     *
     * @param int|string $scene_id 自定义追踪id,临时二维码只能用数值型
     * @param int $type 0:临时二维码；1:永久二维码(此时expire参数无效)；2:永久二维码(此时expire参数无效)
     * @param int $expire 临时二维码有效期，最大为1800秒
     * @return array('ticket'=>'qrcode字串','expire_seconds'=>1800,'url'=>'二维码图片解析后的地址')
     */
    public function getQRCode($scene_id, $type = 0, $expire = 1800)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $type = ($type && is_string($scene_id)) ? 2 : $type;
        $data = array(
            'action_name' => $type ? ($type == 2 ? "QR_LIMIT_STR_SCENE" : "QR_LIMIT_SCENE") : "QR_SCENE",
            'expire_seconds' => $expire,
            'action_info' => array('scene' => ($type == 2 ? array('scene_str' => $scene_id) : array('scene_id' => $scene_id)))
        );
        if ($type == 1) {
            unset($data['expire_seconds']);
        }
        $result = $this->http_post($this->apiUrlPrefix . $this->qrcodeCreateUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 获取二维码图片
     *
     * @param string $ticket 传入由getQRCode方法生成的ticket参数
     * @return string url 返回http地址
     */
    public function getQRUrl($ticket)
    {
        return $this->qrcodeImgUrl . urlencode($ticket);
    }

    /**
     * 长链接转短链接接口
     *
     * @param string $long_url 传入要转换的长url
     * @return boolean|string url 成功则返回转换后的短url
     */
    public function getShortUrl($long_url)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $data = array(
            'action' => 'long2short',
            'long_url' => $long_url
        );
        $result = $this->http_post($this->apiUrlPrefix . $this->shortUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json['short_url'];
        }
        return false;
    }

    /**
     *生成preId
     * $data['body'] =  "贡献一分钱";
     * $data['detail'] =  "贡献一分钱";
     * $data['openid'] =  "贡献一分钱";
     * $data['total_fee'] =  1;
     */
    public function unifiedOrderPub($data, $tradeNo = 0)
    {
        if (!$this->mchId) {
            $this->errCode = 22;
            $this->errMsg = 'mch id can not empty';
            return false;
        }
        $postData = array();
        $postData['appid'] = $this->appid;
        $postData['mch_id'] = $this->mchId;
        $postData['nonce_str'] = $this->generateNonceStr(16);
        $postData['body'] = $data['body']; //商品描述
        $postData['detail'] = $data['detail']; //商品名称明细列表
        if (isset($data['openid'])) {
            $postData['openid'] = $data['openid']; //用户标识
        }
        if (isset($data['goods_tag'])) {
            $postData['goods_tag'] = $data['goods_tag']; //用户标识
        }
//        $postData['detail'] = "贡献一分钱"; //商品名称明细列表
        $postData['out_trade_no'] = $tradeNo ? $tradeNo : $this->appid . time();
        $postData['total_fee'] = $data['total_fee'];//一分钱
        $postData['spbill_create_ip'] = $_SERVER['REMOTE_ADDR'];//终端ip
        $postData['notify_url'] = $data['notify_url'];//终端ip
        $postData['trade_type'] = $data['trade_type'];//终端ip
//        $postData['product_id'] ='11';//终端ip
//         $postData['limit_pay'] ='11';//指定不能使用信用卡支付

        $postData['sign'] = $this->getPaymentSign($postData);
        $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
        $xml = $this->arrayToXml($postData);
        $re = $this->wxHttpsRequest($xml, $url);
        $rearr = $this->xmlToArray($re);
        return $rearr;
    }

    public function getPaymentSign($Obj, $mch_key = '')
    {

        $mch_key = ($mch_key) ? $mch_key : $this->mchKey;
        $Parameters = array();
        foreach ($Obj as $k => $v) {
            $Parameters[$k] = $v;
        }
        //签名步骤一：按字典序排序参数
        ksort($Parameters);
        $String = $this->formatBizQueryParaMap($Parameters, false);
        //echo '【string1】'.$String.'</br>';
        //签名步骤二：在string后加入KEY
        $String = $String . "&key=" . $mch_key; // 商户后台设置的key
        //echo "【string2】".$String."</br>";
        //签名步骤三：MD5加密
        $String = md5($String);
        //echo "【string3】 ".$String."</br>";
        //签名步骤四：所有字符转为大写
        $result_ = strtoupper($String);
        //echo "【result】 ".$result_."</br>";
        return $result_;
    }

    public function arrayToXml($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key => $val) {
            if (is_numeric($val)) {
                $xml .= "<" . $key . ">" . $val . "</" . $key . ">";

            } else {
                $xml .= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">";
            }
        }
        $xml .= "</xml>";
        return $xml;
    }

    public function wxHttpsRequest($vars, $url, $second = 30, $aHeader = array())
    {
        $ch = curl_init();
        //超时时间
        curl_setopt($ch, CURLOPT_TIMEOUT, $second);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //这里设置代理，如果有的话
        //curl_setopt($ch,CURLOPT_PROXY, '10.206.30.98');
        //curl_setopt($ch,CURLOPT_PROXYPORT, 8080);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        //以下两种方式需选择一种
        //第一种方法，cert 与 key 分别属于两个.pem文件
        //默认格式为PEM，可以注释
//        curl_setopt($ch,CURLOPT_SSLCERTTYPE,'PEM');
//        curl_setopt($ch,CURLOPT_SSLCERT,$this->payment_cert_path.'apiclient_cert.pem');
        //默认格式为PEM，可以注释
//        curl_setopt($ch,CURLOPT_SSLKEYTYPE,'PEM');
//        curl_setopt($ch,CURLOPT_SSLKEY,$this->payment_cert_path.'apiclient_key.pem');
//
//        curl_setopt($ch,CURLOPT_CAINFO,'PEM');
//        curl_setopt($ch,CURLOPT_CAINFO,$this->payment_cert_path.'rootca.pem');
        //第二种方式，两个文件合成一个.pem文件
        //curl_setopt($ch,CURLOPT_SSLCERT,getcwd().'/all.pem');

        if (count($aHeader) >= 1) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeader);
        }

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
        $data = curl_exec($ch);
        if ($data) {
            curl_close($ch);
            return $data;
        } else {
            $error = curl_errno($ch);
            echo "call faild, errorCode:$error\n";
            curl_close($ch);
            return false;
        }
    }

    public function xmlToArray($xml)
    {
        //将XML转为array
        $array_data = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $array_data;
    }

    /**
     * 获取统计数据
     *
     * @param string $type 数据分类(user|article|upstreammsg|interface)分别为(用户分析|图文分析|消息分析|接口分析)
     * @param string $subtype 数据子分类，参考 DATACUBE_URL_ARR 常量定义部分 或者README.md说明文档
     * @param string $begin_date 开始时间
     * @param string $end_date 结束时间
     * @return boolean|array 成功返回查询结果数组，其定义请看官方文档
     */
    public function getDatacube($type, $subtype, $begin_date, $end_date = '')
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        if (!isset($this->dataCubeUrlArr[$type]) || !isset($this->dataCubeUrlArr[$type][$subtype])) {
            return false;
        }
        $data = array(
            'begin_date' => $begin_date,
            'end_date' => $end_date ? $end_date : $begin_date
        );
        $result = $this->http_post($this->apiBaseurlPrefix . $this->dataCubeUrlArr[$type][$subtype] . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return isset($json['list']) ? $json['list'] : $json;
        }
        return false;
    }

    /**
     * 批量获取关注用户列表
     *
     * @param unknown $next_openid
     */
    public function getUserList($next_openid = '')
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_get($this->apiUrlPrefix . $this->userGetUrl . 'access_token=' . $this->accessToken . '&next_openid=' . $next_openid);
        if ($result) {
            $json = json_decode($result, true);
            if (isset($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

//{
//"subscribe": 1,
//"openid": "o6_bmjrPTlm6_2sgVt7hMZOPfL2M",
//"nickname": "Band",
//"sex": 1,
//"language": "zh_CN",
//"city": "广州",
//"province": "广东",
//"country": "中国",
//"headimgurl":    "http://wx.qlogo.cn/mmopen/g3MonUZtNHkdmzicIlibx6iaFqAc56vxLSUfpb6n5WKSYVY0ChQKkiaJSgQ1dZuTOgvLLrhJbERQQ4eMsv84eavHiaiceqxibJxCfHe/0",
//"subscribe_time": 1382694957,
//"unionid": " o6_bmasdasdsad6_2sgVt7hMZOPfL"
//"remark": "",
//"groupid": 0
//}
    /**
     * 获取关注者详细信息
     *
     * @param string $openid
     * @return array {subscribe,openid,nickname,sex,city,province,country,language,headimgurl,subscribe_time,[unionid]}
     * 注意：unionid字段 只有在用户将公众号绑定到微信开放平台账号后，才会出现。建议调用前用isset()检测一下
     */
    public function getUserInfo($openid)
    {

        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_get($this->apiUrlPrefix . $this->userInfoUrl . 'access_token=' . $this->accessToken . '&openid=' . $openid);
        if ($result) {
            $json = json_decode($result, true);
            if (isset($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 设置用户备注名
     *
     * @param string $openid
     * @param string $remark 备注名
     * @return boolean|array
     */
    public function updateUserRemark($openid, $remark)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $data = array(
            'openid' => $openid,
            'remark' => $remark
        );
        $result = $this->http_post($this->apiUrlPrefix . $this->userUpdateRemarkUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 获取用户分组列表
     *
     * @return boolean|array
     */
    public function getGroup()
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_get($this->apiUrlPrefix . $this->groupGetUrl . 'access_token=' . $this->accessToken);
        if ($result) {
            $json = json_decode($result, true);
            if (isset($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 获取用户所在分组
     *
     * @param string $openid
     * @return boolean|int 成功则返回用户分组id
     */
    public function getUserGroup($openid)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $data = array(
            'openid' => $openid
        );
        $result = $this->http_post($this->apiUrlPrefix . $this->userGroupUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            } else {
                if (isset($json['groupid'])) {
                    return $json['groupid'];
                }
            }
        }
        return false;
    }

    /**
     * 新增自定分组
     *
     * @param string $name 分组名称
     * @return boolean|array
     */
    public function createGroup($name)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $data = array(
            'group' => array('name' => $name)
        );
        $result = $this->http_post($this->apiUrlPrefix . $this->groupCreateUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 更改分组名称
     *
     * @param int $groupid 分组id
     * @param string $name 分组名称
     * @return boolean|array
     */
    public function updateGroup($groupid, $name)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $data = array(
            'group' => array('id' => $groupid, 'name' => $name)
        );
        $result = $this->http_post($this->apiUrlPrefix . $this->groupUpdateUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 移动用户分组
     *
     * @param int $groupid 分组id
     * @param string $openid 用户openid
     * @return boolean|array
     */
    public function updateGroupMembers($groupid, $openid)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $data = array(
            'openid' => $openid,
            'to_groupid' => $groupid
        );
        $result = $this->http_post($this->apiUrlPrefix . $this->groupMemberUpdateUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 批量移动用户分组
     *
     * @param int $groupid 分组id
     * @param string $openid_list 用户openid数组,一次不能超过50个
     * @return boolean|array
     */
    public function batchUpdateGroupMembers($groupid, $openid_list)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $data = array(
            'openid_list' => $openid_list,
            'to_groupid' => $groupid
        );
        $result = $this->http_post($this->apiUrlPrefix . $this->groupMemberBatchUpdateUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 发送客服消息
     *
     * @param array $data 消息结构{"touser":"OPENID","msgtype":"news","news":{...}}
     * @return boolean|array
     */
    public function sendCustomMessage($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiUrlPrefix . $this->customSendUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * oauth 授权跳转接口
     *
     * @param string $callback 回调URI
     * @return string
     */
    public function getOauthRedirect($callback, $state = '', $scope = 'snsapi_base'): string
    {
        return $this->oauthAuthorizeUrl . 'appid=' . $this->appid . '&redirect_uri=' . urlencode($callback) . '&response_type=code&scope=' . $scope . '&state=' . $state . '#wechat_redirect';
    }

    /**
     * 通过code获取Access Token
     *
     * @param string $code
     * @return bool|mixed
     */
    public function getOauthAccessToken(string $code = '')
    {
        if (!$code) {
            $code = $_REQUEST['code'] ?? '';
        }
        if (!$code) {
            return false;
        }
        $result = $this->http_get($this->apiBaseurlPrefix . $this->oauthTokenUrl . 'appid=' . $this->appid . '&secret=' . $this->appSecret . '&code=' . $code . '&grant_type=authorization_code');
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            $this->userToken = $json['access_token'];
            return $json;
        }
        return false;
    }

    /**
     * 刷新access token并续期
     *
     * @param string $refresh_token
     * @return boolean|mixed
     */
    public function getOauthRefreshToken(string $refresh_token)
    {
        $result = $this->http_get($this->apiBaseurlPrefix . $this->oauthRefreshUrl . 'appid=' . $this->appid . '&grant_type=refresh_token&refresh_token=' . $refresh_token);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            $this->userToken = $json['access_token'];
            return $json;
        }
        return false;
    }

    /**
     * 获取授权后的用户资料
     *
     * @param string $access_token
     * @param string $openid
     * @return array {openid,nickname,sex,province,city,country,headimgurl,privilege,[unionid]}
     * 注意：unionid字段 只有在用户将公众号绑定到微信开放平台账号后，才会出现。建议调用前用isset()检测一下
     */
    public function getOauthUserinfo(string $access_token, string $openid)
    {
        $result = $this->http_get($this->apiBaseurlPrefix . $this->oauthUserInfoUrl . 'access_token=' . $access_token . '&openid=' . $openid . '&lang=zh_CN');
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 检验授权凭证是否有效
     *
     * @param string $access_token
     * @param string $openid
     * @return boolean 是否有效
     */
    public function getOauthAuth(string $access_token, string $openid)
    {
        $result = $this->http_get($this->apiBaseurlPrefix . $this->oauthAuthUrl . 'access_token=' . $access_token . '&openid=' . $openid);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            } else {
                if ($json['errcode'] == 0) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->errMsg;
    }

    /**
     * 模板消息 设置所属行业
     *
     * @param int $id1 公众号模板消息所属行业编号，参看官方开发文档 行业代码
     * @param int $id2 同$id1。但如果只有一个行业，此参数可省略
     * @return boolean|array
     */
    public function setTMIndustry($id1, $id2 = '')
    {
        if ($id1) {
            $data['industry_id1'] = $id1;
        }
        if ($id2) {
            $data['industry_id2'] = $id2;
        }
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiUrlPrefix . $this->templateSetIndustryUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 模板消息 添加消息模板
     * 成功返回消息模板的调用id
     *
     * @param string $tpl_id 模板库中模板的编号，有“TM**”和“OPENTMTM**”等形式
     * @return boolean|string
     */
    public function addTemplateMessage($tpl_id)
    {
        $data = array('template_id_short' => $tpl_id);
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiUrlPrefix . $this->templateAddTplUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json['template_id'];
        }
        return false;
    }

    /**
     * 发送模板消息
     *
     * @param array $data 消息结构
     * ｛
     * "touser":"OPENID",
     * "template_id":"ngqIpbwh8bUfcSsECmogfXcV14J0tQlEpBO27izEYtY",
     * "url":"http://weixin.qq.com/download",
     * "topcolor":"#FF0000",
     * "data":{
     * "参数名1": {
     * "value":"参数",
     * "color":"#173177"     //参数颜色
     * },
     * "Date":{
     * "value":"06月07日 19时24分",
     * "color":"#173177"
     * },
     * "CardNumber":{
     * "value":"0426",
     * "color":"#173177"
     * },
     * "Type":{
     * "value":"消费",
     * "color":"#173177"
     * }
     * }
     * }
     * @return boolean|array
     */
    public function sendTemplateMessage($accessToken = '', $data = '')
    {
        if ($accessToken) {
            $this->accessToken = $accessToken;
        } else {
            if (!$this->accessToken && !$this->checkAuth()) {
                return false;
            }
        }

        $result = $this->http_post($this->apiUrlPrefix . $this->templateSendUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 获取多客服会话记录
     *
     * @param array $data 数据结构{"starttime":123456789,"endtime":987654321,"openid":"OPENID","pagesize":10,"pageindex":1,}
     * @return boolean|array
     */
    public function getCustomServiceMessage($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiUrlPrefix . $this->customServiceGetRecord . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 转发多客服消息
     * Example: $obj->transfer_customer_service($customer_account)->reply();
     *
     * @param string $customer_account 转发到指定客服帐号：test1@test
     */
    public function transfer_customer_service($customer_account = '')
    {
        $msg = array(
            'ToUserName' => $this->getRevFrom(),
            'FromUserName' => $this->getRevTo(),
            'CreateTime' => time(),
            'MsgType' => 'transfer_customer_service',
        );
        if ($customer_account) {
            $msg['TransInfo'] = array('KfAccount' => $customer_account);
        }
        $this->Message($msg);
        return $this;
    }

    /**
     * 获取多客服客服基本信息
     *
     * @return boolean|array
     */
    public function getCustomServiceKFlist()
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_get($this->apiUrlPrefix . $this->customServiceGetKfList . 'access_token=' . $this->accessToken);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 获取多客服在线客服接待信息
     *
     * @return boolean|array {
     * "kf_online_list": [
     * {
     * "kf_account": "test1@test",    //客服账号@微信别名
     * "status": 1,            //客服在线状态 1：pc在线，2：手机在线,若pc和手机同时在线则为 1+2=3
     * "kf_id": "1001",        //客服工号
     * "auto_accept": 0,        //客服设置的最大自动接入数
     * "accepted_case": 1        //客服当前正在接待的会话数
     * }
     * ]
     * }
     */
    public function getCustomServiceOnlineKFlist()
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_get($this->apiUrlPrefix . $this->customServiceGetOnlineKfList . 'access_token=' . $this->accessToken);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 创建指定多客服会话
     *
     * @tutorial 当用户已被其他客服接待或指定客服不在线则会失败
     * @param string $openid //用户openid
     * @param string $kf_account //客服账号
     * @param string $text //附加信息，文本会展示在客服人员的多客服客户端，可为空
     * @return boolean | array            //成功返回json数组
     * {
     *   "errcode": 0,
     *   "errmsg": "ok",
     * }
     */
    public function createKFSession($openid, $kf_account, $text = '')
    {
        $data = array(
            "openid" => $openid,
            "kf_account" => $kf_account
        );
        if ($text) {
            $data["text"] = $text;
        }
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->customSessionCreate . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 关闭指定多客服会话
     *
     * @tutorial 当用户被其他客服接待时则会失败
     * @param string $openid //用户openid
     * @param string $kf_account //客服账号
     * @param string $text //附加信息，文本会展示在客服人员的多客服客户端，可为空
     * @return boolean | array            //成功返回json数组
     * {
     *   "errcode": 0,
     *   "errmsg": "ok",
     * }
     */
    public function closeKFSession($openid, $kf_account, $text = '')
    {
        $data = array(
            "openid" => $openid,
            "kf_account" => $kf_account
        );
        if ($text) {
            $data["text"] = $text;
        }
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->customSessionClose . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 获取用户会话状态
     *
     * @param string $openid //用户openid
     * @return boolean | array            //成功返回json数组
     * {
     *     "errcode" : 0,
     *     "errmsg" : "ok",
     *     "kf_account" : "test1@test",    //正在接待的客服
     *     "createtime": 123456789,        //会话接入时间
     *  }
     */
    public function getKFSession($openid)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_get($this->apiBaseurlPrefix . $this->customSessionGet . 'access_token=' . $this->accessToken . '&openid=' . $openid);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 获取指定客服的会话列表
     *
     * @param string $openid //用户openid
     * @return boolean | array            //成功返回json数组
     *  array(
     *     'sessionlist' => array (
     *         array (
     *             'openid'=>'OPENID',             //客户 openid
     *             'createtime'=>123456789,  //会话创建时间，UNIX 时间戳
     *         ),
     *         array (
     *             'openid'=>'OPENID',             //客户 openid
     *             'createtime'=>123456789,  //会话创建时间，UNIX 时间戳
     *         ),
     *     )
     *  )
     */
    public function getKFSessionlist($kf_account)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_get($this->apiBaseurlPrefix . $this->customSessionGetList . 'access_token=' . $this->accessToken . '&kf_account=' . $kf_account);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 获取未接入会话列表
     *
     * @param string $openid //用户openid
     * @return boolean | array            //成功返回json数组
     *  array (
     *     'count' => 150 ,                            //未接入会话数量
     *     'waitcaselist' => array (
     *         array (
     *             'openid'=>'OPENID',             //客户 openid
     *             'kf_account ' =>'',                   //指定接待的客服，为空则未指定
     *             'createtime'=>123456789,  //会话创建时间，UNIX 时间戳
     *         ),
     *         array (
     *             'openid'=>'OPENID',             //客户 openid
     *             'kf_account ' =>'',                   //指定接待的客服，为空则未指定
     *             'createtime'=>123456789,  //会话创建时间，UNIX 时间戳
     *         )
     *     )
     *  )
     */
    public function getKFSessionWait()
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_get($this->apiBaseurlPrefix . $this->customSessionGetWait . 'access_token=' . $this->accessToken);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 添加客服账号
     *
     * @param string $account //完整客服账号，格式为：账号前缀@公众号微信号，账号前缀最多10个字符，必须是英文或者数字字符
     * @param string $nickname //客服昵称，最长6个汉字或12个英文字符
     * @param string $password //客服账号明文登录密码，会自动加密
     * @return boolean|array
     * 成功返回结果
     * {
     *   "errcode": 0,
     *   "errmsg": "ok",
     * }
     */
    public function addKFAccount($account, $nickname, $password)
    {
        $data = array(
            "kf_account" => $account,
            "nickname" => $nickname,
            "password" => md5($password)
        );
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->CSKFAccountAddUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 修改客服账号信息
     *
     * @param string $account //完整客服账号，格式为：账号前缀@公众号微信号，账号前缀最多10个字符，必须是英文或者数字字符
     * @param string $nickname //客服昵称，最长6个汉字或12个英文字符
     * @param string $password //客服账号明文登录密码，会自动加密
     * @return boolean|array
     * 成功返回结果
     * {
     *   "errcode": 0,
     *   "errmsg": "ok",
     * }
     */
    public function updateKFAccount($account, $nickname, $password)
    {
        $data = array(
            "kf_account" => $account,
            "nickname" => $nickname,
            "password" => md5($password)
        );
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->CS_KFAccountUploadHeadImgUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 删除客服账号
     *
     * @param string $account //完整客服账号，格式为：账号前缀@公众号微信号，账号前缀最多10个字符，必须是英文或者数字字符
     * @return boolean|array
     * 成功返回结果
     * {
     *   "errcode": 0,
     *   "errmsg": "ok",
     * }
     */
    public function deleteKFAccount($account)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_get($this->apiBaseurlPrefix . $this->CS_KFAccountDelUrl . 'access_token=' . $this->accessToken . '&kf_account=' . $account);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 上传客服头像
     *
     * @param string $account //完整客服账号，格式为：账号前缀@公众号微信号，账号前缀最多10个字符，必须是英文或者数字字符
     * @param string $imgfile //头像文件完整路径,如：'D:\user.jpg'。头像文件必须JPG格式，像素建议640*640
     * @return boolean|array
     * 成功返回结果
     * {
     *   "errcode": 0,
     *   "errmsg": "ok",
     * }
     */
    public function setKFHeadImg($account, $imgfile)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->CS_KFAccountUploadHeadImgUrl . 'access_token=' . $this->accessToken . '&kf_account=' . $account,
            array('media' => '@' . $imgfile), true);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 语义理解接口
     *
     * @param String $uid 用户唯一id（非开发者id），用户区分公众号下的不同用户（建议填入用户openid）
     * @param String $query 输入文本串
     * @param String $category 需要使用的服务类型，多个用“，”隔开，不能为空
     * @param Float $latitude 纬度坐标，与经度同时传入；与城市二选一传入
     * @param Float $longitude 经度坐标，与纬度同时传入；与城市二选一传入
     * @param String $city 城市名称，与经纬度二选一传入
     * @param String $region 区域名称，在城市存在的情况下可省略；与经纬度二选一传入
     * @return boolean|array
     */
    public function querySemantic($uid, $query, $category, $latitude = 0, $longitude = 0, $city = "", $region = "")
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $data = array(
            'query' => $query,
            'category' => $category,
            'appid' => $this->appid,
            'uid' => ''
        );
        //地理坐标或城市名称二选一
        if ($latitude) {
            $data['latitude'] = $latitude;
            $data['longitude'] = $longitude;
        } elseif ($city) {
            $data['city'] = $city;
        } elseif ($region) {
            $data['region'] = $region;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->semanticApiUrl . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 创建卡券
     *
     * @param Array $data 卡券数据
     * @return array|boolean 返回数组中card_id为卡券ID
     */
    public function createCard($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardCreate . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 更改卡券信息
     * 调用该接口更新信息后会重新送审，卡券状态变更为待审核。已被用户领取的卡券会实时更新票面信息。
     *
     * @param string $data
     * @return boolean
     */
    public function updateCard($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardUpdate . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * 删除卡券
     * 允许商户删除任意一类卡券。删除卡券后，该卡券对应已生成的领取用二维码、添加到卡包 JS API 均会失效。
     * 注意：删除卡券不能删除已被用户领取，保存在微信客户端中的卡券，已领取的卡券依旧有效。
     *
     * @param string $card_id 卡券ID
     * @return boolean
     */
    public function delCard($card_id)
    {
        $data = array(
            'card_id' => $card_id,
        );
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardDelete . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * 查询卡券详情
     *
     * @param string $card_id
     * @return boolean|array    返回数组信息比较复杂，请参看卡券接口文档
     */
    public function getCardInfo($card_id)
    {
        $data = array(
            'card_id' => $card_id,
        );
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardGet . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 获取颜色列表
     * 获得卡券的最新颜色列表，用于创建卡券
     *
     * @return boolean|array   返回数组请参看 微信卡券接口文档 的json格式
     */
    public function getCardColors()
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_get($this->apiBaseurlPrefix . $this->cardGetColors . 'access_token=' . $this->accessToken);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 拉取门店列表
     * 获取在公众平台上申请创建的门店列表
     *
     * @param int $offset 开始拉取的偏移，默认为0从头开始
     * @param int $count 拉取的数量，默认为0拉取全部
     * @return boolean|array   返回数组请参看 微信卡券接口文档 的json格式
     */
    public function getCardLocations($offset = 0, $count = 0)
    {
        $data = array(
            'offset' => $offset,
            'count' => $count
        );
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardLocationBatchGet . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 批量导入门店信息
     *
     * @tutorial 返回插入的门店id列表，以逗号分隔。如果有插入失败的，则为-1，请自行核查是哪个插入失败
     * @param array $data 数组形式的json数据，由于内容较多，具体内容格式请查看 微信卡券接口文档
     * @return boolean|string 成功返回插入的门店id列表
     */
    public function addCardLocations($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardLocationBatchAdd . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 生成卡券二维码
     * 成功则直接返回ticket值，可以用 getQRUrl($ticket) 换取二维码url
     *
     * @param string $cardid 卡券ID 必须
     * @param string $code 指定卡券 code 码，只能被领一次。use_custom_code 字段为 true 的卡券必须填写，非自定义 code 不必填写。
     * @param string $openid 指定领取者的 openid，只有该用户能领取。bind_openid 字段为 true 的卡券必须填写，非自定义 openid 不必填写。
     * @param int $expire_seconds 指定二维码的有效时间，范围是 60 ~ 1800 秒。不填默认为永久有效。
     * @param boolean $is_unique_code 指定下发二维码，生成的二维码随机分配一个 code，领取后不可再次扫描。填写 true 或 false。默认 false。
     * @param string $balance 红包余额，以分为单位。红包类型必填（LUCKY_MONEY），其他卡券类型不填。
     * @return boolean|string
     */
    public function createCardQrcode(
        $card_id,
        $code = '',
        $openid = '',
        $expire_seconds = 0,
        $is_unique_code = false,
        $balance = ''
    )
    {
        $card = array(
            'card_id' => $card_id
        );
        if ($code) {
            $card['code'] = $code;
        }
        if ($openid) {
            $card['openid'] = $openid;
        }
        if ($expire_seconds) {
            $card['expire_seconds'] = $expire_seconds;
        }
        if ($is_unique_code) {
            $card['is_unique_code'] = $is_unique_code;
        }
        if ($balance) {
            $card['balance'] = $balance;
        }
        $data = array(
            'action_name' => "QR_CARD",
            'action_info' => array('card' => $card)
        );
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardQrcodeCreate . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 消耗 code
     * 自定义 code（use_custom_code 为 true）的优惠券，在 code 被核销时，必须调用此接口。
     *
     * @param string $code 要消耗的序列号
     * @param string $card_id 要消耗序列号所述的 card_id，创建卡券时use_custom_code 填写 true 时必填。
     * @return boolean|array
     * {
     *  "errcode":0,
     *  "errmsg":"ok",
     *  "card":{"card_id":"pFS7Fjg8kV1IdDz01r4SQwMkuCKc"},
     *  "openid":"oFS7Fjl0WsZ9AMZqrI80nbIq8xrA"
     * }
     */
    public function consumeCardCode($code, $card_id = '')
    {
        $data = array('code' => $code);
        if ($card_id) {
            $data['card_id'] = $card_id;
        }
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardCodeConsume . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * code 解码
     *
     * @param string $encrypt_code 通过 choose_card_info 获取的加密字符串
     * @return boolean|array
     * {
     *  "errcode":0,
     *  "errmsg":"ok",
     *  "code":"751234212312"
     *  }
     */
    public function decryptCardCode($encrypt_code)
    {
        $data = array(
            'encrypt_code' => $encrypt_code,
        );
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardCodeDecrypt . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 查询 code 的有效性（非自定义 code）
     *
     * @param string $code
     * @return boolean|array
     * {
     *  "errcode":0,
     *  "errmsg":"ok",
     *  "openid":"oFS7Fjl0WsZ9AMZqrI80nbIq8xrA",    //用户 openid
     *  "card":{
     *      "card_id":"pFS7Fjg8kV1IdDz01r4SQwMkuCKc",
     *      "begin_time": 1404205036,               //起始使用时间
     *      "end_time": 1404205036,                 //结束时间
     *  }
     * }
     */
    public function checkCardCode($code)
    {
        $data = array(
            'code' => $code,
        );
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardCodeGet . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 批量查询卡列表
     *
     * @param $offset  开始拉取的偏移，默认为0从头开始
     * @param $count   需要查询的卡片的数量（数量最大50,默认50）
     * @return boolean|array
     * {
     *  "errcode":0,
     *  "errmsg":"ok",
     *  "card_id_list":["ph_gmt7cUVrlRk8swPwx7aDyF-pg"],    //卡 id 列表
     *  "total_num":1                                       //该商户名下 card_id 总数
     * }
     */
    public function getCardIdList($offset = 0, $count = 50)
    {
        if ($count > 50) {
            $count = 50;
        }
        $data = array(
            'offset' => $offset,
            'count' => $count,
        );
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardBatchGet . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 更改 code
     * 为确保转赠后的安全性，微信允许自定义code的商户对已下发的code进行更改。
     * 注：为避免用户疑惑，建议仅在发生转赠行为后（发生转赠后，微信会通过事件推送的方式告知商户被转赠的卡券code）对用户的code进行更改。
     *
     * @param string $code 卡券的 code 编码
     * @param string $card_id 卡券 ID
     * @param string $new_code 新的卡券 code 编码
     * @return boolean
     */
    public function updateCardCode($code, $card_id, $new_code)
    {
        $data = array(
            'code' => $code,
            'card_id' => $card_id,
            'new_code' => $new_code,
        );
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardCodeUpdate . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * 设置卡券失效
     * 设置卡券失效的操作不可逆
     *
     * @param string $code 需要设置为失效的 code
     * @param string $card_id 自定义 code 的卡券必填。非自定义 code 的卡券不填。
     * @return boolean
     */
    public function unavailableCardCode($code, $card_id = '')
    {
        $data = array(
            'code' => $code,
        );
        if ($card_id) {
            $data['card_id'] = $card_id;
        }
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardCodeUnavailable . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * 库存修改
     *
     * @param string $data
     * @return boolean
     */
    public function modifyCardStock($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardModifyStock . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * 激活/绑定会员卡
     *
     * @param string $data 具体结构请参看卡券开发文档(6.1.1 激活/绑定会员卡)章节
     * @return boolean
     */
    public function activateMemberCard($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardMemberCardActivate . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * 会员卡交易
     * 会员卡交易后每次积分及余额变更需通过接口通知微信，便于后续消息通知及其他扩展功能。
     *
     * @param string $data 具体结构请参看卡券开发文档(6.1.2 会员卡交易)章节
     * @return boolean|array
     */
    public function updateMemberCard($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardMemberCardUpdateUser . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 更新红包金额
     *
     * @param string $code 红包的序列号
     * @param $balance          红包余额
     * @param string $card_id 自定义 code 的卡券必填。非自定义 code 可不填。
     * @return boolean|array
     */
    public function updateLuckyMoney($code, $balance, $card_id = '')
    {
        $data = array(
            'code' => $code,
            'balance' => $balance
        );
        if ($card_id) {
            $data['card_id'] = $card_id;
        }
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardLuckyMoneyUpdate . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * 设置卡券测试白名单
     *
     * @param string $openid 测试的 openid 列表
     * @param string $user 测试的微信号列表
     * @return boolean
     */
    public function setCardTestWhiteList($openid = array(), $user = array())
    {
        $data = array();
        if (count($openid) > 0) {
            $data['openid'] = $openid;
        }
        if (count($user) > 0) {
            $data['username'] = $user;
        }
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->cardTestWhileListSet . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * 申请设备ID
     * [applyShakeAroundDevice 申请配置设备所需的UUID、Major、Minor。
     * 若激活率小于50%，不能新增设备。单次新增设备超过500 个，需走人工审核流程。
     * 审核通过后，可用迒回的批次ID 用“查询设备列表”接口拉取本次申请的设备ID]
     *
     * @param array $data
     * array(
     *      "quantity" => 3,         //申请的设备ID 的数量，单次新增设备超过500 个,需走人工审核流程(必填)
     *      "apply_reason" => "测试",//申请理由(必填)
     *      "comment" => "测试专用", //备注(非必填)
     *      "poi_id" => 1234         //设备关联的门店ID(非必填)
     * )
     * @return boolean|mixed
     * {
     * "data": {
     * "apply_id": 123,
     * "device_identifiers":[
     * {
     * "device_id":10100,
     * "uuid":"FDA50693-A4E2-4FB1-AFCF-C6EB07647825",
     * "major":10001,
     * "minor":10002
     * }
     * ]
     * },
     * "errcode": 0,
     * "errmsg": "success."
     * }
     *
     * apply_id:申请的批次ID，可用在“查询设备列表”接口按批次查询本次申请成功的设备ID
     * device_identifiers:指定的设备ID 列表
     * device_id:设备编号
     * uuid、major、minor
     * audit_status:审核状态。0：审核未通过、1：审核中、2：审核已通过；审核会在三个工作日内完成
     * audit_comment:审核备注，包括审核不通过的原因
     * @access public
     * @author polo<gao.bo168@gmail.com>
     * @version 2015-3-25 下午1:24:06
     * @copyright Show More
     */
    public function applyShakeAroundDevice($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->shakeAroundDeviceApplyId . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        $this->log($result);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 编辑设备信息
     * [updateShakeAroundDevice 编辑设备的备注信息。可用设备ID或完整的UUID、Major、Minor指定设备，二者选其一。]
     *
     * @param array $data
     * array(
     *      "device_identifier" => array(
     *                "device_id" => 10011,   //当提供了device_id则不需要使用uuid、major、minor，反之亦然
     *                "uuid" => "FDA50693-A4E2-4FB1-AFCF-C6EB07647825",
     *                "major" => 1002,
     *                "minor" => 1223
     *      ),
     *      "comment" => "测试专用", //备注(非必填)
     * )
     * {
     * "data": {
     * },
     * "errcode": 0,
     * "errmsg": "success."
     * }
     * @return boolean
     * @author binsee<binsee@163.com>
     * @version 2015-4-20 23:45:00
     */
    public function updateShakeAroundDevice($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->shakeAroundDeviceUpdate . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        $this->log($result);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * 查询设备列表
     * [searchShakeAroundDevice 查询已有的设备ID、UUID、Major、Minor、激活状态、备注信息、关联门店、关联页面等信息。
     * 可指定设备ID 或完整的UUID、Major、Minor 查询，也可批量拉取设备信息列表。]
     *
     * @param array $data
     * $data 三种格式:
     * ①查询指定设备时：$data = array(
     *                              "device_identifiers" => array(
     *                                                          array(
     *                                                              "device_id" => 10100,
     *                                                              "uuid" => "FDA50693-A4E2-4FB1-AFCF-C6EB07647825",
     *                                                              "major" => 10001,
     *                                                              "minor" => 10002
     *                                                          )
     *                                                      )
     *                              );
     * device_identifiers:指定的设备
     * device_id:设备编号，若填了UUID、major、minor，则可不填设备编号，若二者都填，则以设备编号为优先
     * uuid、major、minor:三个信息需填写完整，若填了设备编号，则可不填此信息
     * +-------------------------------------------------------------------------------------------------------------
     * ②需要分页查询或者指定范围内的设备时: $data = array(
     *                                                  "begin" => 0,
     *                                                  "count" => 3
     *                                               );
     * begin:设备列表的起始索引值
     * count:待查询的设备个数
     * +-------------------------------------------------------------------------------------------------------------
     * ③当需要根据批次ID 查询时: $data = array(
     *                                      "apply_id" => 1231,
     *                                      "begin" => 0,
     *                                      "count" => 3
     *                                    );
     * apply_id:批次ID
     * +-------------------------------------------------------------------------------------------------------------
     * @return boolean|mixed
     *正确迒回JSON 数据示例：
     *字段说明
     * {
     * "data": {
     * "devices": [          //指定的设备信息列表
     * {
     * "comment": "", //设备的备注信息
     * "device_id": 10097, //设备编号
     * "major": 10001,
     * "minor": 12102,
     * "page_ids": "15369", //与此设备关联的页面ID 列表，用逗号隔开
     * "status": 1, //激活状态，0：未激活，1：已激活（但不活跃），2：活跃
     * "poi_id": 0, //门店ID
     * "uuid": "FDA50693-A4E2-4FB1-AFCF-C6EB07647825"
     * },
     * {
     * "comment": "", //设备的备注信息
     * "device_id": 10098, //设备编号
     * "major": 10001,
     * "minor": 12103,
     * "page_ids": "15368", //与此设备关联的页面ID 列表，用逗号隔开
     * "status": 1, //激活状态，0：未激活，1：已激活（但不活跃），2：活跃
     * "poi_id": 0, //门店ID
     * "uuid": "FDA50693-A4E2-4FB1-AFCF-C6EB07647825"
     * }
     * ],
     * "total_count": 151 //商户名下的设备总量
     * },
     * "errcode": 0,
     * "errmsg": "success."
     * }
     * @access public
     * @author polo<gao.bo168@gmail.com>
     * @version 2015-3-25 下午1:45:42
     * @copyright Show More
     */
    public function searchShakeAroundDevice($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->shakeAroundDeviceSearch . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        $this->log($result);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * [bindLocationShakeAroundDevice 配置设备与门店的关联关系]
     *
     * @param string $device_id 设备编号，若填了UUID、major、minor，则可不填设备编号，若二者都填，则以设备编号为优先
     * @param int $poi_id 待关联的门店ID
     * @param string $uuid UUID、major、minor，三个信息需填写完整，若填了设备编号，则可不填此信息
     * @param int $major
     * @param int $minor
     * @return boolean|mixed
     * 正确返回JSON 数据示例:
     * {
     * "data": {
     * },
     * "errcode": 0,
     * "errmsg": "success."
     * }
     * @access public
     * @author polo<gao.bo168@gmail.com>
     * @version 2015-4-21 00:14:00
     * @copyright Show More
     */
    public function bindLocationShakeAroundDevice($device_id, $poi_id, $uuid = '', $major = 0, $minor = 0)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        if (!$device_id) {
            if (!$uuid || !$major || !$minor) {
                return false;
            }
            $device_identifier = array(
                'uuid' => $uuid,
                'major' => $major,
                'minor' => $minor
            );
        } else {
            $device_identifier = array(
                'device_id' => $device_id
            );
        }
        $data = array(
            'device_identifier' => $device_identifier,
            'poi_id' => $poi_id
        );
        $result = $this->http_post($this->apiBaseurlPrefix . $this->shakeAroundDeviceBindLocation . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        $this->log($result);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json; //这个可以更改为返回true
        }
        return false;
    }

    /**
     * [bindPageShakeAroundDevice 配置设备与页面的关联关系。
     * 支持建立或解除关联关系，也支持新增页面或覆盖页面等操作。
     * 配置完成后，在此设备的信号范围内，即可摇出关联的页面信息。
     * 若设备配置多个页面，则随机出现页面信息]
     *
     * @param string $device_id 设备编号，若填了UUID、major、minor，则可不填设备编号，若二者都填，则以设备编号为优先
     * @param array $page_ids 待关联的页面列表
     * @param number $bind 关联操作标志位， 0 为解除关联关系，1 为建立关联关系
     * @param number $append 新增操作标志位， 0 为覆盖，1 为新增
     * @param string $uuid UUID、major、minor，三个信息需填写完整，若填了设备编号，则可不填此信息
     * @param int $major
     * @param int $minor
     * @return boolean|mixed
     * 正确返回JSON 数据示例:
     * {
     * "data": {
     * },
     * "errcode": 0,
     * "errmsg": "success."
     * }
     * @access public
     * @author polo<gao.bo168@gmail.com>
     * @version 2015-4-21 00:31:00
     * @copyright Show More
     */
    public function bindPageShakeAroundDevice(
        $device_id,
        $page_ids = array(),
        $bind = 1,
        $append = 1,
        $uuid = '',
        $major = 0,
        $minor = 0
    )
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        if (!$device_id) {
            if (!$uuid || !$major || !$minor) {
                return false;
            }
            $device_identifier = array(
                'uuid' => $uuid,
                'major' => $major,
                'minor' => $minor
            );
        } else {
            $device_identifier = array(
                'device_id' => $device_id
            );
        }
        $data = array(
            'device_identifier' => $device_identifier,
            'page_ids' => $page_ids,
            'bind' => $bind,
            'append' => $append
        );
        $result = $this->http_post($this->apiBaseurlPrefix . $this->shakeAroundDeviceBindPage . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        $this->log($result);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 上传在摇一摇页面展示的图片素材
     * 注意：数组的键值任意，但文件名前必须加@，使用单引号以避免本地路径斜杠被转义
     *
     * @param array $data {"media":'@Path\filename.jpg'} 格式限定为：jpg,jpeg,png,gif，图片大小建议120px*120 px，限制不超过200 px *200 px，图片需为正方形。
     * @return boolean|array
     * {
     * "data": {
     * "pic_url":"http://shp.qpic.cn/wechat_shakearound_pic/0/1428377032e9dd2797018cad79186e03e8c5aec8dc/120"
     * },
     * "errcode": 0,
     * "errmsg": "success."
     * }
     * }
     * @author binsee<binsee@163.com>
     * @version 2015-4-21 00:51:00
     */
    public function uploadShakeAroundMedia($data)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $result = $this->http_post($this->apiUrlPrefix . $this->shakeAroundMaterialAdd . 'access_token=' . $this->accessToken,
            $data, true);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * [addShakeAroundPage 增加摇一摇出来的页面信息，包括在摇一摇页面出现的主标题、副标题、图片和点击进去的超链接。]
     *
     * @param string $title 在摇一摇页面展示的主标题，不超过6 个字
     * @param string $description 在摇一摇页面展示的副标题，不超过7 个字
     * @param sting $icon_url 在摇一摇页面展示的图片， 格式限定为：jpg,jpeg,png,gif; 建议120*120 ， 限制不超过200*200
     * @param string $page_url 跳转链接
     * @param string $comment 页面的备注信息，不超过15 个字,可不填
     * @return boolean|mixed
     * 正确返回JSON 数据示例:
     * {
     * "data": {
     * "page_id": 28840 //新增页面的页面id
     * }
     * "errcode": 0,
     * "errmsg": "success."
     * }
     * @access public
     * @author polo<gao.bo168@gmail.com>
     * @version 2015-3-25 下午2:57:09
     * @copyright Show More
     */
    public function addShakeAroundPage($title, $description, $icon_url, $page_url, $comment = '')
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $data = array(
            "title" => $title,
            "description" => $description,
            "icon_url" => $icon_url,
            "page_url" => $page_url,
            "comment" => $comment
        );
        $result = $this->http_post($this->apiBaseurlPrefix . $this->shakeAroundPageAdd . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        $this->log($result);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * [updateShakeAroundPage 编辑摇一摇出来的页面信息，包括在摇一摇页面出现的主标题、副标题、图片和点击进去的超链接。]
     *
     * @param int $page_id
     * @param string $title 在摇一摇页面展示的主标题，不超过6 个字
     * @param string $description 在摇一摇页面展示的副标题，不超过7 个字
     * @param sting $icon_url 在摇一摇页面展示的图片， 格式限定为：jpg,jpeg,png,gif; 建议120*120 ， 限制不超过200*200
     * @param string $page_url 跳转链接
     * @param string $comment 页面的备注信息，不超过15 个字,可不填
     * @return boolean|mixed
     * 正确返回JSON 数据示例:
     * {
     * "data": {
     * "page_id": 28840 //编辑页面的页面ID
     * }
     * "errcode": 0,
     * "errmsg": "success."
     * }
     * @access public
     * @author polo<gao.bo168@gmail.com>
     * @version 2015-3-25 下午3:02:51
     * @copyright Show More
     */
    public function updateShakeAroundPage($page_id, $title, $description, $icon_url, $page_url, $comment = '')
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $data = array(
            "page_id" => $page_id,
            "title" => $title,
            "description" => $description,
            "icon_url" => $icon_url,
            "page_url" => $page_url,
            "comment" => $comment
        );
        $result = $this->http_post($this->apiBaseurlPrefix . $this->shakeAroundPageUpdate . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        $this->log($result);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * [searchShakeAroundPage 查询已有的页面，包括在摇一摇页面出现的主标题、副标题、图片和点击进去的超链接。
     * 提供两种查询方式，①可指定页面ID 查询，②也可批量拉取页面列表。]
     *
     * @param array $page_ids
     * @param int $begin
     * @param int $count
     * ①需要查询指定页面时:
     * {
     * "page_ids":[12345, 23456, 34567]
     * }
     * +-------------------------------------------------------------------------------------------------------------
     * ②需要分页查询或者指定范围内的页面时:
     * {
     * "begin": 0,
     * "count": 3
     * }
     * +-------------------------------------------------------------------------------------------------------------
     * @return boolean|mixed
     * 正确返回JSON 数据示例:
     * {
     * "data": {
     * "pages": [
     * {
     * "comment": "just for test",
     * "description": "test",
     * "icon_url": "https://www.baidu.com/img/bd_logo1.png",
     * "page_id": 28840,
     * "page_url": "http://xw.qq.com/testapi1",
     * "title": "测试1"
     * },
     * {
     * "comment": "just for test",
     * "description": "test",
     * "icon_url": "https://www.baidu.com/img/bd_logo1.png",
     * "page_id": 28842,
     * "page_url": "http://xw.qq.com/testapi2",
     * "title": "测试2"
     * }
     * ],
     * "total_count": 2
     * },
     * "errcode": 0,
     * "errmsg": "success."
     * }
     *字段说明:
     *total_count 商户名下的页面总数
     *page_id 摇周边页面唯一ID
     *title 在摇一摇页面展示的主标题
     *description 在摇一摇页面展示的副标题
     *icon_url 在摇一摇页面展示的图片
     *page_url 跳转链接
     *comment 页面的备注信息
     * @access public
     * @author polo<gao.bo168@gmail.com>
     * @version 2015-3-25 下午3:12:17
     * @copyright Show More
     */
    public function searchShakeAroundPage($page_ids = array(), $begin = 0, $count = 1)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        if (!empty($page_ids)) {
            $data = array(
                'page_ids' => $page_ids
            );
        } else {
            $data = array(
                'begin' => $begin,
                'count' => $count
            );
        }
        $result = $this->http_post($this->apiBaseurlPrefix . $this->shakeAroundPageSearch . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        $this->log($result);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * [deleteShakeAroundPage 删除已有的页面，包括在摇一摇页面出现的主标题、副标题、图片和点击进去的超链接。
     * 只有页面与设备没有关联关系时，才可被删除。]
     *
     * @param array $page_ids
     * {
     * "page_ids":[12345,23456,34567]
     * }
     * @return boolean|mixed
     * 正确返回JSON 数据示例:
     * {
     * "data": {
     * },
     * "errcode": 0,
     * "errmsg": "success."
     * }
     * @access public
     * @author polo<gao.bo168@gmail.com>
     * @version 2015-3-25 下午3:23:00
     * @copyright Show More
     */
    public function deleteShakeAroundPage($page_ids = array())
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $data = array(
            'page_ids' => $page_ids
        );
        $result = $this->http_post($this->apiBaseurlPrefix . $this->shakeAroundPageDelete . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        $this->log($result);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * [getShakeInfoShakeAroundUser 获取设备信息，包括UUID、major、minor，以及距离、openID 等信息。]
     *
     * @param string $ticket 摇周边业务的ticket，可在摇到的URL 中得到，ticket生效时间为30 分钟
     * @return boolean|mixed
     * 正确返回JSON 数据示例:
     * {
     * "data": {
     * "page_id ": 14211,
     * "beacon_info": {
     * "distance": 55.00620700469034,
     * "major": 10001,
     * "minor": 19007,
     * "uuid": "FDA50693-A4E2-4FB1-AFCF-C6EB07647825"
     * },
     * "openid": "oVDmXjp7y8aG2AlBuRpMZTb1-cmA"
     * },
     * "errcode": 0,
     * "errmsg": "success."
     * }
     * 字段说明:
     * beacon_info 设备信息，包括UUID、major、minor，以及距离
     * UUID、major、minor UUID、major、minor
     * distance Beacon 信号与手机的距离
     * page_id 摇周边页面唯一ID
     * openid 商户AppID 下用户的唯一标识
     * poi_id 门店ID，有的话则返回，没有的话不会在JSON 格式内
     * @access public
     * @author polo<gao.bo168@gmail.com>
     * @version 2015-3-25 下午3:28:20
     * @copyright Show More
     */
    public function getShakeInfoShakeAroundUser($ticket)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $data = array('ticket' => $ticket);
        $result = $this->http_post($this->apiBaseurlPrefix . $this->shakeAroundUserGetShakeInfo . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        $this->log($result);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * [deviceShakeAroundStatistics 以设备为维度的数据统计接口。
     * 查询单个设备进行摇周边操作的人数、次数，点击摇周边消息的人数、次数；查询的最长时间跨度为30天。]
     *
     * @param int $device_id 设备编号，若填了UUID、major、minor，即可不填设备编号，二者选其一
     * @param int $begin_date 起始日期时间戳，最长时间跨度为30 天
     * @param int $end_date 结束日期时间戳，最长时间跨度为30 天
     * @param string $uuid UUID、major、minor，三个信息需填写完成，若填了设备编辑，即可不填此信息，二者选其一
     * @param int $major
     * @param int $minor
     * @return boolean|mixed
     * 正确返回JSON 数据示例:
     * {
     * "data": [
     * {
     * "click_pv": 0,
     * "click_uv": 0,
     * "ftime": 1425052800,
     * "shake_pv": 0,
     * "shake_uv": 0
     * },
     * {
     * "click_pv": 0,
     * "click_uv": 0,
     * "ftime": 1425139200,
     * "shake_pv": 0,
     * "shake_uv": 0
     * }
     * ],
     * "errcode": 0,
     * "errmsg": "success."
     * }
     * 字段说明:
     * ftime 当天0 点对应的时间戳
     * click_pv 点击摇周边消息的次数
     * click_uv 点击摇周边消息的人数
     * shake_pv 摇周边的次数
     * shake_uv 摇周边的人数
     * @access public
     * @author polo<gao.bo168@gmail.com>
     * @version 2015-4-21 00:39:00
     * @copyright Show More
     */
    public function deviceShakeAroundStatistics($device_id, $begin_date, $end_date, $uuid = '', $major = 0, $minor = 0)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        if (!$device_id) {
            if (!$uuid || !$major || !$minor) {
                return false;
            }
            $device_identifier = array(
                'uuid' => $uuid,
                'major' => $major,
                'minor' => $minor
            );
        } else {
            $device_identifier = array(
                'device_id' => $device_id
            );
        }
        $data = array(
            'device_identifier' => $device_identifier,
            'begin_date' => $begin_date,
            'end_date' => $end_date
        );
        $result = $this->http_post($this->apiBaseurlPrefix . $this->shakeAroundStatisticsDevice . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        $this->log($result);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }


    /**
     * [pageShakeAroundStatistics 以页面为维度的数据统计接口。
     * 查询单个页面通过摇周边摇出来的人数、次数，点击摇周边页面的人数、次数；查询的最长时间跨度为30天。]
     *
     * @param int $page_id 指定页面的ID
     * @param int $begin_date 起始日期时间戳，最长时间跨度为30 天
     * @param int $end_date 结束日期时间戳，最长时间跨度为30 天
     * @return boolean|mixed
     * 正确返回JSON 数据示例:
     * {
     * "data": [
     * {
     * "click_pv": 0,
     * "click_uv": 0,
     * "ftime": 1425052800,
     * "shake_pv": 0,
     * "shake_uv": 0
     * },
     * {
     * "click_pv": 0,
     * "click_uv": 0,
     * "ftime": 1425139200,
     * "shake_pv": 0,
     * "shake_uv": 0
     * }
     * ],
     * "errcode": 0,
     * "errmsg": "success."
     * }
     * 字段说明:
     * ftime 当天0 点对应的时间戳
     * click_pv 点击摇周边消息的次数
     * click_uv 点击摇周边消息的人数
     * shake_pv 摇周边的次数
     * shake_uv 摇周边的人数
     * @author binsee<binsee@163.com>
     * @version 2015-4-21 00:43:00
     */
    public function pageShakeAroundStatistics($page_id, $begin_date, $end_date)
    {
        if (!$this->accessToken && !$this->checkAuth()) {
            return false;
        }
        $data = array(
            'page_id' => $page_id,
            'begin_date' => $begin_date,
            'end_date' => $end_date
        );
        $result = $this->http_post($this->apiBaseurlPrefix . $this->shakeAroundStatisticsDevice . 'access_token=' . $this->accessToken,
            self::json_encode($data));
        $this->log($result);
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || !empty($json['errcode'])) {
                $this->errCode = $json['errcode'];
                $this->errMsg = $json['errmsg'];
                return false;
            }
            return $json;
        }
        return false;
    }
}

/**
 * PKCS7Encoder class
 *
 * 提供基于PKCS7算法的加解密接口.
 */
class PKCS7Encoder
{
    private $block_size = 32;

    /**
     * 对需要加密的明文进行填充补位
     *
     * @param $text 需要进行填充补位操作的明文
     * @return 补齐明文字符串
     */
    function encode($text)
    {
        $block_size = $this->block_size;
        $text_length = strlen($text);
        //计算需要填充的位数
        $amount_to_pad = $this->block_size - ($text_length % $this->block_size);
        if ($amount_to_pad == 0) {
            $amount_to_pad = $this->block_size;
        }
        //获得补位所用的字符
        $pad_chr = chr($amount_to_pad);
        $tmp = "";
        for ($index = 0; $index < $amount_to_pad; $index++) {
            $tmp .= $pad_chr;
        }
        return $text . $tmp;
    }

    /**
     * 对解密后的明文进行补位删除
     *
     * @param decrypted 解密后的明文
     * @return 删除填充补位后的明文
     */
    function decode($text)
    {

        $pad = ord(substr($text, -1));
        if ($pad < 1 || $pad > $this->block_size) {
            $pad = 0;
        }
        return substr($text, 0, (strlen($text) - $pad));
    }

}

/**
 * Prpcrypt class
 *
 * 提供接收和推送给公众平台消息的加解密接口.
 */
class Prpcrypt
{
    public $key;

    function __construct($k)
    {
        $this->key = base64_decode($k . "=");
    }

    /**
     * 兼容老版本php构造函数，不能在 __private $ruct() 方法前边，否则报错
     */
    function Prpcrypt($k)
    {
        $this->key = base64_decode($k . "=");
    }

    /**
     * 对明文进行加密
     *
     * @param string $text 需要加密的明文
     * @return string 加密后的密文
     */
    public
    function encrypt($text, $appid)
    {

        try {
            //获得16位随机字符串，填充到明文之前
            $random = $this->getRandomStr();//"aaaabbbbccccdddd";
            $text = $random . pack("N", strlen($text)) . $text . $appid;
            // 网络字节序
            $size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
            $module = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
            $iv = substr($this->key, 0, 16);
            //使用自定义的填充方式对明文进行补位填充
            $pkc_encoder = new PKCS7Encoder;
            $text = $pkc_encoder->encode($text);
            mcrypt_generic_init($module, $this->key, $iv);
            //加密
            $encrypted = mcrypt_generic($module, $text);
            mcrypt_generic_deinit($module);
            mcrypt_module_close($module);

            //			print(base64_encode($encrypted));
            //使用BASE64对加密后的字符串进行编码
            return array(ErrorCode::$OK, base64_encode($encrypted));
        } catch (Exception $e) {
            //print $e;
            return array(ErrorCode::$EncryptAESError, null);
        }
    }

    /**
     * 随机生成16位字符串
     *
     * @return string 生成的字符串
     */
    function getRandomStr()
    {

        $str = "";
        $str_pol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($str_pol) - 1;
        for ($i = 0; $i < 16; $i++) {
            $str .= $str_pol[mt_rand(0, $max)];
        }
        return $str;
    }

    /**
     * 对密文进行解密
     *
     * @param string $encrypted 需要解密的密文
     * @return string 解密得到的明文
     */
    public
    function decrypt($encrypted, $appid)
    {

        try {
            //使用BASE64对需要解密的字符串进行解码
            $ciphertext_dec = base64_decode($encrypted);
            $module = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
            $iv = substr($this->key, 0, 16);
            mcrypt_generic_init($module, $this->key, $iv);
            //解密
            $decrypted = mdecrypt_generic($module, $ciphertext_dec);
            mcrypt_generic_deinit($module);
            mcrypt_module_close($module);
        } catch (Exception $e) {
            return array(ErrorCode::$DecryptAESError, null);
        }


        try {
            //去除补位字符
            $pkc_encoder = new PKCS7Encoder;
            $result = $pkc_encoder->decode($decrypted);
            //去除16位随机字符串,网络字节序和AppId
            if (strlen($result) < 16) {
                return "";
            }
            $content = substr($result, 16, strlen($result));
            $len_list = unpack("N", substr($content, 0, 4));
            $xml_len = $len_list[1];
            $xml_content = substr($content, 4, $xml_len);
            $from_appid = substr($content, $xml_len + 4);
            if (!$appid) {
                $appid = $from_appid;
            }
            //如果传入的appid是空的，则认为是订阅号，使用数据中提取出来的appid
        } catch (Exception $e) {
            //print $e;
            return array(ErrorCode::$IllegalBuffer, null);
        }
        if ($from_appid != $appid) {
            return array(ErrorCode::$ValidateAppidError, null);
        }
        //不注释上边两行，避免传入appid是错误的情况
        return array(0, $xml_content, $from_appid); //增加appid，为了解决后面加密回复消息的时候没有appid的订阅号会无法回复

    }

}

/**
 * error code
 * 仅用作类内部使用，不用于官方API接口的errCode码
 */
class ErrorCode
{
    public static $OK = 0;
    public static $ValidateSignatureError = 40001;
    public static $ParseXmlError = 40002;
    public static $ComputeSignatureError = 40003;
    public static $IllegalAesKey = 40004;
    public static $ValidateAppidError = 40005;
    public static $EncryptAESError = 40006;
    public static $DecryptAESError = 40007;
    public static $IllegalBuffer = 40008;
    public static $EncodeBase64Error = 40009;
    public static $DecodeBase64Error = 40010;
    public static $GenReturnXmlError = 40011;
    public static $errCode = array(
        '0' => '处理成功',
        '40001' => '校验签名失败',
        '40002' => '解析xml失败',
        '40003' => '计算签名失败',
        '40004' => '不合法的AESKey',
        '40005' => '校验AppID失败',
        '40006' => 'AES加密失败',
        '40007' => 'AES解密失败',
        '40008' => '公众平台发送的xml不合法',
        '40009' => 'Base64编码失败',
        '40010' => 'Base64解码失败',
        '40011' => '公众帐号生成回包xml失败'
    );

    public static function getErrText($err)
    {
        if (isset(self::$errCode[$err])) {
            return self::$errCode[$err];
        } else {
            return false;
        };
    }
}