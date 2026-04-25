=== Beckin Maintenance Mode ===
Contributors: beckin
Donate link: https://www.buymeacoffee.com/beckin
Tags: maintenance mode, coming soon, 503 status, site updates, maintenance
Stable tag: 1.2.0
Requires at least: 6.8
Tested up to: 6.9
Requires PHP: 8.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A simple & lightweight, SEO-safe maintenance mode: 503 header + Retry-After, custom message, and admin bypass.

== Description ==
**Beckin Maintenance Mode** is a lightweight, secure plugin that lets administrators safely put their WordPress site into maintenance mode without hurting SEO. It sends the proper 503 Service Unavailable header with an optional Retry-After value, shows a maintenance page to visitors while still allowing admin logins, and prevents caching to ensure your site reopens cleanly.

While maintenance mode is active, logged-in admins (and any other allowed roles) can continue working in the dashboard and browse the frontend normally. To **preview the maintenance / coming soon page** as a visitor, you can do any of the following:

* Open your site in a different browser
* Open an incognito or private window
* Use a device where you are not logged in
* Log out of the admin dashboard

The first 3 options easily let you preview the maintenance page without interrupting your own work. Everyone who is not logged in, or does not have permission to bypass maintenance mode, will see the maintenance page instead of your normal site.

**FEATURES**
1. **Smart 503 Response** – Sends a proper HTTP 503 Service Unavailable header with optional Retry-After, which keeps your SEO safe.
2. **Admin Bypass** – Admins can log in and keep working without being blocked, even while maintenance mode is active.
3. **Editor Bypass Mode** – Optionally allow users who can edit posts (for example Editors and Authors) to keep working while visitors and subscribers see the maintenance page.
4. **Feed & API Safe** – RSS feeds and REST API requests aren’t broken, so external tools and readers still function.
5. **Cache-Control Protection** – Adds no-cache headers so the maintenance page isn’t cached by browsers or CDNs.
6. **Simple Settings Page** – Clean and intuitive admin UI using core WordPress settings API, with sanitized input and escaped output everywhere.
7. **Admin Bar Badge** – Shows a subtle “Maint. ON” badge when active for quick visibility.
8. **CLI Integration** – Offers WP-CLI commands (wp beckin-mm enable|disable|status) for devs managing maintenance mode programmatically.
9. **Restricted Control** – Only administrators (with the manage_options capability) can enable, disable, or change settings for maintenance mode.
10. **Lightweight & Secure** – No bloat and zero dependencies
11. **Advanced Styling Controls** – Customize the maintenance / coming soon page background colors, header and body text colors, and fully control the message box color and opacity, with a one-click Reset Style Settings button to restore defaults.

&#127775; Like our plugin? Find it useful? Please consider sharing your experience by [leaving a review on WordPress.org](https://wordpress.org/support/plugin/beckin-maintenance-mode/reviews/). Your feedback is instrumental to shaping our future growth!


== Installation ==
= Automatic installation =

1. Log into your WordPress admin
2. Click **Plugins**
3. Click **Add New**
4. Search for **Beckin Maintenance Mode**
5. Click **Install Now** under "Beckin Maintenance Mode"
6. Activate the plugin

= Manual installation =

1. Download the plugin
2. Extract the contents of the zip file
3. Upload the contents of the zip file to the `wp-content/plugins/` folder of your WordPress installation
4. Activate the Beckin Maintenance Mode plugin from 'Plugins' page.


== Frequently Asked Questions ==

= Who can enable or disable maintenance mode? =
Only administrators (users with the manage_options capability) can turn maintenance mode on or off or adjust its settings. Other roles won’t see the page in the admin menu.

= Does this plugin block administrators from accessing the dashboard? =
No. Administrators are always allowed to log in and continue working even while maintenance mode is active. If you enable Editor bypass mode, users who can edit posts (for example Editors and Authors) can also keep working. All other users & visitors see the maintenance page.

= Can Editors, Authors, or Contributors still access the admin during maintenance? =
By default, no. However, if you turn on Editor bypass mode, users who have the edit_posts capability (for example Editors, Authors, and Contributors) can still access the admin area and frontend while maintenance mode is on. Subscribers, visitors, and other lower based roles, will see the maintenance page.

