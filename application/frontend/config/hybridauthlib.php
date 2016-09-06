<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* !
 * HybridAuth
 * http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
 * (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
 */

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$config = array(
    // set on "base_url" the relative url that point to HybridAuth Endpoint
    'base_url' => '/hauth/endpoint',
    "providers" => array(
        // openid providers
        "OpenID" => array(
            "enabled" => true
        ),
        "Yahoo" => array(
            "enabled" => true,
            "keys" => array("id" => "dj0yJmk9NThhbzR3NkNsUWFYJmQ9WVdrOVluaGpPR2xTTTJNbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD1kNg--", "secret" => "77f0098186bff782359d2a242b7e2b5b3a9b05f1"),
        ),
        "AOL" => array(
            "enabled" => true
        ),
        "Google" => array(
            "enabled" => true,
            "keys" => array("id" => "", "secret" => ""),
            "scope" => "https://www.googleapis.com/auth/userinfo.profile " . // optional
                        "https://www.googleapis.com/auth/userinfo.email", // optional
//            "access_type" => "offline", // optional
//            "approval_prompt" => "force", // optional
//            "redirect_uri" => "https://www.linkeno.com/common/login/Google", // optional
        ),
        "Facebook" => array(
            "enabled" => true,
            "keys" => array("id" => "1112866792058068", "secret" => "1899c59c2c480c124c1ba3b47335adc6"),
            "scope" => "public_profile,email, user_about_me, user_birthday, user_hometown", // optional
            "display" => "popup" // optional
        ),
        "Twitter" => array(
            "enabled" => true,
            "keys" => array("key" => "wZ6AIun6G8NhgiqM7lrwclwyD", "secret" => "4d977c6c2da06034afec3c441edae044"),
            "includeEmail" => TRUE
        ),
        // windows live
        "Live" => array(
            "enabled" => true,
            "keys" => array("id" => "", "secret" => "")
        ),
        "MySpace" => array(
            "enabled" => true,
            "keys" => array("key" => "", "secret" => "")
        ),
        "LinkedIn" => array(
            "enabled" => true,
            "keys" => array("key" => "78w0qyk9v7wme6", "secret" => "3NXbsDGqlnCZHo3i")
        ),
        "Foursquare" => array(
            "enabled" => true,
            "keys" => array("id" => "", "secret" => "")
        ),
    ),
    // if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
    "debug_mode" => (ENVIRONMENT == 'development'),
    "debug_file" => APPPATH . '/logs/hybridauth.log',
);


/* End of file hybridauthlib.php */
/* Location: ./application/config/hybridauthlib.php */
