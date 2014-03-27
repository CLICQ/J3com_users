<?php
/**
 * @version SVN: $Id$
 * @package    com_userprofile
 * @author     Mathias Hortig {@link http://tuts4you.de/}
 * @license    GNU/GPL
 */

defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.view');
 
 
class UserProfileViewUserProfile extends JViewLegacy
{
    function display($tpl = null)
    {
      $model = &$this->getModel();
      $uid = JRequest::getInt( 'id' );
      if( $uid > 0) {
         $html = $model->GetUserDetails($uid);
      }
      else
      {
         $page = JRequest::getInt( 'page' );
         $html = $model->GetUserList($page);
      }

      $this->assignRef( 'html',$html );

      parent::display($tpl);
    }

}
