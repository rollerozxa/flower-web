<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class ChatTest extends TestCase {
	public function testTimeSeconds(): void {
		$this->assertStringContainsString(
			'seconds',
			chat_time(42)
		);
	}
	public function testTimeMinutesSingular(): void {
		$this->assertStringContainsString(
			'minute',
			chat_time(60)
		);
	}
	public function testTimeMinutesPlural(): void {
		$this->assertStringContainsString(
			'minutes',
			chat_time(61)
		);
	}
	public function testTimeHoursSingular(): void {
		$this->assertStringContainsString(
			'hour',
			chat_time(60 * 60)
		);
	}
	public function testTimeHoursPlural(): void {
		$this->assertStringContainsString(
			'hours',
			chat_time(60 * 60 + 60)
		);
	}
	public function testTimeDaysSingular(): void {
		$this->assertStringContainsString(
			'day',
			chat_time(60 * 60 * 24)
		);
	}
	public function testTimeDaysPlural(): void {
		$this->assertStringContainsString(
			'days',
			chat_time((60 * 60 * 24) * 2)
		);
	}

	public function testPostcodeBanMessage(): void {
		$this->assertEquals(
			'I was bad',
			chat_postcode('blarg', 0)
		);
	}
	public function testPostcodeHTMLEscape(): void {
		$this->assertNotEquals(
			'<blink>',
			chat_postcode('<blink>', 1)
		);
	}
	public function testPostcodeHTMLBypass(): void {
		$this->assertEquals(
			'<blink>',
			chat_postcode('<blink>', 4)
		);
	}
	public function testPostcodeLink(): void {
		$this->assertEquals(
			'<a href="http://example.org">Example link</a>',
			chat_postcode('[url=http://example.org]Example link[/url]', 4)
		);
	}
	public function testPostcodeModtext(): void {
		$this->assertEquals(
			'<strong style="color:purple">tulip</strong>',
			chat_postcode('[mod]tulip[/mod]', 4)
		);
	}
	public function testBoldItalicsAndUnderline(): void {
		$this->assertEquals(
			'<strong>Bold</strong><em>Italics</em><u>Underline</u>',
			chat_postcode('[b]Bold[/b][i]Italics[/i][u]Underline[/u]', 1)
		);
	}
}