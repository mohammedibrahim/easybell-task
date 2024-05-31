<?php

namespace ContainerXMlyU0p;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTranslatorService extends EasyBell_Apps_Product_ProductKernelDevDebugContainer
{
    /**
     * Gets the public 'translator' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Translation\Translator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 6).'/vendor/symfony/translation-contracts/TranslatorInterface.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/translation/TranslatorBagInterface.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/translation-contracts/LocaleAwareInterface.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/translation/Translator.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/framework-bundle/Translation/Translator.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/translation/Formatter/MessageFormatterInterface.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/translation/Formatter/IntlFormatterInterface.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/translation/Formatter/MessageFormatter.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/translation-contracts/TranslatorTrait.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/translation/IdentityTranslator.php';

        $container->services['translator'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\Translator(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'translation.loader.csv' => ['privates', 'translation.loader.csv', 'getTranslation_Loader_CsvService', true],
            'translation.loader.dat' => ['privates', 'translation.loader.dat', 'getTranslation_Loader_DatService', true],
            'translation.loader.ini' => ['privates', 'translation.loader.ini', 'getTranslation_Loader_IniService', true],
            'translation.loader.json' => ['privates', 'translation.loader.json', 'getTranslation_Loader_JsonService', true],
            'translation.loader.mo' => ['privates', 'translation.loader.mo', 'getTranslation_Loader_MoService', true],
            'translation.loader.php' => ['privates', 'translation.loader.php', 'getTranslation_Loader_PhpService', true],
            'translation.loader.po' => ['privates', 'translation.loader.po', 'getTranslation_Loader_PoService', true],
            'translation.loader.qt' => ['privates', 'translation.loader.qt', 'getTranslation_Loader_QtService', true],
            'translation.loader.res' => ['privates', 'translation.loader.res', 'getTranslation_Loader_ResService', true],
            'translation.loader.xliff' => ['privates', 'translation.loader.xliff', 'getTranslation_Loader_XliffService', true],
            'translation.loader.yml' => ['privates', 'translation.loader.yml', 'getTranslation_Loader_YmlService', true],
        ], [
            'translation.loader.csv' => '?',
            'translation.loader.dat' => '?',
            'translation.loader.ini' => '?',
            'translation.loader.json' => '?',
            'translation.loader.mo' => '?',
            'translation.loader.php' => '?',
            'translation.loader.po' => '?',
            'translation.loader.qt' => '?',
            'translation.loader.res' => '?',
            'translation.loader.xliff' => '?',
            'translation.loader.yml' => '?',
        ]), new \Symfony\Component\Translation\Formatter\MessageFormatter(new \Symfony\Component\Translation\IdentityTranslator()), 'en', ['translation.loader.php' => ['php'], 'translation.loader.yml' => ['yaml', 'yml'], 'translation.loader.xliff' => ['xlf', 'xliff'], 'translation.loader.po' => ['po'], 'translation.loader.mo' => ['mo'], 'translation.loader.qt' => ['ts'], 'translation.loader.csv' => ['csv'], 'translation.loader.res' => ['res'], 'translation.loader.dat' => ['dat'], 'translation.loader.ini' => ['ini'], 'translation.loader.json' => ['json']], ['cache_dir' => ($container->targetDir.''.'/translations'), 'debug' => true, 'resource_files' => ['af' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.af.xlf')], 'ar' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.ar.xlf')], 'az' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.az.xlf')], 'be' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.be.xlf')], 'bg' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.bg.xlf')], 'bs' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.bs.xlf')], 'ca' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.ca.xlf')], 'cs' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.cs.xlf')], 'cy' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.cy.xlf')], 'da' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.da.xlf')], 'de' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.de.xlf')], 'el' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.el.xlf')], 'en' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.en.xlf')], 'es' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.es.xlf')], 'et' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.et.xlf')], 'eu' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.eu.xlf')], 'fa' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.fa.xlf')], 'fi' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.fi.xlf')], 'fr' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.fr.xlf')], 'gl' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.gl.xlf')], 'he' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.he.xlf')], 'hr' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.hr.xlf')], 'hu' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.hu.xlf')], 'hy' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.hy.xlf')], 'id' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.id.xlf')], 'it' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.it.xlf')], 'ja' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.ja.xlf')], 'lb' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.lb.xlf')], 'lt' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.lt.xlf')], 'lv' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.lv.xlf')], 'mk' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.mk.xlf')], 'mn' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.mn.xlf')], 'my' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.my.xlf')], 'nb' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.nb.xlf')], 'nl' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.nl.xlf')], 'nn' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.nn.xlf')], 'no' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.no.xlf')], 'pl' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.pl.xlf')], 'pt' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.pt.xlf')], 'pt_BR' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.pt_BR.xlf')], 'ro' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.ro.xlf')], 'ru' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.ru.xlf')], 'sk' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.sk.xlf')], 'sl' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.sl.xlf')], 'sq' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.sq.xlf')], 'sr_Cyrl' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.sr_Cyrl.xlf')], 'sr_Latn' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.sr_Latn.xlf')], 'sv' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.sv.xlf')], 'th' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.th.xlf')], 'tl' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.tl.xlf')], 'tr' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.tr.xlf')], 'uk' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.uk.xlf')], 'ur' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.ur.xlf')], 'uz' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.uz.xlf')], 'vi' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.vi.xlf')], 'zh_CN' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.zh_CN.xlf')], 'zh_TW' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations/validators.zh_TW.xlf')]], 'scanned_directories' => [(\dirname(__DIR__, 6).'/vendor/symfony/validator/Resources/translations'), (\dirname(__DIR__, 6).'/vendor/symfony/framework-bundle/translations'), (\dirname(__DIR__, 6).'/vendor/doctrine/doctrine-bundle/translations'), (\dirname(__DIR__, 6).'/translations')], 'cache_vary' => ['scanned_directories' => ['vendor/symfony/validator/Resources/translations', 'vendor/symfony/framework-bundle/translations', 'vendor/doctrine/doctrine-bundle/translations', 'translations']]], []);

        $instance->setConfigCacheFactory(($container->privates['config_cache_factory'] ?? self::getConfigCacheFactoryService($container)));
        $instance->setFallbackLocales(['en']);

        return $instance;
    }
}