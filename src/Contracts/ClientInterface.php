<?php

namespace AlphaVantage\Contracts;

interface ClientInterface {
  public function request($method, $uri = '', array $options = []);
}
