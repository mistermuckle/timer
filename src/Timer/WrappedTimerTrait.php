<?php

namespace 'Timer';

trait WrappedTimerTrait
{
    public function start()
    {
        $this->timer->start();
    }
    
    public function stop()
    {
        $this->timer->stop();
    }

    public function getStartTime()
    {
        return $this->timer->getStartTime();
    }

    public function hasStarted()
    {
        return $this->timer->hasStarted();
    }

    public function hasFinished()
    {
        return $this->timer->hasFinished();
    }

    public function getEstimatedDuration()
    {
        return $this->timer->getEstimatedDuration();
    }

    public function getActualDuration()
    {
        return $this->timer->getActualDuration();
    }
    
    abstract private function getTimer();
}