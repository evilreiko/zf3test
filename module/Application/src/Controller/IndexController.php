<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;// needed if you render views



// ### CUSTOM ###
use Zend\View\Model\JsonModel;// needed if you return json. You may need to install the component with composer: composer require zendframework/zend-json
use Zend\Db\Adapter\Adapter;// needed if you use db. You may need to install the component with composer: composer require zendframework/zend-db

use Zend\Mail;
use Zend\Mail\Transport\Smtp as SmtpTransport;// required if using SMTP
use Zend\Mail\Transport\SmtpOptions;// required if using SMTP

use Zend\Mime\Message as MimeMessage;// to support html/images in email
use Zend\Mime\Mime;// to support html/images in email
use Zend\Mime\Part as MimePart;// to support html/images in email

// needed if you use service manager (required to use any service(aka models)). You may need to install the component with composer: composer require zendframework/zend-servicemanager
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\Factory\InvokableFactory;
use stdClass;


use Application\Service\CurrencyConverter;// define we our custom class so PHP can see/use it

use Zend\Mvc\MvcEvent;
// ### CUSTOM ###

        

class IndexController extends AbstractActionController
{
    // ### CUSTOM ###
    //public function onDispatch(MvcEvent $e)// override onDispatch
    //{
    //    // Call the base class' onDispatch() first and grab the response
    //    $response = parent::onDispatch($e);
    //
    //    // Set alternative default layout for all the controller's actions
    //    $this->layout()->setTemplate('layout/layout2');
    //
    //    // Return the response
    //    return $response;
    //}
    // ### CUSTOM ###

