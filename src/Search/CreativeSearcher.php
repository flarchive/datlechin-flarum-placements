<?php

/*
 * This file is part of datlechin/flarum-placements.
 *
 * Copyright (c) 2026 Ngo Quoc Dat.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Datlechin\Placements\Search;

use Datlechin\Placements\Model\Creative;
use Illuminate\Database\Eloquent\Builder;

/**
 * Lets creatives be listed with a filter, a search term and a sort on them.
 *
 * This exists because `AbstractDatabaseResource::filters()` is final and
 * throws: Flarum routes every list filter through a searcher, so a review
 * queue asking for the pending ones needs one before it can ask.
 *
 * @see AbstractManagedSearcher for why the permission is checked again here.
 */
class CreativeSearcher extends AbstractManagedSearcher
{
    protected function baseQuery(): Builder
    {
        return Creative::query()->select('placement_creatives.*');
    }
}
