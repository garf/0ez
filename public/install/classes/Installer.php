<?php

class Installer
{
    private $tpl;


    public function __construct()
    {
        $this->tpl = Templater::instance();
    }

    public function greetings()
    {
        $data = [
            'title' => 'Greetings, stranger!',
            'text' => 'Glad to see you here',
            'current_action' => 'step1',
        ];
        return $this->tpl->render('greetings.php', $data);
    }

    public function checkRequirements()
    {
        $modules = require(base_path('config/requirements.php'));

        $modules = $this->checkModules($modules);

        $data = [
            'title' => 'Requirements',
            'modules' => $modules,
            'current_action' => 'step2',
        ];

        return $this->tpl->render('check-requirements.php', $data);
    }

    private function checkModules($requirements)
    {
        $done = [];
        foreach ($requirements as $module=>$requirement) {
            $done[$module] = $requirement;
            $done[$module]['loaded'] = true;
            if (!extension_loaded($module)) {
                $done[$module]['loaded'] = false;
            }
        }

        return $done;
    }

    public function dbSettings()
    {
        $data = [
            'title' => 'Set database configuration',
            'current_action' => 'step3',
        ];

        return $this->tpl->render('db-settings.php', $data);
    }

    public function userSettings()
    {
        $data = [
            'title' => 'Set User configuration',
            'current_action' => 'step4',
        ];

        return $this->tpl->render('user-settings.php', $data);
    }

    public function install()
    {
        $response = '';
        passthru('cd ' . __DIR__ . '/../../../ && php -r "readfile(\'https://getcomposer.org/installer\');" | php && php composer.phar install', $response);

        $data = [
            'title' => 'Install 0ez',
            'current_action' => 'step5',
            'response' => $response,
        ];

        return $this->tpl->render('composer-install.php', $data);
    }

    public function installComposer()
    {
        //TODO: AJAX Composer Installation
    }

    public function installPackages()
    {
        //TODO: AJAX Composer Packages Install
    }

    public function writeEnv()
    {
        //TODO: AJAX .env file fill up
    }

    public function makeMigration()
    {
        //TODO: AJAX Migration Start
    }

    public function createAdmin()
    {
        //TODO: AJAX CreateAdmin
    }
}