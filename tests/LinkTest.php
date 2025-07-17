<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

$uid = 'TESTUID';
$gid = 'Daisy';

final class LinkTest extends TestCase {
	public function testPagebase(): void {
		$this->assertEquals(
			'?uid=TESTUID&gid=Daisy',
			pagebase()
		);
	}
	
	public function testPagelink(): void {
		$this->assertStringContainsString(
			'&show=1',
			pagelink(1)
		);
	}
	
	public function testAlink(): void {
		$this->assertStringContainsString(
			'&a=buysomething&quantity=42',
			alink(1, 'buysomething', 42)
		);
	}
}