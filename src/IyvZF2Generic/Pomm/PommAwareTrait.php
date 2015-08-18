<?php

namespace IyvZF2Generic\Pomm;

trait PommAwareTrait
{
    protected $pomm;

    public function setPomm($pomm)
    {
        $this->pomm = $pomm;

        return $this;
    }

    protected function pomm()
    {
        return $this->pomm->getDefaultSession();
    }
}
