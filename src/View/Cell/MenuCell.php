<?php
namespace App\View\Cell;

use Cake\View\Cell;

class MenuCell extends  Cell {
		
	protected $_validCellOptions = [];
	
    public function display() {
	
		$menu = "
			<a href='Homes' >Home</a>
			<a href='Starts' >Startseite</a>
			<a href='Banners' >Banner</a>
			<a href='Contents' >Seiten</a>
			<a href='Footers' >Footer</a>
			<a href='Templates' >Template</a>
			<a href='Pages' >MyHomepage</a>
			<a href='http://localhost:8765/users/logout' >Log Out</a>
		";
		
		$this->set('menus', $menu);
    }
}

?>