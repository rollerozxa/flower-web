<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class HeapTest extends TestCase {
	public function testHeapprize(): void {
		$this->assertEquals(
			'+2 PGM',
			heapprize(6)
		);
	}

	public function testHeapsize(): void {
		$this->assertEquals(
			3000000000,
			heapsize(6)
		);
	}
}