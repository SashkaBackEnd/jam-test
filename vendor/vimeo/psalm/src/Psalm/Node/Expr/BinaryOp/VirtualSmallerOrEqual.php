<?php

declare(strict_types=1);

namespace Psalm\Node\Expr\BinaryOp;

use PhpParser\Node\Expr\BinaryOp\SmallerOrEqual;
use Psalm\Node\VirtualNode;

final class VirtualSmallerOrEqual extends SmallerOrEqual implements VirtualNode
{

}
