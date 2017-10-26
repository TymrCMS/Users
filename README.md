# TymrCMS - Users Module
[![Source](https://img.shields.io/badge/source-S_McDonald-blue.svg)](https://github.com/TymrCMS/Auth-Module)

The Users module takes care of user management for TymrCMS. NB: All authentication is handled by the Auth module. This modules handles the admin dashboard for users and the public facing pages.
This module uses events to hook into other modules and plugins as required.

TymrCMS is a simple starter app built on Laravel 5.5 (lts).
It was created to kick start development on my Laravel apps so the repetitive mundane tasks such as auth, pages, settings, modules and theme structure that I use on all my projects are all done.

### Modules
TymrCMS takes advantage of the L5modular package to create Modules and plugins for better seperation of concerns and modular structure in development.
All Modules are located /app/Modules/.. and likewise for Plugins /app/Plugins/..
Modules are the required components of the CMS while plugins are optional.



### Compatibility
This module requires Laravel 5.5 lts and TymrCMS 1.0.


## License
<a name="license"></a>
Licensed under the terms of the [MIT License](http://opensource.org/licenses/MIT)
