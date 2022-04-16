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

namespace Tests\Components;

use Tests\ComponentTestCase;

final class CardTest extends ComponentTestCase {
    public string $expectedTpl = '<div class="card">
    <div class="card-body">
        <h1>
            Title
        </h1>
        <p>Testing</p>
    </div>
</div>';

    public function testCardRender(): void {
        $tpl = $this->uikit->card->render([
            'body' => '<h1>Title</h1><p>Testing</p>',
        ]);

        $this->assertComponentRender($this->expectedTpl, $tpl);
    }

    public function testCardInTwig(): void {
        $this->assertComponentRenderTpl($this->expectedTpl, "{{ card({
            'body': '<h1>Title</h1><p>Testing</p>',
        }) }}");
    }
}
