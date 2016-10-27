<?php
namespace scenariomanager\scenarios;
use scenariomanager\Main;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\utils\Config;
use pocketmine\item\Item;
use pocketmine\block\Block;
use pocketmine\utils\TextFormat as TF;
class Diamondless{
	  private $plugin;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }
	
	public function getPlugin(){
        return $this->plugin;
    }
	
	public $scenarios;
	
	public function onBreak(BlockBreakEvent $event){
        $block = $event->getBlock();
        $id = $block->getId();
        $p = $event->getPlayer();
        $this->scenarios = new Config($this->plugin->getDataFolder() . "scenarios.yml");
        if ($this->scenarios->get("diamondless") === true) {
                    if($id === Block::DIAMOND_ORE){
					$event->setDrops([Item::get(Item::AIR)]);
					}
    }
	
}
