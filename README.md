AjglSf4ToSf5RoleUnserialization
===============================

BC layer to keep users logged in after upgrading your Symfony 4 app to Symfony 5. See [#44676].

**<NOTE>** This issue has been already fixed in Symfony code. This package is not needed anymore. See [#44805]

The problem
-----------

The `Symfony\Component\Security\Core\Role\Role` and `Symfony\Component\Security\Core\Role\SwitchUserRole` classes were [deprecated] in Symfony 4.3 and
[removed] in Symfony 5.0.

But if you are using PHP sessions to keep users logged in and you are using any
authentication token that extends the given `AbstractToken`,
the authenticated token is being serialized with references to old role classes in your Symfony 4 app.

When you upgrade your app to Symfony 5, and the `ContextListener` tries to unserialize the
token, the old role classes no longer exist, causing an exception. The exception is caught by
Symfony and your users will only see their sessions closed without any reason.

This component will provide the missing role classes to prevent the unserialization error. These classes
are only needed the first time a token is unserialized after the upgrade, so **it can be safely removed when every Symfony 4 session has been upgraded or removed**.


Installation
------------

To install the latest stable version of this component, open a console and execute the following command:
```
$ composer require ajgl/sf4-to-sf5-role-unserialization
```


Uninstallation
--------------

To uninstall this component, open a console and execute the following command:
```
$ composer remove ajgl/sf4-to-sf5-role-unserialization
```


License
-------

This component is under the MIT license. See the complete license in the [LICENSE] file.


Reporting an issue or a feature request
---------------------------------------

Issues and feature requests are tracked in the [Github issue tracker].


Author Information
------------------

Developed with ♥ by [Antonio J. García Lagar].

If you find this component useful, please add a ★ in the [GitHub repository page].

[#44676]: https://github.com/symfony/symfony/issues/44676
[#44805]: https://github.com/symfony/symfony/pull/44805
[deprecated]: https://github.com/symfony/symfony/pull/22048
[removed]: https://github.com/symfony/symfony/pull/31723
[LICENSE]: LICENSE
[Github issue tracker]: https://github.com/ajgarlag/AjglSf4ToSf5RoleUnserialization/issues
[Antonio J. García Lagar]: http://aj.garcialagar.es
[GitHub repository page]: https://github.com/ajgarlag/AjglSf4ToSf5RoleUnserialization
