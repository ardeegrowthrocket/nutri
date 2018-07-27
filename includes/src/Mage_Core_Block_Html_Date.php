<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Mage
 * @package     Mage_Core
 * @copyright  Copyright (c) 2006-2017 X.commerce, Inc. and affiliates (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * HTML select element block
 *
 * @category   Mage
 * @package    Mage_Core
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Core_Block_Html_Date extends Mage_Core_Block_Template
{

	protected function _toHtml()
	{

		$nextSunday = strtotime( 'Next Sunday' );

		$displayFormat = Varien_Date::convertZendToStrFtime($this->getFormat(), true, (bool)$this->getTime());

		$html  = '<input type="text" name="' . $this->getName() . '" id="' . $this->getId() . '" ';
		$html .= 'value="' . ( $this->getValue() ? $this->escapeHtml($this->getValue()) : date( 'm/d/Y', $nextSunday ) ) . '" class="' . $this->getClass() . '" ' . $this->getExtraParams() . '/> ';

		$html .= '<img src="' . $this->getImage() . '" alt="' . $this->helper('core')->__('Select Date') . '" class="v-middle calendar-button" ';
		$html .= 'title="' . $this->helper('core')->__('Select Date') . '" id="' . $this->getId() . '_trig" />';

		$html .= '<div class="cash-check-clearance-disclaimer"'. ( ( date( 'd', $nextSunday ) - date( 'd' ) ) >= 7 ? ' style="display:none;"' : '' ) .'>(If paying by cash or check, verifying clearance of funds may delay your start date.)</div>';

		$html .=
		'<script type="text/javascript">
		//<![CDATA[
			var calendarSetupObject = {
				inputField  : "' . $this->getId() . '",
				ifFormat    : "' . $displayFormat . '",
				showsTime   : "' . ($this->getTime() ? 'true' : 'false') . '",
				//button      : "' . $this->getId() . '_trig",
				button		: "' . $this->getId() . '",
				align       : "Bl",
				singleClick : true,
				weekNumbers : false,
				disableFunc: function(date) {
					var now = new Date();
					if(date.getFullYear()   <   now.getFullYear())  { return true; }
					if(date.getFullYear()   ==  now.getFullYear())  { if(date.getMonth()    <   now.getMonth()) { return true; } }
					if(date.getMonth()      ==  now.getMonth())     { if(date.getDate()     <=   now.getDate())  { return true; } }
					if( ( date.getTime() - now.getTime() ) < 432000000 ){ return true; } // 5 days in milliseconds
					return ( date.getDay() > 0 );
				},
				onClose : function( incoming ){
					var now = new Date();
					if( ( incoming.date.getTime() - now.getTime() ) < 604800000 ){ // 7 days in milliseconds
						jQuery( \'.cash-check-clearance-disclaimer\' ).show();
					} else {
						jQuery( \'.cash-check-clearance-disclaimer\' ).hide();
					}
					incoming.hide();
				}
			}';

		$calendarYearsRange = $this->getYearsRange();
		if ($calendarYearsRange) {
			$html .= '
				calendarSetupObject.range = ' . $calendarYearsRange . '
				';
		}

		$html .= '
			Calendar.setup(calendarSetupObject);
		//]]>
		</script>';


		return $html;
	}

	public function getEscapedValue($index=null) {

		if($this->getFormat() && $this->getValue()) {
			return strftime($this->getFormat(), strtotime($this->getValue()));
		}

		return htmlspecialchars($this->getValue());
	}

	public function getHtml()
	{
		return $this->toHtml();
	}

}