= How can I preview the maintenance page while I am logged in? =
Administrators and other allowed roles continue to see the site normally so they can keep working. To preview the maintenance / coming soon page, open your site in a different browser, an incognito or private window, a device where you are not logged in, or simply log out. Anyone who is not logged in, or who does not have permission to bypass maintenance mode, will see the maintenance page while it is enabled.

= Will search engines like Google index my maintenance page? =
No. The plugin sends a proper 503 Service Unavailable response header with an optional Retry-After value, which tells search engines that downtime is temporary and preserves your SEO rankings.

= Does it work with caching plugins and CDNs? =
Yes. Beckin Maintenance Mode sends Cache-Control: no-cache headers and prevents the maintenance page from being cached by browsers or CDNs like Cloudflare.

= Can I control it using WP-CLI? =
Absolutely. Use the commands: `wp beckin-mm enable`, `wp beckin-mm disable`, `wp beckin-mm status`

= Will it affect my RSS feeds or REST API? =
No. Feeds and REST API endpoints are automatically bypassed so readers and integrations continue to function normally.

= Can I customize the maintenance message? =
Yes. You can fully customize the message in the plugin’s settings page. Basic HTML is supported and safely sanitized before output.

= Can I change the colors of the maintenance page? =
Yes. You can customize the background color, header text color, body text color, and the message box background and opacity from the plugin settings.

= Do the custom styling settings work with all themes? =
Yes. The maintenance page is a standalone template that does not load your theme.


== Screenshots ==
1. Admin Settings Page
2. Admin Settings Page Continued
3. Frontend Maintenance Page
4. Proper 503 response with Retry-After to protect SEO and no-cache headers

== CLI commands ==

`wp beckin-mm enable`
`wp beckin-mm disable`
`wp beckin-mm status`

== Changelog ==
= 1.2.0 (12/21/2025) =

__Added__
* Reset Style Settings button on the settings page to quickly restore the 5 styling fields (background color, message box color, message box opacity, header text color, and body text color) to their default values.


= 1.1.0 (12/02/2025) =

__Added__
* "Settings" link in the Plugins screen that jumps directly to the Beckin Maintenance Mode settings page.
* Extra plugin row meta links for quick access to support and the WordPress.org reviews page.


= 1.0.12 (11/20/2025) =

__Added__
* Internationalization support so all plugin strings can be translated into other languages.
* Detailed translator comments for more complex strings to help translation editors.
* Generated the initial POT file for beckin-maintenance-mode to use on translate.wordpress.org.

__Changed__
* Clarified the description and FAQ to explain how to preview the maintenance page while logged in.


= 1.0.11 (11/19/2025) =

__Changed__
* Updated the changelog styling


= 1.0.10 (11/19/2025) =

__Changed__
* Added optional Editor bypass mode so users with the edit_posts capability can keep working during maintenance if the setting is enabled.
* Updated admin and frontend checks to share a single helper so bypass rules are consistent everywhere.

__Fixed__
* Prevented subscribers and other non permitted roles from accessing wp-admin while maintenance mode is enabled.
* Adjusted WP-CLI permission checks so commands can run reliably from the command line, even when no WordPress user is logged in.


= 1.0.9 (11/16/2025) =
* Added full styling controls including background color, header text color, body text color, message box color, and message box opacity.
* Added new Styling Settings section in the admin settings page for better organization.
* Improved frontend rendering to support rgba backgrounds based on user selected opacity.
* Improved admin settings layout and section divider styling.


= 1.0.8 =
* Improved uninstall routine for better reliability across single and multisite installs.


= 1.0.7 =
* Fixed uninstall routine to prevent a fatal error by using a direct option key when constants aren't loaded.


= 1.0.6 =
* Added customizable header title field for the maintenance page.
* Improved admin UI layout and input descriptions for clarity.
* Adjusted default settings to include a header field and made text inputs wider for easier editing.


= 1.0.5 =
* Added a small maintenance icon in the admin bar to remind users when Maintenance Mode is active.


= 1.0.4 =
* Added full PHPDoc class documentation for all core files. Added @since version tags and clarified inline documentation.


= 1.0.3 =
* Updated the plugin header.


= 1.0.2 =
* Added a donation link to the settings page.


= 1.0.1 =
* Updated plugin name and slug


= 1.0.0 =
* Initial release.
