=== Prismatic ===

Plugin Name: Prismatic
Plugin URI: https://perishablepress.com/prismatic/
Description: Display beautiful syntax-highlighted code snippets with Prism.js or Highlight.js
Tags: code, snippets, syntax, highlight, language,  snippet, pre, prettify, prism, css, fence
Author: Jeff Starr
Contributors: specialk
Author URI: https://plugin-planet.com/
Donate link: https://m0n.co/donate
Requires at least: 4.1
Tested up to: 4.8
Stable tag: 1.3
Version: 1.3
Text Domain: prismatic
Domain Path: /languages
License: GPL v2 or later

Display beautiful syntax-highlighted code snippets with Prism.js or Highlight.js



== Description ==

> Brand new plugin with all-new shiny code fresh from the WP API!

__The only 3-in-1 syntax highlighter!__

Display beautiful code snippets with Prism.js, Highlight.js, or plain code escaping:

* __Prism.js__     - Code escape + syntax highlight using [Prism.js](http://prismjs.com/)
* __Highlight.js__ - Code escape + syntax highlight using [Highlight.js](https://highlightjs.org/)
* __Plain Flavor__ - Code escape without syntax highlight (for custom styles)

**Prism.js Features**

* Supports over __36__ coding languages
* Choose from all __7__ available Prism themes
* Enable Prism plugin [Line Numbers](http://prismjs.com/plugins/line-numbers/)
* Enable Prism plugin [Line Highlight](http://prismjs.com/plugins/line-highlight/)
* Enable Prism plugin [Show Language](http://prismjs.com/plugins/show-language/)
* Highlights code in post content, excerpts, and comments
* Detects `language-` and `lang-` class prefixes
* Limit syntax highlighting to Posts and Pages
* Highlight single-line and multi-line code
* Granular control over code escaping
* Smart loading of CSS &amp; JS assets

**Highlight.js Features**

* Supports __29__ coding languages
* Choose from all __77__ available Highlight themes
* Customize the Highlight.js init JavaScript
* Highlights code in post content, excerpts, and comments
* Limit syntax highlighting to Posts and Pages
* Highlight multi-line blocks of code
* Detects `language-` and `lang-` class prefixes
* Enable support for no-prefix class names
* Granular control over code escaping
* Smart loading of CSS &amp; JS assets

**Plain Flavor Features**

* Enable code escaping for post content, excerpts, and/or comments
* Enable code escaping on the frontend, Admin Area, or both
* Escapes single-line and multi-line code snippets

**General Features**

* Easy to set up &amp; configure
* Built with the WordPress API
* Squeaky clean, error-free code
* Born of simplicity, no frills
* Lightweight, fast and flexible
* Focused on performance and security
* Loads CSS/JS assets only when required
* Adheres to HTML coding best practices

_Prismatic escapes only the essentials to keep your code clean._

[Check out the screenshots](https://wordpress.org/plugins/prismatic/screenshots/) for more details!



== Screenshots ==

1. Prismatic General Settings
2. Prismatic Prism.js Settings
3. Prismatic Highlight.js Settings
4. Prismatic Plain Flavor Settings
5. Prism.js : Twilight theme (choose from 7 Prism.js themes!)
6. Highlight.js : Arduino Light theme (choose from 77 Highlight.js themes!)
7. Highlight.js : Gruvbox Dark theme (choose from 77 Highlight.js themes!)
8. Cleanly escaped code without syntax highlighting (Plain Flavor)



== Installation ==

**Installing Prismatic**

1. Make a backup of your database
2. Upload the plugin to your blog and activate
3. Visit the plugin settings to configure options

__Note:__ Please read the section below on "code escaping" to understand how it works.

_[More info on installing WP plugins](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins)_



**Uninstalling**

Prismatic cleans up after itself. All plugin settings will be removed from your database when the plugin is uninstalled via the Plugins screen.



**Restore Default Options**

To restore default plugin options, either uninstall/reinstall the plugin or visit the Prismatic General Settings &gt; Restore default plugin options.



**Usage: Syntax Highlighting**

The Prismatic plugin follows the same conventions used by [Prism.js](http://prismjs.com/) and [Highlight.js](https://highlightjs.org/). Here are the basic steps:

1. Visit the Prismatic General Settings and choose your library 
2. Visit the settings tab for your chosen library
3. Choose a theme and configure your options

Once the settings are configured, you can enable syntax highlighting for any code snippet by doing one of the following:

* Wrap multi-line code with pre &amp; code tags: &lt;pre&gt;&lt;code&gt;...&lt;/code&gt;&lt;/pre&gt;
* Wrap single-line code with code tags: &lt;code&gt;...&lt;/code&gt;

__Note:__ Prism.js highlights both multi-line and single-line code snippets. Highlight.js only supports multi-line code snippets.

With the proper markup in place, you can indicate a specific language by adding a class of `language-abc` or `lang-abc` to the &lt;code&gt; tag (where "abc" is the language identifier). For example, to indicate PHP as the language for a single-line code snippet:

	<code class="language-php"><?php echo 'Hello world'; ?></code>

Likewise, to indicate HTML as the language for a multi-line code snippet:

	<pre><code class="language-html">
		<table>
			<tr>
				<th>Name</th>
				<th>Side</th>
				<th>Role</th>
			<tr>
				<td>Darth</td>
				<td>Dark</td>
				<td>Sith</td>
			</tr>
		</table>
	</code></pre>

So the prefix of the class names are the same for Prism.js and Highlight.js. The difference is the language identifier used to specify each language. Check out the following "About Prism.js" and "About Highlight.js" sections for more information.

__Note:__ In addition to detecting the `language-` and `lang-` prefixes, Highlight.js also will try to auto-detect the language without it being specified. Plus as an option, you can enable the Highlight.js setting, "Support no-prefix class names" to enable use of language identifiers without any `language-` or `lang-` prefix.



**Usage: Code escaping**

Just like Prism.js and Highlight.js, the Prismatic plugin follows HTML coding standards. To enable code escaping:

1. Visit the Prismatic General Settings and choose your library
2. Enable "Code Escaping" via the settings tab of your chosen library
3. Do one of the following:
	* Wrap multi-line code with pre &amp; code tags: &lt;pre&gt;&lt;code&gt;...&lt;/code&gt;&lt;/pre&gt;
	* Wrap single-line code with code tags: &lt;code&gt;...&lt;/code&gt;

For example, the code snippets included in either of the following markup examples would be escaped (note that the class attribute is not required for code escaping).

This is a single-line example:

	<code class="language-php"><?php echo 'Hello world'; ?></code>

This is a multi-line code example:
	
	<pre><code class="language-html">
		<table>
			<tr>
				<th>Name</th>
				<th>Side</th>
				<th>Role</th>
			<tr>
				<td>Darth</td>
				<td>Dark</td>
				<td>Sith</td>
			</tr>
		</table>
	</code></pre>

So what exactly happens when the "Code Escaping" options are enabled? Here is a summary that applies to each section (post content, excerpts, and comments):

* __Frontend only__ - code snippets are escaped at runtime (no changes made to content in the database)
* __Admin Area only__ - code snippets are escaped when viewed via the Admin Area (changes will be saved to database if the "Update" or "Publish" button is clicked)
* __Frontend &amp; Admin Area__ - both of the previous are applied
* __None__ - all code escaping is disabled

Note that each library &mdash; Prism.js, Highlight.js, and Plain Flavor &mdash; features its own code-escape settings. So the code-escape settings that are applied depends on the currently active library. Visit the plugin's General Settings to choose your library. Then visit that library's tab to configure its code-escape settings.

When code escaping is enabled for either/both the frontend or Admin Area, the plugin makes the following changes to any code contained within &lt;code&gt;&lt;/code&gt; tags:

	\r                     removed
	&                      replaced with &amp;
	<                      replaced with &lt;
	>                      replaced with &gt;
	trailing whitespace    removed

These are the _only_ changes made to your code, no other changes are made. 

As mentioned, the difference between code escaping on the frontend vs. the Admin Area is that, on the frontend, the above changes are made at runtime and not saved to the database; whereas in the Admin Area, the changes are made when the code is viewed via a content editor, such that any changes made will be saved to the database when the user clicks the "Update" or "Publish" button. Please keep this in mind when choosing your code-escape settings.
		
__Important!__ As explained, enabling code escaping in the Admin Area may result in the escaped code getting saved in the database. This is fine in most cases, but there may be situations where escaping should only happen at runtime. If that is the case, or if you are unsure, choose the "Frontend only" option for the "Code Escaping" setting. The "Frontend only" option only modifies code when displayed on the frontend and does not save any changes to the database.



**About Prism.js**

Prism.js version used in Prismatic plugin: __1.6__

__Prism.js resources__

* [Homepage](http://prismjs.com/)
* [GitHub](https://github.com/PrismJS/prism)
* [Changelog](https://github.com/PrismJS/prism/blob/gh-pages/CHANGELOG.md)

__License &amp; Info__

	/*
		Prism: Lightweight, robust, elegant syntax highlighting
		MIT license http://www.opensource.org/licenses/mit-license.php/
		@author Lea Verou http://lea.verou.me
	*/

__Supported Languages__

	Language       Class
	
	Apache         = apacheconf
	AppleScript    = applescript
	Bash           = bash
	C              = c
	C#             = csharp
	C++            = cpp
	C-like         = clike
	CoffeeScript   = coffeescript
	CSS            = css
	Diff           = diff
	Git            = git
	GraphQL        = graphql
	Groovy         = groovy
	HTTP           = http
	Ini            = ini
	Java           = java
	JavaScript     = javascript
	JSON           = json
	Kotlin         = kotlin
	Makefile       = makefile
	Markdown       = markdown
	Markup         = markup
	NGINX          = nginx
	Objective-C    = objectivec
	Perl           = perl
	PHP            = php
	PowerShell     = powershell
	Python         = python
	Ruby           = ruby
	SASS           = sass
	SCSS           = scss
	SQL            = sql
	Swift          = swift
	Twig           = twig
	TypeScript     = typescript
	YAML           = yaml

So for example, to specify a code block as C++, you would write:

	Single line: <code class="language-cpp">...</code>
	
	Multi-line: <pre><code class="language-cpp">...</code></pre>

To disable Prism.js syntax highlighting for any snippet, simply omit the language class.


_I'm glad to add more languages, [make a suggestion](https://perishablepress.com/contact/)_



**About Highlight.js**

Highlight.js version used in Prismatic plugin: __9.11.0__

__Highlight.js resources__

* [Homepage](https://highlightjs.org/)
* [GitHub](https://github.com/isagalaev/highlight.js)
* [Changelog](https://github.com/isagalaev/highlight.js/blob/master/CHANGES.md)

__License &amp; Info__

	/*
		Syntax highlighting with language autodetection.
		Copyright (c) 2006, Ivan Sagalaev https://highlightjs.org/
		All rights reserved. BSD3 License @ https://git.io/hljslicense
	*/

__Supported Languages__

	Language       Class
	
	Apache         = apache, apacheconf
	AppleScript    = applescript, osascript
	Bash           = bash, sh, zsh
	C#             = cs, csharp
	C++            = cpp, c, cc, h, c++, h++, hpp
	CSS            = css
	CoffeeScript   = coffeescript, coffee, cson, iced
	Diff           = diff, patch
	Groovy         = groovy
	HTML/XML       = xml, html, xhtml, rss, atom, xjb, xsd, xsl, plist
	HTTP           = http, https
	Ini            = ini
	JSON           = json
	Java           = java, jsp
	JavaScript     = javascript, js, jsx
	Kotlin         = kotlin
	Makefile       = makefile, mk, mak
	Markdown       = markdown, md, mkdown, mkd
	Nginx          = nginx, nginxconf
	Objective-C    = objectivec, mm, objc, obj-c
	PHP            = php, php3, php4, php5, php6
	Perl           = perl, pl, pm
	PowerShell     = powershell, ps
	Python         = python, py, gyp
	Ruby           = ruby, rb, gemspec, podspec, thor, irb
	Shell Session  = shell
	SQL            = sql
	Swift          = swift
	TypeScript     = typescript, ts

So for example, to specify a code block as C++, you would write:

	Single line: <code class="language-cpp">...</code>
	
	Multi-line: <pre><code class="language-cpp">...</code></pre>

To disable Highlight.js syntax highlighting for any code block, add a class of `nohighlight`, like so:

	<code class="nohighlight">...</code>

_I'm glad to add more languages, [make a suggestion](https://perishablepress.com/contact/)_



== Upgrade Notice ==

To upgrade Prismatic, remove the old version and replace with the new version. Or just click "Update" from the Plugins screen and let WordPress do it for you automatically.

__Note:__ uninstalling the plugin from the WP Plugins screen results in the removal of all settings from the WP database. 



== Frequently Asked Questions ==

**Can you add another language for Prism.js or Highlight.js?**

Yes, feel free to [suggest a language](https://perishablepress.com/contact/)


**Got a question?**

Send any questions or feedback via my [contact form](https://perishablepress.com/contact/)



== Support development of this plugin ==

I develop and maintain this free plugin with love for the WordPress community. To show support, you can [make a cash donation](https://m0n.co/donate), [bitcoin donation](https://m0n.co/bitcoin), or purchase one of my books:

* [The Tao of WordPress](https://wp-tao.com/)
* [Digging into WordPress](https://digwp.com/)
* [.htaccess made easy](https://htaccessbook.com/)
* [WordPress Themes In Depth](https://wp-tao.com/wordpress-themes-book/)

And/or purchase one of my premium WordPress plugins:

* [BBQ Pro](https://plugin-planet.com/bbq-pro/) - Pro version of Block Bad Queries
* [Blackhole Pro](https://plugin-planet.com/blackhole-pro/) - Pro version of Blackhole for Bad Bots
* [SES Pro](https://plugin-planet.com/ses-pro/) - Super-simple &amp; flexible email signup forms
* [USP Pro](https://plugin-planet.com/usp-pro/) - Pro version of User Submitted Posts

Links, tweets and likes also appreciated. Thank you! :)



== Changelog ==

**1.3 (2017/03/24)**

* Updates some URLs to HTTPS
* Updates Prism.js to version 1.6
* Updates Highlight.js to version 9.11.0
* Adds new languages for Highlight.js and Prism.js
* Tweaks plugin settings styles
* Replaces global `$wp_version` with `get_bloginfo('version')`
* Tests on WordPress version 4.8

**1.2 (2016/11/16)**

* Adds support for AppleScript in Highlight.js
* Updates plugin URL in core files and readme.txt
* Changes stable tag from trunk to latest version
* Adds `&raquo;` to rate this link on Plugins screen
* Adds strong tags to admin notices on settings page
* Refines styles for popup dialog on settings page
* Tests on WordPress version 4.7 (beta)

**1.1 (2016/10/24)**

* Updates/adds some links
* Updates default language file
* Tests on WordPress version 4.7 (alpha)

**1.0 (2016/10/21)**

* Initial release


