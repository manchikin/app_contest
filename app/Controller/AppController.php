<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('HttpSocket', 'Network/Http');
App::uses('Xml', 'Utility');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
 class AppController extends Controller {
    public $components = ['DebugKit.Toolbar', 'Session', 'Cookie','Flash',
                          'Auth' => [
                          'loginAction' => [
                              'controller' => 'login',
                              'action' => 'index'
                          ],
                          'loginRedirect' => [
                             'controller' => 'admin',
                             'action' => 'index'
                           ],
                          'logoutRedirect'=> [
                             'controller' => 'login',
                             'action' => 'logout'
                           ],
                          'authError' => 'Did you really think you are allowed to see that?',
                          'authenticate' => [
                              'Form' => [
                                  'userModel' => 'User',
                                  'fields' => [
                                    'username' => 'login_name',
                                    'password' => 'password'
                                  ]
                              ]
                          ]]];
    public $helpers = ['Less.Less'];

    public function beforeFilter()
    {
        $this->set('Auth', $this->Auth->user());
        switch ($this->name) {
            case 'Login':
                $this->layout = 'layout_login';
                break;
            default :

        }
    }


    /**
     * AmazonAPIにリクエストを投げ、結果のxmlを配列化して返却する
     *
     * @param string $operation [検索 => "ItemSearch", ISBNで指定 => "ItemLookup"]
     * @param string $keywords 検索時使用する文字列
     * @return array xml化したAPIレスポンス
     *
     */
    protected function getApiResponseByArray($operation, $keywords)
    {
      $aws_access_key_id = API_ACCESS_KEY;
      $aws_secret_key = API_SECRET_KEY;
      $endpoint = API_END_POINT;
      $uri = API_URI;

      $params = [
          "Service"        => API_SERVICE,
          "Operation"      => $operation,
          "AWSAccessKeyId" => API_ACCESS_KEY,
          "AssociateTag"   => API_ASSOCIATE_TAG,
          // "ItemId" => "4873115655",
          // "IdType" => "ISBN",
          "ResponseGroup"  => "Images,ItemAttributes,Offers",
          "SearchIndex"    => "Books",
          "Keywords"       => $keywords,
          "Timestamp"      => gmdate('Y-m-d\TH:i:s\Z'),
          "Version"        => "2013-08-01"
      ];

      ksort($params);
      $canonical_query_string = http_build_query($params);

      // 署名に必要な文字列を先頭に追加します。
      $string_to_sign = "GET\n".$endpoint."\n".$uri."\n".$canonical_query_string;
      $signature = base64_encode(hash_hmac("sha256", $string_to_sign, $aws_secret_key, true));

      // Siginatureの値のURLエンコードを行い、リクエストの最後に追加します。
      $request_url = 'http://'.$endpoint.$uri.'?'.$canonical_query_string.'&Signature='.rawurlencode($signature);

      $HttpSocket = new HttpSocket();
      $result = $HttpSocket->get('http://'.$endpoint.$uri, $canonical_query_string.'&Signature='.rawurlencode($signature));
      $xml = Xml::build($result['body']);
      return Xml::toArray($xml);
    }

 }
