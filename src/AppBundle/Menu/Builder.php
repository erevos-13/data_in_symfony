<?php


namespace AppBundle\Menu;

use Knp\Menu\MenuFactory;


/**
* 
*/
class Builder
{
	
	public function mainMenu(MenuFactory  $factory , array $options )
	{

		$menu = $factory->createItem('root');
		$menu->setChildrenAttribute('class', 'nav navbar-nav');
		$menu->addChild('Home',['route' => 'homepage'] );
        $menu->addChild('Display',['route' => 'desplay'] );
        $menu->addChild('Manage Info',['route' => 'people_index'] );
        $menu->addChild('Profile',['route' => 'fos_user_profile_show'] );
        $menu->addChild('Login',['route' => 'fos_user_security_login'] );
        $menu->addChild('Register',['route' => 'fos_user_registration_register'] );
        $menu->addChild('Insert Camper',['route' => 'people_new'] );
        $menu->addChild('LogOut',['route' => 'fos_user_security_logout'] );








		return $menu;
	}
}


?>