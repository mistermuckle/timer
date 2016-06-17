<?php

namespace Timer;

use DateTime\NullDateTime;

class Timer implements TimedInterface
{
    /** @var \DateInterval */
    private $estimatedDuration;
    
    /** @var \DateTimeInterface */
    private $startTime;
    
    /** @var \DateTimeinterface */
    private $endTime;
    
    public function __construct(\DateInterval $estimatedDuration)
    {
        $this->estimatedDuration = $estimatedDuration;
        $this->startTime = new NullDateTime();
    }
    
    public function start()
    {
        if (!$this->hasStarted()) {
            $this->startTime = new \DateTimeImmutable('now');
        }
    }

    public function stop()
    {
        $this->endTime = new \DateTimeImmutable('now');
    }
    
    public function getStartTime()
    {
        return $this->startTime;
    }
    
    public function hasStarted()
    {
        return !$this->startTime instanceof NullDateTime;
    }
    
    public function hasFinished()
    {
        return isset($this->endTime);
    }
    
    public function getEstimatedDuration()
    {
        return $this->estimatedDuration;
    }
    
    public function getActualDuration()
    {
        if (!$this->hasStarted()) {
            $duration = new \DateInterval('PT0S');
        } else if ($this->hasFinished()) {
            $duration = $this->startTime->diff($this->endTime);
        } else {
            $duration = $this->startTime->diff(new \DateTime('now'));
        }
        
        return $duration;
    }
}
