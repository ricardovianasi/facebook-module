<?php
namespace FacebookModule\Service;

class FacebookFactory extends AbstractFactory {

	/* (non-PHPdoc)
	 * @see \Zend\ServiceManager\FactoryInterface::createService()
	 */
	public function createService(\Zend\ServiceManager\ServiceLocatorInterface $sl) {
	    
	    $options = $this->getOpitons($sl, 'facebook');
	    $facebook = new \Facebook($options);
	    
	    return $facebook;
	}
}