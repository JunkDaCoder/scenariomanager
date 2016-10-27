<?php
namespace scenariomanager\scenarios;
use pocketmine\event\entity\EntityDamageEvent;
use scenariomanager\Main;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\utils\Config;
use pocketmine\event\entity\EntityDamageByBlockEvent;
use pocketmine\block\Block;
use pocketmine\utils\TextFormat as TF;
class BloodDiamond{
    private $plugin;

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
    }

    public function getPlugin()
    {
        return $this->plugin;
    }

    public $scenarios;

    public function onBreak(BlockBreakEvent $event){
        $p = $event->getPlayer();
        $this->scenarios = new Config($this->plugin->getDataFolder() . "scenarios.yml");
        if ($this->scenarios->get("blood-diamond") === true) {
            $dmg = new EntityDamageByBlockEvent(Block::get(Block::DIAMOND_ORE), $p, EntityDamageEvent::CAUSE_CUSTOM, 1);
            $p->attack(1, $dmg);
            $p->sendTip(TF::RED . "ouch");
        }

    }
}
