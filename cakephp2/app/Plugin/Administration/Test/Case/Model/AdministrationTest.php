<?php
App::uses('Administration', 'Administration.Model');

/**
 * Administration Test Case
 */
class AdministrationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.administration.administration'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Administration = ClassRegistry::init('Administration.Administration');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Administration);

		parent::tearDown();
	}

}
