<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class CoreTest extends TestCase {
	public function testStartsWithTrue(): void {
		$this->assertTrue(
			startsWith('rose', 'ros')
		);
	}

	public function testNumberBetweenNull(): void {
		$this->assertNull(
			number_between('orchid', 'iris', 'daisy')
		);
	}
	public function testNumberBetween(): void {
		$this->assertTrue(
			number_between(2, 1, 3)
		);
	}
}