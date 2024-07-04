<?php

namespace Packages\Reporter\Model;

interface Reporter
{
    public function getName(): string

    public function getValue(): string
}
