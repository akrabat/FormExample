<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\RetrievePassword as RetrievePasswordForm;
use Application\Form\Bug as BugForm;
use Application\Form\RetrievePasswordFilter;
use Application\Service\PasswordRetrieval as PasswordRetrievalService;
use Application\Entity\Bug;
use Zend\Debug\Debug;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
    }

    public function retrievePasswordAction()
    {
        $form = new RetrievePasswordForm();

        $form->setInputFilter(new RetrievePasswordFilter());

        $passwordRetrieval = new PasswordRetrievalService;
        $form->bind($passwordRetrieval);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                // Valid
                $passwordRetrieval->sendLostPasswordEmail();
                die("success");
            }
        }

        return array('form' => $form);        
    }

    public function bugAction()
    {
        $form = new BugForm();

        $bug = new Bug();
        $form->bind($bug);

        if ($this->request->isPost()) {
            LDBG($this->request->getPost());
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                var_dump($bug);
            }
            LDBG($form->getMessages());exit;
        }


        return array('form' => $form);        
    }

}
