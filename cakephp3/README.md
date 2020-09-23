# Cakephp3 admin backend

https://codingkala.blogspot.com/2018/05/cakephp-3-admin-panel-cakephp-admin.html

1. `composer create-project --prefer-dist cakephp/app:^3.9 cakephp3`

2. `config/app_local.php`
```php
'Datasources' => [
    'default' => [
        'host' => 'localhost',
        'username' => 'ruslan',
        'password' => 'ruslan',
        'database' => 'cakephp3b',
```

3. empty all FILES in `tmp\cache\` for good measure.

## Admin backend

4. 
```
bin/cake bake controller --prefix admin admins
bin/cake bake model admins
bin/cake bake template --prefix admin admins
```

5. Go to `config/routes.php` file and add code for admin prefix routing.
```php
\Cake\Routing\Router::prefix('admin', function ($routes) {
    // All routes here will be prefixed with `/admin`
    // And have the prefix => admin route element added.
    $routes->fallbacks(DashedRoute::class);
});
```

6. Now you can see http://localhost/cakephp3b/admin/admins and http://localhost/cakephp3b/admin/admins/add

## User Authentication

7. In `AppController::initialize()` add `$this->loadComponent('Auth'); // vendor\cakephp\cakephp\src\Controller\Component\AuthComponent.php` and `beforeFilter` and `isAuthorized` methods.

8. `Model/Entity/Admin.php`
```php
use Cake\Auth\DefaultPasswordHasher;
...
protected function _setPassword($password)
{
    if (strlen($password) > 0) 
    {
       return (new DefaultPasswordHasher)->hash($password);
    }
}
```

9. create `template/Admin/Admins/login.ctp`

10. Add `login` and `logout` methods in `AdminsController`
