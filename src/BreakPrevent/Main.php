<?php

namespace BreakPrevent;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as Color;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\level\Level;
use pocketmine\Server;

class Main extends PluginBase implements Listener {

  public function onEnable() {
    $this->getLogger()->info(Color::GREEN . "Enabled BreakPrevent");
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }

  public function onBreak(BlockBreakEvent $event, Player $p){
    if($p->hasPermission("breakprevent")){
      $event->setCancelled(false);
    } else {
      $event->setCancelled(true);
        $this->getServer()->getPlayer()->sendMessage("You can't break blocks!");
    }
  }

  public function onDisable() {
    $this->getLogger()->info(Color::RED . "Disabled BreakPrevent");
  }
}

?>
