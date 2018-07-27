<?php

class Redstage_CategoryDefaultView_Block_Toolbar extends Mage_Catalog_Block_Product_List_Toolbar
{

	public function getCurrentMode()
	{
		$mode = $this->_getData('_current_grid_mode');
		if ($mode) {
			return $mode;
		}
		$modes = array_keys($this->_availableMode);
		$defaultMode = current($modes);

		// CUSTOM REDSTAGE
		if( $current_category = Mage::registry('current_category') ){
			$current_category = $current_category->load( $current_category->getId() );
			if( $current_category->getData('category_default_view') == 'grid' || $current_category->getData('category_default_view') == 'list' ){
				$defaultMode = $current_category->getData('category_default_view'); // load category's setting
			}
		}
		// END CUSTOM REDSTAGE

		$mode = $this->getRequest()->getParam($this->getModeVarName());
		if ($mode) {
			if ($mode == $defaultMode) {
				Mage::getSingleton('catalog/session')->unsDisplayMode();
			} else {
				$this->_memorizeParam('display_mode', $mode);
			}
		} else {
			$mode = Mage::getSingleton('catalog/session')->getDisplayMode();
		}

		if (!$mode || !isset($this->_availableMode[$mode])) {
			$mode = $defaultMode;
		}
		$this->setData('_current_grid_mode', $mode);
		return $mode;
	}
}
