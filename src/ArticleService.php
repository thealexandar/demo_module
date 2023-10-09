<?php

namespace Drupal\demo_module;

use Drupal\node\Entity\Node;

class ArticleService {
    public function getArticles() {
        $query = \Drupal::entityQuery('node')
            ->condition('status', 1)
            ->condition('type', 'article')
            ->range(0, 4)
            ->sort('created', 'DESC')
            ->accessCheck(FALSE);
        $nids = $query->execute();
        $nids = array_slice($nids, 0, 4);
        return Node::loadMultiple($nids);
    }
}