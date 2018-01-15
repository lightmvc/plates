<?php

use League\Plates;

describe('Layout Sections Extension', function() {
    beforeEach(function() {
        $this->plates = new Plates\Engine([
            'base_dir' => __DIR__ . '/fixtures/default-layout',
            'default_layout_path' => './_layout',
        ]);
    });
    it('allows default layout on the root template', function() {
        $html = <<<html
<div>
    <div>main - partial</div>
</div>

html;
        expect($this->plates->render('main'))->equal($html);
    });
    it('excludes any templates with no_layout attribute', function() {
        $html = <<<html
<div>main - partial</div>

html;
        expect($this->plates->render('main', [], ['no_layout' => true]))->equal($html);
    });
});
