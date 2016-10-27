<?php
namespace scenariomanager\scenarios;
use scenariomanager\Main;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\utils\Config;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat as TF;
class CutClean{
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

        if ($this->scenarios->get("cutclean") === true) {
            if ($id == 15) {
                $player->sendMessage(Main::PREFIX . TF::GREEN . "Smelted Ore!");
                $event->getDrops($event->setDrops(array(Item::get(Item::IRON_INGOT, 0, 1))));
            }

            if ($id == 14) {
                $player->sendMessage(Main::PREFIX . TF::GREEN . "Smelted Ore!");
                $event->getDrops($event->setDrops(array(Item::get(Item::GOLD_INGOT, 0, 1))));
            }


        }
    }
	
}
