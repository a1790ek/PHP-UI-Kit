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

use RobiNN\UiKit\Misc;

class ButtonGroup extends Component {
    /**
     * Render a button group.
     *
     * @param array $items   Associative array or multidimensional array.
     * @param array $options Additional options.
     *
     * @return string
     */
    public function render(array $items, array $options = []): string {
        $component = 'button_group';

        $options = array_merge([
            'id'         => '', // Wrapper ID.
            'class'      => '', // Class for wrapper.
            'attributes' => [], // Array of custom attributes.
            'size'       => 'default', // Button group size. Possible value: default/sm/lg
            'type'       => 'button', // Default type for all buttons. Possible value: button/submit/reset
            'item_class' => '', // Class for item.
        ], $options);

        $fwoptions = $this->uikit->getFrameworkOptions($component);

        $size = '';
        if (!empty($fwoptions['sizes'])) {
            $size = $this->getOption('sizes', $options['size'], $fwoptions);
        }

        return $this->uikit->render('components/'.$component, [
            'buttons'    => $this->buttons($items, $options),
            'class'      => $options['class'],
            'attributes' => $this->getAttributes($options['attributes'], $options['id']),
            'size'       => $size,
        ]);
    }

    /**
     * Render buttons.
     *
     * @param array $items
     * @param array $options
     *
     * @return array
     */
    private function buttons(array $items, array $options): array {
        $buttons = [];

        foreach ($items as $value => $button) {
            $title = is_array($button) ? $button['title'] : $button;
            $type = !empty($button['type']) ? $button['type'] : $options['type'];
            $btn_options = !empty($button['btn_options']) ? $button['btn_options'] : [];

            $btn_opt_value = array_key_exists('value', $btn_options) ? $btn_options['value'] : $value;
            $value = array_key_exists('value', (array) $button) ? $button['value'] : $btn_opt_value;

            $btn_options['class'] = $options['item_class'].(!empty($btn_options['class']) ? Misc::space($btn_options['class']) : '');

            $btn = [
                'value' => $value,
                'link'  => !empty($button['link']) ? $button['link'] : '',
            ];

            $buttons[] = $this->uikit->button->render($title, $type, array_merge($btn, $btn_options));
        }

        return $buttons;
    }
}
