<?php
/**
 * @copyright  Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Tests\Unit\Event\Stubs;

use Joomla\Event\Event;

/**
 * A listener used to test the triggerEvent method in the dispatcher.
 * It will be added in second position.
 *
 * @since  1.0
 */
class SecondListener
{
	/**
	 * Listen to onSomething.
	 *
	 * @param   Event $event The event.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onSomething(Event $event)
	{
		$listeners = $event->getArgument('listeners');

		$listeners[] = 'second';

		$event->setArgument('listeners', $listeners);
	}
}
