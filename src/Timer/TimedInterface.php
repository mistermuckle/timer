<?php

namespace Timer;

interface TimedInterface
{
    public function start();
    
    public function stop();
    
    /**
     * @return \DateTimeInterface
     */
    public function getStartTime();
    
    /**
     * @return bool
     */
    public function hasStarted();
    
    /**
     * @return bool
     */
    public function hasFinished();
    
    /**
     * @return \DateInterval
     */
    public function getEstimatedDuration();

    /**
     * @return \DateInterval
     */
    public function getActualDuration();
}
