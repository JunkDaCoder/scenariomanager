<?php
namespace scenariomanager\scenarios;
use scenariomanager\Main;
use pocketmine\utils\Config;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerJoinEvent;
class Chicken {
	  private $plugin;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }
	
	public function getPlugin(){
        return $this->plugin;
    }
	
	public $scenarios;
	
	public function onJoin(PlayerJoinEvent $event){
		$p = $event->getPlayer();
		$this->scenarios = new Config($this->plugin->getDataFolder() . "scenarios.yml");
		if ($this->scenarios->get("chicken") === true) {
			$p->setMaxHealth($p->getMaxHealth()/2/2-4);
			$p->setHealth($p->getMaxHealth());
			$p->getInventory()->addItem(Item::get(Item::GOLDEN_APPLE,1,1));
		}
	 }
}
