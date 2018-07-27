<?php

class Redstage_CategoryDefaultView_Model_Resource_Eav_Mysql4_Setup extends Mage_Eav_Model_Entity_Setup
{

	/**
	 * @return array
	 */
	public function getDefaultEntities()
	{

		return array(
			'catalog_category' => array(
				'entity_model'      => 'catalog/category',
				'attribute_model'   => 'catalog/resource_eav_attribute',
				'table'             => 'catalog/category',
				'additional_attribute_table' => 'catalog/eav_attribute',
				'entity_attribute_collection' => 'catalog/category_attribute_collection',
				'attributes'        => array(
					'category_default_view' => array(
						'group'             => 'General',
						'label'             => 'Category Default View',
						'type'              => 'varchar',
						'input'             => 'select',
						'default'           => '0',
						'class'             => '',
						'backend'           => '',
						'frontend'          => '',
						'source'            => 'categorydefaultview/mode',
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

				)
			)

		);

	}

}

?>