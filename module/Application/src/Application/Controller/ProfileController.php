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
use Hybrid_Auth;
use ScnSocialAuth\Mapper\Exception as MapperException;
use ScnSocialAuth\Mapper\UserProviderInterface;
use ScnSocialAuth\Options\ModuleOptions;

class ProfileController extends AbstractActionController
{
    public function indexAction()
    {
    	if ($this->zfcUserAuthentication()->hasIdentity()) {
    		//get the email of the user
    		echo $this->zfcUserAuthentication()->getIdentity()->getEmail();
    		//get the user_id of the user
    		echo $this->zfcUserAuthentication()->getIdentity()->getId();
    		//get the username of the user
    		echo $this->zfcUserAuthentication()->getIdentity()->getUsername();
    		//get the display name of the user
    		echo $this->zfcUserAuthentication()->getIdentity()->getDisplayname();
    	}else{
    		$zfcUserAuth = $this->zfcUserAuthentication();
    		echo "crap";
    	}
    	
    	//$authService = $this->zfcUserAuthentication()->getAuthService();
    	
    	// If user is not logged in, redirect to login page
    	//if (!$authService->hasIdentity()) {
    		//return $this->redirect()->toRoute('zfcuser/login');
    	//}
    	
    	return new ViewModel(array(
    			'user_data' => "crap",
    	));
    }
    
    public function profileAction()
    {
    	$config = dirname(__FILE__) . '/../../hybridauth/config.php';
    	require_once( "../../hybridauth/Hybrid/Auth.php" );
    	
    	$user_data = NULL;
    	
    	// try to get the user profile from an authenticated provider
    	try{
    		$hybridauth = new Hybrid_Auth( $config );
    	
    		// selected provider name
    		$provider = @ trim( strip_tags( $_GET["provider"] ) );
    	
    		// check if the user is currently connected to the selected provider
    		if( !  $hybridauth->isConnectedWith( $provider ) ){
    			// redirect him back to login page
    			header( "Location: user/login.php?error=Your are not connected to $provider or your session has expired" );
    		}
    	
    		// call back the requested provider adapter instance (no need to use authenticate() as we already did on login page)
    		$adapter = $hybridauth->getAdapter( $provider );
    	
    		// grab the user profile
    		$user_data = $adapter->getUserProfile();
    	}
    	catch( Exception $e ){
    		// In case we have errors 6 or 7, then we have to use Hybrid_Provider_Adapter::logout() to
    		// let hybridauth forget all about the user so we can try to authenticate again.
    	
    		// Display the recived error,
    		// to know more please refer to Exceptions handling section on the userguide
    		switch( $e->getCode() ){
    			case 0 : echo "Unspecified error."; break;
    			case 1 : echo "Hybriauth configuration error."; break;
    			case 2 : echo "Provider not properly configured."; break;
    			case 3 : echo "Unknown or disabled provider."; break;
    			case 4 : echo "Missing provider application credentials."; break;
    			case 5 : echo "Authentification failed. "
    					. "The user has canceled the authentication or the provider refused the connection.";
    			case 6 : echo "User profile request failed. Most likely the user is not connected "
    					. "to the provider and he should to authenticate again.";
    					$adapter->logout();
    					break;
    			case 7 : echo "User not connected to the provider.";
    			$adapter->logout();
    			break;
    		}
    	
    		echo "<br /><br /><b>Original error message:</b> " . $e->getMessage();
    	
    		echo "<hr /><h3>Trace</h3> <pre>" . $e->getTraceAsString() . "</pre>";
    	}
    	
    	return new ViewModel(array(
    			'user_data' => $user_data,
    	));
    	
    }
}
