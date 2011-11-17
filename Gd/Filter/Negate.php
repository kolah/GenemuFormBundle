<?php

/*
 * This file is part of the Genemu package.
 *
 * (c) Olivier Chauvel <olivier@generation-multiple.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Genemu\Bundle\FormBundle\Gd\Filter;

use Genemu\Bundle\FormBundle\Gd\Gd;

/**
 * @author Olivier Chauvel <olivier@generation-multiple.com>
 */
class Negate extends Gd implements Filter
{
    public function __construct()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        imagefilter($this->resource, IMG_FILTER_NEGATE);

        return $this->resource;
    }
}