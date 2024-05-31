<?php

declare(strict_types=1);

namespace EasyBell\Shared\Infrastructure\Bus\Command;

use EasyBell\Shared\Domain\Bus\Command\Command;

final class CommandNotRegisteredError extends \RuntimeException
{
    public function __construct(Command $command)
    {
        $commandClass = $command::class;

        parent::__construct("The command <{$commandClass}> hasn't a command handler associated");
    }
}
