<?php

class LinkController extends yupe\components\controllers\FrontController
{

    public function actionRedirect($code)
    {
        //print_r($_GET);die;
        $link=Link::model()->getLinkByCode($code);
        if($link->type==Link::TYPE_COOKIE)
        {
            $cookies=json_decode($link->data,true);
            foreach($cookies as $cookie) {
                $cookie['expire'] += strtotime("now");
                Yii::app()->getRequest()->getCookies()->add($cookie['name'], new CHttpCookie($cookie['name'], $cookie['value'], $cookie));
            }
        }
        //Yii::app()->getRequest()->getCookies()->add
        //Yii::app()->getRequest()->getCookies()->add('ref',new CHttpCookie('ref',$info['partner'],['expire'=>strtotime("now")+60*60*12]));
        Yii::app()->notify->track("redirect_".$code);
        $link->visit();
        unset($_GET['code']);
        $query="";
        if(count($_GET)) {
            $parsed_url=parse_url($link->url);
            if(!isset($parsed_url['query']))
                $getarray=[];
            else
                parse_str($parsed_url['query'],$getarray);
            $parsed_url['query']=http_build_query(array_merge($getarray,$_GET));
            $builded_url=http_build_url($parsed_url);
            $this->redirect($builded_url);
            Yii::app()->end();
        }
        $this->redirect($link->url.$query);
    }

    public function actionBake()
    {
        if(Yii::app()->getRequest()->isAjaxRequest) {
            $expire=Yii::app()->getRequest()->getParam('cookie_expire');
            $expire=empty($expire)?0:$expire;
            $domain=Yii::app()->getRequest()->getParam('cookie_domain');
            $domain=empty($domain)?$_SERVER['HTTP_HOST']:$domain;
            $path=Yii::app()->getRequest()->getParam('cookie_path');
            $path=empty($path)?'/':$path;
            $cc[] = new CHttpCookie(Yii::app()->getRequest()->getParam('cookie_name'),
                Yii::app()->getRequest()->getParam('cookie_value'),
                [
                    'expire' => $expire,
                    'domain' => $domain,
                    'path'=> $path,
                ]);
            $jc = CJSON::encode($cc);
            $jc=str_replace(":"," : ",$jc);
            Yii::app()->ajax->success($jc);
        }
    }

}
