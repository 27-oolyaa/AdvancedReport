<?php

declare(strict_types=1);
/**
 * A plugin made by Seeker 
 * @Github Seeker-Devs
 * @Discord seeker#4453
 * @YouTube xSeeker_ (temp name is changed for classroom)
 * this plugin is regisered under the uhh (trying to look cool) dum dum license!
 * Copying code isn't funny
 * Make sure to credit me
 * You can contribute if you like
 * DM me to join CrystalMC, best server for MCBE!
 */
namespace Seeker\AdvancedReport;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\SimpleCommandMap;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\Plugin;

class Main extends PluginBase implements Listener
{

	protected static $instance;

	public function onEnable ()
	{
		self::$instance = $this;
		$this->getLogger ()->info ("Check out my github: Seeker-Devs and play.crystalmc.org 19132! - AdvancedReport by Seeker enabled");
		$this->getServer ()->getPluginManager ()->registerEvents ($this, $this);

	}

	public function onDisable ()
	{
		$this->getLogger ()->info ("Check out my github: Seeker-Devs and play.crystalmc.org 19132! - AdvancedReport by Seeker disabled, contact seeker#4453");
	}

	public function onLoad ()
	{
		$this->getLogger ()->info ("Check out my github: Seeker-Devs and play.crystalmc.org 19132! - AdvancedReport by Seeker is loading");
	}

	//here comes the boss
	public function onCommand (CommandSender $sender, Command $command, string $label, array $args): bool
	{
		switch ($command->getName ()) {
			case "report":
				if (empty($args)) {
					$sender->sendMessage ("/report <player> <reasoj>)");
					return false;
				}
				$message = implode (" ", $args);
				$msg = str_replace ("$args[0]", "", strtolower ($message));

				$player = $sender->getName ();

				foreach ($this->getServer ()->getOnlinePlayers () as $p) {
					if ($p->hasPermission ("advanced.reports")) {
						$p->sendMessage ("(By Seeker:)§7[§4AdvancedReports§7] $player Reported $args[0] for $message");
						return true;
					}
				}
		}
	}
}

	