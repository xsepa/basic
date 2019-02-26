<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\SignupForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionRoles(){
        
  /*    $auth = Yii::$app->authManager;  
      $userRole = $auth->getRole('user');
      $auth->assign($userRole, 1); 
      $auth->assign($userRole, 3); 
      $auth->assign($userRole, 4); 
    */    
    }
    
    public function actionAddAdmin() {
        $model = User::find()->where(['username' => 'admin'])->one();
        if (empty($model)) {
            $user = new User();
            $user->username = 'admin';
            $user->email = 'xsepa@mail.ru';
            $user->setPassword('admin');
            $user->created_at = time();
                   
            $user->generateAuthKey();
            if ($user->save()) {
                
                 $auth = Yii::$app->authManager;
                 $adminRole = $auth->getRole('admin');
                 $auth->assign($adminRole, $user->getId());
                
                Yii::$app->session->setFlash('success', 'admin создан');
                return $this->render('index');
            }
        }
        else {
            Yii::$app->session->setFlash('error', 'admin уже существует');
            return $this->render('index');
        };
    }
    
    public function actionSignup()
    {
        $model = new SignupForm(); 

        if ($model->load(Yii::$app->request->post())) { 
            if ($user = $model->signup()) { 
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome(); 
                }
            }
        }

        return $this->render('signup', [ 
            'model' => $model,
        ]);
    }
    
    
    
    
    
    
    
    
}
