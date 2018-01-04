<?php

namespace Tests\Unit;

use Tests\Unit\ParentTest;

class SectorTest extends ApiParent
{
    public function testSector()
    {
        $res = $this->sector->sectors();
        // Assert correct function
        $this->paramEquals($res, 'function', 'SECTOR');
    }
}
