<?php
namespace scenariomanager\scenarios;
use scenariomanager\Main;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;
use pocketmine\entity\Effect;
class CatsEyes {
	  private $plugin;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }
	
	public function getPlugin(){
        return $this->plugin;
    }
	
	public $scenarios;
	
	public function onJoin(PlayerJoinEvent $event){
		$this->scenarios = new Config($this->plugin->getDataFolder() . "scenarios.yml");
		            $player = $event->getPlayer();
		if($this->scenarios->get("cats-eyes" === true)) {
			$effect = Effect::getEffect(Effect::NIGHT_VISION);
			$effect->setVisible(false);
			$effect->setDuration(100000000);
			$effect->setAmplifier(4);
			$player->addEffect($effect);
		}
	  }
	}
