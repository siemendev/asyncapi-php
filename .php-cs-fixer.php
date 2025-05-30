<?php

return (new PhpCsFixer\Config())
    ->setFinder(
        (new PhpCsFixer\Finder())
            ->in('src/')
            ->name('*.php')
            ->ignoreDotFiles(true)
            ->ignoreVCS(true)
    )
    ->setRiskyAllowed(true)
    ->setRules([
            '@PhpCsFixer' => true,
            '@Symfony' => true,
            '@PSR2' => true,
            '@PER' => true,
            'declare_strict_types' => true,
            'global_namespace_import' => [
                'import_classes' => true,
                'import_constants' => true,
                'import_functions' => false,
            ],
            'trailing_comma_in_multiline' => [
                'after_heredoc' => true,
                'elements' => ['arrays', 'arguments', 'parameters']
            ],
            'array_syntax' => ['syntax' => 'short'],
            'phpdoc_align' => ['align' => 'left'],
            'phpdoc_separation' => false,
            'concat_space' => ['spacing' => 'one'],
            'multiline_whitespace_before_semicolons' => ['strategy' => 'new_line_for_chained_calls'],
            'class_attributes_separation' => ['elements' => ['const' => 'one', 'method' => 'one', 'property' => 'one']],
            'phpdoc_line_span' => [
                'const' => 'single',
                'property' => 'single',
                'method' => 'multi',
            ],
            'phpdoc_to_comment' => [
                'ignored_tags' => ['var', 'template'],
            ],
            'yoda_style' => false,
        ]
    );
