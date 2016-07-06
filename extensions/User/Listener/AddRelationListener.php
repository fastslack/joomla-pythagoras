<?php
/**
 * Part of the Joomla! User Extension Package
 *
 * @copyright  Copyright (C) 2015 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Extension\User\Listener;


use Joomla\ORM\Event\AfterCreateDefinitionEvent;
use Joomla\ORM\Definition\Parser\Relation;
use Joomla\ORM\Definition\Locator\Locator;
use Joomla\ORM\Definition\Locator\Strategy\RecursiveDirectoryStrategy;
use Joomla\ORM\Definition\Parser\HasOne;

/**
 * Class AddRelationListener
 *
 * @package Joomla\Extension\User
 *
 * @since   1.0
 */
class AddRelationListener
{
	/**
	 * Event handler
	 *
	 * @param   AfterCreateDefinitionEvent $event The event
	 *
	 * @return  void
	 */
	public function addAuthorRelation(AfterCreateDefinitionEvent $event)
	{
		// @todo belongs to the relation table as well
		if ($event->getArgument('entityName') != 'Article')
		{
			return ;
		}

		/** @var \Joomla\ORM\Entity\EntityBuilder $builder */
		$builder = $event->getArgument('builder');

		// @todo the relation needs to be looked up here trough a relation table
		$id = 1;

		$relation = new HasOne(['id' => 1, 'name' => 'author_id', 'type' => 'hasOne', 'entity' => 'User', 'reference' => 'id']);

		$builder->handleHasOne($relation, new Locator([new RecursiveDirectoryStrategy(__DIR__ . '/../Entity')]));
	}
}