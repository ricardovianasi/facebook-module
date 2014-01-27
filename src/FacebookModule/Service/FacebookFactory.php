<?php
namespace FacebookModule\Service;

class FacebookFactory extends AbstractFactory {

	/* (non-PHPdoc)
	 * @see \Zend\ServiceManager\FactoryInterface::createService()
	 */
	public function createService(\Zend\ServiceManager\ServiceLocatorInterface $sl) {
	    
	    $options = $this->getOpitons($sl, 'facebook');

	    require_once __DIR__ . '\../../../facebook-php-sdk-master/src/facebook.php';	    
	    $facebook = new \Facebook($options);
	    
	    return $facebook;
	}
}