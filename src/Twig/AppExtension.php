<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Twig;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Intl\Locales;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * See https://symfony.com/doc/current/templating/twig_extension.html.
 *
 */
class AppExtension extends AbstractExtension
{
    private $localeCodes;
    private $locales;

    public function __construct(string $locales, EntityManagerInterface $entityManager)
    {
        $localeCodes = explode('|', $locales);
        sort($localeCodes);
        $this->localeCodes = $localeCodes;

        $this->em = $entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('locales', [$this, 'getLocales']),
            new TwigFunction('getNavbars', [$this, 'getNavbars']),
        ];
    }

    /**
     * Takes the list of codes of the locales (languages) enabled in the
     * application and returns an array with the name of each locale written
     * in its own language (e.g. English, Français, Español, etc.).
     */
    public function getLocales(): array
    {
        if (null !== $this->locales) {
            return $this->locales;
        }

        $this->locales = [];
        foreach ($this->localeCodes as $localeCode) {
            $this->locales[] = ['code' => $localeCode, 'name' => Locales::getName($localeCode, $localeCode)];
        }

        return $this->locales;
    }

    /**
     * Extension twig getNavbars
     */
    public function getNavbars()
    {
        return $this->em->getRepository(Navbar::class)->findBy(
            array('user' => $userId),
            array('position' => 'ASC')
        );
    }



}