    // ### CUSTOM ###
    // added optional constructor
    public function __construct()
    {
//        echo 111;
//        exit;
    }
    // ### CUSTOM ###
    
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function myrefAction()
    {
        // composer installed needed components:
        // composer required zendframework/zend-json
        // composer required zendframework/zend-db
        // composer required zendframework/zend-session
        // composer required zendframework/zend-servicemanager
        
        
        
        
        
        
        //$adapter = new Adapter([
        //    'driver'   => 'Pdo_Mysql',// Pdo_Mysql or Mysqli or else..
        //    'database' => 'my_test_db',
        //    'username' => 'root',
        //    'password' => 'root',
        //]);
        //$stmt = $adapter->query('SELECT * FROM `users`');// returns statement, not result yet. returned: Zend\Db\Adapter\Driver\Pdo\Statement
        //$stmt->getSql();// to see the query
        //$result = $stmt->execute();// to execute the statment. returned: Zend\Db\Adapter\Driver\Pdo\Result
        //$result = $adapter->query('SELECT * FROM `users`', Adapter::QUERY_MODE_EXECUTE);// this will make the statement and execute, some dbs don't support preparation, so you can only exeecute directly
        //readme($result->count());// total result fetched (int)
        //readme($result->current());// current row selected (which is first row), if no row found will return null
        //readme($result->next());// bring next row (pointer moves forward). it will not return the row
        //readme($result->current());// current row selected (which is 2nd row), if no row found will return null
        
        
        
        

        
        
        $viewModel = new ViewModel([
            'var1' => 'hello',
            'var2' => 111,
        ]);
        
        
        
        // view variables
        // https://olegkrivtsov.github.io/using-zend-framework-3-book/html/en/Model_View_Controller/Variable_Containers.html
        //$viewModel->getVariable('mykey', 'optional_value_if_not_found');// get variable from view 
        //$viewModel->setVariable('mykey', 'myvalue');// set variable to view 
        //$viewModel->setVariables(['mykey1' => 'A', 'mykey2' => ''], false);// set array of variables at once to view . 2nd param if set to true will clear all previous variables
        //$viewModel->getVariables();// get all view variables as associative array
        //$viewModel->clearVariables();// clear all view variables
        
        
        // get variables from $_GET and $_POST
        // https://olegkrivtsov.github.io/using-zend-framework-3-book/html/en/Model_View_Controller/Retrieving_Data_from_HTTP_Request.html
        //$request = $this->getRequest();
        //$request->isGet();// is get request?
        //$request->isPost();// is post request?
        //$request->isXmlHttpRequest();// // is xhr request?
        //$request->getMethod();// return example: GET or POST
        //$request->getUriString();// return example: "http://local.zf3test.com/application/myref?var_name=abc"
        //$request->getQuery('var_name', 'optional_fallback_value_if_not_found');// $_GET['var_name'] , 2nd param can be anything to return as fallback but if not set then returns null on fallback
        //$request->getPost('var_name', 'optional_fallback_value_if_not_found');// $_POST['var_name'] , 2nd param can be anything to return as fallback but if not set then returns null on fallback
        //$request->getFiles('var_name', 'optional_fallback_value_if_not_found');// $_FILES['var_name'] , 2nd param can be anything to return as fallback but if not set then returns null on fallback
        //$files = $this->getRequest()->getFiles();// $_FILES
        
        // OR without using the request object (using the controller plugin)..
        // https://olegkrivtsov.github.io/using-zend-framework-3-book/html/en/Model_View_Controller/Retrieving_GET_and_POST_Variables.html
        //$this->params()->fromQuery('var_name', 'optional_fallback_value_if_not_found');// $_GET['var_name'] , 2nd param can be anything to return as fallback but if not set then returns null on fallback
        //$this->params()->fromPost('var_name', 'optional_fallback_value_if_not_found');// $_POST['var_name'] , 2nd param can be anything to return as fallback but if not set then returns null on fallback
        //$files = $this->params()->fromFiles();// $_FILES
        //$files = $this->params()->fromFiles('myfile');// specific entry
        // get current route variables (parameters)
        //$this->params()->fromRoute();// get current route's controller and all it's params in an array
        //$this->params()->fromRoute('controller', 'abc');// get the controller, the 2nd param is optional for the default value if not available
        //$this->params()->fromRoute('id', 123);// get the parameter [/:id], can be any variable set in the route. the 2nd param is optional for the default value if not available
        // get from header
        //$this->params()->fromHeader();// get all headers
        //$this->params()->fromHeader('some_header', 'default value if not exist');// get specific header, the 2nd param is optional for the default value if not available
        // you can use shorter version for any of them without specifing from where, like this:
        //$this->params('var_name', 'my default value');

        
        
        
        
        
        // set different view
        // https://olegkrivtsov.github.io/using-zend-framework-3-book/html/en/Model_View_Controller/View_Template_Names.html
        //$viewModel->setTemplate('application/index/index');// Use a different view template for rendering the page.
        //$viewModel->getTemplate();// if you want to check which template is used, use this function, which return the used template. if default, then returns empty string
        
        
        
        // set different layout
        //$this->layout()->setTemplate('layout/layout2');
        //OR shorter version
        //$this->layout('layout/layout2');

        
        
        // return file steam (for download) instead of view.
        // https://olegkrivtsov.github.io/using-zend-framework-3-book/html/en/Model_View_Controller/Disabling_the_View_Rendering.html
        //$response = $this->getResponse();// which allows you to set response data like headers and data, etc
        //return $this->getResponse();
        
        
        
        // MVC EXTRA Notes:
        // https://olegkrivtsov.github.io/using-zend-framework-3-book/html/en/Model_View_Controller/Skinny_Controllers__Fat_Models__Simple_Views.html
        // Keep controllers thing, models fat, views simple
        // in controllers, you get the request data ($_GET/$_POST/etc), validate input, pass to models, return output
        // in models, don't access request data ($_GET/$_POST/etc), and no html output
        // in views, don't access request data ($_GET/$_POST/etc), and no calling model functions
        
        // the 5 main models are simple php classes (except factories which have few lines to include)
        // 5 main models: 
        // 1) entities (like user row from db table)
        // 2) repositories (db table functions)
        // 3) value objects (associative array to pass, like email message to pass to emailmanager model)
        // 4) services (like emailmanager or cacher, ending with "er" or "manager")
        // 5) factories (if you need to call a servicemodel(s) and call some functions or other services before using it, u wrap them in a factory)
        
        // other models:
        // 6) forms => subset of entities
        // 7) filters => transform input data, subset of services
        // 8) validators => checking input data, subset of services
        // 9) view helpers => partial html like header or footer or menu, subset of services
        // 10) routes => for custom mapping rules, subset of services
        
        // intial directory structure 
        // /Application/src
        //     /Controller
        
        // typical directory structure 
        // /Application/src
        //     /Controller
        //         /Factory
        //         /Plugin
        //             /Factory
        //     /Entity
        //     /Filter
        //     /Form
        //     /Repository
        //     /Route
        //     /Service
        //         /Factory
        //     /Validator
        //     /ValueObject
        //     /View
        //         /Helper
        //             /Factory
        
        
        
        
        // to get services (models), use the service manager
        // https://olegkrivtsov.github.io/using-zend-framework-3-book/html/en/Website_Operation/Service_Manager.html
        //$serviceManager = new ServiceManager([
        //    'factories' => [
        //        stdClass::class => InvokableFactory::class,
        //    ],
        //]);
        //$service = $serviceManager->get('MyServiceName');// get registered service (same instance)
        // OR
        //$service = $serviceManager->build('MyServiceName');// get registered service (new instance)
        
        //$is = $serviceManager->has('MyServiceName');// check if service is registered
        //$serviceManager->setAlias('CurConv', CurrencyConverter::class);// when u set a service, later you can set an alias for it
        
        //$service = new CurrencyConverter();// Create an instance of the class.
        //$serviceManager->setService(CurrencyConverter::class, $service);// Save the instance to service manager.
        // OR
        //$serviceManager->setInvokableClass(CurrencyConverter::class);// we register the class, no object is wasting memory, so only when needed we will get an instance, BUT it doesn't allow to pass parameters (dependencies) to the service on object instantiation, so better to use factory
        // the above line better to use with factory. the below line is same as the above 1 line:
        //$serviceManager->setFactory(CurrencyConverter::class, InvokableFactory::class);// note: make sure to include "use Zend\ServiceManager\Factory\InvokableFactory;" before writing this line. Note: this line doesn't use our factory class \Application\Service\Factory\CurrencyConverterFactory
        
        
        
        
        
        
        
        
        // set global variables and constants here which are NOT enviornment-specific (not sensitive data, like session configuration): /config/autoload/global.php 
        // set global variables and constants here which are enviornment-specific (like db credentials): /config/autoload/local.php (rename the local.php.dist). NOTE: you shouldn't include this file in the VCS
        // https://olegkrivtsov.github.io/using-zend-framework-3-book/html/en/Website_Operation/Application_Configuration.html
        
        // application-level development config files
        // /config/development.config.php this file overrides some of the things in application.config.php
        //composer development-enable
        // this is useful to enable/disable things for development only, like disabling cache or enabling testing tools
        // don't include this file in VCS, instead include the /config/development.config.php.dist in the VCS
        // same thing for development.local.php and development.local.php.dist
         
        // module-level development config files: module.config.php
        
        // how it works:
        // 1) application.config.php loaded first
        // 2) then module config files
        // 3) then extra config files
        
        
        
        
        // redirect
        //$this->redirect()->toRoute('home', ['action' => 'index']);// 1st param is the route name in module.config.php, 2nd param is an associative array which has the parameter options like [:action] [:id] etc
        //$this->redirect()->toUrl('/some/route');// this will not do redirect directly, you must return; after this call to take action. you can pass "/my/url" which is absolute, or "my/url" which is relative to current route (will be appended)
        //$this->redirect()->refresh();// this will not do refresh directly, you must return; after this call to take action.
        
        
        
        
        // get view from another controller's action (or same action), then pass it as variable to the current view, then you can display it with echo $this->partial($this->htmlfromanotherview);
        //$otherViewModel = $this->forward()->dispatch(\Application\Controller\FooController::class, ['action'=>'bar']);
        //$otherViewModel->setTemplate('application/foo/bar');// set which template does this view use
        //return new ViewModel([
        //    'htmlfromanotherview' => $otherViewModel
        //]);
        // OR
        // you can achieve the same if it's in the same controller, like this
        //$otherViewModel = $this->indexAction();
        //$otherViewModel->setTemplate('application/foo/bar');// set which template does this view use
        //return new ViewModel([
        //    'htmlfromanotherview' => $otherViewModel
        //]);
        
        
        
        // namespace and class names. getting full class name
        //readme(IndexController::class);// returns same as below. returns the full class name as "Application\Controller\IndexController", which is the namespace + class name. this is based on relative namespace we're in
        //readme(\Application\Controller\IndexController::class);// returns same as above. returns the full class name as "Application\Controller\IndexController", which is the namespace + class name. this is fully defined
        
        
        
        // when handling files, you need to know which is the current working directory (cwd)
        // in zf3, when current working directory is set to where composer.json is: like so "/var/www/local.zf3test.com" in ubuntu or "/Application/MAMP/htdocs/zf3test"
        //readme(getcwd()); // <<-- getcwd() is pure php function
        // this can be changed by this:
        //chdir('public');// if cwd is "/var/www/local.zf3test.com", this function will change it to "/var/www/local.zf3test.com/public"
        // if add "/" in the beginning of any file reading, it will start reading from the root level. example:
        //chdir('/var/Hi');// if cwd is "/var/www/local.zf3test.com", this function will change it to "/var/Hi"
        
        
        
        
        // to call model function (without define use)
        //\Application\Model\Sender::func1(111);// absolute path based on namepsace, which will call \Application\Model\Sender class (actual path: module/Application/src/Model/Send.php)
        // or
        //MycustomcontController::mystaticfunc1(111);// relative path based on namespace, which will call \Application\Controller\MycustomcontController class (actual path: module/Application/src/Model/Send.php)
        
        
        
        
        
        // how to send simply email with zend-mail
        // the below is REQUIRED
//        $mail = new Mail\Message();
//        $mail->setBody('This is the text of the email.');
//        $mail->setFrom('Freeaqingme@example.org', "Sender's name");
//        $mail->addTo('Matthew@example.com', 'Name of recipient');
//        $mail->setSubject('TestSubject');
//        
//        // the below is OPTIONAL
//        $mail->addCc('ralph@example.org');
//        $mail->addBcc('enrico@example.org');
//        $mail->addReplyTo('matthew@example.com', 'Matthew');
//        $mail->setEncoding('UTF-8');
//
//        // the below is REQUIRED
//        $transport = new Mail\Transport\Sendmail();
//        $transport->send($mail);
//
//        
//        
//        
//        // how to send simply email with zend-mail with SMTP
//        // the below is REQUIRED
//        $mail = new Mail\Message();
//        $mail->setBody('This is the text of the email.');
//        $mail->setFrom('Freeaqingme@example.org', "Sender's name");
//        $mail->addTo('Matthew@example.com', 'Name of recipient');
//        $mail->setSubject('TestSubject');
//        
//        // the below is OPTIONAL
//        $mail->addCc('ralph@example.org');
//        $mail->addBcc('enrico@example.org');
//        $mail->addReplyTo('matthew@example.com', 'Matthew');
//        $mail->setEncoding('UTF-8');
//
//        // the below is REQUIRED
//        $transport = new SmtpTransport();
//        $options   = new SmtpOptions([
//            'name'              => 'localhost.localdomain',
//            'host'              => '127.0.0.1',
//            'port' => 587,//optional
//            'connection_class'  => 'login',// can be "login" or "plain"
//            'connection_config' => [
//                'username' => 'user',
//                'password' => 'pass',
//                'ssl' => 'tls',//optional, value can be "ssl" or "tls"
//            ],
//        ]);
//        $transport->setOptions($options);
//        $transport->send($mail);
//        
//        
//        
//        // how to send simply email with zend-mail with html/images
//        $htmlMarkup = '<p>some html</p>';// should be full <html> content
//        $html = new MimePart($htmlMarkup);
//        $html->type = Mime::TYPE_HTML;
//        $html->charset = 'utf-8';
//        $html->encoding = Mime::ENCODING_QUOTEDPRINTABLE;
//
//        $pathToImage = 'images/something.jpg';
//        $image = new MimePart(fopen($pathToImage, 'r'));
//        $image->type = 'image/jpeg';
//        $image->filename = 'image-file-name.jpg';
//        $image->disposition = Mime::DISPOSITION_ATTACHMENT;
//        $image->encoding = Mime::ENCODING_BASE64;
//
//        $body = new MimeMessage();
//        $body->setParts([$html, $image]);
//
//        $mail = new Message();
//        $mail->setBody($body);
//
//        $contentTypeHeader = $mail->getHeaders()->get('Content-Type');
//        $contentTypeHeader->setType('multipart/related');
        
        
        
        
        
        return $viewModel;
    }
    
