<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class BulkTest extends TestCase {
	public function testBulkSale(): void {
		$this->assertEquals(
			(date('d') == 31 ? true : false),
			bulksale()
		);
	}

	public function testBulkPrice(): void {
		$this->assertEquals(
			(bulksale() ? 30 : 40),
			getbulkprice()
		);
	}
}