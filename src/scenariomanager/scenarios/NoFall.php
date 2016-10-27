<?php
namespace scenariomanager\scenarios;
use scenariomanager\Main;
use pocketmine\utils\Config;
use pocketmine\event\entity\EntityDamageEvent;
class NoFall{
  private $plugin;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }
	
	public function getPlugin(){
        return $this->plugin;
    }
	
	public $scenarios;
	
     public function onFall(EntityDamageEvent $event){
    $cause = $event->getCause();
		if($cause == EntityDamageEvent::CAUSE_FALL){
			$this->scenarios = new Config($this->plugin->getDataFolder() . "scenarios.yml");
			if ($this->scenarios->get("no-fall") === true) {
                    $event->setCancelled();
            }
		}
          }
}
