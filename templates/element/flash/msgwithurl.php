<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 * @var string $link_text
 * @var string $link_url
 *
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div id="flashMessage" class="message">
    <?php
    echo $message;
    echo $this->Html->link(h($params['link_text']), h($params['link_url']), array("style" => 'color:#509F94', "escape" => false));
    ?>
</div>

