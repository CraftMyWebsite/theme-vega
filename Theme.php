<?php

namespace CMW\Theme\Vega;

use CMW\Manager\Theme\IThemeConfig;

class Theme implements IThemeConfig
{
    public function name(): string
    {
        return "Vega";
    }

    public function version(): string
    {
        return "0.0.2";
    }

    public function cmwVersion(): string
    {
        return "alpha-01";
    }

    public function author(): ?string
    {
        return "Zomb";
    }

    public function authors(): array
    {
        return [];
    }

    public function compatiblesPackages(): array
    {
        return [
            "Core", "Pages", "Users", "Faq", "News", "Votes", "Wiki", "Forum", "Contact", "Shop",
        ];
    }

    public function requiredPackages(): array
    {
        return ["Core", "Users"];
    }
}