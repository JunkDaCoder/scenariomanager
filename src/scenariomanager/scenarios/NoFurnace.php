<?php
namespace scenariomanager\scenarios;
use scenariomanager\Main;
use pocketmine\utils\Config;
use pocketmine\event\inventory\CraftItemEvent;
use pocketmine\item\Item;
use pocketmine\block\Block;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\utils\TextFormat as TF;
class NoFurnace {
	  private $plugin;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }
	
	public function getPlugin(){
        return $this->plugin;
    }
	
	public $scenarios;

	public function onCraft(CraftItemEvent $event){
		$recipe = $event->getRecipe();
		$p = $event->getPlayer();
		$this->scenarios = new Config($this->plugin->getDataFolder() . "scenarios.yml");
		if ($this->scenarios->get("no-furnace") === true) {
			if ($recipe == Item::FURNACE) {
				$event->setCancelled();
				$p->sendMessage(Main::PREFIX . TF::RED . "No furnaces allowed as No-Furnace is on as a scenario!");
			}
		}
	}

	public function onPlace(BlockPlaceEvent $event){
		$id = $event->getBlock()->getId();
		$p = $event->getPlayer();
		$this->scenarios = new Config($this->plugin->getDataFolder() . "scenarios.yml");
		if ($this->scenarios->get("no-furnace") === true) {
			if ($id == Block::FURNACE) {
				$event->setCancelled();
				$p->sendMessage(Main::PREFIX . TF::RED . "No furnaces allowed as No-Furnace is on as a scenario!");
			}
		}
	}
	
}
