<?php
/**
 * @file
 * Contains \Drupal\bootstrap\Plugin\Preprocess\Links.
 */

namespace Drupal\bootstrap\Plugin\Preprocess;

use Drupal\bootstrap\Annotation\BootstrapPreprocess;
use Drupal\bootstrap\Utility\Element;
use Drupal\bootstrap\Utility\Variables;

/**
 * Pre-processes variables for the "links" theme hook.
 *
 * @ingroup theme_preprocess
 *
 * @BootstrapPreprocess("links")
 */
class Links extends PreprocessBase implements PreprocessInterface {

  /**
   * {@inheritdoc}
   */
  public function preprocessVariables(Variables $variables, $hook, array $info) {
    if ($variables->theme_hook_original === 'links' && $variables->hasClass('operations')) {
      $variables->addClass('list-inline');
      foreach ($variables->links as &$data) {
        $link = Element::create($data['link']);
        $link->addClass(['btn', 'btn-sm']);
        $link->colorize();
        $link->setIcon();
        if ($this->theme->getSetting('tooltip_enabled')) {
          $link->setAttribute('data-toggle', 'tooltip');
          $link->setAttribute('data-placement', 'bottom');
        }
      }
    }
    $this->preprocessAttributes($variables, $hook, $info);
  }

}
