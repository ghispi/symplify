<?php

declare(strict_types=1);

namespace Symplify\RuleDocGenerator\RuleCodeSamplePrinter;

use Symplify\RuleDocGenerator\Contract\CodeSampleInterface;
use Symplify\RuleDocGenerator\Contract\RuleCodeSamplePrinterInterface;
use Symplify\RuleDocGenerator\Printer\CodeSamplePrinter\BadGoodCodeSamplePrinter;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

final class PHPCodeSnifferRuleCodeSamplePrinter implements RuleCodeSamplePrinterInterface
{
    public function __construct(
        private BadGoodCodeSamplePrinter $badGoodCodeSamplePrinter
    ) {
    }

    public function isMatch(string $class): bool
    {
        /** @noRector */
        return is_a($class, 'PHP_CodeSniffer\Sniffs\Sniff', true);
    }

    /**
     * @return string[]
     */
    public function print(
        CodeSampleInterface $codeSample,
        RuleDefinition $ruleDefinition,
        bool $shouldUseConfigureMethod
    ): array {
        return $this->badGoodCodeSamplePrinter->print($codeSample);
    }
}
