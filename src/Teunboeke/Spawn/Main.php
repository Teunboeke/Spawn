<?php

namespace Teunboeke\Spawn;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerLoginEvent;

class Main extends PluginBase implements Listener {
      /** @var string[] */
     private $config;
  
      public function onEnable() : void {
          	    $this->config = $this->getConfig()->getAll();
        	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
            }
  
      public function onCommand(CommandSender $sender, Command $cmd,$label, array $args) : bool {
                $spawn = $this->getServer()->getDefaultLevel()->getSpawnLocation();
                switch($cmd->getName()) {
                                case "spawn":
                                    if($sender instanceof Player){
                                       $sender->teleport($spawn);
                                      			 if($this->config["title"] === "on"){
                                               			   $sender->addTitle($this->config["titlemessage"]);
                                              		         }
                                      			 if($this->config["message"] === "on"){
                                              	$sender->sendMessage($this->config["sendmessage"]);
