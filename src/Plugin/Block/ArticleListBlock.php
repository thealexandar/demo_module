<?php

namespace Drupal\demo_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block that displays a list of articles.
 *
 * @Block(
 *   id = "article_list",
 *   admin_label = @Translation("Article List"),
 *   category = @Translation("Custom"),
 * )
 */

class ArticleListBlock extends BlockBase {
/**
  * {@inheritdoc}
  */
    // public function build() {
    //     $articles = \Drupal::service('demo_module.article_service')->getArticles();

    //     return [];
    // }

    public function build() {
        $articles = \Drupal::service('demo_module.article_service')->getArticles();
      
        $items = [];
        foreach ($articles as $article) {
          $items[] = [
            '#markup' => $article->getTitle(),
          ];
        }
      
        return [
          '#theme' => 'item_list',
          '#items' => $items,
        ];
      }
}