<?php
/**
 * Coolcsn Zend Framework 2 Navigation Module
 * 
 * @link https://github.com/coolcsn/CsnAclNavigation for the canonical source repository
 * @copyright Copyright (c) 2005-2013 LightSoft 2005 Ltd. Bulgaria
 * @license https://github.com/coolcsn/CsnAclNavigation/blob/master/LICENSE BSDLicense
 * @authors Stoyan Cheresharov <stoyan@coolcsn.com>, Anton Tonev <atonevbg@gmail.com>
*/

return array(
     'navigation' => array(
         'default' => array(
             array(
                 'label' => '<i class="fa fa-home fa-2x"></i>'.' HOME',
                 'route' => 'home',
				 'resource' => 'Application\Controller\Index',
				 'privilege' => 'index',
             ),

             array(
                 'label' => '<i class="fa fa-info-circle fa-2x"></i>'.' ABOUT',
                 'route' => 'about',
				 'resource' => 'Application\Controller\Index',
				 'privilege' => 'about',
             ),

             array(
                 'label' => '<i class="fa fa-question-circle fa-2x"></i>'.' FAQ',
                 'route' => 'faq',
				 'resource' => 'Application\Controller\Index',
				 'privilege' => 'faq',
             ),

            array(
                 'label' => '<i class="fa fa-fax fa-2x"></i>'.' CONTACT',
                 'route' => 'feedback',
                 'controller' => 'Feedback',
                 'action'     => 'add',
                 'resource' => 'Feedback\Controller\Feedback',
                 'privilege' => 'add',
             ),

            array(
               //  'label' => '<i class="fa fa-pied-piper-alt fa-2x"></i>'.' ADMIN',
            	 'label' => '<i class="fa fa-cog fa-spin fa-2x"></i>'.' ADMIN',
                 'route' => 'adm',
				 'controller' => 'Admin',
				 'action'     => 'index',
				 'resource'	  => 'Admin\Controller\Admin',
				 'privilege'  => 'index',
             ),

			 array(
                 'label' => '<i class="fa fa-sign-in fa-2x"></i>'.' LOGIN',
                 'route' => 'user-index', 
				 'controller' => 'Index',
				 'action'     => 'login',
				 'resource'	  => 'CsnUser\Controller\Index',
				 'privilege'  => 'login',
             ),

            array(
                 'label' => '<i class="fa fa-sign-out fa-2x"></i>'.' LOGOUT',
                 'route' => 'user-index', 
				 'controller' => 'Index',
				 'action'     => 'logout',
				 'resource'	  => 'CsnUser\Controller\Index',
				 'privilege'  => 'logout'
             ),

            array(
                 'label' => '<i class="fa fa-plus-circle fa-2x"></i>'.' REGISTER',
                 'route' => 'user-register', 
				 'controller' => 'Registration',
				 'action'     => 'index',
				 'resource'	  => 'CsnUser\Controller\Registration',
				 'privilege'  => 'index',
				 'title'	  => 'Registration Form'
             ),

 /*            array(
                 'label' => 'USER',
                 'route' => 'user-index', 
				 'controller' => 'Index',
				 'action'     => 'index',
				 'resource'	  => 'CsnUser\Controller\Index',
				 'privilege'  => 'index',
             ),
*/

/*             array(
                 'label' => 'Edit profile',
                 'route' => 'editProfile', 
				 'controller' => 'Registration',
				 'action'     => 'editProfile',
				 'resource'	  => 'CsnUser\Controller\Registration',
				 'privilege'  => 'editProfile',
             ),

/*			array(
				'label' => 'Zend',
				'uri'   => 'http://framework.zend.com/',
				'resource' => 'Zend',
				'privilege'	=>	'uri'
			),
*/

			
		 ),
	 ),
     'service_manager' => array(
         'factories' => array(
             'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
         ),
     ),
);