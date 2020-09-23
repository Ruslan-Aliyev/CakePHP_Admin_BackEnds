# Cakephp2 admin backend with plugin

http://findnerd.com/list/view/How-to-create-an-Admin-Panel-for-a-project-in-cakephp-/2605/

1. `git clone -b 2.x git://github.com/cakephp/cakephp.git cakephp2_plugin`

2. Edit salt & cipherSeed in `app\Config\core.php`
```php
Configure::write('Security.salt', 'DYhG93b0qyJfIxfs2guVoUu--blah--FgaC9mi');
Configure::write('Security.cipherSeed', '76859309657453542--blah--364defr5');
```

3. `cp database.php.default database.php` and in `database.php`
```php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'ruslan',
		'password' => 'ruslan',
		'database' => 'cakephp2_plugin',
```

4. Empty all FILES in `tmp\cache\` for good measure. 

5. Put unzipped https://github.com/plusglobal/BrowniePHP into `app\Plugin\`

6. `app/Controller/AppController.php`
```php
class AppController extends Controller 
{
	var $components = array('Session', 'Brownie.BrwPanel');
}
```

7. `app/Model/AppModel.php`
```php
class AppModel extends Model 
{
	var $actsAs = array('Containable', 'Brownie.BrwPanel');
}
```

8. `app/Config/bootstrap.php`
```php
CakePlugin::load('Brownie', array('bootstrap' => true, 'routes' => true));
```

9. Go to `url/admin`

10. For the first time, just enter any credentials and login, in order to signup for an admin account.

11. And then you will need to tweek the redirects or create a "content" module, else you'll get `Error: The requested address '/cake_admin_be/cakephp2_plugin/admin/contents/index' was not found on this server.`