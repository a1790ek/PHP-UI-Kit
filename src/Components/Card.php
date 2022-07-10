<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Components;

final class Card extends Component {
    protected string $component = 'components/card';

    /**
     * @var array<string, mixed>
     */
    protected array $options = [
        'id'         => '', // Wrapper ID.
        'class'      => '', // Class for wrapper.
        'attributes' => [], // Array of custom attributes.
        'top_img'    => [], // Card top image.
        'header'     => '', // Card header.
        'top'        => '', // Card top content.
        'body'       => '', // Card body.
        'bottom'     => '', // Card bottom content.
        'footer'     => '', // Card footer.
        'link'       => '', // As link.
    ];

    /**
     * Render card.
     *
     * @param array<string, mixed> $options Additional options.
     *
     * @return object
     */
    public function render(array $options = []): object {
        $this->options($options);

        return $this;
    }
}
