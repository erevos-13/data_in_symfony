<?php


namespace AppBundle\Menu;

use Knp\Menu\MenuFactory;


/**
* 
*/
class Builder
{
	
	public function mainMenu(MenuFactory  $factory  )
	{

		$menu = $factory->createItem('root');
		$menu->setChildrenAttribute('class', 'nav navbar-nav');
		$menu->addChild('Home',['route' => 'homepage'] );
        $menu->addChild('Display',['route' => 'desplay'] );
        $menu->addChild('Manage Info',['route' => 'people_index'] );
        $menu->addChild('Profile',['route' => 'fos_user_profile_show'] );
        $menu->addChild('Register',['route' => 'fos_user_registration_register'] );
        $menu->addChild('Insert Customer',['route' => 'people_new'] );










		return $menu;
	}
}


?>