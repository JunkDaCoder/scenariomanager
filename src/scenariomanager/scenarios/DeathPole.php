<?php
namespace scenariomanager\scenarios;
use scenariomanager\Main;
use pocketmine\utils\Config;
use pocketmine\block\Block;
use pocketmine\tile\Tile;
use pocketmine\tile\Skull;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\math\Vector3;
class DeathPole
{
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

    public function onDeath(PlayerDeathEvent $event)
    {
        $this->scenarios = new Config($this->plugin->getDataFolder() . "scenarios.yml");
        if ($this->scenarios->get("death-pole") === true) {
            $player = $event->getPlayer();
            $level = $player->getLevel();
            $x = $player->x;
            $y = $player->y;
            $z = $player->z;
            $level->setBlock(new Vector3($x, $y + 1, $z), Block::get(Block::SKULL_BLOCK), true, true);
            $level->setBlock(new Vector3($x, $y, $z), Block::get(113));
            $nbt = new CompoundTag("", [
                new StringTag("id", Tile::SKULL),
                new StringTag("SkullType", 3),
                new IntTag("x", $x),
                new IntTag("y", $y + 1),
                new IntTag("z", $z),
                new StringTag("Rot", 0)
            ]);
            $block = $player->getLevel()->getBlock(new Vector3($x, $y+1, $z));
            Tile::createTile("Skull",$player->getLevel()->getChunk($block->getX() >> 4, $block->getZ() >> 4), $nbt);
            $head = $level->getTile($block);
            $level->addTile($head);
        }
    }
}
