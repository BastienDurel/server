<?php
/**
 * @copyright Copyright (c) 2016 Lukas Reschke <lukas@statuscode.ch>
 *
 * @author Lukas Reschke <lukas@statuscode.ch>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\Theming\Tests\Settings;

use OCA\Theming\Settings\Section;
use OCP\IL10N;
use Test\TestCase;

class SectionTest extends TestCase {
	/** @var IL10N */
	private $l;
	/** @var Section */
	private $section;

	public function setUp() {
		parent::setUp();
		$this->l = $this->getMockBuilder('\OCP\IL10N')->getMock();

		$this->section = new Section(
			$this->l
		);
	}

	public function testGetID() {
		$this->assertSame('theming', $this->section->getID());
	}

	public function testGetName() {
		$this->l
			->expects($this->once())
			->method('t')
			->with('Theming')
			->willReturn('Theming');

		$this->assertSame('Theming', $this->section->getName());
	}

	public function testGetPriority() {
		$this->assertSame(30, $this->section->getPriority());
	}
}
