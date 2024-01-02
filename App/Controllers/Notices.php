<?php
/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */
namespace App\Controllers;

use App\Models\Notice;
use \Core\View;

 
class Notices extends \Core\Controller
{
  /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
    }

    public function indexAction()
    {

        $notices = Notice::getAll();
        view::render('notices/index.php', $notices, 'default');
    }
  

    public function detailsAction()
    {
        $data = getPostData();
        if(isset($data['id'])){
            $id = $data['id'];
            $notice = Notice::getById($id);
        }else{
            $notice = array();
        }

        view::render('notices/details.php', $notice, 'default');
    }
    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        //echo " (after)";
    }

}