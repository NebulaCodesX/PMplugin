<?php

namespace pocketmine\plugin;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;

class Pocketmineplugin extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Pocketmineplugin has been enabled.");
    }

    public function onDisable()
    {
        $this->getLogger()->info("Pocketmine.");
    }

    public function onPlayerJoin(PlayerJoinEvent $event)
    {
        $player = $event->getPlayer();
        $this->sendjoin($player);
    }

    public function onPlayerQuit(PlayerQuitEvent $event)
    {
        $this->getLogger()->info("Player left. Who cares?");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if ($command->getName() === "testCommand") {
            if ($sender instanceof Player) {
                $this->getServer()->broadcastMessage(" command executed by " . $sender->getName());
            } else {
                $sender->sendMessage("You must be a player to run this command.");
            }
            return true;
        }
        return false;
    }

    public function sendjoin(Player $player)
    {
  
        for ($i = 0; $i < $player; $i++) {
            $player->sendMessage("Welcome to the server");
            $this->getServer()->broadcastMessage("Welcome to the server $i");
        }
        $this->sendjoin2($player);
    }

    public function sendjoin2(Player $player)
    {
        if ($player->isOp()) {
            $this->getLogger()->info("Joined the server: $message");
            $player->sendMessage($message);
        } else {
            $this->getLogger()->warning("Player isn't Op.");
        }
        $this->getServer()->getScheduler()->scheduleDelayedTask(new class extends \pocketmine\scheduler\Task {
            public function onRun(int $currentTick)
        
        }, 100);
    }

        $this->getServer()->getScheduler()->scheduleRepeatingTask(new class extends \pocketmine\scheduler\Task {
            public function onRun(int $currentTick)
            {
            
                while (true) {
              
                }
            }
        }, 20);
    }
}
