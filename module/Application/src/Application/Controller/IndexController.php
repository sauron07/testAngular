<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Doctrine\ORM\Query;
use Zend\Mvc\Application;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public $jsonModel;

    public function __construct()
    {
        $jsonModel = new JsonModel();
    }

    public function indexAction()
    {
        return new ViewModel();
    }

    /**
     * @return \Zend\Http\Response
     */
    public function getAllUsersAction()
    {
        $userRepository = $this->getUserRepository();
        $users = $userRepository->getAll();

        $this->response->setContent(json_encode($users));

        return $this->response;
    }

    public function createUserAction()
    {
        $data = $this->getPostData();
        $user = new \Application\Entity\User();
        $this->getUserRepository()->createUser($user, $data);

        return new JsonModel(['success' => true]);
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getObjectManager()
    {
        return $objectManager = $this
            ->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');
    }

    /**
     * @return \Application\Repository\Users
     */
    protected function getUserRepository()
    {
        $manager = $this->getObjectManager();
        /** @var \Application\Repository\Users $users */
        return $manager->getRepository('Application\Entity\User');
    }

    private function getPostData()
    {
        return json_decode(file_get_contents("php://input"));
    }
}
