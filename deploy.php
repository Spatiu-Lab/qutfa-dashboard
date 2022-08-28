<?php

namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/php-fpm.php';
// require 'contrib/npm.php';

set('application', 'smart');
set('repository', 'git@github.com:Spatiu-Lab/qutfa-dashboard.git');
// set('php_fpm_version', '8.0');
set('http_user', 'spatiula');
set('writable_mode', 'chmod');



// host('main')
//     ->set('remote_user', 'smartaco')
//     ->set('hostname', 'smarta.com.sa')
//     ->set('branch', 'smarthome')
//     ->set('port', 65002)
//     ->set('git_ssh_command', 'ssh')
//     ->set('deploy_path', '~/public_html/smarta');

host('main')
->set('remote_user', 'spatiula')
->set('branch', 'qutfa')
->set('hostname', 'spatiulab.com')
->set('deploy_path', '~/qatfah.spatiulab.com');


// host('dev')
//     ->set('remote_user', 'fvccdoee')
//     ->set('hostname', 'exo-contructing.com')
//     ->set('deploy_path', '~/dev.exo-contructing.com');

// host('mobile')
//     ->set('remote_user', 'smartaco')
//     ->set('hostname', 'spatiulab.com')
//     ->set('deploy_path', '~/exo.spatiulab.com');


task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    // 'artisan:key:generate',
    // 'artisan:storage:link',
    // 'artisan:view:cache',
    // 'artisan:config:cache',
    'artisan:optimize:clear',
    'artisan:migrate',
    // 'artisan:db:seed',
    // 'npm:install',
    // 'npm:run:prod',
    'deploy:publish',
    // 'php-fpm:reload',
]);

// task('npm:run:prod', function () {
//     cd('{{release_or_current_path}}');
//     run('npm run prod');
// });

after('deploy:failed', 'deploy:unlock');