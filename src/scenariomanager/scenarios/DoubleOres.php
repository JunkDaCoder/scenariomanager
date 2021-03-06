<?php
namespace scenariomanager\scenarios;
use scenariomanager\Main;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\utils\Config;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat as TF;
class DoubleOres {
	  private $plugin;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }
	
	public function getPlugin(){
        return $this->plugin;
    }
	
	public $scenarios;
	
	public function onBreak(BlockBreakEvent $event)
    {
        $block = $event->getBlock();
        $id = $block->getId();
        $player = $event->getPlayer();
        $this->scenarios = new Config($this->plugin->getDataFolder() . "scenarios.yml");

        if ($this->scenarios->get("double-ores") === true) {
            if ($id == 15) {
                $event->getDrops($event->setDrops(array(Item::get(Item::IRON_INGOT, 0, 2))));
            }

            if ($id == 14) {
                $event->getDrops($event->setDrops(array(Item::get(Item::GOLD_INGOT, 0, 2))));
            }
			
			if($id == 56){
				$event->getDrops($event->setDrops(array(Item::get(Item::DIAMOND_INGOT,0,2))));
        }


        }
    }
	
}
