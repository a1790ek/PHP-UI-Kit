<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit\Components\Layout;

use RobiNN\UiKit\Components\Component;

class Grid extends Component {
    /**
     * @param array|string $col_sizes Column sizes.
     * @param array        $options   Additional options. Default value: []
     *
     * @return string
     */
    public function render($col_sizes = [100], array $options = []): string {
        // $col_sizes example values:
        // [100, 50] - 100% of width on mobile, 50% on larger screen. Depending on framework, you can add multiple values however recommended maximum is 4 values.
        // [100, 50, ['bootstrap5' => 'col-6'] - You can even specify a value for a specific framework, in this case the first and second values are ignored.
        // 'auto' - Columns will have the same width. Not recommended for layouts that must support multiple css frameworks. Since not every framework support this.

        $options = array_merge([
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'open'       => false, // Opening div
            'close'      => false, // Closing div
        ], $options);

        $fwoptions = $this->uikit->getFrameworkOptions('layout');
        $grid = is_callable($fwoptions['grid_func']) ? $fwoptions['grid_func']($col_sizes) : '';

        $context = [
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes']),
            'grid_class' => $grid,
            'open'       => $options['open'],
            'close'      => $options['close'],
        ];

        return $this->uikit->renderTpl('layout/grid', $context);
    }
}
