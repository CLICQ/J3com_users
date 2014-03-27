<?php
/**
 * @version SVN: $Id$
 * @package    com_userprofile
 * @author     Mathias Hortig {@link http://tuts4you.de/}
 * @license    GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
// Require the base controller
 
 
$document = &JFactory::getDocument();
$document->addStyleSheet('components/com_userprofile/css/userprofile.css');

require_once( JPATH_COMPONENT.'/controller.php' );
 
// Require specific controller if requested
if($controller = JRequest::getWord('controller')) {
    $path = JPATH_COMPONENT.'/controllers/'.$controller.'.php';
    if (file_exists($path)) {
        require_once $path;
    } else {
        $controller = '';
    }
}
 
// Create the controller
$classname    = 'UserProfileController'.$controller;
$controller   = new $classname( );
 
// Perform the Request task

$controller->execute( JRequest::getInt('id') );
 
// Redirect if set by the controller
$controller->redirect();