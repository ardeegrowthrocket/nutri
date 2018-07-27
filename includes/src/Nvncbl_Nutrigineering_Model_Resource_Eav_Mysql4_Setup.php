<?php

class Nvncbl_Nutrigineering_Model_Resource_Eav_Mysql4_Setup extends Mage_Eav_Model_Entity_Setup
{

	/**
	 * @return array
	 */
	public function getDefaultEntities()
	{

		return array(
			'customer' => array(
				'entity_model'      => 'customer/customer',
				'attribute_model'   => 'customer/attribute',
				'table'             => 'customer/entity',
				'additional_attribute_table' => 'customer/eav_attribute',
				'entity_attribute_collection' => 'customer/attribute_collection',
				'attributes'        => array(
					'clinic_id' => array(
						'group'             => 'General',
						'label'             => 'Clinic ID',
						'type'              => 'varchar',
						'input'             => 'text',
						'default'           => '',
						'class'             => '',
						'backend'           => '',
						'forms'             => 'adminhtml_customer',
						'frontend'          => '',
						'source'            => '',
						'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
						'visible'           => true,
						'required'          => false,
						'user_defined'      => false,
						'searchable'        => false,
						'filterable'        => false,
						'comparable'        => false,
						'visible_on_front'  => false,
						'visible_in_advanced_search' => false,
						'unique'            => false
					),
					'weight' => array(
						'group'             => 'General',
						'label'             => 'Weight',
						'type'              => 'varchar',
						'input'             => 'text',
						'default'           => '',
						'class'             => '',
						'backend'           => '',
						'forms'             => 'adminhtml_customer',
						'frontend'          => '',
						'source'            => '',
						'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
						'visible'           => true,
						'required'          => false,
						'user_defined'      => false,
						'searchable'        => false,
						'filterable'        => false,
						'comparable'        => false,
						'visible_on_front'  => false,
						'visible_in_advanced_search' => false,
						'unique'            => false
					),
					'height' => array(
						'group'             => 'General',
						'label'             => 'Height',
						'type'              => 'varchar',
						'input'             => 'text',
						'default'           => '',
						'class'             => '',
						'backend'           => '',
						'forms'             => 'adminhtml_customer',
						'frontend'          => '',
						'source'            => '',
						'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
						'visible'           => true,
						'required'          => false,
						'user_defined'      => false,
						'searchable'        => false,
						'filterable'        => false,
						'comparable'        => false,
						'visible_on_front'  => false,
						'visible_in_advanced_search' => false,
						'unique'            => false
					),
					'age' => array(
						'group'             => 'General',
						'label'             => 'Age',
						'type'              => 'varchar',
						'input'             => 'text',
						'default'           => '',
						'class'             => '',
						'backend'           => '',
						'forms'             => 'adminhtml_customer',
						'frontend'          => '',
						'source'            => '',
						'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
						'visible'           => true,
						'required'          => false,
						'user_defined'      => false,
						'searchable'        => false,
						'filterable'        => false,
						'comparable'        => false,
						'visible_on_front'  => false,
						'visible_in_advanced_search' => false,
						'unique'            => false
					),
					'activity_level' => array(
						'group'             => 'General',
						'label'             => 'Activity Level',
						'type'              => 'varchar',
						'input'             => 'text',
						'default'           => '',
						'class'             => '',
						'backend'           => '',
						'forms'             => 'adminhtml_customer',
						'frontend'          => '',
						'source'            => '',
						'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
						'visible'           => true,
						'required'          => false,
						'user_defined'      => false,
						'searchable'        => false,
						'filterable'        => false,
						'comparable'        => false,
						'visible_on_front'  => false,
						'visible_in_advanced_search' => false,
						'unique'            => false
					),
					'medical_symptoms_questionnaire' => array(
						'group'             => 'General',
						'label'             => 'Medical Symptoms Questionnaire',
						'type'              => 'text',
						'input'             => 'text',
						'default'           => '',
						'class'             => '',
						'backend'           => '',
						'forms'             => 'adminhtml_customer',
						'frontend'          => '',
						'source'            => '',
						'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
						'visible'           => true,
						'required'          => false,
						'user_defined'      => false,
						'searchable'        => false,
						'filterable'        => false,
						'comparable'        => false,
						'visible_on_front'  => false,
						'visible_in_advanced_search' => false,
						'unique'            => false
					)

				)
			)

		);

	}

}

?>