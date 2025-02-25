<?php
/**
 * This file is part of the UiKit.
 * Copyright (c) Róbert Kelčák (https://kelcak.com/)
 */

declare(strict_types=1);

namespace RobiNN\UiKit\Tests\Components\Form;

use RobiNN\UiKit\Tests\ComponentTestCase;

abstract class FormTestCase extends ComponentTestCase {
    protected string $expected_open_tpl;
    protected string $expected_close_tpl;

    public function testOpenFormRender(): void {
        $tpl = $this->uikit->form_open('get');
        $this->assertComponentRender($this->expected_open_tpl, $tpl->__toString());
    }

    public function testCloseFormRender(): void {
        $tpl = $this->uikit->form_close();
        $this->assertComponentRender($this->expected_close_tpl, $tpl);
    }

    public function testFormInTwig(): void {
        $this->assertComponentRenderTpl($this->expected_open_tpl, "{{ form_open('get') }}");

        $this->assertComponentRenderTpl($this->expected_close_tpl, '{{ form_close() }}');
    }
}
