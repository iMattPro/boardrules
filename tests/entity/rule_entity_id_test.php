<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2013 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\entity;

/**
* Tests related to ids on rule entity
*/
class rule_entity_id_test extends rule_entity_base
{
	/**
	* Test data for the test_id() function
	*
	* @return array Array of test data
	*/
	public function id_test_data()
	{
		$import_data = $this->get_import_data();

		return array(
			array(
				$import_data[1],
				1,
			),
			array(
				$import_data[2],
				2,
			),
			array(
				$import_data[3],
				3,
			),
			array(
				$import_data[4],
				4,
			),
		);
	}

	/**
	* Test getting id
	*
	* @dataProvider id_test_data
	*/
	public function test_id($data, $expected)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Set the data
		$entity->import($data);

		// Assert that the id matches what is expected
		self::assertEquals($expected, $entity->get_id());
	}
}
