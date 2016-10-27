<?php
namespace scenariomanager;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
class Main extends PluginBase implements Listener {
	public $scenarios;
	const PREFIX = TF::BLACK . "[". TF::BLUE . "SM" . TF::BLACK . "]".TF::WHITE . " ";
   public function onEnable(){
	$this->getServer()->getPluginManager()->registerEvents($this, $this);
        @mkdir($this->getDataFolder());
        @mkdir($this->getDataFolder()."scenarios/");
        $this->scenarios = new Config($this->getDataFolder()."/scenarios.yml", Config::YAML, array(
			"cutclean" => false,
			"no-fall" => false,
			"blood-diamond" => false,
			"double-ores" => false,
                        "triple-ores" => false,
                        "cats-eyes" => false,
                        "final-heal" => false,
			"death-pole" => false,
			"lights-out" => false,
			 "no-furnace" => false,
			 "chicken" => false,
			 "golden-head" => false
			 ));
   }
   
   public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    $this->scenarios = new Config($this->getDataFolder() . "scenarios.yml");
	if(strtolower($command->getName() == "scenario")){
		  if (count($args) === 0) {
           $sender->sendMessage(self::PREFIX . TF::RED . " Usage: /scenario <add|remove> <...> | <list>");
       }
	   if($args[1] == "add"){
                 if($sender->hasPermission("scenariomanager.add")) {
					 if (strtolower($args[2] == ["cutclean", "autosmelt"])) {
                        $sender->sendMessage(self::PREFIX . TF::GREEN . "Added scenario: " . strtolower($args[2]) . " successfully!");
						$this->scenarios->set("cutclean", true);
						 $this->scenarios->save();
						 $this->scenarios->reload();
						 if ($this->scenarios->get("cutclean") === true) {
							 $sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already on!");
						 }
					 }

					 if (strtolower($args[2] == ["nofall", "no-fall"])) {
						$sender->sendMessage(self::PREFIX . TF::GREEN . "Added scenario: " . strtolower($args[2]) . " successfully!");
						$this->scenarios->set("no-fall", true);
						 $this->scenarios->save();
						 $this->scenarios->reload();
						 if ($this->scenarios->get("no-fall") === true) {
							 $sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already on!");
						 }
					 }

					 if (strtolower($args[2] == ["blooddiamond","blood-diamond"])) {
						 $sender->sendMessage(self::PREFIX . TF::GREEN . "Added scenario: " . strtolower($args[2]) . " successfully!");
						 $this->scenarios->set("blood-diamond", true);
						 $this->scenarios->save();
						 $this->scenarios->reload();
						 if ($this->scenarios->get("blood-diamond") === true) {
							 $sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already on!");
						 }
					 }

					 if (strtolower($args[2] == ["doubleores","double-ores"])) {
						 $sender->sendMessage(self::PREFIX . TF::GREEN . "Added scenario: " . strtolower($args[2]) . " successfully!");
						 $this->scenarios->set("double-ores", true);
						 $this->scenarios->save();
						 $this->scenarios->reload();
						 if ($this->scenarios->get("double-ores") === true) {
							 $sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already on!");
						 }
					 }

					 if (strtolower($args[2] == ["tripleores","triple-ores"])) {
						 $sender->sendMessage(self::PREFIX . TF::GREEN . "Added scenario: " . strtolower($args[2]) . " successfully!");
						 $this->scenarios->set("triple-ores", true);
						 $this->scenarios->save();
						 $this->scenarios->reload();
						 if ($this->scenarios->get("triple-ores") === true) {
							 $sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already on!");
						 }
					 }

					 if (strtolower($args[2] == ["catseyes","cats-eyes"])) {
						 $sender->sendMessage(self::PREFIX . TF::GREEN . "Added scenario: " . strtolower($args[2]) . " successfully!");
						 $this->scenarios->set("cats-eyes", true);
						 $this->scenarios->save();
						 $this->scenarios->reload();
						 if ($this->scenarios->get("cats-eyes") === true) {
							 $sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already on!");
						 }
					 }

					 if (strtolower($args[2] == ["finalheal","final-heal"])) {
						 $sender->sendMessage(self::PREFIX . TF::GREEN . "Added scenario: " . strtolower($args[2]) . " successfully!");
						 $this->scenarios->set("final-heal", true);
						 $this->scenarios->save();
						 $this->scenarios->reload();
						 if ($this->scenarios->get("final-heal") === true) {
							 $sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already on!");
						 }
					 }

					 if (strtolower($args[2] == ["flowerpower","flower-power"])) {
						 $sender->sendMessage(self::PREFIX . TF::GREEN . "Added scenario: " . strtolower($args[2]) . " successfully!");
						 $this->scenarios->set("flower-power", true);
						 $this->scenarios->save();
						 $this->scenarios->reload();
						 if ($this->scenarios->get("flower-power") === true) {
							 $sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already on!");
						 }
					 }

					 if (strtolower($args[2] == ["deathpole","death-pole"])) {
						 $sender->sendMessage(self::PREFIX . TF::GREEN . "Added scenario: " . strtolower($args[2]) . " successfully!");
						 $this->scenarios->set("death-pole", true);
						 $this->scenarios->save();
						 $this->scenarios->reload();
						 if ($this->scenarios->get("death-pole") === true) {
							 $sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already on!");
						 }
					 }

					 if (strtolower($args[2] == ["lightsout","lights-out"])) {
						 $sender->sendMessage(self::PREFIX . TF::GREEN . "Added scenario: " . strtolower($args[2]) . " successfully!");
						 $this->scenarios->set("lights-out", true);
						 $this->scenarios->save();
						 $this->scenarios->reload();
						 if ($this->scenarios->get("lights-out") === true) {
							 $sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already on!");
						 }
					 }

					 if (strtolower($args[2] == ["gunsnroses","guns-n-roses"])) {
						 $sender->sendMessage(self::PREFIX . TF::GREEN . "Added scenario: " . strtolower($args[2]) . " successfully!");
						 $this->scenarios->set("guns-n-roses", true);
						 $this->scenarios->save();
						 $this->scenarios->reload();
						 if ($this->scenarios->get("guns-n-roses") === true) {
							 $sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already on!");
						 }
					 }

					 if (strtolower($args[2] == "chicken")) {
						 $sender->sendMessage(self::PREFIX . TF::GREEN . "Added scenario: " . strtolower($args[2]) . " successfully!");
						 $this->scenarios->set("chicken", true);
						 $this->scenarios->save();
						 $this->scenarios->reload();
						 if ($this->scenarios->get("chicken") === true) {
							 $sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already on!");
						 }
					 }

					 if (strtolower($args[2] == ["halfore","half-ore"])) {
						 $sender->sendMessage(self::PREFIX . TF::GREEN . "Added scenario: " . strtolower($args[2]) . " successfully!");
						 $this->scenarios->set("half-ore", true);
						 $this->scenarios->save();
						 $this->scenarios->reload();
						 if ($this->scenarios->get("half-ore") === true) {
							 $sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already on!");
						 }
					 }

					 if (strtolower($args[2] == [ "goldenhead", "golden-head"])) {
						 $sender->sendMessage(self::PREFIX . TF::GREEN . "Added scenario: " . strtolower($args[2]) . " successfully!");
						 $this->scenarios->set("golden-head", true);
						 $this->scenarios->save();
						 $this->scenarios->reload();
						 if ($this->scenarios->get("golden-head") === true) {
							 $sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already on!");
						 }
					 }
				 } else {
					 $sender->sendMessage(TF::RED . "You do not have permission to run this command!");
				 }
	   } else {
		  $sender->sendMessage(TF::RED . "ERROR: Could not find scenario: " . strtolower($args[2]) . "!");
	   }
		if($args[1] == "remove"){
			if($sender->hasPermission("scenariomanager.remove")) {
				if (strtolower($args[2] == "cutclean")) {
					$sender->sendMessage(self::PREFIX . TF::GREEN . "Removed scenario: " . strtolower($args[2]) . " successfully!");
					$this->scenarios->set("cutclean", false);
					$this->scenarios->save();
					$this->scenarios->reload();
					if ($this->scenarios->get("cutclean") === false) {
						$sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already disabled!");
					}
				}

				if (strtolower($args[2] == ["nofall", "no-fall"])) {
					$sender->sendMessage(self::PREFIX . TF::GREEN . "Removed scenario: " . strtolower($args[2]) . " successfully!");
					$this->scenarios->set("no-fall", false);
					$this->scenarios->save();
					$this->scenarios->reload();
					if ($this->scenarios->get("no-fall") === false) {
						$sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already disabled!");
					}
				}

				if (strtolower($args[2] == ["blooddiamond","blood-diamond"])) {
					$sender->sendMessage(self::PREFIX . TF::GREEN . "Removed scenario: " . strtolower($args[2]) . " successfully!");
					$this->scenarios->set("blood-diamond", false);
					$this->scenarios->save();
					$this->scenarios->reload();
					if ($this->scenarios->get("blood-diamond") === false) {
						$sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already disabled!");
					}
				}

				if (strtolower($args[2] == ["doubleores","double-ores"])) {
					$sender->sendMessage(self::PREFIX . TF::GREEN . "Removed scenario: " . strtolower($args[2]) . " successfully!");
					$this->scenarios->set("double-ores", false);
					$this->scenarios->save();
					$this->scenarios->reload();
					if ($this->scenarios->get("double-ores") === false) {
						$sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already disabled!");
					}
				}

				if (strtolower($args[2] == ["tripleores","triple-ores"])) {
					$sender->sendMessage(self::PREFIX . TF::GREEN . "Removed scenario: " . strtolower($args[2]) . " successfully!");
					$this->scenarios->set("triple-ores", false);
					$this->scenarios->save();
					$this->scenarios->reload();
					if ($this->scenarios->get("triple-ores") === false) {
						$sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already disabled!");
					}
				}

				if (strtolower($args[2] == ["catseyes","cats-eyes"])) {
					$sender->sendMessage(self::PREFIX . TF::GREEN . "Removed scenario: " . strtolower($args[2]) . " successfully!");
					$this->scenarios->set("cats-eyes", false);
					$this->scenarios->save();
					$this->scenarios->reload();
					if ($this->scenarios->get("cats-eyes") === false) {
						$sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already disabled!");
					}
				}

				if (strtolower($args[2] == ["finalheal","final-heal"])) {
					$sender->sendMessage(self::PREFIX . TF::GREEN . "Removed scenario: " . strtolower($args[2]) . " successfully!");
					$this->scenarios->set("final-heal", false);
					$this->scenarios->save();
					$this->scenarios->reload();
					if ($this->scenarios->get("final-heal") === false) {
						$sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already disabled!");
					}
				}

				if (strtolower($args[2] == ["flowerpower","flower-power"])) {
					$sender->sendMessage(self::PREFIX . TF::GREEN . "Removed scenario: " . strtolower($args[2]) . " successfully!");
					$this->scenarios->set("flower-power", false);
					$this->scenarios->save();
					$this->scenarios->reload();
					if ($this->scenarios->get("flower-power") === false) {
						$sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already disabled!");
					}
				
				}

				if (strtolower($args[2] == ["deathpole","death-pole"])) {
					$sender->sendMessage(self::PREFIX . TF::GREEN . "Removed scenario: " . strtolower($args[2]) . " successfully!");
					$this->scenarios->set("death-pole", false);
					$this->scenarios->save();
					$this->scenarios->reload();
					if ($this->scenarios->get("death-pole") === false) {
						$sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already disabled!");
					}
				}

				if (strtolower($args[2] == ["lightsout", "lights-out"])) {
					$sender->sendMessage(self::PREFIX . TF::GREEN . "Removed scenario: " . strtolower($args[2]) . " successfully!");
					$this->scenarios->set("lights-out", false);
					$this->scenarios->save();
					$this->scenarios->reload();
					if ($this->scenarios->get("lights-out") === false) {
						$sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already disabled!");
					}
				}

				if (strtolower($args[2] == ["gunsnroses", "guns-n-roses"])) {
					$sender->sendMessage(self::PREFIX . TF::GREEN . "Removed scenario: " . strtolower($args[2]) . " successfully!");
					$this->scenarios->set("guns-n-roses", false);
					$this->scenarios->save();
					$this->scenarios->reload();
					if ($this->scenarios->get("guns-n-roses") === false) {
						$sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already disabled!");
					}
				}

				if (strtolower($args[2] == "chicken")) {
					$sender->sendMessage(self::PREFIX . TF::GREEN . "Removed scenario: " . strtolower($args[2]) . " successfully!");
					$this->scenarios->set("chicken", false);
					$this->scenarios->save();
					$this->scenarios->reload();
					if ($this->scenarios->get("chicken") === false) {
						$sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already disabled!");
					}
				}

				if (strtolower($args[2] == ["halfore","half-ore"])) {
					$sender->sendMessage(self::PREFIX . TF::GREEN . "Removed scenario: " . strtolower($args[2]) . " successfully!");
					$this->scenarios->set("half-ore", false);
					$this->scenarios->save();
					$this->scenarios->reload();
					if ($this->scenarios->get("half-ore") === false) {
						$sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already disabled!");
					}
				}

				if (strtolower($args[2] == ["goldenhead", "golden-head"])) {
					$sender->sendMessage(self::PREFIX . TF::GREEN . "Removed scenario: " . strtolower($args[2]) . " successfully!");
					$this->scenarios->set("golden-head", false);
					$this->scenarios->save();
					$this->scenarios->reload();
					if ($this->scenarios->get("golden-head") === false) {
						$sender->sendMessage(self::PREFIX . TF::RED . "That scenario is already disabled!");
					}
				}
			} else {
				$sender->sendMessage(TF::RED . "You do not have permission to run this command!");
			}

		} else {
			$sender->sendMessage(TF::RED . "ERROR: Could not find scenario: " . strtolower($args[2]) . "!");
		}
	 	  }
		  
		      if (strtolower($command->getName() == "finalheal")) {
            $this->scenarios = new Config($this->getDataFolder() . "scenarios.yml");
            if ($this->scenarios->get("final-heal") == true) {
                if ($sender->hasPermission("scenariomanager.finalheal")) {
                    foreach ($this->getServer()->getOnlinePlayers() as $p) {
                        $p->setHealth($p->getMaxHealth());
                    }
                    $this->getServer()->broadcastMessage(self::PREFIX . TF::BLUE . " FinalHeal was used and everyone was healed!");
                } else {
                    $sender->sendMessage(TF::RED . "You do not have permission to run this command!");
                }
            } else {
                $sender->sendMessage(self::PREFIX . TF::RED . " > FinalHeal is not enabled!");
            }
        }
    }
   }
