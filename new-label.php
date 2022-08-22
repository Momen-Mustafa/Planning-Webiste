<?php

    $QueryBuilder->newLabel('labelType', 'color', 'boardName', 'statusName', 'taskName');

    $QueryBuilder->history('new label is added', 'boardName', 'statusName', 'labelType', 'taskName');