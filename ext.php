<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2013 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules;

/**
* Extension class for custom enable/disable/purge actions
*
* NOTE TO EXTENSION DEVELOPERS:
* Normally it is not necessary to define any functions inside the ext class below.
* The ext class may contain special (un)installation commands in the methods
* enable_step(), disable_step() and purge_step(). As it is, these methods are defined
* in phpbb_extension_base, which this class extends, but you can overwrite them to
* give special instructions for those cases. Board Rules must do this because it uses
* the notifications' system, which requires the methods enable_notifications(),
* disable_notifications() and purge_notifications() be run to properly manage the
* notifications created by Board Rules when enabling, disabling or deleting this
* extension.
*/
class ext extends \phpbb\extension\base
{
	/**
	* Check whether the extension can be enabled.
	* The current phpBB version should meet or exceed
	* the minimum version required by this extension:
	*
	* Requires phpBB 3.3.2 due to using role_exists check in permission migration.
	* Not compatible with phpBB4 due to use of deprecated or changed functions, classes and Icons
	*
	* @return bool
	* @access public
	*/
	public function is_enableable()
	{
		return phpbb_version_compare(PHPBB_VERSION, '3.3.2', '>=')
			&& phpbb_version_compare(PHPBB_VERSION, '4.0.0-dev', '<');
	}

	/**
	* Overwrite enable_step to enable board rules notifications
	* before any included migrations are installed.
	*
	* @param mixed $old_state State returned by previous call of this method
	* @return bool|string Returns false after last step, otherwise temporary state
	* @access public
	*/
	public function enable_step($old_state)
	{
		// if nothing has run yet
		if ($old_state === false)
		{
			// Enable board rules notifications
			$phpbb_notifications = $this->container->get('notification_manager');
			$phpbb_notifications->enable_notifications('phpbb.boardrules.notification.type.boardrules');
			return 'notifications';
		}

		// Run parent enable step method
		return parent::enable_step($old_state);
	}

	/**
	* Overwrite disable_step to disable board rules notifications
	* before the extension is disabled.
	*
	* @param mixed $old_state State returned by previous call of this method
	* @return bool|string Returns false after last step, otherwise temporary state
	* @access public
	*/
	public function disable_step($old_state)
	{
		// if nothing has run yet
		if ($old_state === false)
		{
			// Disable board rules notifications
			$phpbb_notifications = $this->container->get('notification_manager');
			$phpbb_notifications->disable_notifications('phpbb.boardrules.notification.type.boardrules');
			return 'notifications';
		}

		// Run parent disable step method
		return parent::disable_step($old_state);
	}

	/**
	* Overwrite purge_step to purge board rules notifications before
	* any included and installed migrations are reverted.
	*
	* @param mixed $old_state State returned by previous call of this method
	* @return bool|string Returns false after last step, otherwise temporary state
	* @access public
	*/
	public function purge_step($old_state)
	{
		// if nothing has run yet
		if ($old_state === false)
		{
			// Purge board rules notifications
			$phpbb_notifications = $this->container->get('notification_manager');
			$phpbb_notifications->purge_notifications('phpbb.boardrules.notification.type.boardrules');
			return 'notifications';
		}

		// Run parent purge step method
		return parent::purge_step($old_state);
	}
}
