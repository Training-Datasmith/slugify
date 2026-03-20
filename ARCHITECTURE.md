# Architecture: slugify

## Purpose

A PHP library that converts arbitrary strings (including non-ASCII characters) into URL-friendly slugs. Supports 40+ languages via character transliteration rule sets.

## Directory Structure

```
src/
  Slugify.php                    - Core slug generation engine
  Slugify_Interface.php          - Public contract for the slugifier
  RuleProvider/
    Rule_Provider_Interface.php  - Contract for rule set providers
    Default_Rule_Provider.php    - Loads built-in transliteration rule sets
    File_Rule_Provider.php       - Loads rule sets from custom file paths
  Bridge/
    Laravel/                     - Laravel service provider and facade
    Latte/                       - Latte template helper
    League/                      - League Container service provider
    Nette/                       - Nette DI extension
    Plum/                        - Plum pipeline converter
    Symfony/                     - Symfony bundle, Twig extension, DI configuration
    Twig/                        - Standalone Twig extension
    ZF2/                         - Zend Framework 2 module, service, and view helper
Resources/rules/                 - JSON transliteration rule files (one per language)
tests/                           - PHPUnit tests for core and each bridge
```

## Key Design Decisions

- **Rule-provider pattern**: Transliteration rules are loaded lazily via `Rule_Provider_Interface`, enabling custom rule sets without modifying core code.
- **Language priority ordering**: Rule sets are applied in priority order (later = higher priority), allowing language-specific overrides on top of the default Latin transliteration.
- **Configurable options**: The `slugify()` call accepts an options array overriding separator, case, trimming, and the character class regex.
- **Framework bridges**: Each bridge is a thin adapter; no framework-specific code leaks into the core `Slugify` class.

## Extension Points

- Implement `Rule_Provider_Interface` to load rules from a database or remote source.
- Add new language rules by adding a JSON file to `Resources/rules/` and registering the ruleset name.

## Dependency Flow

```
Slugify (implements Slugify_Interface)
  └─> Rule_Provider_Interface::getRules(string $ruleset) — loads transliteration map
  └─> options array — controls separator, case, trim, and regex
```
