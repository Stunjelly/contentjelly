ContentJelly
============

stunjelly CMS template. 

AIM: build a simple CMS framework thats easy to drop content/mods/templates into without being confined/directed to purpose from installation.


CURRENT LAYOUT
--------------

CORE BITS: 
	contjell-loader.php - bootstrap for classes and what not.
	contjell-config.php - basically just database info and debugging on/off.
	contjell-db.php - Justin Vincent's ezSQL class shameless bundled in with a different name.
	contjell-errors.php - a very very basic error reporting class.
	contjell-modules.php - module detection from the database, and the module loader.
	contjell-pathfinder.php - address/path interpretor.
	contjell-theme.php - V basic theme loader.

ADDONS: primary, secondary, tertiary.

	primary- major directional blocks i.e: blog, forum, pages, commerce, portfolio, other things that the internet is used for
	secondary- bits and peices to fleshout primaries.
	tertiary- universal/global functions/elements 	
	
	currently I only have the user module which has a very basic registration and login page.

TEMPLATE/THEME: still have no idea how this is really going to work, currently it's a bit of mess that I'm not happy with.

INSTALLATION: never done this could be interesting, was thinking about repackaging custom modules.

REMOTE UPDATES: ???

PLAN
----
I feel like I'm making some headway, watch this space.

currently working through some user stuff, feel like I'm having to make big decisions when really I just want do the simple stuff :(

TO-DO LIST
----------

lols where to start...
-user details
-user profile
-user avatar
-admin panel
-404's
-theme and workings of.
-some basic modules like pages, or a simple forum. This will be a proof of concept kinda thingy and will come once some of the other stuff is more established.
-everything else.
