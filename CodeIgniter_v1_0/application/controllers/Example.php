<?php

class Example extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        $fb_config = array(
            'appId'  => '241223852666797',
            'secret' => 'b32fd391fd3f2f1e20e8482e0ddb16b3'
        );

        $this->load->library('facebook', $fb_config);

        $user = $this->facebook->getUser();

        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }

        if ($user) {
            $data['logout_url'] = $this->facebook->getLogoutUrl();
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl();
        }

        $this->load->view('view',$data);
    }
}