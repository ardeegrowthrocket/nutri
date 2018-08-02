<?php

require_once( './../app/Mage.php' );
umask( 0 );
Mage::app();

//echo Mage::helper('core')->decrypt( 'hOo/C/ICK2s=' );
//echo Mage::helper('core')->encrypt( 'nutrigineering2017' );
echo Mage::helper('core')->encrypt( 'nutrigineering' );