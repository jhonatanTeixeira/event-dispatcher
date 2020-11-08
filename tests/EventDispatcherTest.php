<?php

namespace Vox\Event;

use PHPUnit\Framework\TestCase;

class EventDispatcherTest extends TestCase
{
    public function testShoudDispatchEvent() {
        $dispatcher = new EventDispatcher();
        $dispatcher->registerListener(new TestListener());

        $dispatcher->dispatch($event = new TestEvent());

        $this->assertTrue($event->called);
    }
}

class TestEvent {
    public bool $called = false;
}

class TestListener {
    public function __invoke(TestEvent $testEvent)
    {
        $testEvent->called = true;
    }
}