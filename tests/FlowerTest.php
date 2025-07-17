<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class FlowerTest extends TestCase {
	public function testResourceformat(): void {
		$this->assertEquals(
			'100.00',
			resourceformat(100)
		);
	}
	public function testFormatheight(): void {
		$this->assertEquals(
			'3 034.00000000',
			formatheight(3034)
		);
	}
}