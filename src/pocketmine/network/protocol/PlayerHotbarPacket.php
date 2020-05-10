<?php

namespace pocketmine\network\mcpe\protocol;

use pocketmine\network\mcpe\protocol\types\ContainerIds;

class PlayerHotbarPacket extends DataPacket {

    const NETWORK_ID = ProtocolInfo::PLAYER_HOTBAR_PACKET;

    public $selectedHotbarSlot;
    public $windowId = ContainerIds::INVENTORY;
    public $selectHotbarSlot = true;

    public function decode() {
        $this->selectedHotbarSlot = $this->getUnsignedVarInt();
        $this->windowId = $this->getByte();
        $this->selectHotbarSlot = $this->getBool();
    }

    public function encode() {
        $this->putUnsignedVarInt($this->selectedHotbarSlot);
        $this->putByte($this->windowId);
        $this->putBool($this->selectHotbarSlot);
    }

}
