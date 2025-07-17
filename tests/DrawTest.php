<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class DrawTest extends TestCase {
	private $awards = [
		['odds' => 1, 'id' => 'award1', 'desc' => 'Test Award 1'],
		['odds' => 2, 'id' => 'award2', 'desc' => 'Test Award 2'],
		['odds' => 4, 'id' => 'award3', 'desc' => 'Test Award 3'],
		['odds' => 8, 'id' => 'award4', 'desc' => 'Test Award 4'],
	];

	private $quantity = 4;

	public function testPrizemaster(): void {
		$draw = new DrawMaster($this->awards, $this->quantity);

		$rewards = $draw->getRewards();

		$this->assertEquals(4, $rewards['award1']);
		$this->assertEquals(2, $rewards['award2']);
		$this->assertEquals(1, $rewards['award3']);
		$this->assertEquals(0, $rewards['award4']);
	}

	public function testPrizemasterHTML(): void {
		$draw = new DrawMaster($this->awards, $this->quantity);

		$rewardList = $draw->getRewardList();

		$this->assertStringContainsString('Test Award 1 (x4)', $rewardList);
		$this->assertStringContainsString('Test Award 2 (x2)', $rewardList);
		$this->assertStringContainsString('Test Award 3 (x1)', $rewardList);
		$this->assertStringNotContainsString('Test Award 4', $rewardList);
	}

	public function testPrizemasterHTMLNothing(): void {
		$draw = new DrawMaster($this->awards, 0);

		$this->assertStringContainsString('Nothing', $draw->getRewardList());
	}
}