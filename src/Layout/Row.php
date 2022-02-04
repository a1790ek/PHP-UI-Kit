<?php
/**
 * This file is part of UiKit.
 *
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobiNN\UiKit\Layout;

use RobiNN\UiKit\UiKit;

class Row {
    /**
     * @param UiKit $uikit
     * @param array $options Additional options. Default value: []
     *
     * @return string
     */
    public static function render(UiKit $uikit, array $options = []): string {
        $options = array_merge([
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes, set null as value for attributes without value. E.g. ['attr' => 'value', 'attr2' => null]
            'open'       => false, // Opening div.
            'close'      => false // Closing div.
        ], $options);

        $context = [
            'class'      => $options['class'],
            'attributes' => $uikit->getAttributes($options['attributes']),
            'open'       => $options['open'],
            'close'      => $options['close']
        ];

        return $uikit->render('layout/row', $context);
    }
}
