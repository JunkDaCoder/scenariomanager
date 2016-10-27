<?php
namespace scenariomanager\scenarios;
use scenariomanager\Main;
use pocketmine\utils\Config;
use pocketmine\block\Block;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\utils\TextFormat as TF;
class LightsOut {
	  private $plugin;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }
	
	public function getPlugin(){
        return $this->plugin;
    }
	
	public $scenarios;
	
	public function onPlace(BlockPlaceEvent $event){
		$id = $event->getBlock()->getId();
		$this->scenarios = new Config($this->plugin->getDataFolder() . "scenarios.yml");
        if ($this->scenarios->get("lights-out") === true) {
	if($id === [Block::TORCH, Block::REDSTONE_TORCH]){
		$event->setCancelled();
		$p = $event->getPlayer();
		$p->sendMessage(Main::PREFIX . TF::RED . "No Torches allowed in a lights-out game!");
	 }
	}
	 }
}
