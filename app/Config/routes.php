<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'homes', 'action' => 'index', 'index'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
    Router::connect(
        '/danh-sach-truyen-chu.html', 
        array('controller' => 'stories', 'action' => 'view_text'),
        array(
            'pass' => array(),
        )
    );
    Router::connect(
        '/danh-sach-truyen-tranh.html', 
        array('controller' => 'stories', 'action' => 'view_no_text'),
        array(
            'pass' => array(),
        )
    );
    Router::connect(
        '/danh-sach-truyen-hot.html', 
        array('controller' => 'stories', 'action' => 'view_hot'),
        array(
            'pass' => array(),
        )
    );
    Router::connect(
        '/danh-sach-truyen-moi.html', 
        array('controller' => 'stories', 'action' => 'view_new'),
        array(
            'pass' => array(),
        )
    );
    //thể loại
    Router::connect(
        '/:id-:slug.html/*',
        array('controller' => 'stories', 'action' => 'view_genre'),
        array(
            'pass' => array('id', 'slug'),
            "id"=>"[0-9]+", // chỉ là số,
        )
    );
    Router::connect('/news/category/:category/*', 
        array('controller' => 'news_articles', 'action' => 'index'), 
        array('category' => '[a-z0-9-]+', 'pass' => array('category')));

    //chi tiết một truyện
    Router::connect(
        '/:slug-:id.html',
        array('controller' => 'stories', 'action' => 'detail_story'),
        array(
            'pass' => array('slug', 'id'),
            "id"=>"[0-9]+", // chỉ là số
        )
    );
    //chi tiếp chap
    Router::connect(
        '/:slug1/:slug2/:slug3-:id.html',
        array('controller' => 'stories', 'action' => 'detail_chap'),
        array(
            'pass' => array('slug1','slug2','slug3','id'),
            "id"=>"[0-9]+", // chỉ là số
        )
    );
    //Lỗi
    Router::connect(
        '/error.html',
        array('controller' => 'errors', 'action' => 'error400'),
        array(
            'pass' => array(),
        )
    );
    //Đăng ký nhận tin
    Router::connect(
        '/newsletter.html',
        array('controller' => 'users', 'action' => 'newsletter'),
        array(
            'pass' => array(),
        )
    );
    //Search
    Router::connect(
        '/search.html/*',
        array('controller' => 'stories', 'action' => 'search'),
        array(
            'pass' => array(),
        )
    );
    
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
