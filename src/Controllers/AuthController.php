<?php
/**
 * File name: AuthController.php
 *
 * Project: Project1
 *
 * PHP version 5
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Controllers;


/**
 * Class AuthController
 */
class AuthController extends Controller
{
    /**
     * Function execute
     *
     * @access public
     */
    public function action()
    {
        $postData = $this->request->getPost();

        //echo 'Authenticate the above two different ways' . var_dump($postData);
        if ($postData->authType === 'file') {
            $auth = new \Common\Authentication\FileBased($postData->username, $postData->password);
        } else if ($postData->authType === 'memory') {
            $auth = new \Common\Authentication\InMemory($postData->username, $postData->password);
        } else if ($postData->authType === 'database') {
            $auth = new \Common\Authentication\Database($postData->username, $postData->password);
        }

        echo $auth->authenticate();
    }
}
