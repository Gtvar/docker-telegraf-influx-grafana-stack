<?php

namespace App\Service\Stampede;

class StampedeProvider
{
    /**
     * @var StampedeInterface[]
     */
    private $strategies = [];

    /**
     * @param StampedeInterface[] $strategies
     */
    public function __construct(iterable $strategies)
    {
        /** @var StampedeInterface $strategy */
        foreach ($strategies as $strategy) {
            $this->strategies[$strategy::getType()] = $strategy;
        }
    }

    public function getStrategy(string $type): StampedeInterface
    {
        if (!isset($this->strategies[$type])) {
            throw new \RuntimeException(sprintf('Unknown Stampede strategy type: %s', $type));
        }

        return $this->strategies[$type];
    }
}

