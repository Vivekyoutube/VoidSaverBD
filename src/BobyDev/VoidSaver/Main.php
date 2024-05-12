<?php
namespace BobyDev\VoidSaver;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener {

    public function onEnable() : void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN . "VoidSaverBD Made By BobyDev Is enabled!");
    }

    public function onPlayerMove(PlayerMoveEvent $event) : void {
        $player = $event->getPlayer();
        $world = $player->getWorld();


        if ($player->getPosition()->getY() < 0) {
            $spawnLocation = $world->getSafeSpawn();
            $player->teleport($spawnLocation);
            $player->sendMessage(TextFormat::YELLOW . "You fell into the void, but have been respawned at the world's spawn point!");
        }
    }
}
