<?php

namespace AlphaVantage\Api;

use AlphaVantage\Api\Master;

class General extends Master {
    /**
     * This API is for unimplemented methods
     * @return true
     */
    protected function funcAvailable($name)
    {
        return true;
    }
}
