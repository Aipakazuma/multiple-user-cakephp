<?php
App::uses('UsersType', 'Model');

/**
 * UsersType Test Case
 */
class UsersTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.users_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UsersType = ClassRegistry::init('UsersType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UsersType);

		parent::tearDown();
	}

}
