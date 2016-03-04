<?php
namespace App\View\Cell;

use Cake\View\Cell;

class MenuCell extends  Cell {
		
	protected $_validCellOptions = [];
	
    public function display() {
	
		$menu = "
			<a href='/' >Home</a>
			<a href='Headers' >Header</a>
			<a href='Contents' >Seiten</a>
			<a href='Footers' >Footer</a>
		";
		
		$this->set('menus', $menu);
    }
}

?>