    public function myjsonAction()
    {
        return new JsonModel([
            'status' => 'SUCCESS',
            'message'=> 'Here is your data',
            'data' => [
                'full_name' => 'John Doe',
                'address' => '51 Middle st.'
            ]
        ]);
    }
    
    public function mymvcstandardjsonAction()
    {
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $email = $_POST['email'];
        $header = $_COOKIE['header'];
        $ip = $_SERVER['ip'];
        $file = $_FILES['doc'];
        $hardcoded = 'my string';
        
        // optionally do some basic transformation if needed, like:
//        $name = $name !== '' ? $name . 'salt' : '';// ex: edit
//        if($header === 'go') {// ex: replace
//            $header = 'come';
//        }
//        $ip = (int)$ip;// ex: typecast
        
        // pass the model to do the job
        // in the model, it validate and do db changes. NO need to create table model for each table
        $params = [
            'db'        => $this->db,
            'name'      => $name,
            'email'     => $email,
            'header'    => $header,
            'ip'        => $ip,
            'file'      => $file,
            'hardcoded' => $hardcoded
        ];
        // add/edit/remove before passing
//        $params['more'] = 'more data';// add
//        if(isset($params['more'])) {// edit
//            $params['more2'] = 2;
//        }
        $modelResponse = \Application\Model\MyModelX::insert($params);
        
        // in the model each function, should return something like this:
//        return [
//            'c' => '200',// "code". always set for consistency. get from Constants.php
//            'm' => 'Registration successful',// "message". always set for consistency. hardcoded string
//            'p' => [// "parameters". parameters used (as they are or if replaced). always set for consistency
//                'name' => 'XXX YYY',
//                'email' => 'aaa@bbb.ccc',
//            ],
//            'e' => [// "errors". always set for consistency. if there are any errors.
//                'input1' => 'input1 cannot be more than 20 characters',
//                'input2' => 'input2 must contain digits only'
//            ],
//            'd' => [// "data". always set for consistency
//                'full_name' => 'John Doe',
//                'address' => '51 Middle st.'
//            ]
//        ];
        
        // then finally, we can check & edit $modelResponse (optionally), and return it
//        if($modelResponse['c'] === '201') {
//            $modelResponse['m'] = 'Ok';
//        }
//        if(count($modelResponse['e'])) {
//            $modelResponse['m'] = 'Ok with errors';
//        }
//        $modelResponse['d']['extra'] = 'more data';
        return new JsonModel($modelResponse);
    }

}
