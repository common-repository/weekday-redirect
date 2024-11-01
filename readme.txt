=== Weekday Redirect ===
Contributors: moxypark
Tags: redirect, schedule, weekday
Requires at least: 2.5
Tested up to: 2.8.4
Stable tag: 1.0

Redirects to a specific page for each day of the week

== Description ==

This is a WordPress plugin created to redirect to a given page on
a particular day. Let’s say you want certain information to be
available on a certain day, like a list of events. Users could go
to http://yoursite.com/events, which would then redirect to
http://yoursite.com/events/[day], where [day] is obviously “monday”,
“tuesday” etc, depending on what day of the week it is.

There may already be more elegant solutions to this problem, but I
wanted to build a WordPress plugin from scratch, rather than adapting
an existing one. The much more efficient shortcodes system
implemented in WordPres 2.5 (better than lots of plugins performing a
find and replace or regular expression check) makes this really easy.

== Installation ==

1. Upload `weekday-redirect` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `[weekday-redirect]` in a page

== Frequently Asked Questions ==

= I get a “Headers already sent” error =

If you receive a PHP error similar to that above, you’ll need to
enable output buffering if you can. This can be done fairly simply by
adding the following line to your .htaccess file. (That lives in the
root folder of your website: often named /htdocs, /httpdocs or
/public_html.)

> php_value output_buffering 4096

This instructs PHP not to send data to the browser until the full
page has bneen read by the server. (Usually, PHP sends HTML to the
browser, processes a PHP block when it comes to one, sends the next
bit of HTML and so on.

If you try and instruct the browser to do something while it’s in
this mode, unless the instruction is right at the beginning, it’ll
be too late, because the browser’s already receiving data. Using the
output_buffering setting means PHP waits for the entire HTML page to
be parsed before sending the resulting HTML to the browser, with any
instructions at the beginning of the page.)