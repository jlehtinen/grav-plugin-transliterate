# Grav Transliterate Twig filter Plugin

**Transliterate** is a [Grav](http://github.com/getgrav/grav) plugin that converts accented characters to their ASCII equivalents. For example, 'Ä' will become 'A'.


## Installation

Installing the Transliterate plugin can be done in one of two ways. The GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.


### GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's terminal (also called the command line).  From the root of your Grav install type:

    bin/gpm install transliterate

This will install the Transliterate plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/transliterate`.


### Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `transliterate`. You can find these files on [GitHub](https://github.com/jlehtinen/grav-plugin-transliterate) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/transliterate
	
> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) to operate.


## Configuration

Before configuring this plugin, you should copy the `user/plugins/transliterate/transliterate.yaml` to `user/config/plugins/transliterate.yaml` and only edit that copy.

The only available option is to enable or disable the filter:

```yaml
enabled: true
```

## Usage


### Transliterate

To convert accented characters in a string to ASCII equivalents, use the `transliterate' filter:

    {{ person.name|transliterate }}

Motör-Heäd Nylén will output Motor-Head Nylen and Đáç Århus outputs Dac Arhus. 


### Filename

If you want filename compatible versions of names, also remove whitespace and hyphenation with `filename` filter:

    {{ person.name|filename }}

This will convert Ján-Petter Novosić to janpetternovosic.

This is useful for example when you simply want to drop image files named `firstnamelastname.jpg` into a Team member directory and have Grav automatically find them:

    {% set image = page.media[person.name|filename ~ '.jpg'] %}