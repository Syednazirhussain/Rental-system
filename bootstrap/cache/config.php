<?php return array (
  'app' => 
  array (
    'name' => 'Laravel',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://localhost',
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'key' => 'base64:0LEO4HHV/YbMEBKjHdTnFDjbiTYUzCZCj9MwcTb4FNw=',
    'cipher' => 'AES-256-CBC',
    'log' => 'single',
    'log_level' => 'debug',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'App\\Providers\\AppServiceProvider',
      23 => 'App\\Providers\\AuthServiceProvider',
      24 => 'App\\Providers\\EventServiceProvider',
      25 => 'App\\Providers\\RouteServiceProvider',
      26 => 'Collective\\Html\\HtmlServiceProvider',
      27 => 'Laracasts\\Flash\\FlashServiceProvider',
      28 => 'Prettus\\Repository\\Providers\\RepositoryServiceProvider',
      29 => 'InfyOm\\Generator\\InfyOmGeneratorServiceProvider',
      30 => 'InfyOm\\AdminLTETemplates\\AdminLTETemplatesServiceProvider',
      31 => 'Way\\Generators\\GeneratorsServiceProvider',
      32 => 'Xethron\\MigrationsGenerator\\MigrationsGeneratorServiceProvider',
      33 => 'Orangehill\\Iseed\\IseedServiceProvider',
      34 => 'Barryvdh\\DomPDF\\ServiceProvider',
      35 => 'Unisharp\\Ckeditor\\ServiceProvider',
      36 => 'Spatie\\Permission\\PermissionServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Form' => 'Collective\\Html\\FormFacade',
      'Html' => 'Collective\\Html\\HtmlFacade',
      'Flash' => 'Laracasts\\Flash\\Flash',
      'PDF' => 'Barryvdh\\DomPDF\\Facade',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'admin' => 
      array (
        'driver' => 'session',
        'provider' => 'admin',
      ),
      'company' => 
      array (
        'driver' => 'session',
        'provider' => 'companies',
      ),
      'company_customer' => 
      array (
        'driver' => 'session',
        'provider' => 'companies_customers',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'users',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
      'admin' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
      'companies' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
      'companies_customers' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'encrypted' => true,
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
    ),
    'prefix' => 'laravel_cache',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'database' => 'rental_system_db',
        'prefix' => '',
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'rental_system_db',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => false,
        'engine' => 'InnoDB',
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'rental_system_db',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'rental_system_db',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'predis',
      'default' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\storage\\app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\storage\\app/public',
        'url' => 'http://localhost/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => NULL,
        'secret' => NULL,
        'region' => NULL,
        'bucket' => NULL,
      ),
    ),
  ),
  'generators' => 
  array (
    'config' => 
    array (
      'model_template_path' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\vendor/xethron/laravel-4-generators/src/Way/Generators/templates/model.txt',
      'scaffold_model_template_path' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\vendor/xethron/laravel-4-generators/src/Way/Generators/templates/scaffolding/model.txt',
      'controller_template_path' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\vendor/xethron/laravel-4-generators/src/Way/Generators/templates/controller.txt',
      'scaffold_controller_template_path' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\vendor/xethron/laravel-4-generators/src/Way/Generators/templates/scaffolding/controller.txt',
      'migration_template_path' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\vendor/xethron/laravel-4-generators/src/Way/Generators/templates/migration.txt',
      'seed_template_path' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\vendor/xethron/laravel-4-generators/src/Way/Generators/templates/seed.txt',
      'view_template_path' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\vendor/xethron/laravel-4-generators/src/Way/Generators/templates/view.txt',
      'model_target_path' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\app',
      'controller_target_path' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\app\\Http/Controllers',
      'migration_target_path' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\database/migrations',
      'seed_target_path' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\database/seeds',
      'view_target_path' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\resources/views',
    ),
  ),
  'infyom' => 
  array (
    'laravel_generator' => 
    array (
      'path' => 
      array (
        'migration' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\database/migrations/',
        'model' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\app\\Models/',
        'datatables' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\app\\DataTables/',
        'repository' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\app\\Repositories/',
        'routes' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\routes/web.php',
        'api_routes' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\routes/api.php',
        'request' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\app\\Http/Requests/',
        'api_request' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\app\\Http/Requests/API/',
        'controller' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\app\\Http/Controllers/',
        'api_controller' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\app\\Http/Controllers/API/',
        'test_trait' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\tests/traits/',
        'repository_test' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\tests/',
        'api_test' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\tests/',
        'views' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\resources/views/',
        'schema_files' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\resources/model_schemas/',
        'templates_dir' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\resources/infyom/infyom-generator-templates/',
        'modelJs' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\resources/assets/js/models/',
      ),
      'namespace' => 
      array (
        'model' => 'App\\Models',
        'datatables' => 'App\\DataTables',
        'repository' => 'App\\Repositories',
        'controller' => 'App\\Http\\Controllers',
        'api_controller' => 'App\\Http\\Controllers\\API',
        'request' => 'App\\Http\\Requests',
        'api_request' => 'App\\Http\\Requests\\API',
      ),
      'templates' => 'adminlte-templates',
      'model_extend_class' => 'Eloquent',
      'api_prefix' => 'api',
      'api_version' => 'v1',
      'options' => 
      array (
        'softDelete' => true,
        'tables_searchable_default' => false,
      ),
      'prefixes' => 
      array (
        'route' => '',
        'path' => '',
        'view' => '',
        'public' => '',
      ),
      'add_on' => 
      array (
        'swagger' => false,
        'tests' => true,
        'datatables' => false,
        'menu' => 
        array (
          'enabled' => true,
          'menu_file' => 'layouts/menu.blade.php',
        ),
      ),
      'timestamps' => 
      array (
        'enabled' => true,
        'created_at' => 'created_at',
        'updated_at' => 'updated_at',
        'deleted_at' => 'deleted_at',
      ),
      'ignore_model_prefix' => false,
    ),
  ),
  'mail' => 
  array (
    'driver' => 'smtp',
    'host' => 'smtp.sendgrid.net',
    'port' => '587',
    'from' => 
    array (
      'address' => 'admin@highnox.com',
      'name' => 'HighNox',
    ),
    'encryption' => NULL,
    'username' => 'qaiserpc',
    'password' => 'Allahisone786',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'C:\\xampp\\htdocs\\rental-system-backend-new\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'permission' => 
  array (
    'models' => 
    array (
      'permission' => 'Spatie\\Permission\\Models\\Permission',
      'role' => 'Spatie\\Permission\\Models\\Role',
    ),
    'table_names' => 
    array (
      'roles' => 'user_roles',
      'permissions' => 'permissions',
      'model_has_permissions' => 'model_has_permissions',
      'model_has_roles' => 'model_has_roles',
      'role_has_permissions' => 'role_has_permissions',
    ),
    'cache_expiration_time' => 1440,
    'display_permission_in_exception' => false,
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => 'your-public-key',
        'secret' => 'your-secret-key',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
      ),
    ),
    'failed' => 
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'repository' => 
  array (
    'pagination' => 
    array (
      'limit' => 15,
    ),
    'fractal' => 
    array (
      'params' => 
      array (
        'include' => 'include',
      ),
      'serializer' => 'League\\Fractal\\Serializer\\DataArraySerializer',
    ),
    'cache' => 
    array (
      'enabled' => false,
      'minutes' => 30,
      'repository' => 'cache',
      'clean' => 
      array (
        'enabled' => true,
        'on' => 
        array (
          'create' => true,
          'update' => true,
          'delete' => true,
        ),
      ),
      'params' => 
      array (
        'skipCache' => 'skipCache',
      ),
      'allowed' => 
      array (
        'only' => NULL,
        'except' => NULL,
      ),
    ),
    'criteria' => 
    array (
      'acceptedConditions' => 
      array (
        0 => '=',
        1 => 'like',
      ),
      'params' => 
      array (
        'search' => 'search',
        'searchFields' => 'searchFields',
        'filter' => 'filter',
        'orderBy' => 'orderBy',
        'sortedBy' => 'sortedBy',
        'with' => 'with',
        'searchJoin' => 'searchJoin',
      ),
    ),
    'generator' => 
    array (
      'basePath' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\app',
      'rootNamespace' => 'App\\',
      'stubsOverridePath' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\app',
      'paths' => 
      array (
        'models' => 'Entities',
        'repositories' => 'Repositories',
        'interfaces' => 'Repositories',
        'transformers' => 'Transformers',
        'presenters' => 'Presenters',
        'validators' => 'Validators',
        'controllers' => 'Http/Controllers',
        'provider' => 'RepositoryServiceProvider',
        'criteria' => 'Criteria',
      ),
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'stripe' => 
    array (
      'model' => 'App\\User',
      'key' => NULL,
      'secret' => NULL,
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'laravel_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => NULL,
  ),
  'tinker' => 
  array (
    'dont_alias' => 
    array (
    ),
  ),
  'translator' => 
  array (
    'source' => 'database',
    'available_locales' => 
    array (
      0 => 'en',
    ),
    'cache' => 
    array (
      'enabled' => true,
      'timeout' => 60,
      'suffix' => 'translation',
    ),
  ),
  'trustedproxy' => 
  array (
    'proxies' => 
    array (
      0 => '192.168.1.10',
    ),
    'headers' => 
    array (
      1 => 'FORWARDED',
      2 => 'X_FORWARDED_FOR',
      4 => 'X_FORWARDED_HOST',
      8 => 'X_FORWARDED_PROTO',
      16 => 'X_FORWARDED_PORT',
    ),
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'C:\\xampp\\htdocs\\rental-system-backend-new\\resources\\views',
    ),
    'compiled' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\storage\\framework\\views',
  ),
  'dompdf' => 
  array (
    'show_warnings' => false,
    'orientation' => 'portrait',
    'defines' => 
    array (
      'font_dir' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\storage\\fonts/',
      'font_cache' => 'C:\\xampp\\htdocs\\rental-system-backend-new\\storage\\fonts/',
      'temp_dir' => 'C:\\Users\\STY-1\\AppData\\Local\\Temp',
      'chroot' => 'C:\\xampp\\htdocs\\rental-system-backend-new',
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'a4',
      'default_font' => 'serif',
      'dpi' => 96,
      'enable_php' => false,
      'enable_javascript' => true,
      'enable_remote' => true,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => false,
    ),
  ),
  'iseed::config' => 
  array (
    'path' => '/database/seeds',
    'chunk_size' => 500,
  ),
);
