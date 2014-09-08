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
        $manager = $this->getObjectManager();
        $users = $manager->getRepository('Application\Entity\User')->findAll();
        var_dump($users); die;

        $this->response->setContent(json_encode($users));

        return $this->response;
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
}
