<?php
/**
 * @version SVN: $Id$
 * @package    com_userprofile
 * @author     Mathias Hortig {@link http://tuts4you.de/}
 * @license    GNU/GPL
 */

function UserProfileBuildRoute(&$query)
{
  $segments = array();
  unset($query['view']);
  if(isset($query['id'])) {
    $segments[] = $query['id'];

    unset($query['id']);
  };

  if(isset($query['page'])) {
    $segments[] = "page";
    $segments[] = $query['page'];
    unset($query['page']);
  };

  return $segments;
}

function UserProfileParseRoute($segments)
{
    $vars = array();
    if($segments[0] == "page")
    {
      $vars['page'] = $segments[1];
    }
    else
    {
      $vars['id']    = $segments[0];
    }
    return $vars;
}