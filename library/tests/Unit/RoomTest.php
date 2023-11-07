<?php

namespace Tests\Unit;

use App\Room;
use PHPUnit\Framework\TestCase;

class RoomTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function testHas(): void
    {
        $room = new Room(["Bonni", "Clyde"]);
        $this->assertTrue($room->has("Bonni"));
    }

    public function testHasnt(): void
    {
        $room = new Room(["Bonni", "Clyde"]);
        $this->assertFalse($room->has("Iron Man"));
    }

    public function testContains(): void
    {
        $room = new Room(["Bonni"]);
        $this->assertContains("Thor Ta", $room->add("Thor Ta"));
    }

    public function testCount(): void
    {
        $room = new Room(["Clyde", "Bonnie"]);
        $this->assertCount(1, $room->remove("Bonnie"));
    }

    public function testUres(): void
    {
        $room = new Room(["Bonni"]);        
        $this->assertEquals('Bonni', $room->takeOne());
        $this->assertNull($room->takeOne());
    }
}
