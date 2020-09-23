# Cakephp2 admin backend manually

1. `git clone -b 2.x git://github.com/cakephp/cakephp.git cakephp2`

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
		'database' => 'cakephp2',
```

4. Empty all FILES in `tmp\cache\` for good measure. This can be done via plugins. Put `DebugKit` & `ClearCache` into `plugins/` folder and then in:

`app\Config\bootstrap.php`
```php
CakePlugin::load('DebugKit');
CakePlugin::load('ClearCache');
```

`app\Controller\AppController.php` add to components array
```php
class AppController extends Controller {
	public $components = array( 
		//Enable DebugKit toolbar (when debug is set to >= 1) 
		'DebugKit.Toolbar' => array( 'panels' => array('ClearCache.ClearCache') ),
	);
}
```

5. `app/Config/core.php` uncomment `Configure::write('Routing.prefixes', array('admin'));` . Now you can see `url/admin`

6. `app/Controller/AppController.php` : `AppController::beforeFilter`
```php
	public function beforeFilter()
	{
		$params = $this->request->params;

        if($this->request->plugin == "administration")
        {
            return;
        }

		if ( isset($params['prefix']) && ($params['prefix'] == "admin") ) 
		{// If user try to access admin backend
	        //if ( !($this->Session->check('Administrator.id') && $this->Session->check('Administrator.current')) ) 
	        //{ // and if current user isnt admin, redirect to home 
	        //	return $this->redirect('/');
	        //}

			//if( ($this->Session->check('Administrator.id') && $this->Session->check('Administrator.current')) ) 
			//{ // and if current user is admin
	  			return $this->redirect( Router::url( array( // redirect to admin plugin
	                    'plugin'     => 'administration',
	                    'controller' => 'administrations',
	                    'action'     => 'index',
	                    'admin'      => true,
	                ), true));
            //}

	  		// For this check-if-is-admin, you also need to develop a module for users, then you can login as admin.

	  		// Start by importing `administrators.sql` into `cakephp2` DB, then cake-bake MVC files from there.

	  		// Better still, if current user isnt admin, you can redirect to admin/administration/administrations/login (not /index) . And then if user still dont login as admin, then redirect them to home.
        }
	}
```

7. Import `administrations.sql` into `cakephp2` DB.

8. 
```
console/cake bake plugin Administration
console/cake bake model Administration --plugin Administration
console/cake bake controller Administrations --plugin Administration --admin 
console/cake bake view Administrations --plugin Administration 
```

9. Now if you visit `/admin/administration/administrations`, it goes to `AdministrationsController::admin_index()`.
